<div class="row">
    <div class="form-group col-12 col-sm-6 col-md-4">
        <label  for="day">{{__('panel.material')}}
            <span class="required">*</span>
        </label>
        <select name="string_material_id" class="form-control form-select">
            @foreach($materials as $material)
                <option  {{ isset($item) && $item->string_material_id == $material->id ? 'selected' : '' }} value="{{$material->id}}">{{ $material->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-12 col-sm-6 col-md-4">
        <label  for="day">{{__('panel.color')}}
            <span class="required">*</span>
        </label>
        <select name="string_color_id" class="form-control form-select">
            @foreach($colors as $color)
                <option  {{ isset($item) && $item->string_color_id == $color->id ? 'selected' : '' }} value="{{$color->id}}">{{ $color->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-12 col-sm-6 col-md-4">
        <label  for="day">{{__('panel.grade')}}
            <span class="required">*</span>
        </label>
        <select name="string_grade_id" class="form-control form-select">
            @foreach($grades as $grade)
                <option  {{ isset($item) && $item->string_grade_id == $grade->id ? 'selected' : '' }} value="{{$grade->id}}">{{ $grade->value}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-12 col-sm-6 col-md-4">
        <label  for="day">{{__('panel.order_point')}}
            <span class="required">*</span>
        </label>
        <input type="text" id="value" name="value"
               value="{{old('value',isset($item) ? $item->value : '')}}" class="form-control">
    </div>


</div>
