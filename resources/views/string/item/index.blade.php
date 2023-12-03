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
                <h3>{{__('panel.items')}}</h3>
                <a href="{{route('string.item.create')}}" class="btn btn-success float-end">{{__('panel.enter anbar')}}</a>
            </div>
            <div class="card mt-3">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>{{__('panel.anbar')}}</th>
                                <th>{{__('panel.cell')}}</th>
                                <th>{{__('panel.qr_code')}}</th>
                                {{--
                                                                <th scope="col">{{__('panel.edit')}}</th>
                                --}}
                                <th scope="col">{{__('panel.get_qr_code')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $i => $item)
                                <tr>
                                    <td>{{ $i +1 }}</td>
                                    <td>{{ $item->string_anbar->name }}</td>
                                    <td>{{ $item->string_cell->code }}</td>
                                    <td>{{ $item->qr_code }}</td>
                                    <td>
                                        <a href="{{route('string.get_qr_code',$item)}}"><i
                                                class="fa fa-barcode"></i></a>
                                    </td>
                                    {{--<td><a href="{{route('string.item.edit',$cell)}}" class="btn"><i
                                                class="fa fa-edit"></i></a></td>

                                    <td>
                                        <form action="{{ route('string.item.destroy',$item->id)}}" method="POST">
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
