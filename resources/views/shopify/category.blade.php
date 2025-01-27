

@extends('layouts.app')

@section('page-title', __('Main Category'))

@section('action-button')
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">{{ __('Main Category') }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <h5></h5>
                    <div class="table-responsive">
                        <table class="table dataTable">
                            <thead>
                                <tr>
                                    <th>{{ __('Cover Image') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th class="text-end">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category['custom_collections'] as $key => $cat_data)
                                        <tr>
                                            <td> <img src="{{ !empty($cat_data['image']) ? get_file($cat_data['image']['src'], APP_THEME()) : asset(Storage::url('uploads/woocommerce.png')) }}" alt=""
                                                width="100" class="cover_img"> </td>
                                            <td> {{ $cat_data['title'] }} </td>
                                            <td class="text-end">
                                                @if ( in_array($cat_data['id'],$upddata))
                                                @permission('Edit Shopify Category')
                                                    <a href="{{ route('shopify_category.edit', $cat_data['id']) }}"  class="btn btn-sm btn-info"
                                                        data-title="{{ __('Sync Again') }}" data-bs-toggle="tooltip" title="{{ __('Sync Again')}}">
                                                        <i class="ti ti-refresh" ></i>
                                                    </a>
                                                @endpermission
                                                @else
                                                @permission('Create Shopify Category')
                                                    <a href="{{ route('shopify_category.show', $cat_data['id']) }}" class="btn btn-sm btn-primary"
                                                        data-title="{{__('Add main-category')}}"
                                                        data-bs-toggle="tooltip" title="{{ __('Add Category') }}">
                                                        <i class="ti ti-plus"></i>
                                                    </a>
                                                @endpermission
                                                @endif
                                            </td>
                                        </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
