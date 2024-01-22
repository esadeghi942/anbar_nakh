@extends('layouts.panel')
@section('css')
    <style>
        .delete_order {
            margin-top: 30px !important;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    {{__('panel.show',['item'=>__('panel.order')])}}
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
                    <div class="card-body" id="Factor">
                        <div class="row">
                            <div class="form-group col-12 col-sm-6 col-md-3">
                                <label class="control-label">{{__('panel.number')}}
                                    {{ $factor->number }}
                                </label>
                            </div>
                            <div class="form-group col-12 col-sm-6 col-md-3">
                                <label class="control-label">{{__('panel.device')}}
                                    {{ $factor->device->name }}
                                </label>
                            </div>
                            <div class="form-group col-12 col-sm-6 col-md-3">
                                <label class="control-label">{{__('panel.company')}}
                                    {{ $factor->company->name }}
                                </label>
                            </div>

                            <div class="form-group col-12 col-sm-6 col-md-3">
                                <label class="control-label">{{__('panel.date registered')}}
                                    {{jdate($factor->created_at)->format('Y/m/d')}}
                                </label>
                            </div>
                        </div>
                        <div id="content">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th rowspan="2">
                                            سفارش
                                        </th>
                                        <th rowspan="2">
                                            تاریخ
                                        </th>
                                        <th rowspan="2">
                                            نام بافنده
                                        </th>
                                        <th colspan="4">مشخصات فرش</th>
                                        <th colspan="4">مشخصات رول</th>
                                    </tr>
                                    <tr>
                                        <th>سایز</th>
                                        <th>نقشه</th>
                                        <th>رنگ</th>
                                        <th>تعداد تخته</th>
                                        <th>شماره رول خاب رو</th>
                                        <th>وزن خاب رو</th>
                                        <th>شماره رول خاب زیر</th>
                                        <th>وزن خاب زیر</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($factor->orders()->get() as $i=>$order)
                                        <tr>
                                            <td>{{$order->number}}</td>
                                            <td>{{$order->date}}</td>
                                            <td>{{$order->weaver ? $order->weaver->name  : 'حذف شده'}}</td>
                                            <td>{{$order->size ? $order->size->size1 . ' * '.$order->size->size2  : 'حذف شده'}}</td>

                                            <td>{{$order->map ? $order->map->name  : 'حذف شده'}}</td>
                                            <td>{{$order->color ? $order->color->name  : 'حذف شده'}}</td>
                                            <td>{{$order->number_carpet_board}}</td>
                                            <td>{{$order->number_roll_sleepy_on}}</td>
                                            <td>{{$order->weight_roll_sleepy_on}}</td>
                                            <td>{{$order->number_roll_sleepy_below}}</td>
                                            <td>{{$order->weight_roll_sleepy_below}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
            var printContents = document.getElementById('Factor').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
@endsection
