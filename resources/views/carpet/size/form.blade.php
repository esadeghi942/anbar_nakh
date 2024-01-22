<div class="row">
    <div class="form-group col-12 col-sm-6 col-md-4">
        <label class="control-label" for="day">{{__('panel.size 1')}}
            <span class="required">*</span>
        </label>
        <input type="number" id="size1" name="size1" autocomplete="off"
               value="{{old('size1',isset($data) ? $data->size1 : '')}}" class="form-control">
    </div>
    <div class="form-group col-12 col-sm-6 col-md-4">
        <label class="control-label" for="day">{{__('panel.size 2')}}
            <span class="required">*</span>
        </label>
        <input type="number" id="size2" name="size2" autocomplete="off"
               value="{{old('size2',isset($data) ? $data->size2 : '')}}" class="form-control">
    </div>

</div>
