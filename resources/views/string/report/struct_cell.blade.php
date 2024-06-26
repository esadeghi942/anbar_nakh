@extends('layouts.panel')
@section('css')
    <style>
        .form-group {
            margin-top: 10px !important;
        }

        .badge {
            width: 60px;
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

        .badge-PolyCheSup, .badge-Chel {
            background-color: #31862BFF;
        }


        .box-holder {
            display: flex;
            justify-content: space-between;
        }

        .column {
            flex-direction: column;
            width: fit-content !important;

        }

        .column a {
            margin-right: 0 !important;
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
                            @for($i=11;$i<18;$i++)
                                <div class="pt-4 row">
                                    @foreach(range('A', 'M') as $char)
                                        @php($nameCell='M'.$char.sprintf('%02d', $i))
                                        @php($nameCellU='MU'.$char.sprintf('%02d', $i))
                                        @php($cell=\App\Models\String\Cell::where('code',$nameCell)->first())
                                        @php($cellU=\App\Models\String\Cell::where('code',$nameCellU)->first())
                                        <div class="box-holder column">
                                            <a title="{{isset($cellU) && $cellU->string_group_id ? $cellU->lat .$cellU->string_group->title : '' }}"
                                               class="badge badge-{{ isset($cellU) && $cellU->string_group_id ?  $cellU->string_group->string_material->en_name  : 'empty'}}">
                                                {{ $nameCellU }}</a>
                                            <a title="{{isset($cell) && $cell->string_group_id ? $cell->lat .$cell->string_group->title : '' }}"
                                               class="badge badge-{{ isset($cell) && $cell->string_group_id ?  $cell->string_group->string_material->en_name  : 'empty'}}">
                                                {{ $nameCell }}</a>
                                        </div>
                                    @endforeach
                                </div>
                            @endfor

                            <div class="pt-4 row">
                                @foreach(range('A', 'M') as $char)
                                    <div class="box-holder column">
                                        <a class="badge badge-primary"> {{ $char }} </a>
                                    </div>
                                @endforeach
                            </div>

                            @for($i=8;$i>0;$i--)
                                <div class="pt-4 row">
                                    @foreach(range('A', 'M') as $char)
                                        @php($nameCell='M'.$char.sprintf('%02d', $i))
                                        @php($nameCellU='MU'.$char.sprintf('%02d', $i))
                                        @php($cell=\App\Models\String\Cell::where('code',$nameCell)->first())
                                        @php($cellU=\App\Models\String\Cell::where('code',$nameCellU)->first())
                                        <div class="box-holder column">
                                            <a title="{{isset($cellU) && $cellU->string_group_id ? $cellU->lat. $cellU->string_group->title: '' }}"
                                               class="badge badge-{{ isset($cellU) && $cellU->string_group_id ?  $cellU->string_group->string_material->en_name  : 'empty'}}">
                                                {{ $nameCellU }}</a>
                                            <a title="{{isset($cell) && $cell->string_group_id ? $cell->lat. $cell->string_group->title: '' }}"
                                               class="badge badge-{{ isset($cell) && $cell->string_group_id ?  $cell->string_group->string_material->en_name  : 'empty'}}">
                                                {{ $nameCell }}</a>
                                        </div>
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
                                @foreach(range('A', 'P') as $char)
                                    <a class="badge badge-primary"> {{$char}} </a>
                                @endforeach
                            </div>
                            @for($i=1;$i<10;$i++)
                                <div class="pt-4">
                                    @foreach(range('A', 'P') as $char)
                                        @php($nameCell='B'.$char.sprintf('%02d', $i))
                                        @php($cell=\App\Models\String\Cell::where('code',$nameCell)->first())
                                        <a title="{{isset($cell) && $cell->string_group_id ? $cell->lat. $cell->string_group->title : '' }}"
                                           class="badge badge-{{ isset($cell) && $cell->string_group_id ?  $cell->string_group->string_material->en_name  : 'empty'}}">
                                            {{ $nameCell }}</a>
                                    @endforeach
                                </div>
                            @endfor
                            <div class="pt-4">
                                @foreach(range('A', 'P') as $char)
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
                                @foreach(range('A', 'M') as $char)
                                    <a class="badge badge-primary"> {{$char}} </a>
                                @endforeach
                            </div>
                            @for($i=8;$i>0;$i--)
                                <div class="pt-4">
                                    @foreach(range('A', 'M') as $char)
                                        @php($nameCell='C'.$char.sprintf('%02d', $i))
                                        @php($cell=\App\Models\String\Cell::where('code',$nameCell)->first())
                                        <a title="{{isset($cell) && $cell->string_group_id ? $cell->lat. $cell->string_group->title : '' }}"
                                           class="badge badge-{{ isset($cell) && $cell->string_group_id ?  $cell->string_group->string_material->en_name  : 'empty'}}">
                                            {{ $nameCell }}</a>
                                    @endforeach
                                </div>
                            @endfor

                            <div class="pt-4">
                                @foreach(range('N', 'Z') as $char)
                                    <a class="badge badge-primary"> {{$char}} </a>
                                @endforeach
                            </div>
                            @for($i=8;$i>0;$i--)
                                <div class="pt-4">
                                    @foreach(range('N', 'Z') as $char)
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
            $('a:contains(MA11),a:contains(MA12),' +
                'a:contains(BB07),a:contains(BB08),a:contains(BB09),a:contains(BP01),a:contains(BO01),' +
                'a:contains(BA07),a:contains(BA08),a:contains(BA09),' +
                'a:contains(MUA11),a:contains(MUA12)').css('background-color', 'black');
            var range = alphabetRange("A", "Q");
            for (var i = 0; i < range.length; i++) {
                $('a:contains(B'+range[i]+'06)').css('background-color', 'black');
            }

            function alphabetRange (start, end) {
                return new Array(end.charCodeAt(0) - start.charCodeAt(0)).fill().map((d, i) => String.fromCharCode(i + start.charCodeAt(0)));
            }
        });
    </script>
@endsection
