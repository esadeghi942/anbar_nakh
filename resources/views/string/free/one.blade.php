@extends('layouts.panel')
@section('css')
    <style>
        .form-group {
            margin-top: 10px !important;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    {{__('panel.free cells')}}
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
                        <form method="post" action="{{route('string.cell.free_one.save')}}">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12 col-sm-6 col-md-4">
                                    <label for="day">{{__('panel.anbar')}}
                                        <span class="required">*</span>
                                    </label>
                                    <select name="anbar_id" id="anbar" autocomplete="off"
                                            class="form-control form-select">
                                        <option></option>
                                        @foreach($anbars as $anbar)
                                            <option
                                                {{ old('anbar_id') == $anbar->id ? 'selected' : '' }} value="{{$anbar->id}}">{{$anbar->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-12 col-sm-6 col-md-4">
                                    <label for="day">{{__('panel.cell')}}
                                        <span class="required">*</span>
                                    </label>
                                    <select name="cell" id="cell" class="form-control form-select">
                                        <option></option>
                                        @foreach($cells as $cell)
                                            <option data-parent="{{$cell->string_anbar_id}}" data-detail="{{$cell}}"
                                                    {{  old('cell_id') == $cell->id ? 'selected' : '' }} value="{{$cell->id}}">{{ $cell->code}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <h4 class="mt-3" id="result"></h4>

                            <button type="submit" class="btn btn-success mt-3">{{__('panel.free cells')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).on('change', '#anbar', function () {
            var val = $(this).val();
            var dest = $('#cell').val('');
            $('#cell option').hide();
            $('#cell option[data-parent=' + val + ']').show();
        });


        $(document).on('change', '#cell', function () {
            var value = $(this).val();
            var token = $('meta[name="csrf-token"]').attr('content')
            if (value) {
                $.ajax({
                    url: "{{route('string.cell.free_one.search')}}",
                    method: 'post',
                    data: {
                        'cell': value,
                        '_token': token
                    },
                    success: function (data) {
                        if (data['material'])
                            $('#result').html(data['cell'] + ' وزن ' + data['weight'] + '  متریال ' + data['material']);
                        else
                            $('#result').html('این سلول حاوی هیچ متریالی نیست');

                    }
                });
            }
        });
    </script>
@endsection
