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
            <div class="col-sm-12 col-md-6 col-xl-3">
                <div class="card card-absolute">
                    <div class="card-header bg-warning">
                        <h5 class="text-white">مشخصات مشتری</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="exampleFormControlSelect17">نام مشتری</label>
                            <select class="form-select input-air-primary digits" id="exampleFormControlSelect17">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-xl-3">
                <div class="card card-absolute">
                    <div class="card-header bg-primary">
                        <h5 class="text-white">مشخصات نقشه</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="exampleFormControlSelect17">کد نقشه و رنگ</label>
                            <select class="form-select input-air-primary digits" id="exampleFormControlSelect17">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-xl-3">
                <div class="card card-absolute">
                    <div class="card-header bg-danger">
                        <h5 class="text-white">مشخصات نقشه</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="exampleFormControlSelect17">کد نقشه و رنگ</label>
                            <select class="form-select input-air-primary digits" id="exampleFormControlSelect17">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-xl-3">
                <div class="card card-absolute">
                    <div class="card-header bg-warning">
                        <h5 class="text-white">محدوده زمانی</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="exampleFormControlSelect17">نام مشتری</label>
                            <select class="form-select input-air-primary digits" id="exampleFormControlSelect17">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
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
                        <h5 class="text-white">مشخصات نقشه</h5>
                    </div>
                    <div class="card-body">
                        <div class="col">
                            <div class="m-t-15 m-checkbox-inline">
                                <div class="form-check form-check-inline checkbox checkbox-dark mb-0">
                                    <input class="form-check-input" id="inline-1" type="checkbox">
                                    <label class="form-check-label" for="inline-1">گزینه<span class="digits"> 1</span></label>
                                </div>
                                <div class="form-check form-check-inline checkbox checkbox-dark mb-0">
                                    <input class="form-check-input" id="inline-2" type="checkbox">
                                    <label class="form-check-label" for="inline-2">گزینه<span class="digits"> 2</span></label>
                                </div>
                                <div class="form-check form-check-inline checkbox checkbox-dark mb-0">
                                    <input class="form-check-input" id="inline-3" type="checkbox">
                                    <label class="form-check-label" for="inline-3">گزینه<span class="digits"> 3</span></label>
                                </div>
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
                        <h5 class="text-white">مشخصات نقشه</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3" id="buttonRow">
                            <div class="col-md-2">
                                <button class="btn btn-info-gradien" type="button" data-bs-original-title="" title="" data-original-title="">افزودن</button>
                            </div>
                        </div>
                        <div class="row" id="inputsRow">
                            <div class="col-md-2 m-2">
                                <label class="form-label" for="shapeSelect">شکل</label>
                                <select name="shape[]" class="form-select" id="shapeSelect" required="">
                                    <option value="مستطیل" class="rectangle">مستطیل</option>
                                    <option value="مربع" class="square">مربع</option>
                                    <option value="دایره" class="circle">دایره</option>
                                    <option value="بیضی" class="oval">بیضی</option>
                                </select>
                            </div>
                            <div class="col-md-2 m-2" id="size">
                                <label class="form-label" for="sizeSelect">اندازه</label>
                                <select name="size[]" class="form-select" id="sizeSelect" required="">
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
                            <div class="col-md-2 m-2" id="length">
                                <label class="form-label" for="exampleInputPassword">طول</label>
                                <input name="length[]" class="form-control" id="exampleInputPassword" type="text" placeholder="">
                            </div>
                            <div class="col-md-2 m-2" id="width">
                                <label class="form-label" for="exampleInputPassword16">عرض</label>
                                <input name="width[]" class="form-control" id="exampleInputPassword16" type="text" placeholder="">
                            </div>
                        </div>
                        <div class="row" id="inputsRow">
                            <div class="col-md-2 m-2">
                                <label class="form-label" for="shapeSelect">شکل</label>
                                <select name="shape[]" class="form-select" id="shapeSelect" required="">
                                    <option value="مستطیل" class="rectangle">مستطیل</option>
                                    <option value="مربع" class="square">مربع</option>
                                    <option value="دایره" class="circle">دایره</option>
                                    <option value="بیضی" class="oval">بیضی</option>
                                </select>
                            </div>
                            <div class="col-md-2 m-2" id="size">
                                <label class="form-label" for="sizeSelect">اندازه</label>
                                <select name="size[]" class="form-select" id="sizeSelect" required="">
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
                            <div class="col-md-2 m-2" id="length">
                                <label class="form-label" for="exampleInputPassword">طول</label>
                                <input name="length[]" class="form-control" id="exampleInputPassword" type="text" placeholder="">
                            </div>
                            <div class="col-md-2 m-2" id="width">
                                <label class="form-label" for="exampleInputPassword16">عرض</label>
                                <input name="width[]" class="form-control" id="exampleInputPassword16" type="text" placeholder="">
                            </div>
                        </div>
                        <div class="row" id="inputsRow">
                            <div class="col-md-2 m-2">
                                <label class="form-label" for="shapeSelect">شکل</label>
                                <select name="shape[]" class="form-select" id="shapeSelect" required="">
                                    <option value="مستطیل" class="rectangle">مستطیل</option>
                                    <option value="مربع" class="square">مربع</option>
                                    <option value="دایره" class="circle">دایره</option>
                                    <option value="بیضی" class="oval">بیضی</option>
                                </select>
                            </div>
                            <div class="col-md-2 m-2" id="size">
                                <label class="form-label" for="sizeSelect">اندازه</label>
                                <select name="size[]" class="form-select" id="sizeSelect" required="">
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
                            <div class="col-md-2 m-2" id="length">
                                <label class="form-label" for="exampleInputPassword">طول</label>
                                <input name="length[]" class="form-control" id="exampleInputPassword" type="text" placeholder="">
                            </div>
                            <div class="col-md-2 m-2" id="width">
                                <label class="form-label" for="exampleInputPassword16">عرض</label>
                                <input name="width[]" class="form-control" id="exampleInputPassword16" type="text" placeholder="">
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
{{--@section('js')--}}
{{--<script>--}}
{{--    $(document).ready(function () {--}}
{{--        $("button").click(function () {--}}
{{--            var inputsRow = $("#inputsRow");--}}
{{--            var newInputsRow = inputsRow.clone();--}}
{{--            newInputsRow.find("select,input").val("");--}}
{{--            inputsRow.after(newInputsRow);--}}

{{--            // اعمال رویداد تغییر بر روی عناصر جدید--}}
{{--            newInputsRow.find("#shapeSelect").change(function () {--}}
{{--                var shapeValue = $(this).val();--}}
{{--                if (shapeValue === "اندازه دلخواه") {--}}
{{--                    newInputsRow.find("#customSizeFields").hide();--}}
{{--                    newInputsRow.find("#customSizeFields2").hide();--}}
{{--                    newInputsRow.find("#length").show();--}}
{{--                    newInputsRow.find("#width").show();--}}
{{--                } else {--}}
{{--                    newInputsRow.find("#length").hide();--}}
{{--                    newInputsRow.find("#width").hide();--}}
{{--                    newInputsRow.find("#customSizeFields").show();--}}
{{--                    newInputsRow.find("#customSizeFields2").show();--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}

{{--        // اعمال رویداد تغییر بر روی ردیف اصلی--}}
{{--        $("#shapeSelect").change(function () {--}}
{{--            if ($(this).val() === "اندازه دلخواه") {--}}
{{--                $("#customSizeFields").hide();--}}
{{--                $("#customSizeFields2").hide();--}}
{{--                $("#length").show();--}}
{{--                $("#width").show();--}}
{{--            } else {--}}
{{--                $("#length").hide();--}}
{{--                $("#width").hide();--}}
{{--                $("#customSizeFields").show();--}}
{{--                $("#customSizeFields2").show();--}}
{{--            }--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}
{{--@endsection--}}
