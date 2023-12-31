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
                <h3>{{__('panel.create item',[ 'item'=>__('panel.cells') ])}}</h3>
            </div>
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{route('string.cell.store')}}">
                        @csrf
                        @include('string.cell.form')
                        <button type="submit" class="btn btn-success mt-3">{{__('panel.save')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row starter-main">
            <div class="col-12 col-sm-6">
                <h3>{{__('panel.cells')}}</h3>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>{{__('panel.anbar')}}</th>
                                <th>{{__('panel.code')}}</th>
                                <th>{{__('panel.weight')}}</th>
                                <th>{{__('panel.type')}}</th>
                                <th>{{__('panel.history enters')}}</th>
                                <th>{{__('panel.history exports')}}</th>
                                <th scope="col">{{__('panel.edit')}}</th>
                                <th scope="col">{{__('panel.delete')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cells as $i => $cell)
                                <tr>
                                    <td>{{ $i +1 }}</td>
                                    <td>{{ $cell->string_anbar->name }}</td>
                                    <td>{{ $cell->code }}</td>
                                    <td>{{ $cell->weight }}</td>
                                    <td>{{ $cell->string_group  ? $cell->string_group->title : '' }}</td>

                                    <td><a href="{{route('string.cell.enters',$cell)}}" class="btn"><i
                                                class="fa fa-history"></i></a></td>

                                    <td><a href="{{route('string.cell.exports',$cell)}}" class="btn"><i
                                                class="fa fa-history"></i></a></td>

                                    <td><a href="{{route('string.cell.edit',$cell)}}" class="btn"><i
                                                class="fa fa-edit"></i></a></td>
                                    <td>
                                        <form action="{{ route('string.cell.destroy',$cell->id)}}" method="POST">
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
