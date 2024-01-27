@extends('layouts.panel')
@section('css')
    <style>
        .dataTables_wrapper button {
            color: black !important;
        }
    </style>
@endsection
@section('content')
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
                    <form action="{{route('string.group_qr_code.enter_cells')}}" method="post" class="ajax_form">
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
                <h3>{{__('panel.labels')}}</h3>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered"  id="basic-1">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>{{__('panel.material')}}</th>
                                <th>وزن موجود در سلول</th>
                                <th>{{__('panel.cells')}}</th>
                                <th>تعداد کد qr</th>
                                <th>{{__('panel.count without weight')}}</th>
                                <th>{{__('panel.seller')}}</th>
                                <th>{{__('panel.lat')}}</th>
                                <th>{{__('panel.date registered')}}</th>
                                <th scope="col">{{__('panel.enter cells')}}</th>
                                <th scope="col">{{__('panel.qrcode')}}</th>
                                <th scope="col">{{__('panel.detail')}}</th>
                                <th scope="col">{{__('panel.exports')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($group_qr_codes as $i => $group_qr_code)
                                <tr>
                                    <td>{{ $i +1 }}</td>
                                    <td>{{ $group_qr_code->string_group->title }}</td>
                                    <td>{{ $group_qr_code->string_qr_codes()->sum('weight') }}</td>
                                    <td>{{ $group_qr_code->string_cells_code }}</td>
                                    <td>{{ $group_qr_code->string_qr_codes()->count() }}</td>
                                    <td>{{ $group_qr_code->count_without_weight }}</td>
                                    <td>{{ $group_qr_code->seller->name }}</td>
                                    <td>{{ $group_qr_code->lat }}</td>
                                    <td>{{ jdate($group_qr_code->created_at)->format('Y/m/d H:i') }}</td>

                                    <td>
                                        <button class="btn btn-primary enter_cell"
                                                data-id="{{ $group_qr_code->id }}"
                                                data-bs-toggle="modal"
                                                data-bs-target="#enter_cells" data-whatever="@fat"
                                                data-bs-original-title="" title=""><i class="fa fa-sign-in"></i>
                                        </button>
                                    </td>

                                    <td><a href="{{route('string.group_qr_code.show',$group_qr_code)}}" class="btn"><i
                                                class="fa fa-barcode"></i></a></td>

                                    <td><a href="{{route('string.group_qr_code.weight',$group_qr_code)}}" class="btn"><i
                                                class="fa fa-gavel"></i></a></td>

                                    <td><a href="{{route('string.group_qr_code.exports',$group_qr_code->id)}}" class="btn"><i
                                                class="fa fa-list"></i></a></td>
                                    {{--  <td>
                                          <form action="{{ route('string.layer.destroy',$group_qr_code->id)}}"
                                                method="POST">
                                              @method('DELETE')
                                              @csrf
                                              <button type="submit" class="btn"><i
                                                      class="fa fa-trash"></i></button>
                                          </form>
                                      </td>--}}
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
        $(document).on('change', '#anbar', function () {
            var val = $(this).val();
            $('#cells .cell-select').hide();
            $('#cells .cell-select input').prop('checked', false);
            $('#cells .cell-select[data-parent=' + val + ']').show();
        });

        $(document).on('click', '.enter_cell', function () {
            var val = $(this).attr('data-id');
            $('#enter_cells input[name="id"]').val(val);
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
