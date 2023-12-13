@extends('layouts.panel')
@section('css')
    <style>
        .form-group {
            margin-top: 10px !important;
        }

        .badge {
            width: 30px;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    {{__('panel.anbar',['item'=>__('panel.item')])}}
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
                    انبار نخ
                    <div class="card-body">
                        @foreach(range('A', 'M') as $char)
                            <div class="pt-4">
                                @for($i=1;$i<8;$i++)
                                    @php($cell=\App\Models\String\Cell::where('code',$char.sprintf('%02d', $i))->first())
                                    <a title="{{isset($cell) && $cell->string_group_id ? $cell->weight. "\n" . $cell->string_group->title : '' }}"
                                       class="badge badge-{{ isset($cell) && $cell->string_group_id ? 'secondary' : 'danger'}}">
                                        {{sprintf('%02d', $i) }}</a>
                                @endfor
                                <a class="badge badge-primary">{{$char}}</a>
                                @for($i=17;$i>10 ;$i--)
                                    @php($cell=\App\Models\String\Cell::where('code',$char.sprintf('%02d', $i))->first())
                                    <a title="{{isset($cell) && $cell->string_group_id ? $cell->weight. "\n" . $cell->string_group->title : '' }}"
                                       class="badge badge-{{ isset($cell) && $cell->string_group_id ? 'secondary' : 'danger'}}">
                                        {{sprintf('%02d', $i) }}</a>
                                @endfor
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row starter-main">
            <div class="container-fluid">
                <div class="card">
                    انبار موقت
                    <div class="card-body">
                        <div class="pt-4">
                            @foreach(range('A', 'N') as $char)
                                <a class="badge badge-primary"> {{$char}} </a>
                            @endforeach
                        </div>
                        @for($i=1;$i<8;$i++)
                            <div class="pt-4">
                                @foreach(range('A', 'N') as $char)
                                    @php($cell=\App\Models\String\Cell::where('code',$char.sprintf('%02d', $i))->first())
                                    <a title="{{isset($cell) && $cell->string_group_id ? $cell->weight. "\n" . $cell->string_group->title : '' }}"
                                       class="badge badge-{{ isset($cell) && $cell->string_group_id ? 'secondary' : 'danger'}}">
                                        {{sprintf('%02d', $i) }}</a>
                                @endforeach
                            </div>
                        @endfor
                        <div class="pt-4">
                            @foreach(range('A', 'N') as $char)
                                <a class="badge badge-primary"> {{sprintf('%2s', $char)}} </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('js')
    <script>
    </script>
@endsection

