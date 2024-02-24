@extends('layouts.panel')
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
                            <div class="form-group col-12 col-sm-6 col-md-4">
                                <label for="day">{{__('panel.company')}}
                                    <span class="required">*</span>
                                </label>
                                <select class="form-control select2" name="company">
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
                        </div>
                        <button type="submit" class="btn btn-success mt-3">{{__('panel.save')}}</button>
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
                <h6>
                    کد های qr در انبار {{ $cell->string_anbar->name }} در سلول {{ $cell->code }}
                    مشخصات اقلام: {{ $cell->string_group ? $cell->string_group->title  : 'خالی'}}
                </h6>
            </div>
            <div class="card">
                <div class="card-body" id="print">
                    <div class="table-responsive">
                        <form method="post" action="{{route('string.cell.save_weight',$cell)}}">
                            @csrf
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{__('panel.qrcode')}}</th>
                                    <th scope="col">{{__('panel.lat')}}</th>
                                    <th scope="col">{{__('panel.seller')}}</th>
                                    <th scope="col">{{__('panel.date enter cell')}}</th>
                                    <th scope="col">{{__('panel.weight')}}</th>
                                    <th scope="col">{{__('panel.export')}}</th>
                                    <th scope="col">{{__('panel.exports')}}</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($qr_codes as $i => $qr_code)
                                    <tr>
                                        <td>{{ $i +1 }}</td>
                                        <td class="ltr">{{ $qr_code->serial }}</td>
                                        <td class="ltr">{{ $qr_code->string_group_qr_code->lat }}</td>
                                        <td class="ltr">{{ $qr_code->string_group_qr_code->seller->name }}</td>
                                        <td class="ltr">{{ jdate($qr_code->string_cells()->where('string_cell_id',$cell->id)->first()->created_at)->format('Y/m/d') }}</td>
                                        <td><input type="text" name="weight_{{$qr_code->id}}"
                                                   value="{{$qr_code->weight}}" class="form-control"></td>
                                        <td>
                                            <button class="btn export" type="button" data-bs-toggle="modal"
                                                    data-id="{{$qr_code->string_group_qr_code->id}}" data-bs-target="#export_cells" >
                                                <i class="fa fa-sign-out"></i>
                                            </button>
                                        </td>

                                        <td><a href="{{route('string.group_qr_code.exports',$qr_code->string_group_qr_code->id)}}" class="btn"><i
                                                    class="fa fa-list"></i></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-success mt-3">{{__('panel.save')}}</button>
                        </form>
                    </div>
                </div>
                <div class="text-center" style="margin-top:20px;">
                    <button class="btn btn-info" onclick="printdiv()" target="_blank">پرینت</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function printdiv() {
            var printContents = document.getElementById('print').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }

        $(document).on('click', '.export', function (event) {
            var id = $(this).attr('data-id');
            $('#id_item').val(id);
        });
    </script>
@endsection
