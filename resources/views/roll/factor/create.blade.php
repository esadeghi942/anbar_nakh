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
                    {{__('panel.create item',['item'=>__('panel.order')])}}
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
                        <form id="create_store" method="post" action="{{route('roll.factor.store')}}">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12 col-sm-6 col-md-4">
                                    <label class="control-label" for="day">{{__('panel.number')}}
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text" id="factor_number" name="factor_number" required
                                           value="{{old('factor_number')}}" class="form-control">
                                </div>
                                <div class="form-group col-12 col-sm-6 col-md-4">
                                    <label class="control-label" for="day">{{__('panel.company')}}
                                        <span class="required">*</span>
                                    </label>
                                    <select class="form-select" name="company">
                                        <option></option>
                                        @foreach($companies as $company)
                                            <option value="{{$company->id}}">{{$company->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-12 col-sm-6 col-md-4">
                                    <label class="control-label" for="day">{{__('panel.device')}}
                                        <span class="required">*</span>
                                    </label>
                                    <select class="form-select" name="device">
                                        <option></option>
                                        @foreach($devices as $device)
                                            <option value="{{$device->id}}">{{$device->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <h5 class="mt-5">اقلام</h5>
                            <div id="content">
                                <div class="order">
                                    <button class="btn btn-danger btn-xs delete_order" type="button"
                                            data-bs-original-title="" title=""
                                            data-original-title="btn btn-danger btn-xs"><i
                                            class="fa fa-trash"></i></button>
                                    <div class="row mt-3">
                                        <div class="form-group col-12 col-sm-6 col-md-4">
                                            <label class="control-label" for="day">{{__('panel.order')}}
                                                <span class="required">*</span>
                                            </label>
                                            <input type="text" id="number" name="number[]" required
                                                   value="{{old('number')}}" class="form-control">
                                        </div>
                                        <div class="form-group col-12 col-sm-6 col-md-4">
                                            <label class="control-label" for="date">{{__('panel.date')}}
                                                <span class="required">*</span>
                                            </label>
                                            <input type="text" name="date[]" required
                                                   value="{{old('date')}}" class="form-control persian-date-picker">
                                        </div>
                                        <div class="form-group col-12 col-sm-6 col-md-3">
                                            <label class="control-label" for="day">{{__('panel.weaver')}}
                                                <span class="required">*</span>
                                            </label>
                                            <select class="form-select" name="weavers[]">
                                                <option></option>
                                                @foreach($weavers as $weaver)
                                                    <option value="{{$weaver->id}}">{{$weaver->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <h5 class="mt-5">مشخصات فرش</h5>
                                        <div class="form-group col-12 col-sm-6 col-md-3">
                                            <label class="control-label" for="day">{{__('panel.color')}}
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
                                            <label class="control-label" for="day">{{__('panel.map')}}
                                                <span class="required">*</span>
                                            </label>
                                            <select class="form-select" name="map[]">
                                                <option></option>
                                                @foreach($maps as $map)
                                                    <option value="{{$map->id}}">{{$map->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-12 col-sm-6 col-md-3">
                                            <label class="control-label" for="day">{{__('panel.size')}}
                                                <span class="required">*</span>
                                            </label>
                                            <select class="form-select" name="size[]">
                                                <option></option>
                                                @foreach($sizes as $size)
                                                    <option
                                                        value="{{$size->id}}">{{$size->size1 . ' * ' . $size->size2}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-12 col-sm-6 col-md-3">
                                            <label class="control-label" for="day">{{__('panel.number_carpet_board')}}
                                                <span class="required">*</span>
                                            </label>
                                            <input type="number" name="number_carpet_board[]"
                                                   value="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <h5 class="mt-5">مشخصات رول</h5>
                                        <div class="form-group col-12 col-sm-6 col-md-3">
                                            <label class="control-label" for="day">{{__('panel.number_roll_sleepy_on')}}
                                                <span class="required">*</span>
                                            </label>
                                            <input type="number" name="number_roll_sleepy_on[]"
                                                   value="" class="form-control">
                                        </div>
                                        <div class="form-group col-12 col-sm-6 col-md-3">
                                            <label class="control-label" for="day">{{__('panel.weight_roll_sleepy_on')}}
                                                <span class="required">*</span>
                                            </label>
                                            <input type="number" name="weight_roll_sleepy_on[]"
                                                   value="" class="form-control">
                                        </div>
                                        <div class="form-group col-12 col-sm-6 col-md-3">
                                            <label class="control-label"
                                                   for="day">{{__('panel.number_roll_sleepy_below')}}
                                                <span class="required">*</span>
                                            </label>
                                            <input type="number" name="number_roll_sleepy_below[]"
                                                   value="" class="form-control">
                                        </div>
                                        <div class="form-group col-12 col-sm-6 col-md-3">
                                            <label class="control-label"
                                                   for="day">{{__('panel.weight_roll_sleepy_below')}}
                                                <span class="required">*</span>
                                            </label>
                                            <input type="number" name="weight_roll_sleepy_below[]"
                                                   value="" class="form-control">
                                        </div>
                                    </div>
                                </div>
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
@endsection
@section('js')
    <script>

        var content = '';
        $(document).ready(function () {
            content = $('#content').html();
            $('.form-select').select2();
        });

        $(document).on('click', '#add_order', function (e) {
            e.preventDefault();
            $('#content').append(content);
            $('#content .order:last-child .form-select').select2();
        })

        $(document).on('click', '.delete_order', function (e) {
            e.preventDefault();
            var elem = $(this).closest('.order').remove();
        })
    </script>
@endsection
