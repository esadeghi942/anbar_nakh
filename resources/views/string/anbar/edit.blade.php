@extends('layouts.panel')
@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    {{__('panel.edit item',['item'=>__('panel.anbar')])}}
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
                        <form method="post" action="{{route('string.anbar.update',$anbar)}}">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="form-group col-12 col-sm-6 col-md-4">
                                    <label class="control-label" for="day">{{__('panel.anbar')}}
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text" id="name" name="name"
                                           value="{{old('name',$anbar->name)}}" class="form-control">
                                </div>

                                <div class="form-group col-12 col-sm-6 col-md-4">
                                    <label class="control-label" for="day">{{__('panel.code')}}
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text" id="code" name="code"
                                           value="{{old('code',$anbar->code)}}" class="form-control" required>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-success mt-3">{{__('panel.save')}}</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
