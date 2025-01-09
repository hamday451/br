 {{Form::model($productBrand, array('route' => array('product-brand.update', $productBrand->id), 'method' => 'PUT', 'enctype' => 'multipart/form-data')) }}

<div class="row">
<div class="form-group  col-md-12">
        {!! Form::label('', __('Name'), ['class' => 'form-label']) !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'true', 'id' => 'name', 'placeholder' => 'Enter Brand Name']) !!}
    </div>
    <div class="form-group col-md-12">
        <div class="row">
            <div class="col-md-6">
            <label for="brand_logo">
            {!! Form::label('', __('Image'), ['class' => 'form-label']) !!}
                <div class="image-upload bg-primary pointer w-100 logo_update"> <i
                        class="ti ti-upload px-1"></i>{{ __('Choose File Here') }}
                </div>
                <input type="file" class="form-control file d-none"
                    name="logo" id="brand_logo"
                    data-filename="logo_update"
                    onchange="document.getElementById('brandLogo').src = window.URL.createObjectURL(this.files[0])">
            </label>
            </div>
            <div class="logo-content mt-3 col-md-6">
                <img src="{{ get_file($productBrand->logo, APP_THEME()) }}"
                        class="big-logo invoice_logo img_setting" id="brandLogo" width="200px">
            </div>
        </div>
    </div>

    <div class="form-group col-md-6 d-flex align-items-center gap-2">
        {!! Form::label('', __('Status'), ['class' => 'form-label me-2']) !!}
        <div class="form-check form-switch">
            <input type="hidden" name="status" value="0">
            {!! Form::checkbox('status', 1, null, [
                'class' => 'form-check-input status mb-1',
                'id' => 'status',
            ]) !!}
            <label class="form-check-label" for="status"></label>
        </div>
    </div>

    <div class="form-group col-md-6 d-flex align-items-center gap-2">
        {!! Form::label('', __('Is Popular'), ['class' => 'form-label me-2']) !!}
        <div class="form-check form-switch">
            <input type="hidden" name="is_popular" value="0">
            {!! Form::checkbox("is_popular", 1, null, ["class" => "form-check-input input-primary mb-1", "id"=>"customCheckdef1popular"]) !!}
            <label class="form-check-label" for="customCheckdef1popular"></label>
        </div>
    </div>
    <div class="modal-footer pb-0">
        <input type="button" value="{{__('Cancel')}}" class="btn btn-badge btn-secondary" data-bs-dismiss="modal">
        <input type="submit" value="{{__('Update')}}" class="btn btn-badge btn-primary mx-1">
    </div>
</div>
{!! Form::close() !!}