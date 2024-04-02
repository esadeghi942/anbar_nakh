@extends('layouts.panel')
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
            <div class="col-sm-12 col-md-6 col-xl-1 m-2">
                <button class="btn btn-pill btn-info" type="button" data-bs-original-title="" title="" data-original-title="btn btn-pill btn-info">افزودن نقشه</button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="card card-absolute">
                    <div class="card-header bg-warning">
                        <h5 class="text-white">مشخصات مشتری</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="exampleFormControlSelect17">نام مشتری</label>
                            <select class="form-select input-air-primary digits" id="exampleFormControlSelect17" name="customer_id">
                                @foreach($customers as $customer)
                                 <option value="{{ $customer->id }}">{{ $customer->name }}-{{ $customer->code }}</option>
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
                            <select class="form-select input-air-primary digits" id="exampleFormControlSelect17" name="carpet_map_id">
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
                            <select class="form-select input-air-primary digits" id="exampleFormControlSelect17" name="time_limit">
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
                                    <input value="{{ $key }}" class="form-check-input" id="inline-1{{ $key }}" type="checkbox" name="carpet_product_feature[]">
                                    <label class="form-check-label" for="inline-1{{$key}}">{{ $carpet_feature }}</label>
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
                                <button id="InsertOrder" class="btn btn-info-gradien" type="button" data-bs-original-title="" title="" data-original-title="">افزودن</button>
                            </div>
                        </div>
                        <div class="row" id="inputsRow">
                            <div class="col-md-2 m-2">
                                <label class="form-label" for="shapeSelect">شکل</label>
                                <select name="shape[]" class="form-select shapeSelect" id="shapeSelect" required="" onchange="">
                                    <option value="مستطیل" class="rectangle">مستطیل</option>
                                    <option value="مربع" class="square">مربع</option>
                                    <option value="دایره" class="circle">دایره</option>
                                    <option value="بیضی" class="oval">بیضی</option>
                                </select>
                            </div>
                            <div class="col-md-2 m-2" id="size">
                                <label class="form-label" for="sizeSelect">اندازه</label>
                                <select name="size[]" class="form-select sizeSelect" id="sizeSelect" required="">
                                    <option value="1*2">1*2</option>
                                    <option value="1*3">1*3</option>
                                    <option value="1*4">1*4</option>
                                    <option value="1*1.15">1*1.15</option>
                                    <option value="1*2.25">1*2.25</option>
                                    <option value="2*3">2*3</option>
                                    <option value="2.5*3.5">2.5*3.5</option>
                                    <option value=3*4"">3*4</option>
                                    <option value="اندازه دلخواه">اندازه دلخواه</option>
                                </select>
                            </div>
                            <div class="col-md-2 m-2" id="number">
                                <label class="form-label" for="number">تعداد</label>
                                <input name="number[]" class="form-control" id="number" type="text" placeholder="">
                            </div>
                            <div class="col-md-2 m-2 d-none size1" id="size1">
                                <label class="form-label" for="exampleInputPassword">سایز 1 </label>
                                <input name="size1[]" class="form-control size1" id="exampleInputPassword" type="text" placeholder="">
                            </div>
                            <div class="col-md-2 m-2 d-none size2" id="size2">
                                <label class="form-label" for="exampleInputPassword16">سایز 2</label>
                                <input name="size2[]" class="form-control size2" id="exampleInputPassword16" type="text" placeholder="">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
        <button type="submit">insert</button>
    </form>
@endsection
@section('js')
<script>
    $(document).ready(function () {
        $("#InsertOrder").click(function () {
            var inputsRow = $("#inputsRow");
            var newInputsRow = inputsRow.clone();
            newInputsRow.find("select,input").val("");
            newInputsRow.find("#Radius,#width,#length, #lengthSide").addClass("d-none");
            inputsRow.after(newInputsRow);
        });

        $("body").on("change", ".form-select", function () {
            var parentRow = $(this).closest(".row");
            var selectedShape = parentRow.find(".shapeSelect").val();
            var selectedSize = parentRow.find(".sizeSelect").val();



            // اجرای تغییرات اولیه هنگام بارگذاری صفحه
            // $('#sizeSelect').change();





            // if (selectedSize === '1*2') {
            //     $('.size1').find('input[name="size1[]"]').val('1');
            //     $('.size2').find('input[name="size2[]"]').val('2');
            // } else if (selectedSize === '1*3') {
            //     $('.size1').find('input[name="size1[]"]').val('1');
            //     $('.size2').find('input[name="size2[]"]').val('3');
            // } else if (selectedSize === '1*4') {
            //     $('.size1 input[name="size1[]"]').val('1');
            //     $('.size2 input[name="size2[]"]').val('4');
            // }else if (selectedSize === '1*1.15') {
            //     $('.size1 input[name="size1[]"]').val('1');
            //     $('.size2 input[name="size2[]"]').val('1.15');
            // } else if (selectedSize === '1*2.25') {
            //     $('.size1 input[name="size1[]"]').val('1');
            //     $('.size2 input[name="size2[]"]').val('2.25');
            // }else if (selectedSize === '2*3') {
            //     $('.size1 input[name="size1[]"]').val('2');
            //     $('.size2 input[name="size2[]"]').val('3');
            // }

            if (selectedSize === "اندازه دلخواه" && selectedShape === "مستطیل") {
                parentRow.find("#size1, #size2").removeClass("d-none");
            }

            else if (selectedSize === "اندازه دلخواه" && selectedShape === "مربع") {
                parentRow.find("#size1").removeClass("d-none");
            }

            else if (selectedSize === "اندازه دلخواه" && selectedShape === "دایره") {
                parentRow.find("#size2").addClass("d-none");
                parentRow.find("#size1").removeClass("d-none");
            }

            else if (selectedSize === "اندازه دلخواه" && selectedShape === "بیضی") {
                parentRow.find("#size1, #size2").removeClass("d-none");
            }
            else {
                parentRow.find("#Radius, #length, #width, #lengthSide").addClass("d-none");
            }
        });

        $('#sizeSelect').change(function() {
            var selectedSize = $(this).val();
            var size1Input = $(this).closest('.row').find('.size1 input[name="size1[]"]');
            var size2Input = $(this).closest('.row').find('.size1 input[name="size1[]"]');
            var size2Input = $('.size2 input[name="size2[]"]');

            if (selectedSize === '1*2') {
                size1Input.val('1');
                size2Input.val('2');
            } else if (selectedSize === '1*3') {
                size1Input.val('1');
                size2Input.val('3');
            } else if (selectedSize === '1*4') {
                size1Input.val('1');
                size2Input.val('4');
            }

            // ذخیره مقادیر فعلی در ویژگی data
            size1Input.data('prevValue', size1Input.val());
            size2Input.data('prevValue', size2Input.val());
        });

    });
</script>
@endsection
