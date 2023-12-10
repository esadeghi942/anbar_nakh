<div class="row">
    <div class="form-group col-12 col-sm-6 col-md-4">
        <label for="day">{{__('panel.anbar')}}
            <span class="required">*</span>
        </label>
        <select name="string_anbar_id" id="anbar" autocomplete="off" class="form-control form-select">
            <option></option>
            @foreach($anbars as $anbar)
                <option
                    {{ isset($item) && $item->string_anbar_id == $anbar->id ? 'selected' : '' }} value="{{$anbar->id}}">{{$anbar->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-12 col-sm-6 col-md-4">
        <label for="day">{{__('panel.cell')}}
            <span class="required">*</span>
        </label>
        <select name="string_cell_id" id="cell" class="form-control form-select">
            @foreach($cells as $cell)
                <option data-parent="{{$cell->string_anbar_id}}"
                        {{ isset($item) && $item->string_cell_id == $cell->id ? 'selected' : '' }} value="{{$cell->id}}">{{ $cell->code}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-12 col-sm-6 col-md-4">
        <label for="day">{{__('panel.material')}}
            <span class="required">*</span>
        </label>
        <select name="string_material_id" class="form-control form-select">
            @foreach($materials as $material)
                <option
                    {{ isset($item) && $item->string_material_id == $material->id ? 'selected' : '' }} value="{{$material->id}}">{{ $material->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-12 col-sm-6 col-md-4">
        <label class="col-sm-3 form-label text-lg-start" for="type">نوع</label>
        <div class="m-checkbox-inline">
            <div class="radio radio-theme">
                <input type="radio" name="type" id="type_1" value="pallet">
                <label for="type_1">پالت آک</label>
            </div>

            <div class="radio radio-theme">
                <input type="radio" name="type" id="type_2" value="pocket">
                <label for="type_2">گونی آک</label>
            </div>

            <div class="radio radio-theme">
                <input type="radio" name="type" id="type_3" value="used">
                <label for="type_3">مصرف شده</label>
            </div>
        </div>
    </div>

    <div class="form-group col-12 col-sm-6 col-md-4">
        <label for="day">{{__('panel.color')}}
            <span class="required">*</span>
        </label>
        <select name="string_color_id" class="form-control form-select">
            @foreach($colors as $color)
                <option
                    {{ isset($item) && $item->string_color_id == $color->id ? 'selected' : '' }} value="{{$color->id}}">{{ $color->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-12 col-sm-6 col-md-4">
        <label for="day">{{__('panel.grade')}}
            <span class="required">*</span>
        </label>
        <select name="string_grade_id" class="form-control form-select">
            @foreach($grades as $grade)
                <option
                    {{ isset($item) && $item->string_grade_id == $grade->id ? 'selected' : '' }} value="{{$grade->id}}">{{ $grade->value}}</option>
            @endforeach
        </select>
    </div>


    <div class="form-group col-12 col-sm-6 col-md-4">
        <label for="day">{{__('panel.layer')}}
            <span class="required">*</span>
        </label>
        <select name="string_layer_id" class="form-control form-select">
            @foreach($layers as $layer)
                <option
                    {{ isset($item) && $item->string_layer_id == $layer->id ? 'selected' : '' }} value="{{$layer->id}}">{{ $layer->value}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-12 col-sm-6 col-md-4">
        <label for="day">{{__('panel.seller')}}
            <span class="required">*</span>
        </label>
        <select name="seller_id" class="form-control form-select">
            @foreach($sellers as $seller)
                <option
                    {{ isset($item) && $item->seller_id == $seller->id ? 'selected' : '' }} value="{{$seller->id}}">{{ $seller->name}}</option>
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
