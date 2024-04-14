@extends('layouts.panel')
@section('css')
    <style>
        .delete_order {
            margin-top: 40px !important;
            width: 30px !important;
            height: 30px !important;
        }
    </style>
@endsection
@section('content')

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

    <form action="{{ route('carpet.order.store') }}" method="post">
        @csrf
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-xl-4">
                    <div class="card card-absolute">
                        <div class="card-header bg-warning">
                            <h5 class="text-white">مشخصات مشتری</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlSelect17">نام مشتری</label>
                                <select class="form-select input-air-primary digits" id="exampleFormControlSelect17"
                                        name="customer_id">
                                    @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }}
                                            -{{ $customer->code }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-xl-4">
                    <div class="card card-absolute">
                        <div class="card-header bg-primary">
                            <h5 class="text-white">مشخصات نقشه</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlSelect17">کد نقشه و رنگ</label>
                                <select class="form-select input-air-primary digits" id="exampleFormControlSelect17"
                                        name="carpet_map_id">
                                    @foreach($carpet_maps as $carpet_map)
                                        <option value="{{ $carpet_map->id }}">{{ $carpet_map->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-xl-4">
                    <div class="card card-absolute">
                        <div class="card-header bg-warning">
                            <h5 class="text-white">محدوده زمانی</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlSelect17">زمان تحویل به روز</label>
                                <select class="form-select input-air-primary digits" id="exampleFormControlSelect17"
                                        name="time_limit">
                                    @foreach($time_limits as $time_limit)
                                        <option value="{{ $time_limit }}">{{ $time_limit }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-absolute">
                        <div class="card-header bg-primary">
                            <h5 class="text-white">ویژگی های محصول</h5>
                        </div>
                        <div class="card-body">
                            <div class="col">
                                <div class="m-t-15 m-checkbox-inline">
                                    @foreach($carpet_features as $key=>$carpet_feature)
                                        <div class="form-check form-check-inline checkbox checkbox-dark mb-0">
                                            <input value="{{ $key }}" class="form-check-input" id="inline-1{{ $key }}"
                                                   type="checkbox" name="carpet_product_feature[]">
                                            <label class="form-check-label"
                                                   for="inline-1{{$key}}">{{ $carpet_feature }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card card-absolute">
                        <div class="card-header bg-primary">
                            <h5 class="text-white">سایز متعارف محصول</h5>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3" id="buttonRow">
                                <div class="col-md-2">
                                    <button id="InsertOrder" class="btn btn-info-gradien" type="button"
                                            data-bs-original-title="" title="" data-original-title="">افزودن
                                    </button>
                                </div>
                            </div>
                            <div id="inputsRow">
                                <div class="item row">
                                    <div class="col-md-2 m-2">
                                        <label class="form-label" for="shapeSelect">شکل</label>
                                        <select name="shape[]" class="form-select shapeSelect"
                                                required="">
                                            <option value="مستطیل" class="rectangle" data-count-size="2">مستطیل</option>
                                            <option value="مربع" class="square" data-count-size="1">مربع</option>
                                            <option value="دایره" class="circle" data-count-size="1">دایره</option>
                                            <option value="بیضی" class="oval" data-count-size="2">بیضی</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 m-2">
                                        <label class="form-label" for="sizeSelect">اندازه</label>
                                        <select name="size[]" class="form-select sizeSelect"
                                                required="">
                                            <option></option>
                                            <option value="1*2" data-size1="1" data-size2="2" data-count-size="2">1*2
                                            </option>
                                            <option value="1*3" data-size1="1" data-size2="3" data-count-size="2">1*3
                                            </option>
                                            <option value="1*4" data-size1="1" data-size2="4" data-count-size="2">1*4
                                            </option>
                                            <option value="1*1.15" data-size1="1" data-size2="1.15" data-count-size="2">
                                                1*1.15
                                            </option>
                                            <option value="1*2.25" data-size1="1" data-size2="2.25" data-count-size="2">
                                                1*2.25
                                            </option>
                                            <option value="2*3" data-size1="2" data-size2="3" data-count-size="2">2*3
                                            </option>
                                            <option value="2.5*3.5" data-size1="2.5" data-size2="3.5"
                                                    data-count-size="2">2.5*3.5
                                            </option>
                                            <option value="3*4" data-size1="4" data-size2="4" data-count-size="2">3*4
                                            </option>
                                            <option value="1" data-size1="1" data-size2="" data-count-size="1">1
                                            </option>
                                            <option value="1.5" data-size1="1.5" data-size2="" data-count-size="1">
                                                1.5
                                            </option>
                                            <option value="2" data-size1="2" data-size2="" data-count-size="1">2
                                            </option>
                                            <option value="2.5" data-size1="2.5" data-size2="" data-count-size="1">
                                                2.5
                                            </option>
                                            <option value="3" data-size1="3" data-size2="" data-count-size="1">3
                                            </option>
                                            <option value="3.5" data-size1="3.5" data-size2="" data-count-size="1">
                                                3.5
                                            </option>
                                            <option value="4" data-size1="4" data-size2="" data-count-size="1">4
                                            </option>
                                            <option value="0">اندازه دلخواه</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 m-2">
                                        <label class="form-label" for="count">تعداد</label>
                                        <input name="count[]" class="form-control" id="count" type="text"
                                               placeholder="">
                                    </div>
                                    <div class="col-md-2 m-2 size1" style="display: none">
                                        <label class="form-label" for="count">اندازه 1</label>
                                        <input name="size1[]" class="form-control" type="text" placeholder="اندازه 1">
                                    </div>
                                    <div class="col-md-2 m-2 size2" style="display: none">
                                        <label class="form-label" for="count">اندازه 2</label>
                                        <input name="size2[]" class="form-control" type="text" placeholder="اندازه 2">
                                    </div>
                                    <button class="btn btn-danger btn-xs delete_order" type="button"
                                            data-bs-original-title="" title=""
                                            data-original-title="btn btn-danger btn-xs"><i
                                            class="fa fa-trash"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-center mt-3">
                        <input class="btn-save btn btn-success" id="save-shift" type="submit" style="padding:15px;margin:20px;min-width: 50%" value=" ثـبت نهـایی" data-bs-original-title="" title="">
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('.sizeSelect option[data-count-size=1]').hide();
            var inputsRow = $("#inputsRow").html();

            $(document).on('click', '#InsertOrder', function () {
                $('#inputsRow').append(inputsRow);
            });

            $(document).on('change', '.shapeSelect', function () {
                var optionSelected = $("option:selected", this);
                var datacountsize = optionSelected.attr('data-count-size');
                var dest = $(this).closest('.item').find('.sizeSelect');
                $(this).closest('.item').find('.size1').hide();
                $(this).closest('.item').find('.size2').hide();
                dest.val('');
                dest.find('option[value != 0]').hide();
                dest.find('option[data-count-size=' + datacountsize + ']').show();
            });

            $(document).on('change', '.sizeSelect', function () {
                var val = $(this).val();
                var shapeSelect = $(this).closest('.item').find('.shapeSelect');
                var optionSelected = $("option:selected", shapeSelect);
                var datacountsize = optionSelected.attr('data-count-size');
                if (val == 0) {
                    $(this).closest('.item').find('.size1').show();
                    if (datacountsize == 2)
                        $(this).closest('.item').find('.size2').show();
                } else {
                    var sizeSelect = $(this).closest('.item').find('.sizeSelect');
                    var optionSizeSelected = $("option:selected", sizeSelect);
                    var size1 = optionSizeSelected.attr('data-size1');
                    $(this).closest('.item').find('.size1 input').val(size1);
                    if (datacountsize == 2) {
                        var size2 = optionSizeSelected.attr('data-size2');
                        $(this).closest('.item').find('.size2 input').val(size2);
                    }
                    $(this).closest('.item').find('.size1').hide();
                    $(this).closest('.item').find('.size2').hide();
                }
            });

            $(document).on('click', '.delete_order', function (e) {
                e.preventDefault();
                $(this).closest('.item').remove();
            })
        });
    </script>
@endsection
