<div class="row">
    <div class="form-group col-12 col-sm-6 col-md-3">
        <label for="day">{{__('panel.material')}}
            <span class="required">*</span>
        </label>
        <select name="string_material_id" class="form-control form-select">
            @foreach($materials as $material)
                <option
                    {{ old('string_material_id') == $material->id ? 'selected' : '' }} value="{{$material->id}}">{{ $material->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-12 col-sm-6 col-md-3">
        <label for="day">{{__('panel.color')}}
            <span class="required">*</span>
        </label>
        <select name="string_color_id" class="form-control form-select">
            @foreach($colors as $color)
                <option
                    {{ old('string_color_id') == $color->id ? 'selected' : '' }} value="{{$color->id}}">{{ $color->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-12 col-sm-6 col-md-3">
        <label for="day">{{__('panel.grade')}}
            <span class="required">*</span>
        </label>
        <select name="string_grade_id" class="form-control form-select">
            @foreach($grades as $grade)
                <option
                    {{ old('string_grade_id') == $grade->id ? 'selected' : '' }} value="{{$grade->id}}">{{ $grade->value}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-12 col-sm-6 col-md-3">
        <label for="day">{{__('panel.layer')}}
        </label>
        <select name="string_layer_id" class="form-control form-select">
            @foreach($layers as $layer)
                <option
                    {{ old('string_layer_id') == $layer->id ? 'selected' : '' }} value="{{$layer->id}}">{{ $layer->value}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-12 col-sm-6 col-md-4">
        <label for="day">{{__('panel.seller')}}
        </label>
        <select name="seller" class="form-control form-select">
            <option></option>
            @foreach($sellers as $seller)
                <option
                    {{ old('seller_id') == $seller->id ? 'selected' : '' }} value="{{$seller->id}}">{{ $seller->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-12 col-sm-6 col-md-4">
        <label for="day">{{__('panel.lat')}}
            <span class="required">*</span>
        </label>
        <input type="text" id="lat" name="lat"
               value="{{ old('lat','وارد نشده') }}" class="form-control persian-date-picker">
    </div>


</div>
