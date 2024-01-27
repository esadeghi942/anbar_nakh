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
                <h3>{{__('panel.exports')}}</h3>
            </div>
            <h6>
                {{ $groupQrCode->string_group->title. '  ' .$groupQrCode->seller->name . ' لات:' . $groupQrCode->lat}}
            </h6>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>{{__('panel.qr_code')}}</th>
                                <th>{{__('panel.weight')}}</th>
                                <th>{{__('panel.device')}}</th>
                                <th>{{__('panel.person')}}</th>
                                <th>{{__('panel.export date')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($exports as $i => $export)
                                <tr>
                                    <td>{{ $i +1 }}</td>
                                    <td>{{ $export->serial }}</td>
                                    <td>{{ $export->weight }}</td>
                                    <td>{{ $export->device ? $export->device->name : 'خروجی جهت صفر کردن' }}</td>
                                    <td>{{ $export->person ?  $export->person->name : 'خروجی جهت صفر کردن' }}</td>
                                    <td>{{ jdate($export->created_at)->format('Y/m/d') }}</td>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
