@extends('layouts.panel')
@section('css')
    <style>
        .form-group {
            margin-top: 10px !important;
        }

        .badge {
            width: 51px;
            font-size: 1rem !important;
            padding: 0.35rem !important;
            background-color: #de0909;
        }

        .badge-Acrylic {
            background-color: #FFbd00;
        }

        .badge-Viscose {
            background-color: #390099;
        }

        .badge-Polyester {
            background-color: #FF0054;
        }

        .badge-PoudPanbe {
            background-color: #FF5400;
        }

        .badge-empty {
            background-color: #dadada;
        }
        .badge-PolyCheSup,.badge-Chel {
            background-color: #31862BFF;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h4> انبار نخ اصلی</h4>
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
        <div class="row starter-main">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div style="margin: auto; width: fit-content">
                            <div class="pt-4">
                                <a class="badge badge-Acrylic" style="width: 100px; !important;">
                                    اکریلیک
                                </a>
                                <a class="badge badge-Viscose" style="width: 100px; !important;">
                                    ویسکوز
                                </a>
                                <a class="badge badge-Polyester" style="width: 100px; !important;">
                                    پلی استر
                                </a>
                                <a class="badge badge-PoudPanbe" style="width: 100px; !important;">
                                    پود پنبه
                                </a>
                                <a class="badge badge-PolyCheSup" style="width: 100px; !important;">
                                    چله
                                </a>
                                <a class="badge" style="width: 100px; !important;">
                                   سایر
                                </a>
                                <a class="badge badge-empty" style="width: 100px; !important;">
                                    خالی
                                </a>

                            </div>
                        </div>

                        <div style="margin: auto; width: fit-content">
                            @for($i=11;$i<16;$i++)
                                <div class="pt-4">
                                    @foreach(range('A', 'M') as $char)
                                        @php($nameCell='M'.$char.sprintf('%02d', $i))
                                        @php($cell=\App\Models\String\Cell::where('code',$nameCell)->first())
                                        <a title="{{isset($cell) && $cell->string_group_id ? $cell->lat .$cell->string_group->title : '' }}"
                                           class="badge badge-{{ isset($cell) && $cell->string_group_id ?  $cell->string_group->string_material->en_name  : 'empty'}}">
                                            {{ $nameCell }}</a>
                                    @endforeach
                                </div>
                            @endfor

                            <div class="pt-4">
                                @foreach(range('A', 'M') as $char)
                                    <a class="badge badge-primary"> {{ $char }} </a>
                                @endforeach
                            </div>

                            @for($i=8;$i>0;$i--)
                                <div class="pt-4">
                                    @foreach(range('A', 'M') as $char)
                                        @php($nameCell='M'.$char.sprintf('%02d', $i))
                                        @php($cell=\App\Models\String\Cell::where('code',$nameCell)->first())
                                        <a title="{{isset($cell) && $cell->string_group_id ? $cell->lat. $cell->string_group->title: '' }}"
                                           class="badge badge-{{ isset($cell) && $cell->string_group_id ?  $cell->string_group->string_material->en_name  : 'empty'}}">
                                            {{ $nameCell }}</a>
                                    @endforeach
                                </div>
                            @endfor
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h4> انبار موقت</h4>
                </div>
            </div>
        </div>
        <div class="row starter-main">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div style="margin: auto; width: fit-content">
                            <div class="pt-4">
                                @foreach(range('A', 'N') as $char)
                                    <a class="badge badge-primary"> {{$char}} </a>
                                @endforeach
                            </div>
                            @for($i=1;$i<8;$i++)
                                <div class="pt-4">
                                    @foreach(range('A', 'N') as $char)
                                        @php($nameCell='T'.$char.sprintf('%02d', $i))
                                        @php($cell=\App\Models\String\Cell::where('code',$nameCell)->first())
                                        <a title="{{isset($cell) && $cell->string_group_id ? $cell->lat. $cell->string_group->title : '' }}"
                                           class="badge badge-{{ isset($cell) && $cell->string_group_id ?  $cell->string_group->string_material->en_name  : 'empty'}}">
                                            {{ $nameCell }}</a>
                                    @endforeach
                                </div>
                            @endfor
                            <div class="pt-4">
                                @foreach(range('A', 'N') as $char)
                                    <a class="badge badge-primary"> {{ $char }} </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h4> انبار CRP</h4>
                </div>
            </div>
        </div>
        <div class="row starter-main">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div style="margin: auto; width: fit-content">
                            <div class="pt-4">
                                @foreach(range('M', 'A') as $char)
                                    <a class="badge badge-primary"> {{$char}} </a>
                                @endforeach
                            </div>
                            @for($i=1;$i<9;$i++)
                                <div class="pt-4">
                                    @foreach(range('M', 'A') as $char)
                                        @php($nameCell='C'.$char.sprintf('%02d', $i))
                                        @php($cell=\App\Models\String\Cell::where('code',$nameCell)->first())
                                        <a title="{{isset($cell) && $cell->string_group_id ? $cell->lat. $cell->string_group->title : '' }}"
                                           class="badge badge-{{ isset($cell) && $cell->string_group_id ?  $cell->string_group->string_material->en_name  : 'empty'}}">
                                            {{ $nameCell }}</a>
                                    @endforeach
                                </div>
                            @endfor

                            <div class="pt-4">
                                @foreach(range('Z', 'N') as $char)
                                    <a class="badge badge-primary"> {{$char}} </a>
                                @endforeach
                            </div>
                            @for($i=1;$i<9;$i++)
                                <div class="pt-4">
                                    @foreach(range('Z', 'N') as $char)
                                        @php($nameCell='C'.$char.sprintf('%02d', $i))
                                        @php($cell=\App\Models\String\Cell::where('code',$nameCell)->first())
                                        <a title="{{isset($cell) && $cell->string_group_id ? $cell->lat. $cell->string_group->title : '' }}"
                                           class="badge badge-{{ isset($cell) && $cell->string_group_id ?  $cell->string_group->string_material->en_name  : 'empty'}}">
                                            {{ $nameCell }}</a>
                                    @endforeach
                                </div>
                            @endfor

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div style="margin: auto; width: fit-content">
                    <div class="pt-4">
                        @for($i=8;$i>0;$i--)
                            @php($nameCell='CND'.sprintf('%02d', $i))
                            @php($cell=\App\Models\String\Cell::where('code',$nameCell)->first())
                            <a title="{{isset($cell) && $cell->string_group_id ? $cell->lat. $cell->string_group->title : '' }}"
                               class="badge badge-{{ isset($cell) && $cell->string_group_id ?  $cell->string_group->string_material->en_name  : 'empty'}}">
                                {{ $nameCell }}</a>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
       {{--
         <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h4> سلول های ادغامی</h4>
                </div>
            </div>
        </div>
       <div class="row starter-main">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div style="margin: auto; width: fit-content">
                            <?php
                            foreach ($qr_code_qroups as $qr_code_qroup) {
                                $cells = App\Models\String\QrCodeCell::where('string_qr_code_id',$qr_code_qroup->string_qr_code_id)->get('string_cell_id');
                                echo $qr_code_qroup->string_qr_code->string_group_qr_code->string_group->title;
                                foreach ($cells as $cell) {
                                    echo '<div class="pt-4">
                                        <a class="badge badge-Acrylic" style="width: 100px; !important;">' . $cell->code .'</a></div>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>--}}
    </div>

@endsection
@section('js')

    <script>
        $(document).ready(function () {
            $('a:contains(MA11),a:contains(MB11),a:contains(MC11),a:contains(MA12),a:contains(MB12),a:contains(MC12)').css('background-color', 'black');
        });
    </script>
@endsection
