@extends('layouts.panel')
@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>{{__('panel.dashboard')}}</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('index')}}"> <i data-feather="home"></i></a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row starter-main">
            <div class="col-12 col-sm-6">
                <h3>{{__('panel.order_points')}}</h3>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>{{__('panel.color')}}</th>
                                <th>{{__('panel.material')}}</th>
                                <th>{{__('panel.grade')}}</th>
                                <th>{{__('panel.value')}}</th>
                                <th>{{__('panel.exist')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order_pointers as $i => $order_pointer)
                                <tr>
                                    <td>{{ $i +1 }}</td>
                                    <td>{{ $order_pointer->string_color->name }}</td>
                                    <td>{{ $order_pointer->string_material->name }}</td>
                                    <td>{{ $order_pointer->string_grade->value }}</td>
                                    <td>{{ $order_pointer->value }}</td>
                                    <td>{{ $order_pointer->exists }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
