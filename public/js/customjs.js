$.fn.hasAttr = function (name) {
    var attr = $(this).attr(name);
    return typeof attr !== 'undefined' && attr !== false;
};

function log(str) {
    console.log(str);
}

function setnull(){

}

function disableinputoptions(elem, separate, another = null) {
    var val = new Array();
    var name = elem.attr('name');
    var form = elem.closest('form');
    form.find("input[name='" + name + "']:checked").each(function () {
        val.push($(this).val());
    });
    if ($.inArray(separate, val) !== -1) {
        form.find("input[name='" + name + "'][value!=" + separate + "]").prop('checked', false);
        form.find("input[name='" + name + "'][value!=" + separate + "]").attr('disabled', 'disabled');
    } else if (another && $.inArray(another, val) !== -1) {
        form.find("input[name='" + name + "'][value!=" + another + "]").prop('checked', false);
        form.find("input[name='" + name + "'][value!=" + another + "]").attr('disabled', 'disabled');
    } else {
        form.find("input[name='" + name + "']").removeAttr('disabled');
    }
}

function disableSel2options(evt, target, disabled, except) {
    var selId = evt.params.args.data.id;
    var aaList = $("option[value !='" + selId + "']", target);
    $.each(aaList, function (idx, item) {
        var data = $(item).data("data");
        if (except == selId) {
            data.disabled = disabled;
        }
    });
}

function firstdisableSel2options(target, disabled, except) {
    var aaList = target.find("option[value !='" + except + "']");
    $.each(aaList, function (idx, item) {
        $(item).prop('disabled', true);
    });
}

