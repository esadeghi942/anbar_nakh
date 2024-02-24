@extends('layouts.panel')
@section('css')
    <style>
        .form-group {
            margin-top: 10px !important;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    جستجو کد qr
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('index')}}"> <i
                                    data-feather="home"></i></a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row starter-main">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-12 col-sm-6 col-md-4">
                                <label for="day">{{__('panel.person')}}
                                    <span class="required">*</span>
                                </label>
                                <select class="form-control select2" id="person" name="person">
                                    @foreach($persons as $person)
                                        <option value="{{$person->id}}">{{$person->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-12 col-sm-6 col-md-4">
                                <label for="day">{{__('panel.device')}}
                                    <span class="required">*</span>
                                </label>
                                <select class="form-control select2" id="device" name="device">
                                    @foreach($devices as $device)
                                        <option value="{{$device->id}}">{{$device->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-12 col-sm-6 col-md-4">
                                <label for="day">{{__('panel.company')}}
                                    <span class="required">*</span>
                                </label>
                                <select class="form-control select2" name="person">
                                    @foreach($companies as $company)
                                        <option value="{{$company->id}}">{{$company->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="form-group col-12 col-sm-6 col-md-4">
                                 <label for="day">{{__('panel.weight')}}
                                     <span class="required">*</span>
                                 </label>
                                 <input type="text" id="weight" name="weight"
                                        value="" class="form-control">
                             </div>--}}
                        </div>
                        <div class="form-group col-12 col-sm-6 col-md-4">
                            <label for="day">{{__('panel.qr_code')}}
                                <span class="required">*</span>
                            </label>
                            <input style="direction: ltr" type="text" id="qr_code" name="qr_code" value=""
                                   class="form-control">
                        </div>
                        <button type="button" id="search" class="btn btn-success mt-3">{{__('panel.export')}}</button>
                        {{-- <form method="post" action="{{route('string.export_multi_qr_codes.save')}}" id="qr_codes">
                             @csrf--}}
                        <section id="search_list" class="hidden col-sm-12 message-box" style="margin-top: 25px">
                            <div class="card">
                                <h4> Qr کد های خروجی</h4>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th scope="col">{{ __('panel.qr_code')}}</th>
                                                <th scope="col">{{ __('panel.cells')}}</th>
                                                <th scope="col">{{ __('panel.material')}}</th>
                                                <th scope="col">{{ __('panel.weight')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody id="search_list_body">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </section>
                        {{-- <button type="submit" class="btn btn-success mt-3">{{__('panel.export')}}</button>
                     </form>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).on('keyup', '#qr_code', function (e) {
            e.preventDefault();
            var code = e.key; // recommended to use e.key, it's normalized across devices and languages
            if (code === "Enter") {
                search_qr_code();
            }
        });

        $(document).on('click', '#search', function (e) {
            search_qr_code();
        });

        function search_qr_code() {
            var body = $('#search_list_body');
            var val = $('#qr_code').val();
            var person = $('#person').val();
            var device = $('#device').val();
            $.ajax({
                    url: "{{ route('string.search_multi_qr_codes') }}",
                    method: 'post',
                    data: {'search': val, 'device': device, 'person': person},
                    cache: false,
                    success: function (result) {
                        // $('#qr_codes').append('<input type="hidden" id="qr_code_' + result.id + '" name="qr_codes[]" value="' + result.id + '"/>');
                        $('#search_list').removeClass('hidden');
                        body.prepend('<tr>' +
                            '<td class="ltr">' + result.serial + '</td>' +
                            '<td>' + result.cells + '</td>' +
                            '<td>' + result.material + '</td>' +
                            '<td>' + result.weight + '</td>' +
                            /*  '<td><button class="btn btn-primary delete_qr_code"' +
                              ' data-id="' + result.id + '"' +
                              ' title="حذف"><i class="fa fa-trash"></i>' +
                              '</button></td>' +*/
                            '</tr>');
                        $('#qr_code').val('');
                    },
                    error(e) {
                        var messages = e.responseJSON.message;
                        swal(messages, {
                            icon: "error",
                            button: "{{ __('panel.close')}}"
                        });
                        $('#qr_code').val('');
                    }
                }
            );
        }

        /* $(document).on('submit', 'form.ajax_form', function (event) {
             event.preventDefault();
             var form = $(this);
             var conf = confirm('آیا مطمئن به ذخیره اطلاعات هستید؟');
             if (conf)
                 ajax_form_request(form, event);
         });*/
        $(document).on('click', '.delete_qr_code', function (event) {
            event.preventDefault();
            var id = $(this).attr('data-id');
            $(this).closest('tr').remove();
            $('form#qr_codes input#qr_code_' + id).remove();
        });
    </script>
@endsection
