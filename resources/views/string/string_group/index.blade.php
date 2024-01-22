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
                <h3>{{__('panel.order_points')}}</h3>
            </div>
            <div class="card">
                <div class="card-body" id="print">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>{{__('panel.type')}}</th>
                                <th>{{__('panel.cells')}}</th>
                                <th>{{__('panel.order_point')}}</th>
                                <th>{{__('panel.weight')}}</th>
                                <th>{{__('panel.type')}}</th>
                                <th scope="col">{{__('panel.edit')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($string_groups as $i => $string_group)
                                <tr class="{{ $string_group->order_pointer == 0 ? 'table-danger' : ''  }}">
                                    <td>{{ $i +1 }}</td>
                                    <td>{{ $string_group->title }}</td>
                                    <td>{{ $string_group->string_cells_code }}</td>
                                    <td>{{ $string_group->order_pointer }}</td>
                                    <td>{{ $string_group->total_weight }}</td>
                                    <td>{{ $string_group->str_type }}</td>
                                    <td><a href="{{route('string.string_group.edit',$string_group)}}" class="btn"><i
                                                class="fa fa-edit"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="text-center" style="margin-top:20px;">
                    <button class="btn btn-info" onclick="printdiv()" target="_blank">پرینت</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function printdiv() {
            var printContents = document.getElementById('print').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
@endsection

