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
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>{{__('panel.user')}}</th>
                                <th>{{__('panel.customer')}}</th>
                                <th>{{__('panel.map')}}</th>
                                <th>{{__('panel.delivery')}}</th>
                                <th>{{__('panel.count')}}</th>
                                <th>{{__('panel.registration date')}}</th>
                                <th>{{__('panel.show')}}</th>
                                <th>{{__('panel.delete')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $i => $order)
                                <tr>
                                    <td>{{ $i +1 }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->customer->name }}</td>
                                    <td>{{ $order->map->name }}</td>
                                    <td>{{ $order->time_limit }}</td>
                                    <td>{{ $order->products()->count() }}</td>
                                    <td>{{ jdate($order->created_at)->format('Y/m/d') }}</td>
                                    <td><a href="{{route('carpet.order.show',$order)}}" class="btn"><i class="fa fa-file"></i></a></td>
                                    <td>
                                        <form action="{{ route('carpet.order.destroy',$order->id)}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn"><i
                                                    class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
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
