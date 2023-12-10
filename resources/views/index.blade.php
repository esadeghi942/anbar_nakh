@extends('layouts.panel')
@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>{{__('panel.dashboard')}}</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('index')}}"> <i data-feather="home"></i></a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row starter-main">
            <div class="col-12 col-sm-6">
                <h3>{{__('panel.order_points')}}</h3>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>{{__('panel.color')}}</th>
                                <th>{{__('panel.material')}}</th>
                                <th>{{__('panel.grade')}}</th>
                                <th>{{__('panel.weight')}}</th>
                                <th>{{__('panel.order_point')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order_pointer_string_groups as $i => $string_group)
                                <tr>
                                    <td>{{ $i +1 }}</td>
                                    <td>{{ $string_group->string_color->name }}</td>
                                    <td>{{ $string_group->string_material->name }}</td>
                                    <td>{{ $string_group->string_grade->value }}</td>
                                    <td>{{ $string_group->total_weight }}</td>
                                    <td>{{ $string_group->order_pointer }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-xl-6 col-md-12 box-col-6">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h5>نمودار کلی </h5>
                        </div>
                        <div class="card-body chart-block chart-vertical-center">
                            <canvas id="mymixchart"></canvas>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('assets/js/chart/chartjs/chart.min.js')}}"></script>
    <script>
        var chart_data = {!! $chart_data !!};
        log(chart_data);
        log(chart_data['label']);
        var ctx = document.getElementById('mymixchart');
        var mixedChart = new Chart(ctx, {
            type: 'bar',
            data: {
                datasets: [{
                    type: 'bar',
                    label: 'موجودی انبار',
                    data: chart_data['total_weight'],
                    backgroundColor: [
                        zetaAdminConfig.primary,
                        zetaAdminConfig.secondary,
                        zetaAdminConfig.info,
                        zetaAdminConfig.warning,
                        zetaAdminConfig.secondary,
                        zetaAdminConfig.success,
                        zetaAdminConfig.primary,
                        zetaAdminConfig.info,
                        zetaAdminConfig.secondary
                    ]
                }, {
                    type: 'bar',
                    label: 'نقطه سفارش',
                    data:  chart_data['order_pointer'],
                    borderColor: zetaAdminConfig.primary,
                    pointBackgroundColor: [zetaAdminConfig.primary],
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: zetaAdminConfig.primary
                }],
                labels: chart_data['label']

            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                tooltips: {
                    rtl: true
                }, legend: {
                    rtl: true
                }
            }
        });
    </script>
@endsection
