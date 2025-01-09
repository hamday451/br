{{ Form::model($country, ['route' => ['countries.update', $country->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) }}
<div class="row">
<input type="hidden" name="country_active_tab" value="pills-country-tab">
    <div class="form-group col-md-12">
        {{ Form::label('name', __('Name'), ['class' => 'form-label']) }}
        {{ Form::text('name', null, ['class' => 'form-control font-style', 'placeholder' => 'Enter Country Name', 'required' => 'required']) }}
    </div>

    <div class="modal-footer pb-0">
        <input type="button" value="{{__('Cancel')}}" class="btn btn-badge btn-secondary" data-bs-dismiss="modal">
        <input type="submit" value="{{__('Update')}}" class="btn btn-badge btn-primary mx-1">
    </div>
</div>
{!! Form::close() !!}