<span class="d-flex gap-1 justify-content-end">
<?php if (app('laratrust')->hasPermission('Edit Menu')) : ?>
<a href="<?php echo e(route('menus.edit', $menu->id)); ?>" class="btn btn-sm btn-info" data-bs-toggle="tooltip"
title="<?php echo e(__('Edit')); ?>">
    <i class="ti ti-pencil"></i>
</a>
<?php endif; // app('laratrust')->permission ?>
<?php if (app('laratrust')->hasPermission('Delete Menu')) : ?>
<?php echo Form::open(['method' => 'DELETE', 'route' => ['menus.destroy', $menu->id], 'class' => 'd-inline']); ?>

<button type="button" class="btn btn-sm btn-danger show_confirm" data-bs-toggle="tooltip" data-confirm="<?php echo e(__('Are You Sure?')); ?>"
data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>" data-text-yes="<?php echo e(__('Yes')); ?>" data-text-no="<?php echo e(__('No')); ?>" 
title="<?php echo e(__('Delete')); ?>">
    <i class="ti ti-trash"></i>
</button>
<?php echo Form::close(); ?>

<?php endif; // app('laratrust')->permission ?>
</span><?php /**PATH B:\xampp\htdocs\ecommers\resources\views/menu/action.blade.php ENDPATH**/ ?>