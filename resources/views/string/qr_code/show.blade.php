@extends('layouts.panel')
@section('css')
    <style>
        .border-red {
            border: 1px solid red;
            padding: 10px;
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
                        <div class="row">
                            @foreach($qr_codes as $qr_code)
                                <div class="col-sm-3 col-md-2 border-red" style="min-width: 200px;">
                                    <div class="text-center">
                                        <h6>
                                            {{$group_qr_code->string_group->title}}
                                        </h6>
                                        <div class="border-red">
                                            {!! QrCode::encoding('UTF-8')->size(100)->generate(trim($qr_code->serial)) !!}
                                        </div>
                                        <div style="direction: ltr">
                                            {{$qr_code->serial}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
