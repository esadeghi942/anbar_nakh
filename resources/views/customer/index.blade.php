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
                <h3>{{__('panel.create item',[ 'item'=>__('panel.customer') ])}}</h3>
            </div>
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{route('customer.store')}}">
                        @csrf
                        <div class="row">
                            <div class="form-group col-12 col-sm-6 col-md-4">
                                <label class="control-label" for="day">{{__('panel.name')}}
                                    <span class="required">*</span>
                                </label>
                                <input type="text" id="name" name="name" required
                                       value="{{old('name')}}" class="form-control">
                            </div>

                            <div class="form-group col-12 col-sm-6 col-md-4">
                                <label class="control-label" for="day">{{__('panel.code')}}
                                    <span class="required">*</span>
                                </label>
                                <input type="text" id="code" name="code"
                                       value="{{old('code')}}" class="form-control" required>
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
                <h3>{{__('panel.customers')}}</h3>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>{{__('panel.customer')}}</th>
                                <th>{{__('panel.code')}}</th>
                                <th scope="col">{{__('panel.edit')}}</th>
                                <th scope="col">{{__('panel.delete')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customers as $i => $customer)
                                <tr>
                                    <td>{{ $i +1 }}</td>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->code }}</td>
                                    <td><a href="{{route('customer.edit',$customer)}}" class="btn"><i class="fa fa-edit"></i></a></td>
                                    <td>
                                        <form action="{{ route('customer.destroy',$customer->id)}}" method="POST">
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
