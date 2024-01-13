@extends('layouts.panel')
@section('css')
    <style>
        .form-group {
            margin-top: 10px !important;
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
                    <form method="post" class="ajax_form" action="{{route('string.qr_code.export_cells')}}">
                        @csrf
                        <input type="hidden" id="id_item" name="id" value="">
                        <div class="row">
                            <div class="form-group col-12 col-sm-6 col-md-4">
                                <label for="day">{{__('panel.person')}}
                                    <span class="required">*</span>
                                </label>
                                <select class="form-control select2" name="person">
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
                                    @foreach($devices as $device)
                                        <option value="{{$device->id}}">{{$device->name}}</option>
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
                        <button type="submit" class="btn btn-success mt-3">{{__('panel.save')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="enter_weight" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('panel.enter weight')}}</h4>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" class="ajax_form" action="{{route('string.qr_code.enter_weight')}}">
                        @csrf
                        <input type="hidden" id="id_item" name="id" value="">
                        <div class="row">
                            <div class="form-group col-12 col-sm-6 col-md-4">
                                <label for="day">{{__('panel.weight')}}
                                    <span class="required">*</span>
                                </label>
                                <input type="text" id="weight" name="weight"
                                       value="" class="form-control">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mt-3">{{__('panel.save')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="enter_cells" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-modal="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('panel.enter cells')}}</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"
                            data-bs-original-title="" title=""></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('string.qr_code.enter_cells')}}" class="ajax_form" method="post">
                        @csrf
                        <input type="hidden" id="id_item" name="id" value="">
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
                            <div id="cells">
                                @foreach($cells as $cell)
                                    <div class="form-check checkbox mb-0 cell-select"
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

    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    جستجو کد qr(ورود با لیبل)
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
                        <form method="post" action="{{route('string.group_qr_code.search')}}" id="search_qr_code">
                            @csrf
                            <div class="form-group col-12 col-sm-6 col-md-4">
                                <label for="day">{{__('panel.qr_code')}}
                                    <span class="required">*</span>
                                </label>
                                <input style="direction: ltr" type="text" id="qr_code" name="qr_code" value=""
                                       class="form-control">
                            </div>
                            <button type="submit" class="btn btn-success mt-3">{{__('panel.search')}}</button>
                        </form>

                        <section id="search_list" class="hidden col-sm-12 message-box" style="margin-top: 25px">
                            <div class="card">
                                <h4>نتیجه جستجو... </h4>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th scope="col">{{ __('panel.qr_code')}}</th>
                                                <th scope="col">{{ __('panel.cells')}}</th>
                                                <th scope="col">{{ __('panel.material')}}</th>
                                                <th scope="col">{{ __('panel.weight')}}</th>
                                                <th scope="col">{{ __('panel.enter weight')}}</th>
                                                <th scope="col">{{ __('panel.enter cells')}}</th>
                                                <th scope="col">{{ __('panel.export cell')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody id="search_list_body">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).on('submit', 'form#search_qr_code', function (e) {
            e.preventDefault();
            var body = $('#search_list_body');
            var val = $('#qr_code').val();
            var token = $('')
            var form = $(this);
            $.ajax({
                url: "{{ route('string.qr_code.search') }}",
                method: 'post',
                data: {'search': val},
                cache: false,
                success: function (result) {
                    body.html('');
                    if (result.length != 0) {
                        if (result.status == 'danger') {
                            swal(result.message, {
                                icon: "error",
                                button: "{{ __('panel.close')}}"
                            });
                        } else {
                            $('#search_list').removeClass('hidden');
                            body.append('<tr>' +
                                '<td>' + result.serial + '</td>' +
                                '<td>' + result.cells + '</td>' +
                                '<td>' + result.material + '</td>' +
                                '<td>' + result.weight + '</td>' +
                                '<td><button class="btn btn-primary enter_weight"' +
                                ' data-id="' + result.id + '"' +
                                ' data-bs-toggle="modal"' +
                                ' data-bs-target="#enter_weight" data-whatever="@fat"' +
                                ' data-bs-original-title="" data-weight="'+ result.weight +'" title="وارد کردن وزن"><i class="fa fa-gavel"></i>' +
                                '</button></td>' +
                                '<td><button class="btn btn-primary enter_cell"' +
                                ' data-id="' + result.id + '"' +
                                ' data-bs-toggle="modal"' +
                                ' data-bs-target="#enter_cells" data-whatever="@fat"' +
                                ' data-bs-original-title="" title="ورود به انبار"><i class="fa fa-sign-in"></i>' +
                                '</button></td>' +
                                '<td><button class="btn btn-primary export_cells"' +
                                ' data-id="' + result.id + '"' +
                                ' data-bs-toggle="modal"' +
                                ' data-bs-target="#export_cells" data-whatever="@fat"' +
                                ' data-bs-original-title="" title="خروج از انبار"><i class="fa fa-sign-out"></i>' +
                                '</button></td>' +
                                '</tr>');

                        }
                    } else {
                        swal('{{ __('panel.nothing found')}}', {
                            icon: "error",
                            button: "{{ __('panel.close')}}"
                        });
                    }
                },
            });
        });

        $(document).on('change', '#anbar', function () {
            var val = $(this).val();
            $('#cells .cell-select').hide();
            if (val) {
                $('#cells .cell-select input').prop('checked', false);
                $('#cells .cell-select[data-parent=' + val + ']').show();
            }
        });

        $(document).on('click', '.enter_cell,.export_cells,.enter_weight', function () {
            var val = $(this).attr('data-id');
            $($(this).attr('data-bs-target')).find('input[name="id"]').val(val);
        });

        $(document).on('click', '.enter_weight', function () {
            var val = $(this).attr('data-weight');
            $($(this).attr('data-bs-target')).find('input[name="weight"]').val(val);
        });
        $(document).on('submit', 'form.ajax_form', function (event) {
            event.preventDefault();
            var form = $(this);
            var conf = confirm('آیا مطمئن به ذخیره اطلاعات هستید؟');
            if (conf)
                ajax_form_request(form, event);
        });
    </script>
@endsection
