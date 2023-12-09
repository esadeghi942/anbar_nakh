@extends('layouts.panel')
@section('css')
    <style>
        #fixed-header-footer {
            overflow-y: auto;
            height: 50vh;
        }

        #fixed-header-footer thead th {
            background-color: white !important;
            position: sticky;
            top: 0;
        }

        .border-red {
            border: 1px solid red;
            padding: 20px;
            width: fit-content;
            margin: auto;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    {{__('panel.get_qr_code')}}
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
                    <div class="card-body" id="print">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="text-center">
                                    <div class="border-red">
                                        <h5>
                                            ****{{$item->string_anbar->name}}****
                                            <br>
                                            {{$item->string_cell->code}}
                                        </h5>
                                        <div class="border-red">
                                            {!! QrCode::encoding('UTF-8')->size(150)->generate(trim($item->qr_code)) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <td>جنس</td>
                                            <td>{{$item->string_material->name}}</td>
                                        </tr>
                                        <tr>
                                            <td>رنگ</td>
                                            <td>{{$item->string_color->name}}</td>
                                        </tr>

                                        <tr>
                                            <td>فروشنده</td>
                                            <td>{{$item->seller->name}}</td>
                                        </tr>

                                        <tr>
                                            <td>نمره</td>
                                            <td>{{$item->string_grade->value}}</td>
                                        </tr>


                                        <tr>
                                            <td>وزن</td>
                                            <td>{{$item->weight}}</td>
                                        </tr>

                                        <tr>
                                            <td>نوع</td>
                                            <td>{{ $item->str_type }}</td>
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
    </script>
@endsection
