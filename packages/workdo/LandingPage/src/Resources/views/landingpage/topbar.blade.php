@extends('layouts.app')
@section('page-title')
    {{ __('Landing Page') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item">{{__('Landing Page')}}</li>
@endsection

@php
    $logo=get_file('uploads/logo');
    $settings = \Workdo\LandingPage\Entities\LandingPageSetting::settings();
@endphp


@push('custom-script')

<script src="{{ asset('packages/workdo/LandingPage/src/Resources/assets/js/plugins/tinymce.min.js')}}" referrerpolicy="origin"></script>

<script>
  tinymce.init({
    selector: '#mytextarea',
    menubar: '',
  });
</script>

@endpush

@section('breadcrumb')
    <li class="breadcrumb-item">{{__('Landing Page')}}</li>
@endsection


@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xl-3">
                    <div class="card sticky-top" style="top:30px">
                        <div class="list-group list-group-flush" id="useradd-sidenav">
                            @include('landing-page::layouts.tab')
                        </div>
                    </div>
                </div>

                <div class="col-xl-9">
                {{--  Start for all settings tab --}}
                    {{Form::model(null, array('route' => array('landingpage.store'), 'method' => 'POST')) }}
                    @csrf
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <h5 class="mb-2">{{ __('Top Bar') }}</h5>
                                    </div>
                                    <div class="col switch-width text-end">
                                        <div class="form-group mb-0">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" data-toggle="switchbutton" data-onstyle="primary" class="" name="topbar_status"
                                                    id="topbar_status" {{ $settings['topbar_status'] == 'on' ? 'checked="checked"' : '' }}>
                                                <label class="custom-control-label" for="topbar_status"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-12">
                                        {{ Form::label('topbar_notification_msg', __('Message'), ['class' => 'form-label text-dark']) }}
                                        {{ Form::textarea('topbar_notification_msg',$settings['topbar_notification_msg'], ['class' => 'summernote-simple form-control', 'required' => 'required', 'id' => 'topbar_notification_msg']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <input class="btn btn-print-invoice btn-badge btn-primary mr-2" type="submit" value="{{ __('Save Changes') }}">
                            </div>
                        </div>
                    {{ Form::close() }}
                {{--  End for all settings tab --}}
                </div>
            </div>
        </div>
    </div>
@endsection