{{ Form::open(['route' => 'blog.store', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}

@if (isset(auth()->user()->currentPlan) && auth()->user()->currentPlan->enable_chatgpt == 'on')
    <div class="mb-1 d-flex justify-content-end">
        <a href="#" class="btn btn-primary me-2 ai-btn btn-badge" data-size="lg" data-ajax-popup-over="true"
            data-url="{{ route('generate', ['blog']) }}" data-bs-toggle="tooltip" data-bs-placement="top"
            title="{{ __('Generate') }}" data-title="{{ __('Generate Content With AI') }}">
            <i class="fas fa-robot"></i> {{ __('Generate with AI') }}
        </a>
    </div>
@endif

<div class="row">
    <div class="form-group col-md-12">
        {!! Form::label('title', __('Title'), ['class' => 'form-label']) !!}
        {!! Form::text('title', old('title'), ['class' => 'form-control', 'required' => 'required', 'id' => 'title']) !!}
    </div>
    <div class="form-group col-md-12">
        {!! Form::label('short_description', __('Short Description'), ['class' => 'form-label']) !!}
        {!! Form::text('short_description', old('short_description'), [
            'class' => 'form-control',
            'required' => 'required',
            'id' => 'short_description'
        ]) !!}
    </div>
    <div class="form-group col-md-12">
        {!! Form::label('content', __('Content'), ['class' => 'form-label']) !!}
        {!! Form::textarea('content', old('content'), ['class' => 'form-control  summernote-simple-product', 'rows' => 1, 'id' => 'content']) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('category_id', __('Category'), ['class' => 'form-label']) !!}
        {!! Form::select('category_id', $blogCategoryList, old('category_id'), [
            'class' => 'form-control select category',
            'data-role' => 'tagsinput',
            'id' => 'category_id',
            'name' => 'category_id',
            'placeholder' => 'Select Option',
        ]) !!}
    </div>

    <div class="form-group col-md-5">
        {!! Form::label('upload_cover_image', __('Cover Image'), ['class' => 'form-label']) !!}
        <label for="upload_cover_image" class="image-upload bg-primary pointer w-100">
            <i class="px-1 ti ti-upload"></i> {{ __('Choose File Here') }}
        </label>
        <input type="file" name="cover_image" id="upload_cover_image" class="d-none">
    </div>
</div>

<div class="pb-0 modal-footer">
    <input type="button" value="{{__('Cancel')}}" class="btn btn-secondary btn-badge" data-bs-dismiss="modal">
    <input type="submit" value="{{__('Create')}}" class="btn btn-primary btn-badge mx-1">
</div>
</div>
{!! Form::close() !!}
