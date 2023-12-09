<div class="row">
    <div class="form-group col-12 col-sm-6 col-md-4">
        <label  for="day">{{__('panel.order_point')}}
            <span class="required">*</span>
        </label>
        <input type="text" id="order_pointer" name="order_pointer"
               value="{{old('order_pointer',isset($item) ? $item->order_pointer : '')}}" class="form-control">
    </div>
    <div class="form-group col-12 col-sm-6 col-md-4">
        <label class="col-sm-3 form-label text-lg-start" for="active">نوع</label>
        <div class="m-checkbox-inline">
            <div class="radio radio-theme">
                <input type="radio" {{old('active',isset($item) && $item->active == 2 ? 'checked' : '')}} name="active" id="active_2" value="2">
                <label for="active_2">راکد</label>
            </div>

            <div class="radio radio-theme">
                <input type="radio" name="active" {{old('active',isset($item) && $item->active == 1 ? 'checked' : '')}} id="active_1" value="1">
                <label for="active_1">فعال</label>
            </div>
        </div>
    </div>

</div>
