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
    <div class="content-wrapper">
        <section class="content-header">
            <div class="card">
                <div class="card-body">
                    <form id="get_cell" action="{{route('carpet.qr_code.get_cell')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group col-12 col-sm-12 col-md-12">
                                <label class="control-label" for="day">{{__('panel.qrcode')}}
                                    <span class="required">*</span>
                                </label>
                                <input type="text"  id="qrcode" name="qrcode" class="form-control" style="direction: ltr !important;">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">جستجو سلول ها</button>
                    </form>
                    <div id="result" style="display: none">
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
@section('js')
    <script>
        $(document).on('submit', 'form#get_cell', function (event) {
            event.preventDefault();
            const target = $(event.currentTarget);
            var data = new FormData(event.target);
            var dest = $('#result');
            dest.html('');
            $.ajax({
                url: target.attr('action'),
                method: target.attr('method'),
                processData: false,
                contentType: false,
                data: data,
                success: function (data) {
                    dest.show();
                    dest.append(data['customer']);
                    dest.append('<br>');
                    for (var i = 0; i < data['cells'].length; i++) {
                        dest.append('<div class="' + data[i]['id'] + '">' + data['cells'][i]['code'] - data['cells'][i]['anbar'] + '</div>');
                    }
                },
                error: function (e) {
                    var m = e.responseJSON.message;
                    $.toast({
                        heading: 'خطا !!!',
                        text: "خطایی در انجام عملیات رخ داد!!!" + (m ? '<ul class="ul-errors"> ' + m + '</ul>' : ''),
                        icon: 'error',
                        hideAfter: 10000,
                        textAlign: 'right',
                        stack: false
                    });
                },
            });
        });
    </script>
@endsection
