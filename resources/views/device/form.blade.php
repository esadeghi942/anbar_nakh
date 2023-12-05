<div class="row">
    <div class="form-group col-12 col-sm-6 col-md-4">
        <label class="control-label" for="day">{{__('panel.name')}}
            <span class="required">*</span>
        </label>
        <input type="text" id="name" name="name"
               value="{{old('name',isset($data) ? $data->name : '')}}" class="form-control">
    </div>
</div>
