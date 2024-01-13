@extends('layouts.panel')
@section('css')
    <style>
        .form-group {
            margin-top: 10px !important;
        }
        .select2-container--default.select2-container--focus .select2-selection--multiple{
            border: 1px solid black;
            min-height: 35px;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    جستجو کد qr
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
                        <form action="{{route('string.group_qr_code.search')}}">
                            @include('string.qr_code.enter.form')
                            <button type="submit" class="btn btn-success mt-3">{{__('panel.search')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).on('change','#anbar',function (){
            var val=$(this).val();
            var dest=$('#cell').val('');
            $('#cell option').hide();
            $('#cell option[data-parent='+val+']').show();
        });
    </script>
@endsection
