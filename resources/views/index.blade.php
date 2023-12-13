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
            <div class="card">
                <div class="card-title">
                    <h2>جدول عبور از نقطه سفارش</h2>
                </div>
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
                            @if($order_pointer_string_groups->count())
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
                            @else
                                <tr>
                                    <td colspan="6">موردی وجود ندارد</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12 box-col-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h5>نمودار نقطه سفارش و موجودی</h5>
                        </div>
                        <div class="card-body chart-block">
                            <div class="flot-chart-container morris-chart">
                                <div class="flot-chart-placeholder" id="area-spaline"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('assets/js/chart/apex-chart/apex-chart.js')}}"></script>
    <script>
        var chart_data = {!! $chart_data !!};
        if( chart_data.label && chart_data.label.length) {
            var options1 = {
                chart: {
                    height: 350,
                    type: 'line',
                    toolbar: {
                        show: false
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: true,
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth'
                },
                series: [{
                    name: 'موجودی انبار',
                    data: chart_data['total_weight']
                }, {
                    name: 'نقطه سفارش',
                    data: chart_data['order_pointer'],
                }],

                xaxis: {
                    type: 'categories',
                    categories: chart_data['label'],
                },
                colors: [zetaAdminConfig.success, zetaAdminConfig.danger]
            }
            var chart1 = new ApexCharts(
                document.querySelector("#area-spaline"),
                options1
            );
            chart1.render();
        }
        else
            $('#area-spaline').html('موردی ثبت نشده است.')
    </script>
@endsection
