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
                <h3>{{__('panel.create item',[ 'item'=>__('panel.map') ])}}</h3>
            </div>
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{route('carpet.map.store')}}" enctype="multipart/form-data">
                        @csrf
                        @include('carpet.BaseForm')
                        <div class="row my-2">
                            <div class="form-group col-12 col-sm-6 col-md-4">
                                <label class="control-label" for="day">{{__('panel.image_map')}}
                                    <span class="required">*</span>
                                </label>
                                <input type="file" id="image" name="image" autocomplete="off"
                                       value="" class="form-control">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mt-3">{{__('panel.save')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row starter-main">
            <div class="col-12 col-sm-6">
                <h3>{{__('panel.maps')}}</h3>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>{{__('panel.map')}}</th>
                                <th>{{__('panel.image_map')}}</th>
                                <th scope="col">{{__('panel.edit')}}</th>
                                <th scope="col">{{__('panel.delete')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($maps as $i => $map)
                                <tr>
                                    <td>{{ $i +1 }}</td>
                                    <td>{{ $map->name }}</td>
                                    <td><img src="{{ asset('images/uploads/' . $map->image) }}" style="width: 100px" height="100px"></td>
                                    <td><a href="{{route('carpet.map.edit',$map)}}" class="btn"><i class="fa fa-edit"></i></a></td>
                                    <td>
                                        <form action="{{ route('carpet.map.destroy',$map->id)}}" method="POST">
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
