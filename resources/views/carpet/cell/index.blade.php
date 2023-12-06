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
                <h3>{{ __('panel.cells')}}</h3>
                <a href="{{route('carpet.cell.create')}}" class="btn btn-success float-end">ایجاد سلول جدید</a>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>{{__('panel.code')}}</th>
                                <th>{{__('panel.anbar')}}</th>
                                <th>{{__('panel.customer')}}</th>
                                <th>{{__('panel.color')}}</th>
                                <th scope="col">{{__('panel.edit')}}</th>
                                <th scope="col">{{__('panel.delete')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cells as $i => $cell)
                                <tr>
                                    <td>{{ $i +1 }}</td>
                                    <td>{{ $cell->code }}</td>
                                    <td>{{ $cell->anbar->name }}</td>
                                    <td>{{ $cell->customer->name }}</td>
                                    <td>
                                        <div class="back-ground" style="background-color: {{ $cell->color }}"></div>
                                    </td>
                                    <td><a href="{{route('carpet.cell.edit',$cell)}}" class="btn"><i
                                                class="fa fa-edit"></i></a></td>
                                    <td>
                                        <form action="{{ route('carpet.cell.destroy',$cell->id)}}" method="POST">
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
