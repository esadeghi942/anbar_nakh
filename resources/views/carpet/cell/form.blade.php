<div class="row">
    <div class="form-group col-12 col-sm-6 col-md-4">
        <label class="control-label" for="day">{{__('panel.anbar')}}
            <span class="required">*</span>
        </label>
        <select name="anbar_id" class="form-control form-select">
            @foreach($anbars as $anbar)
                <option {{ isset($cell) && $cell->anbar_id == $anbar->id ? 'selected' : '' }} value="{{$anbar->id}}">{{$anbar->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-12 col-sm-6 col-md-4">
        <label class="control-label" for="day">{{__('panel.customer')}}
            <span class="required">*</span>
        </label>
        <select name="customer_id" class="form-control form-select">
            @foreach($customers as $customer)
                <option {{ isset($cell) && $cell->customer_id == $customer->id ? 'selected' : '' }} value="{{$customer->id}}">{{$customer->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-12 col-sm-6 col-md-4">
        <label class="control-label" for="day">{{__('panel.code')}}
            <span class="required">*</span>
        </label>
        <input type="text" id="code" name="code"
               value="{{old('code',isset($cell) ? $cell->code : '')}}" class="form-control">
    </div>

    <div class="form-group col-12 col-sm-6 col-md-4">
        <label class="control-label" for="color">{{__('panel.color')}}
            <span class="required">*</span>
        </label>
        <input type="color" id="color" name="color"
               value="{{old('color',isset($cell) ? $cell->color : '')}}" class="form-control">
    </div>


</div>
