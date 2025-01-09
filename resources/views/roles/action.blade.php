<span class="d-flex gap-1 justify-content-end">
@permission('Edit Role')
    <button class="btn btn-sm btn-info btn-badge"
        data-url="{{ route('roles.edit', $role->id) }}" data-size="xl"
        data-ajax-popup="true" data-title="{{ __('Edit Roles') }}"  data-bs-toggle="tooltip"
        title="{{ __('Edit') }}">
        <i class="ti ti-pencil"></i>
    </button>
@endpermission
@permission('Delete Role')
{!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'class' => 'd-inline']) !!}
    <button type="button" class="btn btn-sm btn-danger show_confirm btn-badge"  data-confirm="{{ __('Are You Sure?') }}"
    data-text="{{ __('This action can not be undone. Do you want to continue?') }}" data-text-yes="{{ __('Yes') }}" data-text-no="{{ __('No') }}"  data-bs-toggle="tooltip"
    title="{{ __('Delete') }}">
        <i class="ti ti-trash"></i>
    </button>
    {!! Form::close() !!}
@endpermission
</span>