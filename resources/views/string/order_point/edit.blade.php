@extends('layouts.panel')
@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    {{__('panel.edit item',['item'=>__('panel.order_point')])}}
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
                        <form method="post" action="{{route('string.order_point.update',$item)}}">
                            @csrf
                            @method('put')
                            @include('string.order_point.form')
                            <button type="submit" class="btn btn-success mt-3">{{__('panel.save')}}</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
