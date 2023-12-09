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
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('panel.export anbar')}}</h4>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" class="ajax_form" action="{{route('string.export.export')}}">
                        @csrf
                        <input type="hidden" id="id_item" name="id" value="">
                        <div class="row">
                            <div class="form-group col-12 col-sm-6 col-md-4">
                                <label for="day">{{__('panel.person')}}
                                    <span class="required">*</span>
                                </label>
                                <select class="form-control select2" name="person">
                                    @foreach($persons as $person)
                                        <option value="{{$person->id}}">{{$person->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-12 col-sm-6 col-md-4">
                                <label for="day">{{__('panel.device')}}
                                    <span class="required">*</span>
                                </label>
                                <select class="form-control select2" name="device">
                                    @foreach($devices as $device)
                                        <option value="{{$device->id}}">{{$device->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-12 col-sm-6 col-md-4">
                                <label for="day">{{__('panel.weight')}}
                                    <span class="required">*</span>
                                </label>
                                <input type="text" id="weight" name="weight"
                                       value="{{old('weight',isset($item) ? $item->weight : '')}}" class="form-control">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mt-3">{{__('panel.save')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
                <h3>{{__('panel.items') . $title }}
                </h3>
            </div>
            <div class="card mt-3">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>{{__('panel.anbar')}}</th>
                                <th>{{__('panel.cell')}}</th>
                                <th>{{__('panel.color')}}</th>
                                <th>{{__('panel.material')}}</th>
                                <th>{{__('panel.grade')}}</th>
                                <th>{{__('panel.rest_weight')}}</th>
                                <th scope="col">{{__('panel.get_qr_code')}}</th>
                                <th>{{__('panel.exports')}}</th>
                                <th scope="col">{{__('panel.export anbar')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(collect($items) as $i => $item)
                                <tr>
                                    <td>{{ $i +1 }}</td>
                                    <td>{{ $item->string_anbar->name }}</td>
                                    <td>{{ $item->string_cell->code }}</td>
                                    <td>{{ $item->string_group->string_color->name }}</td>
                                    <td>{{ $item->string_group->string_material->name }}</td>
                                    <td>{{ $item->string_group->string_grade->value }}</td>
                                    <td>{{$item->rest_weight}}</td>
                                    <td>
                                        <a href="{{route('string.item.show',$item)}}"><i
                                                class="fa fa-barcode"></i></a>
                                    </td>

                                    <td>
                                        <a href="{{route('string.item.exports',$item)}}"><i
                                                class="fa fa-list"></i></a>
                                    </td>
                                    <td>
                                        <button class="btn export" type="button" data-bs-toggle="modal"
                                                data-id="{{$item->id}}"
                                                data-bs-target=".bd-example-modal-lg"><i class="fa fa-sign-out"></i>
                                        </button>
                                    </td>
                                    {{--<td><a href="{{route('string.item.edit',$cell)}}" class="btn"><i
                                                class="fa fa-edit"></i></a></td>

                                    <td>
                                        <form action="{{ route('string.item.destroy',$item->id)}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn"><i
                                                    class="fa fa-trash"></i></button>
                                        </form>
                                    </td> --}}
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
@section('js')
    <script>
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
