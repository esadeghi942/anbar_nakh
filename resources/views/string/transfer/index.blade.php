@extends('layouts.panel')
@section('css')
    <style>
        .back-ground {
            width: 25px;
            height: 25px;
            margin: auto;
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

    <div class="container-fluid">
        <div class="row starter-main">
            <div class="col-12 col-sm-6">
                <h3>{{__('panel.transfer')}}</h3>
            </div>
            <div class="card">
                <div class="card-body">
                    <form method="post" class="" action="{{route('string.transfer.save')}}">
                        @csrf
                        <div class="row">
                            <div class="form-group col-12 col-sm-6 col-md-4">
                                <label for="day">انبار مبدا
                                    <span class="required">*</span>
                                </label>
                                <select name="anbar1" id="anbar1" class="form-control form-select">
                                    <option></option>
                                    @foreach($anbars as $anbar)
                                        <option
                                            {{ old('anbar1') == $anbar->id ? 'selected' : '' }} value="{{$anbar->id}}">{{$anbar->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-12 col-sm-6 col-md-4">
                                <label for="day">سلول مبدا
                                    <span class="required">*</span>
                                </label>
                                <select name="cell1" id="cell1" class="form-control form-select">
                                    <option></option>
                                    @foreach($cells as $cell)
                                        <option data-parent="{{$cell->string_anbar_id}}"
                                                {{  old('cell1') == $cell->id ? 'selected' : '' }} value="{{$cell->id}}">{{ $cell->code}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-12 col-sm-6 col-md-4">
                                <label for="day">انبار مقصد
                                    <span class="required">*</span>
                                </label>
                                <select name="anbar2" id="anbar2"
                                        class="form-control form-select">
                                    <option></option>
                                    @foreach($anbars as $anbar)
                                        <option
                                            {{ old('anbar2') == $anbar->id ? 'selected' : '' }} value="{{$anbar->id}}">{{$anbar->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-12 col-sm-6 col-md-4">
                                <label for="day">سلول مقصد
                                    <span class="required">*</span>
                                </label>
                                <select name="cell2" id="cell2" class="form-control form-select">
                                    <option></option>
                                    @foreach($cells as $cell)
                                        <option data-parent="{{$cell->string_anbar_id}}"
                                                {{  old('cell2') == $cell->id ? 'selected' : '' }} value="{{$cell->id}}">{{ $cell->code}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mt-3">جا به جایی</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).on('change','#anbar1',function (){
            var val=$(this).val();
            var dest=$('#cell1').val('');
            $('#cell1 option').hide();
            $('#cell1 option[data-parent='+val+']').show();
        });

        $(document).on('change','#anbar2',function (){
            var val=$(this).val();
            var dest=$('#cell2').val('');
            $('#cell2 option').hide();
            $('#cell2 option[data-parent='+val+']').show();
        });
    </script>
@endsection
