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
            <div class="col-12 col-sm-12">
                <h3>{{__('panel.enters') . $title }}
                </h3>
            </div>
            <div class="card mt-3">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>{{__('panel.type')}}</th>
                                <th>{{__('panel.seller')}}</th>
                                <th>{{__('panel.type')}}</th>
                                <th>{{__('panel.lat')}}</th>
                                <th>{{__('panel.weight')}}</th>
                                <th>{{__('panel.date')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($enters as $i => $item)
                                <tr>
                                    <td>{{ $i +1 }}</td>
                                    <td>{{ $item->string_group->title }}</td>
                                    <td>{{ $item->seller->name }}</td>
                                    <td>{{ $item->str_type }}</td>
                                    <td>{{ $item->lat }}</td>
                                    <td>{{$item->weight}}</td>
                                    <td>{{jdate($item->create_at)->format('h:i Y/m/d')}}</td>
                                    {{--<td><a href="{{route('string.enter.edit',$cell)}}" class="btn"><i
                                                class="fa fa-edit"></i></a></td>

                                    <td>
                                        <form action="{{ route('string.enter.destroy',$item->id)}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn"><i
                                                    class="fa fa-trash"></i></button>
                                        </form>
                                    </td> --}}
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
