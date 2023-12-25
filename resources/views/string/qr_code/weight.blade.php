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
                <h6>
                    {{$group_qr_code->string_group->title. '  ' .$group_qr_code->seller->name }}

                </h6>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <form method="post" action="{{route('string.group_qr_code.save_weight',$group_qr_code)}}">
                            @csrf
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{__('panel.qrcode')}}</th>
                                    <th scope="col">{{__('panel.weight')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($qr_codes as $i => $qr_code)
                                    <tr>
                                        <td>{{ $i +1 }}</td>
                                        <td class="ltr">{{ $qr_code->serial }}</td>
                                        <td><input type="number" name="weight_{{$qr_code->id}}"
                                                   value="{{$qr_code->weight}}" class="form-control"></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-success mt-3">{{__('panel.save')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
