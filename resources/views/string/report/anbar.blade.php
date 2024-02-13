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
            <div class="col-12 col-sm-12">
                <h3>{{__('panel.items') }}
                </h3>
            </div>
            <div class="card mt-3">
                <div class="card-body" id="print">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>{{__('panel.cells')}}</th>
                                <th>{{__('panel.weight')}}</th>
                                <th>{{__('panel.material')}}</th>
                                <th>{{__('panel.seller')}}</th>
                                <th>{{__('panel.lat')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $i => $item)
                                @php($qr_code=\App\Models\String\QrCode::find($item))
                                <tr>
                                    <td>{{ $i +1 }}</td>
                                    <td>{{ $qr_code->string_cells_code }}</td>
                                    <td>{{ $qr_code->weight }}</td>
                                    <td>{{ $qr_code->string_group_qr_code->string_group->title }}</td>
                                    <td>{{ $qr_code->string_group_qr_code->seller->name }}</td>
                                    <td>{{ $qr_code->string_group_qr_code->lat }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="3">جمع</td>
                            </tr>
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
        $(document).on('click', '.export', function (event) {
            var id = $(this).attr('data-id');
            $('#id_item').val(id);
        });
        $(document).on('submit', 'form.ajax_form', function (event) {
            event.preventDefault();
            var form = $(this);
            var conf = confirm('آیا مطمئن به ذخیره اطلاعات هستید؟');
            if (conf)
                ajax_form_request(form, event);
        });
    </script>
@endsection
