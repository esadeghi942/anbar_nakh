@extends('layouts.panel')
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
                <h3>{{__('panel.create item',[ 'item'=>__('panel.layer') ])}}</h3>
            </div>
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{route('string.layer.store')}}">
                        @csrf
                        @include('string.layer.form')
                        <button type="submit" class="btn btn-success mt-3">{{__('panel.save')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row starter-main">
            <div class="col-12 col-sm-6">
                <h3>{{__('panel.layers')}}</h3>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>{{__('panel.layer')}}</th>
                                <th scope="col">{{__('panel.edit')}}</th>
                                <th scope="col">{{__('panel.delete')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($layers as $i => $layer)
                                <tr>
                                    <td>{{ $i +1 }}</td>
                                    <td>{{ $layer->value }}</td>
                                    <td><a href="{{route('string.layer.edit',$layer)}}" class="btn"><i class="fa fa-edit"></i></a></td>
                                    <td>
                                        <form action="{{ route('string.layer.destroy',$layer->id)}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn"><i
                                                    class="fa fa-trash"></i></button>
                                        </form>
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
