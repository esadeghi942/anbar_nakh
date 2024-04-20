@extends('layouts.panel')
@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    {{__('panel.edit item',['item'=>__('panel.map')])}}
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
                        <form method="post" action="{{route('carpet.map.update',$data)}}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            @include('carpet.BaseForm')
                            <div class="row my-2">
                                <div class="form-group col-6 col-sm-6 col-md-4">
                                    <label class="control-label" for="day">{{__('panel.image_map')}}
                                        <span class="required">*</span>
                                    </label>
                                    <input value="" type="file" id="imageInput" name="image" autocomplete="off" class="form-control">
                                </div>
                                <div class="form-group col-6 col-sm-6 col-md-4">
                                    <img id="imagePreview" src="{{  $data->image_path }}">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success mt-3">{{__('panel.save')}}</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var imageInput = document.getElementById('imageInput');
            var imagePreview = document.getElementById('imagePreview');

            // بارگذاری تصویر قبلی در صورت وجود
            imageInput.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        imagePreview.setAttribute('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });
    </script>
@endsection