$(document).ready(function () {
    $('form.ajaxResponse input.persian-date-picker').before('<span class="calender"><i class="fa fa-calendar"></i></span>')
    $('form.ajaxResponse input.bs-timepicker').before('<span class="time"><i class="fa fa-clock"></i></span>')
    $("input[required][type=text], select[required],textarea[required]").attr("oninvalid", "this.setCustomValidity('لطفا این قسمت را تکمیل کنید')");
    $("input[required][type=text], select[required]").attr("oninput", "setCustomValidity('')");
    $("input[required][multiple][type=checkbox]").removeClass("form-check-input");

    $("input[required][multiple][type=checkbox]").each(function () {
        var id = $(this).attr('name').replace('[]', '') + '_' + $(this).attr('value');
        $(this).attr('id', id);
    });

    $("input:text:not([title]),input:password:not([title])").attr('title', 'اطلاعات لازم را تکمیل کنید');
    $("input:text").attr('autocomplete', 'off');

    $('#BMI').removeAttr('title');
    $('#WHR').removeAttr('title');

    $("input:text[title]").each(function () {
        $(this).attr('title', $(this).attr('title').replace(/(<([^>]+)>([^<]+)<([^>]+)>)/ig, ""));
    });

    $("form:not('.ajaxResponse') input[required]:text,form:not('.ajaxResponse') input:password[required],form:not('.ajaxResponse') select[required]").closest('.form-group').find('label').before(' <span class="red">*</span> ');
    $("select").attr('title', 'لطفا یک مورد را انتخاب کنید');
    $("select[multiple]").attr('title', 'یک یا چند مورد را انتخاب کنید');

    $("select[required] option[value='']").attr('style', "display:none");
    var item = $('select#city_id');
    if (item.length) {
        $(document).on("change", "select#province_id", function () {
            var val = $(this).val();
            var sid = $("input[name='_token']").val();
            $.ajax({
                data: {'province_id': val, '_token': sid},
                url: "/provinces/citys",
                method: 'post',
                success: function (data) {
                    item.html('');
                    if (data) {
                        for (var i in data) {
                            item.append('<option value="' + data[i].id + '">' + data[i].name + '</option>');
                            item.trigger("change");
                        }
                    }
                }
            });
        });
    }

    $(document).on("click", "button.cancel", function (e) {
        e.preventDefault();
        window.location.href = $(this).attr('href');
    });

    $(document).on("click", ".back-page", function (e) {
        e.preventDefault();
        history.back();
        //window.location = document.referrer;
    });

    $(document).on("click", "input[type=radio]", function (e) {
        var checked = $(this).hasAttr("checked");
        if (checked) {
            $(this).prop('checked', false);
            $(this).removeAttr('checked');
        } else {
            $(this).prop('checked', true);
            $(this).attr('checked', 'checked');
        }
    });

    $(document).on("click", "span.show-password", function (e) {
        var input = $(this).prev('input');
        if (input.attr('type') == 'text')
            input.attr('type', 'password');
        else
            input.attr('type', 'text');

    });

    $(document).on('click', '.delete-record', function (e) {
        e.preventDefault();
        var item = $(this).closest('form');
        swal("آیا گزینه انتخابی حذف شود؟", {
            buttons: ["خیر", "بله"],
        }).then((willDone) => {
            if (willDone) {
                swal("آیا  از حذف گزینه انتخابی اطمینان دارید؟", {
                    buttons: ["خیر", "بله"],
                }).then((willDone2) => {
                    if (willDone2) {
                        item.submit();
                    }
                });
            }
        });
    });

    $(document).on('click', '.editform', function (e) {
        e.preventDefault();
        var form = $(this).closest('.row').prevAll('form');
        if (form.length == 0)
            form = $(this).closest('form');
        form.find('input').removeAttr('disabled');
        form.find('select').removeAttr('disabled');
        form.find('button').removeAttr('disabled');
        form.find('.addSpacify').removeAttr('disabled');
        form.find('.removeSpacify').removeAttr('disabled');
        $(this).prev('.submit-ajax-form').removeAttr('disabled');
        $('#BMI').attr('disabled', 'disabled');
        $('#WHR').attr('disabled', 'disabled');
        if ($("#laborality_testing").length > 0) {
            $('#laborality_testing td.done input:checked').each(function () {
                $(this).closest('tr').find('td.value input,td.value select').attr('disabled', 'disabled');
            });
        }

        if ($("#OtherDrugsDuringHospitalization_6:checked").length > 0) {
            item = $("#OtherDrugsDuringHospitalization_6");
            form = item.closest('form')
            if (item.prop('checked')) {
                form.find('input[id!="OtherDrugsDuringHospitalization_6"]').prop('checked', false).prop('disabled', true);
                form.find('input[name="_token"]').prop('disabled', false);
            } else
                form.find('input').prop('disabled', false);
        }

        if ($("select[name='AngiographicFinding']").length > 0) {
            item = $("select[name='AngiographicFinding'] option[value='5']:selected");
            item.each(function () {
                if ($(this).prop('selected')) {
                    var form = $(this).closest('form');
                    form.find('#LeftMain').prop('disabled',true);
                }
            });
        }

        if ($("select[name='ReasonsNotPerformingAngiography[]']").length > 0) {
            item = $("select[name='ReasonsNotPerformingAngiography[]'] option[value='12']:selected");
            item.each(function () {
                if ($(this).prop('selected')) {
                    var elem = $(this).closest('select');
                    firstdisableSel2options(elem, true, 12);
                }
            })
        }

        if ($("select[name='ReasonsNotPerformingCabgDespiteIndication[]']").length > 0) {
            item = $("select[name='ReasonsNotPerformingCabgDespiteIndication[]'] option[value='9']:selected");
            item.each(function () {
                if ($(this).prop('selected')) {
                    var elem = $(this).closest('select');
                    firstdisableSel2options(elem, true, 9);
                }
            })
        }

        if ($("select[name='DyslipidemiaType[]']").length > 0) {
            item = $("select[name='DyslipidemiaType[]'] option[value='6']:selected");
            item.each(function () {
                if ($(this).prop('selected')) {
                    var elem = $(this).closest('select');
                    firstdisableSel2options(elem, true, 6);
                }
            })
        }

        if ($("select[name='other_symptoms[]']").length > 0) {
            item = $("select[name='DyslipidemiaType[]'] option[value='14']:selected");
            item.each(function () {
                if ($(this).prop('selected')) {
                    var elem = $(this).closest('select');
                    firstdisableSel2options(elem, true, 14);
                }
            })
        }

        if ($("select[name='ReasonPerformingFibrinolyticTherapy[]']").length > 0) {
            item = $("select[name='ReasonPerformingFibrinolyticTherapy[]'] option[value='10']:selected");
            item.each(function () {
                if ($(this).prop('selected')) {
                    var elem = $(this).closest('select');
                    firstdisableSel2options(elem, true, 10);
                }
            })
        }

        if ($("select[name='CardiacStenosis[]']").length > 0) {
            item = $("select[name='CardiacStenosis[]'] option[value='7']:selected");
            item.each(function () {
                if ($(this).prop('selected')) {
                    var elem = $(this).closest('select');
                    firstdisableSel2options(elem, true, 7);
                }
            })
        }

        if ($("#VascularAccess_7:checked").length > 0)
            disableinputoptions($("input[name='VascularAccess[]']"), "7");

        if ($("#accompanying_symptoms_5:checked").length > 0)
            disableinputoptions($("input[name='accompanying_symptoms[]']"), "5");

        if ($("#accompanying_symptoms_4:checked").length > 0)
            disableinputoptions($("input[name='accompanying_symptoms[]']"), "4");

        if ($("#TypeofAlcohol_8:checked").length > 0)
            disableinputoptions($("input[name='TypeofAlcohol[]']"), "8");

        if ($("#WayUse_5:checked").length > 0)
            disableinputoptions($("input[name='WayUse[]']"), "5");

        if ($("#OpioidsType_13:checked").length > 0)
            disableinputoptions($("input[name='OpioidsType[]']"), "13");

        if ($("#TypeIllicitDrugs_7:checked").length > 0)
            disableinputoptions($("input[name='TypeIllicitDrugs[]']"), "7");

        if ($("#OCPDrugs_6:checked").length > 0)
            disableinputoptions($("input[name='OCPDrugs[]']"), "6");

        if ($("#Drugs_7:checked").length > 0)
            disableinputoptions($("input[name='Drugs[]']"), "7");

        if ($("#Procedures_10:checked").length > 0)
            disableinputoptions($("input[name='Procedures[]']"), "10");

        if ($("#relieving_factors_1:checked").length > 0)
            disableinputoptions($("input[name='relieving_factors[]']"), "1");

        if ($("#relieving_factors_4:checked").length > 0)
            disableinputoptions($("input[name='relieving_factors[]']"), "4");

        if ($("#precipitating_factors_9:checked").length > 0)
            disableinputoptions($("input[name='precipitating_factors[]']"), "9");

        if ($("#precipitating_factors_1:checked").length > 0)
            disableinputoptions($("input[name='precipitating_factors[]']"), "1");

        if ($("#Radiation_10:checked").length > 0)
            disableinputoptions($("input[name='Radiation[]']"), "10");

        if ($("#Radiation_1:checked").length > 0)
            disableinputoptions($("input[name='Radiation[]']"), "1");

        if ($("#quality_8:checked").length > 0)
            disableinputoptions($("input[name='quality[]']"), "8");

        if ($("#site_12:checked").length > 0)
            disableinputoptions($("input[name='site[]']"), "12");

    });

    $(document).on('click', '.removeSpacify', function () {
        if (!$(this).hasAttr('disabled'))
            $(this).closest('.input-group').remove();
    });

    $(document).on('click', '.addSpacify', function () {
        if (!$(this).hasAttr('disabled')) {
            $(this).before('<div class="input-group mb-3 col-sm-6 col-md-4">' +
                '<input type="text" name="specify[]"' +
                ' class="form-control">' +
                '<div class="input-group-prepend removeSpacify">' +
                ' <span class="input-group-text"><i class="fa fa-minus"></i></span>' +
                ' </div>' +
                ' </div>')
        }
    });

    $(document).on('keypress', 'input,select', function (e) {
        var yourFormFields = $("form").find('button,input,textarea,select');
        if (e.which == 13) {
            e.preventDefault();
            var index = yourFormFields.index(this);
            if (index > -1 && (index + 1) < yourFormFields.length) {
                yourFormFields.eq(index + 1).focus();
            }
        }
    });

    $(document).on('click', '.submit-ajax-form', function (e) {
        $('input,select').removeClass('is-invalid');
        $('.errorinput').remove();
        e.preventDefault();
        swal("آیا نسبت به ذخیره اطلاعات اطمینان دارید؟", {
            buttons: ["خیر", "بله"],
        }).then((willDone) => {
            if (willDone) {
                var form = $(this).closest('.row').prev('form.ajaxResponse');
                var data = form.serialize();
                var action = form.attr('action');
                $.ajax({
                    type: 'Post',
                    url: action,
                    data: data,
                    success: function (result) {
                        if (result.status == 'success') {
                            swal(result.message, {
                                icon: "success",
                                button: "بستن"
                            }).then(() => {
                                if (result.id) {
                                    $('form.ajaxResponse').each(function () {
                                        let actionf = $(this).attr('action');
                                        $(this).attr('action', actionf.replace('/0', '/' + result.id));
                                    });
                                }
                                if (result.route) {
                                    window.location.href = result.route;
                                }
                                form.find('input,select,.addSpacify,.removeSpacify,button').attr('disabled', 'disabled');
                                form.find('button.editform,.dossier-close').removeAttr('disabled');

                                if (form.closest('.tab-pane').length > 0) {
                                    let id = form.closest('.tab-pane').attr('id');
                                    $('#myTab a[href="#' + id + '"]').closest('li').addClass('completed');
                                }
                            });
                        } else {
                            swal(result.message, {
                                icon: "error",
                                button: "بستن"
                            });
                        }

                    },
                    error: function (err) {
                        if (err.status == 422) { // when status code is 422, it's a validation issue
                            var m = ''
                            $.each(err.responseJSON.errors, function (i, error) {
                                m += error[0] + "\n";
                                var input = $('input[name="' + i + '"],select[name="' + i + '"],select[name="' + i + '[]"]');
                                if (input.length) {
                                    input.addClass('is-invalid');
                                    if (input.attr('type') == 'radio')
                                        $('label[for="' + i + '"]').append('<div class="errorinput">' + error[0] + '</div>');
                                    else if (input.attr('type') == 'checkbox')
                                        $('label[for="' + i + '[]"]').append('<div class="errorinput">' + error[0] + '</div>');
                                    else
                                        $('input[name="' + i + '"],select[name="' + i + '"],select[name="' + i + '[]"]').closest('.form-group').append('<div class="errorinput">' + error[0] + '</div>');
                                } else {
                                    $('label[for="' + i + '"],label[for="' + i + '[]"]').append('<div class="errorinput">' + error[0] + '</div>');
                                }
                                //$('input[name="' + i + '"],select#' + i).after('<div class="errorinput">' + error[0] + '</div>');

                                //$('select[name="' + i + '[]"]').append('<div class="errorinput">' + error[0] + '</div>')
                            });
                            swal(m, {
                                icon: "error",
                                button: "بستن"
                            });
                        }
                    }
                });
            }
        });
    });

    $(".persian-date-picker").keyup(function (e) {
        if (e.keyCode != 8) {
            if ($(this).val().length == 4) {
                $(this).val($(this).val() + "/");
            } else if ($(this).val().length == 7) {
                $(this).val($(this).val() + "/");
            }
        }
    });
    $(document).on('keypress', "form.ajaxResponse input[type='number']", function (event) {
        if( !(event.keyCode == 8                                // backspace
            || event.keyCode == 46                              // delete
            || (event.keyCode >= 48 && event.keyCode <= 57))  // numbers on keyboard
        ) {
            event.preventDefault();     // Prevent character input
        }
    });

    $(".bs-timepicker").keyup(function (e) {
        if (e.keyCode != 8) {
            if ($(this).val().length == 2) {
                $(this).val($(this).val() + ":");
            }
        }
    });

    $(document).on('click', '.alert-dismissible .close', function () {
        $(this).closest('.alert-dismissible').hide();
    });
});
