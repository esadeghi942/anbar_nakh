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
                <h3>{{__('panel.layers')}}</h3>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>{{__('panel.material')}}</th>
                                <th>{{__('panel.count')}}</th>
                                <th>{{__('panel.seller')}}</th>
                                <th>{{__('panel.lat')}}</th>
                                <th scope="col">{{__('panel.qrcode')}}</th>
                                <th scope="col">{{__('panel.weight')}}</th>
{{--
                                <th scope="col">{{__('panel.delete')}}</th>
--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($group_qr_codes as $i => $group_qr_code)
                                <tr>
                                    <td>{{ $i +1 }}</td>
                                    <td>{{ $group_qr_code->string_group->title }}</td>
                                    <td>{{ $group_qr_code->count }}</td>
                                    <td>{{ $group_qr_code->seller->name }}</td>
                                    <td>{{ $group_qr_code->lat }}</td>
                                    <td><a href="{{route('string.group_qr_code.show',$group_qr_code)}}" class="btn"><i
                                                class="fa fa-barcode"></i></a></td>

                                    <td><a href="{{route('string.group_qr_code.weight',$group_qr_code)}}" class="btn"><i
                                                class="fa fa-gavel"></i></a></td>
                                  {{--  <td>
                                        <form action="{{ route('string.layer.destroy',$group_qr_code->id)}}"
                                              method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn"><i
                                                    class="fa fa-trash"></i></button>
                                        </form>
                                    </td>--}}
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
