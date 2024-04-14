@extends('layouts.panel')
@section('css')
    <style>
        .dataTables_wrapper button {
            color: black !important;
        }

        .col a, .table.dataTable thead {
            padding: 0 !important;
        }

        .col {
            width: 20px !important;
        }

        table.dataTable tbody td {
            padding: 5px 0 !important;
        }
    </style>
@endsection
@section('content')
    <div class="modal" id="export_cells" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('panel.export anbar')}}</h4>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" class="ajax_form" action="{{route('string.export.export')}}">
                        @csrf
                        <input type="hidden" id="id_item" name="id" value="">
                        <div class="row">
                            <div class="form-group col-12 col-sm-6 col-md-4">
                                <label for="day">{{__('panel.person')}}
                                    <span class="required">*</span>
                                </label>
                                <select class="form-control select2" name="person">
                                    <option></option>
                                    @foreach($persons as $person)
                                        <option value="{{$person->id}}">{{$person->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-12 col-sm-6 col-md-4">
                                <label for="day">{{__('panel.device')}}
                                    <span class="required">*</span>
                                </label>
                                <select class="form-control select2" name="device">
                                    <option></option>
                                    @foreach($devices as $device)
                                        <option value="{{$device->id}}">{{$device->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-12 col-sm-6 col-md-4">
                                <label for="day">{{__('panel.company')}}
                                    <span class="required">*</span>
                                </label>
                                <select class="form-control select2" name="company">
                                    <option></option>
                                    @foreach($companies as $company)
                                        <option value="{{$company->id}}">{{$company->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-12 col-sm-6 col-md-4">
                                <label for="day">{{__('panel.weight')}}
                                    <span class="required">*</span>
                                </label>
                                <input type="text" id="weight" name="weight"
                                       value="{{old('weight',isset($item) ? $item->weight : '')}}" class="form-control">
                            </div>

                            <div class="form-group col-12 col-sm-6 col-md-4">
                                <label for="day">{{__('panel.count')}}
                                    <span class="required">*</span>
                                </label>
                                <input type="text" id="count" name="count"
                                       value="{{old('count',isset($item) ? $item->count : '')}}" class="form-control">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mt-3">{{__('panel.save')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="enter_cells" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         style="padding-left: 17px" aria-modal="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('panel.enter cells')}}</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"
                            data-bs-original-title="" title=""></button>
                </div>
                <div class="modal-body">
                    <h4 class="modal-title">سلول های مبدا:</h4>
                    <label id="mabda"></label>
                    <form action="{{route('string.qr_code.enter_cells')}}" method="post" class="enter_form">
                        @csrf
                        <input type="hidden" value="" name="id">
                        <div class="mb-3">
                            <div class="form-group col-12 col-sm-6 col-md-4">
                                <label for="day">{{__('panel.anbar')}}
                                    <span class="required">*</span>
                                </label>
                                <select name="anber" id="anbar" class="form-control form-select">
                                    <option></option>
                                    @foreach($anbars as $anbar)
                                        <option value="{{$anbar->id}}">{{ $anbar->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div id="cells" class="row">
                                @foreach($cells as $cell)
                                    <div class="form-check checkbox mb-0 cell-select col-sm-6"
                                         data-parent="{{$cell->string_anbar->id}}" style="display: none">
                                        <input type="checkbox" value="{{$cell->id}}" name="cells[]"
                                               id="cell_{{$cell->id}}">
                                        <label for="cell_{{$cell->id}}">{{ $cell->code }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"
                                    data-bs-original-title=""
                                    title="">{{ __('panel.close')}}
                            </button>
                            <button class="btn btn-primary" type="submit">{{ __('panel.enter cells')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal" id="edit_string_type" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         style="padding-left: 17px" aria-modal="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('panel.edit string type')}}</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"
                            data-bs-original-title="" title=""></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('string.group_qr_code.edit_string_type')}}" method="post" class="ajax_form">
                        @csrf
                        <input type="hidden" value="" name="id">
                        <div class="row">
                            <div class="form-group col-12 col-sm-6 col-md-2">
                                <label for="day">{{__('panel.material')}}
                                    <span class="required">*</span>
                                </label>
                                <select name="string_material_id" class="form-control form-select">
                                    @foreach(\App\Models\String\Material::all() as $material)
                                        <option value="{{$material->id}}">{{ $material->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-12 col-sm-6 col-md-2">
                                <label for="day">{{__('panel.color')}}
                                    <span class="required">*</span>
                                </label>
                                <select name="string_color_id" class="form-control form-select">
                                    @foreach(\App\Models\String\Color::all() as $color)
                                        <option value="{{$color->id}}">{{ $color->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-12 col-sm-6 col-md-2">
                                <label for="day">{{__('panel.grade')}}
                                    <span class="required">*</span>
                                </label>
                                <select name="string_grade_id" class="form-control form-select">
                                    @foreach(\App\Models\String\Grade::all() as $grade)
                                        <option value="{{$grade->id}}">{{ $grade->value}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-12 col-sm-6 col-md-2">
                                <label for="day">{{__('panel.layer')}}
                                    <span class="required">*</span>
                                </label>
                                <select name="string_layer_id" class="form-control form-select">
                                    @foreach(\App\Models\String\Layer::all() as $layer)
                                        <option value="{{$layer->id}}">{{ $layer->value}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-12 col-sm-6 col-md-4">
                                <label class="col-sm-3 form-label text-lg-start" for="type">نوع</label>
                                <div class="m-checkbox-inline">
                                    <div class="radio radio-theme">
                                        <input type="radio" name="type" id="type_1" value="pallet">
                                        <label for="type_1">پالت آک</label>
                                    </div>

                                    <div class="radio radio-theme">
                                        <input type="radio" name="type" id="type_2" value="pocket">
                                        <label for="type_2">گونی آک</label>
                                    </div>

                                    <div class="radio radio-theme">
                                        <input type="radio" name="type" id="type_3" value="used">
                                        <label for="type_3">مصرف شده</label>
                                    </div>

                                    <div class="radio radio-theme">
                                        <input type="radio" name="type" id="type_4" value="converted">
                                        <label for="type_4">تبدیل شده</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-12 col-sm-6 col-md-3">
                                <label for="day">{{__('panel.seller')}}
                                    <span class="required">*</span>
                                </label>
                                <select name="seller" class="form-control form-select">
                                    @foreach(\App\Models\Seller::all() as $seller)
                                        <option value="{{$seller->id}}">{{ $seller->name}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group col-12 col-sm-6 col-md-1">
                                <label for="day">{{__('panel.count')}}
                                    <span class="required">*</span>
                                </label>
                                <input type="text" id="count" name="count"
                                       value="1" class="form-control">
                            </div>

                            <div class="form-group col-12 col-sm-6 col-md-2">
                                <label for="day">{{__('panel.lat')}}
                                    <span class="required">*</span>
                                </label>
                                <input type="text" id="lat" name="lat"
                                       value="وارد نشده" class="form-control persian-date-picker">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"
                                    data-bs-original-title=""
                                    title="">{{ __('panel.close')}}
                            </button>
                            <button class="btn btn-primary" type="submit">{{ __('panel.edit')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('index')}}"> <i
                                data-feather="home"></i></a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row starter-main">
            <div class="col-12 col-sm-6">
                <h3>ورودی های وزنی</h3>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="basic-1">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>{{__('panel.material')}}</th>

                                <th>{{__('panel.rest_weight')}}</th>
                                <th>{{__('panel.initial weight')}}</th>

                                <th>{{__('panel.initial_count')}}</th>
                                <th>{{__('panel.rest_count')}}</th>

                                <th>{{__('panel.cells')}}</th>
                                <th>{{__('panel.seller')}}</th>
                                <th>{{__('panel.lat')}}</th>
                                <th>{{__('panel.type')}}</th>
                                <th>{{__('panel.date registered')}}</th>
                                <th class="col">واد کردن/جابجایی سلول</th>
                                <th class="col">{{__('panel.export')}}</th>
                                <th class="col">{{__('panel.exports')}}</th>
                                <th class="col">{{__('panel.edit') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($group_qr_codes as $i => $group_qr_code)
                                <tr>
                                    <td>{{ $i +1 }}</td>
                                    {{--
                                                                        <td class="ltr">{{ $group_qr_code->string_qr_codes()->first() ? $group_qr_code->string_qr_codes()->first()->serial : 'خارج شده' }}</td>
                                    --}}
                                    <td>{{ $group_qr_code->string_group->title }}</td>
                                    <td class="ltr">{{ $group_qr_code->string_qr_codes()->first()  ? $group_qr_code->string_qr_codes()->first()->weight  : '0' }}</td>
                                    <td>{{ $group_qr_code->initial_weight }}</td>

                                    <td>{{ $group_qr_code->count }}</td>
                                    <td class="ltr">{{ $group_qr_code->string_qr_codes()->first()  ? $group_qr_code->string_qr_codes()->first()->count  : '0' }}</td>

                                    <td>{{ $group_qr_code->string_qr_codes()->first() ? $group_qr_code->string_qr_codes()->first()->string_cells_code : '' }}</td>
                                    <td>{{ $group_qr_code->seller->name }}</td>
                                    <td>{{ $group_qr_code->lat }}</td>
                                    <td>{{ $group_qr_code->str_type }}</td>
                                    <td>{{ jdate($group_qr_code->created_at)->format('Y/m/d H:i') }}</td>

                                    <td>
                                        @if($group_qr_code->string_qr_codes()->first())
                                            <button class="btn btn-primary enter_cell"
                                                    data-id="{{$group_qr_code->string_qr_codes()->first()->id }}"
                                                    data-bs-toggle="modal"
                                                    data-mabda="{{ $group_qr_code->string_qr_codes()->first()->string_cells_code }}"
                                                    data-bs-target="#enter_cells" data-whatever="@fat"
                                                    data-bs-original-title="" title=""><i class="fa fa-sign-in"></i>
                                            </button>
                                        @else
                                            <span class="badge bg-warning">خارج شده</span>
                                        @endif
                                    </td>

                                    <td>
                                        @if($group_qr_code->string_qr_codes()->first())
                                            <button class="btn export" type="button" data-bs-toggle="modal"
                                                    data-id="{{$group_qr_code->id}}" data-bs-target="#export_cells">
                                                <i class="fa fa-sign-out"></i>
                                            </button>
                                        @else
                                            <span class="badge bg-warning">خارج شده</span>
                                        @endif
                                    </td>

                                    <td class="col"><a
                                            href="{{route('string.group_qr_code.exports',$group_qr_code->id)}}"
                                            class="btn"><i
                                                class="fa fa-list"></i></a></td>
                                    <td class="col">
                                        @if($group_qr_code->string_qr_codes()->first())
                                        <button class="btn edit_string_type" type="button" data-bs-toggle="modal"
                                                data-detail="{{$group_qr_code}}"
                                                data-id="{{$group_qr_code->id}}" data-bs-target="#edit_string_type">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        @else
                                            <span class="badge bg-warning">خارج شده</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('th.col').removeClass('sorting');
        })
        $(document).on('change', '#anbar', function () {
            var val = $(this).val();
            $('#cells .cell-select').hide();
            $('#cells .cell-select input').prop('checked', false);
            $('#cells .cell-select[data-parent=' + val + ']').show();
        });

        $(document).on('click', '.enter_cell', function () {
            var val = $(this).attr('data-id');
            var mabda = $(this).attr('data-mabda');
            $('#enter_cells input[name="id"]').val(val);
            $('#mabda').html(mabda);
        });

        $(document).on('click', '.export', function (event) {
            var id = $(this).attr('data-id');
            $('#id_item').val(id);
        });

        $(document).on('click', '.edit_string_type', function (event) {
            var id = $(this).attr('data-id');
            var detail = $(this).attr('data-detail');
            var data = $.parseJSON(detail);
            var form = $('#edit_string_type form');
            full_modal_input(form,data);
            $('#edit_string_type input[name=id]').val(id);
        });
        $(document).on('submit', 'form.ajax_form', function (event) {
            event.preventDefault();
            var form = $(this);
            var conf = confirm('آیا مطمئن به ذخیره اطلاعات هستید؟');
            if (conf)
                ajax_form_request(form, event);
        });

        $(document).on('submit', 'form.enter_form', function (event) {
            event.preventDefault();
            var form = $(this);
            var mabda = $('#mabda').html();
            var dest = $('#cells input:checkbox:checked').map(function () {
                return $(this).next("label").text();
            }).get();
            var conf = confirm('آیا مطمئن به ذخیره اطلاعات هستید؟ سلول مبدا : ' + mabda + ' سلول مقصد : ' + dest);
            if (conf)
                ajax_form_request(form, event);
        });

        function full_modal_input(form, data) {
            var input = form.find('input[type=text],input[type=number]');
            for (let i = 0; i < input.length; i++) {
                let name = input[i].getAttribute('name');
                $(input[i]).val(data[name]);
            }
            var select = form.find('select');

            for (let i = 0; i < select.length; i++) {
                let name = select[i].getAttribute('name');
                $(select[i]).find("option[value='" + data[name] + "']").prop('selected', true);
                $(select[i]).find("option[value='" + data['string_group'][name] + "']").prop('selected', true);
            }
            var textarea = form.find('textarea');
            for (let i = 0; i < textarea.length; i++) {
                let name = textarea[i].getAttribute('name');
                $(textarea[i]).html(data[name]);
            }

            var checkedinput = form.find('input[type=radio],input[type=checkbox]');
            for (let i = 0; i < checkedinput.length; i++) {
                let name = checkedinput[i].getAttribute('name');
                if ($(checkedinput[i]).val() == data[name])
                    $(checkedinput[i]).prop('checked', true);
                else
                    $(checkedinput[i]).prop('checked', false);
            }
        }

    </script>
@endsection
