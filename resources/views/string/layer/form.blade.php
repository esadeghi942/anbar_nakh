<div class="row">
    <div class="form-group col-12 col-sm-6 col-md-4">
        <label class="control-label" for="day">{{__('panel.layer')}}
            <span class="required">*</span>
        </label>
        <input type="text" id="value" name="value"
               value="{{old('value',isset($layer) ? $layer->value : '')}}" class="form-control">
    </div>


</div>
