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
                                <th>{{__('panel.layer')}}</th>
                                <th>{{__('panel.order_point')}}</th>
                                <th>{{__('panel.weight')}}</th>
                                <th>{{__('panel.type')}}</th>
                                <th scope="col">{{__('panel.edit')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($string_groups as $i => $string_group)
                                <tr class="{{ $string_group->order_pointer == 0 ? 'table-danger' : ''  }}">
                                    <td>{{ $i +1 }}</td>
                                    <td>{{ $string_group->string_color->name }}</td>
                                    <td>{{ $string_group->string_material->name }}</td>
                                    <td>{{ $string_group->string_grade->value }}</td>
                                    <td>{{ $string_group->string_layer->value }}</td>
                                    <td>{{ $string_group->order_pointer }}</td>
                                    <td>{{ $string_group->string_cells()->sum('weight') }}</td>
                                    <td>{{ $string_group->str_type }}</td>
                                    <td><a href="{{route('string.string_group.edit',$string_group)}}" class="btn"><i
                                                class="fa fa-edit"></i></a></td>
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
