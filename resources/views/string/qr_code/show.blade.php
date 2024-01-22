@extends('layouts.panel')
@section('css')
    <style>
        .border-red {
            border: 1px solid red;
            padding: 10px;
        }

        .details {
            font-size: 15px;
            font-weight: bold;
            margin-top: 10px;
        }
        .f15{
            font-size: 11px;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    ****{{$group_qr_code->string_group->title}}****
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
                        @foreach($qr_codes as $qr_code)
                            <div class="row" style="border-bottom: 1px solid #EEEEEE">
                                <div class="col-6">
                                    <div class="details">
                                        {{$group_qr_code->string_group->title}}
                                    </div>
                                    <div class="details f15" style="direction: ltr;">
                                        {{$qr_code->serial}}
                                    </div>
                                    <div class="details">
                                        {{$qr_code->string_group_qr_code->lat}}
                                    </div>
                                    <div class="details">
                                        {{$qr_code->string_group_qr_code->seller->name}}
                                    </div>
                                </div>
                                <div class="border-red" style="width: fit-content">
                                    {!! QrCode::encoding('UTF-8')->size(110)->generate(trim($qr_code->serial)) !!}
                                </div>
                            </div>
                            <div style="break-after:page"></div>
                        @endforeach
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
