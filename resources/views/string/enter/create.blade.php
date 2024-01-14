@extends('layouts.panel')
@section('css')
    <style>
        .form-group {
            margin-top: 10px !important;
        }

        .select2-container--default .select2-selection--multiple {
            border: 1px solid #ced4da !important;
        }

        form .select2-container--default .select2-selection--multiple .select2-selection__choice{
            padding: 2px 6px 2px 15px !important ;
        }
        .select2-container--default.select2-container--focus .select2-selection--multiple{
            overflow: auto;
        }

        .select2-results__options .select2-results__option[aria-disabled=true] {
            display: none;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    {{__('panel.enter anbar',['item'=>__('panel.item')])}}
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
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{route('string.enter.store')}}">
                    @csrf
                    @include('string.enter.form')
                    <button type="submit" class="btn btn-success mt-3">{{__('panel.save')}}</button>
                </form>

            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).on('change', '#anbar', function () {
            var val = $(this).val();
            $('#cell').val('');
            if(val) {
                $('#cell option').prop("disabled", true);
                $('#cell option[data-parent=' + val + ']').prop('disabled',false);
            }
            $('#cell').select2();
        });
    </script>
@endsection
