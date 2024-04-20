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
                    {{__('panel.products')}}
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
                                <label class="control-label">{{__('panel.customer')}}
                                    {{ $order->customer->name }}
                                </label>
                            </div>

                            <div class="form-group col-12 col-sm-6 col-md-3">
                                <label class="control-label">{{__('panel.map')}}
                                    {{ $order->map->name }}
                                </label>
                            </div>

                            <div class="form-group col-12 col-sm-6 col-md-3">
                                <label class="control-label">{{__('panel.delivery')}}
                                    {{$order->time_limit}}
                                </label>
                            </div>
                            <div class="form-group col-12 col-sm-6 col-md-3">
                                <label class="control-label">{{__('panel.registration date')}}
                                    {{ jdate($order->create_at)->format('y/m/d') }}
                                </label>
                            </div>
                            <div class="row mb-3" style="display: flex;justify-content: space-between">
                                <div class="form-group col-12 col-sm-10 col-md-10">
                                    <label class="control-label">ویژگی های محصول
                                       {{ $order->carpet_product_feature }}
                                    </label>
                                </div>

                                <div class="form-group col-12 col-sm-2 col-md-2">
                                    <img width="40px" height="50px" src="{{ $order->map->image_path }}">
                                </div>
                            </div>


                        </div>
                        <div id="content">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>ردیف</th>
                                        <th>شکل</th>
                                        <th>سایز1</th>
                                        <th>سایز2</th>
                                        <th>تعداد</th>
                                        <th>مساحت</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order->products()->get() as $i=>$product)
                                        <tr>
                                            <td>{{ $i+1 }}</td>
                                            <td>{{$product->shape}}</td>
                                            <td>{{$product->size1}}</td>
                                            <td>{{$product->size2}}</td>
                                            <td>{{$product->count}}</td>
                                            <td>{{$product->area}}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="4">مجموع</td>
                                        <td>{{ $order->products()->sum('count') }}</td>
                                        <td>{{ $order->products()->sum('area') }}</td>
                                    </tr>
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
