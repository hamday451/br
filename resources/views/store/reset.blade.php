{{Form::model($user,array('route' => array('stores.reset.password.update', $user->id), 'method' => 'post')) }}
<div class="row">
    <div class="form-group col-12">
        {{ Form::label('password', __('Password'),array('class'=>'form-label'))}}
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Enter Password') }}" required autocomplete="new-password">
        @error('password')
        <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
           </span>
        @enderror
    </div>
    <div class="form-group col-12">
        {{ Form::label('password_confirmation', __('Confirm Password'),array('class'=>'form-label'))}}
        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="{{ __('Enter Confirm Password') }}" required autocomplete="new-password">
    </div>
</div>
<div class="modal-footer pb-0">
    <input type="button" value="{{__('Cancel')}}" class="btn btn-secondary btn-badge" data-bs-dismiss="modal">
    <input type="submit" value="{{__('Update')}}" class="btn btn-primary btn-badge mx-1">
</div>

{{ Form::close() }}