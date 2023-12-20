@extends('layouts.panel')
@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    {{__('panel.free cells')}}
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('index')}}"> <i
                                    data-feather="home"></i></a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row starter-main">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <form method="post" id="search" action="{{route('string.cell.free.weight')}}">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12 col-sm-6 col-md-4">
                                    <label class="control-label" for="day">حداقل وزن
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text" id="weight" name="weight"
                                           value="0" class="form-control">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success mt-3">{{__('panel.search')}}</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" style=" display: none;" id="result">
        <div class="row starter-main">
            <div class="col-12 col-sm-6">
                <h3>{{__('panel.cells')}}</h3>
            </div>
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{route('string.cell.free_total.save')}}">
                        @csrf
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>{{__('panel.anbar')}}</th>
                                    <th>{{__('panel.cell')}}</th>
                                    <th>{{__('panel.weight')}}</th>
                                    <th>{{__('panel.material')}}</th>
                                    <th scope="col">{{__('panel.free cells')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <button type="submit" class="btn btn-success mt-3">{{__('panel.save')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>
        $(document).on('submit', '#search', function (e) {
            e.preventDefault();
            $('#result').hide();
            $('#result table tbody').html('')
            var data = new FormData(e.target);
            var target = $(this);
            $.ajax({
                url: target.attr('action'),
                method: target.attr('method'),
                processData: false,
                contentType: false,
                data: data,
                success: function (data) {
                    if (data.length != 0 ) {
                        $('#result').show();
                        for (var i = 0; i < data.length; i++) {
                            $('#result table tbody').append(
                                '<tr>' +
                                '<td>' + data[i]['anbar'] + '</td>' +
                                '<td>' + data[i]['cell'] + '</td>' +
                                '<td>' + data[i]['weight'] + '</td>' +
                                '<td>' + data[i]['material'] + '</td>' +
                                '<td><input type="checkbox" name="free[]"  value="' + data[i]['id'] + '"></td>' +
                                '</tr>'
                            )
                        }
                    }
                    else
                        $.toast({
                            heading: 'خطا !!!',
                            text: "خطایی در انجام عملیات رخ داد!!!" + ('<ul>سلولی یافت نشد.</ul>'),
                            icon: 'error',
                            hideAfter: 10000,
                            textAlign: 'right',
                            stack: false
                        });
                }
            });
        });
    </script>
@endsection
