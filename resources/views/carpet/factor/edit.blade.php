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
                    {{__('panel.edit item',['item'=>__('panel.order')])}}
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
                        <form id="update_factor" method="post" action="{{route('factor.update',$factor)}}">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="form-group col-12 col-sm-6 col-md-4">
                                    <label class="control-label">{{__('panel.customer')}}
                                        <span class="required">*</span>
                                    </label>
                                    <select class="form-select" id="customer_id" name="customer_id"
                                            required>
                                        <option></option>
                                        @foreach($customers as $customer)
                                            <option
                                                {{$factor->customer_id == $customer->id ? 'selected' : ''}} value="{{$customer->id}}">{{$customer->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-12 col-sm-6 col-md-4">
                                    <label class="control-label">{{__('panel.delivery_date')}}
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text" id="delivery_date" name="delivery_date" required
                                           value="{{old('delivery_date',$factor->delivery_date)}}"
                                           class="form-control persian-date-picker">
                                </div>

                            </div>
                            <h5 class="mt-5">اقلام</h5>
                            <div id="content">
                                @foreach($factor->orders()->get() as $order)
                                    <div class="order">
                                        <button class="btn btn-danger btn-xs delete_order" data-order="{{$order->id}}"
                                                type="button"
                                                data-bs-original-title="" title=""
                                                data-original-title="btn btn-danger btn-xs"><i
                                                class="fa fa-trash"></i></button>
                                        <div class="row mt-3">
                                            <div class="form-group col-12 col-sm-6 col-md-3">
                                                <label class="control-label">{{__('panel.kala')}}
                                                    : {{$order->kala ? $order->kala->name  : 'حذف شده'}}
                                                </label>
                                            </div>
                                            <div class="form-group col-12 col-sm-6 col-md-3">
                                                <label class="control-label">{{__('panel.color')}}
                                                    : {{$order->color ? $order->color->name  : 'حذف شده'}}
                                                </label>
                                            </div>

                                            <div class="form-group col-12 col-sm-6 col-md-3">
                                                <label class="control-label">{{__('panel.unit')}}
                                                    : {{$order->unit ? $order->unit->name  : 'حذف شده'}}
                                                </label>
                                            </div>
                                            <div class="form-group col-12 col-sm-6 col-md-3">
                                                <label class="control-label" for="day">وضعیت سفارش
                                                </label>
                                                <select class="form-control" name="status_{{$order->id}}">
                                                    <option {{$order->status == 1 ? 'selected' : ''}} value="1">در حال آماده سازی</option>
                                                    <option {{$order->status == 2 ? 'selected' : ''}} value="2">اماده تحویل</option>
                                                    <option {{$order->status == 3 ? 'selected' : ''}} value="3">تحویل داده شد</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-12 col-sm-6 col-md-3">
                                                <label class="control-label">{{__('panel.count')}} : {{$order->count}}
                                                </label>
                                            </div>

                                            <div class="form-group col-12 col-sm-6 col-md-3">
                                                <label class="control-label">{{__('panel.description')}} : {{$order->description}}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" id="add_order" class="btn btn-success mt-3">افزودن اقلام
                            </button>
                            <button type="submit" class="btn btn-success mt-3">{{__('panel.save')}}</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="content_order" style="display: none">
        <div class="order">
            <button class="btn btn-danger btn-xs delete_order" type="button"
                    data-bs-original-title="" title=""
                    data-original-title="btn btn-danger btn-xs"><i
                    class="fa fa-trash"></i></button>
            <div class="row mt-3">
                <div class="form-group col-12 col-sm-6 col-md-3">
                    <label class="control-label">{{__('panel.kala')}}
                        <span class="required">*</span>
                    </label>
                    <select class="form-select" name="kalas[]">
                        <option></option>
                        @foreach($kalas as $kala)
                            <option value="{{$kala->id}}">{{$kala->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-12 col-sm-6 col-md-3">
                    <label class="control-label">{{__('panel.color')}}
                        <span class="required">*</span>
                    </label>
                    <select class="form-select" name="color[]">
                        <option></option>
                        @foreach($colors as $color)
                            <option value="{{$color->id}}">{{$color->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-12 col-sm-6 col-md-3">
                    <label class="control-label" for="day">{{__('panel.unit')}}
                        <span class="required">*</span>
                    </label>
                    <select class="form-select" name="unit[]">
                        <option></option>
                        @foreach($units as $unit)
                            <option value="{{$unit->id}}">{{$unit->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-12 col-sm-6 col-md-3">
                    <label class="control-label" for="day">وضعیت سفارش
                    </label>
                    <select class="form-control" name="status[]">
                        <option value="1">در حال آماده سازی</option>
                        <option value="2">اماده تحویل</option>
                        <option value="3">تحویل داده شد</option>
                    </select>
                </div>

                <div class="form-group col-12 col-sm-6 col-md-3">
                    <label class="control-label">{{__('panel.count')}}
                        <span class="required">*</span>
                    </label>
                    <input type="number" name="count[]"
                           value="" class="form-control">
                </div>

                <div class="form-group col-12 col-sm-6 col-md-3">
                    <label class="control-label">{{__('panel.description')}}
                        <span class="required">*</span>
                    </label>
                    <textarea name="description[]" class="form-control"></textarea>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>

        var content = '';
        $(document).ready(function () {
            content = $('#content_order').html();
            $('.form-select').select2();
        });

        $(document).on('click', '#add_order', function (e) {
            e.preventDefault();
            $('#content').append(content);
            $('#content .order:last-child .form-select').select2();
        })

        $(document).on('click', '.delete_order', function (e) {
            e.preventDefault();
            var id=$(this).attr('data-order');
            $('form#update_factor').append('<input type="hidden" name="delete_orders[]" value="'+id+'">');
            $(this).closest('.order').remove();
        })
    </script>
@endsection
