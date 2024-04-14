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
                <h3>{{__('panel.orders')}}</h3>
            </div>
            <div class="card">
                <div class="card-body">
                    <a href="{{route('roll.factor.create')}}"
                       class="btn btn-success float-left mb-3">{{__('panel.create item',[ 'item'=>__('panel.order') ])}}</a>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>{{__('panel.number')}}</th>
                                <th>{{__('panel.count orders')}}</th>
                                <th>{{__('panel.date registered')}}</th>
{{--
                                <th scope="col">{{__('panel.edit')}}</th>
--}}
                                <th scope="col">{{__('panel.delete')}}</th>
                                <th>{{__('panel.show')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($factors as $i => $factor)
                                <tr>
                                    <td>{{ $i +1 }}</td>
                                    <td> {{ $factor->number }}</td>
                                    <td>{{ $factor->orders()->count() }}</td>
                                    <td>{{ jdate($factor->created_at)->format('Y/m/d') }}</td>
                               {{--     <td><a href="{{route('carpet.factor.edit',$factor)}}" class="btn"><i
                                                class="fa fa-edit"></i></a></td>
                                                --}}
                                    <td>
                                        <form action="{{ route('roll.factor.destroy',$factor->id)}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn"><i
                                                    class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                    <td><a href="{{route('roll.factor.show',$factor)}}" target="_blank">نمایش</a></td>

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
