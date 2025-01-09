<span class="d-flex gap-1 justify-content-end">
<?php if (app('laratrust')->hasPermission('Edit Page')) : ?>
<button class="btn btn-sm btn-info" data-url="<?php echo e(route('pages.edit', $page->id)); ?>" data-size="lg" data-ajax-popup="true" data-title="<?php echo e(__('Edit Page')); ?>" data-bs-toggle="tooltip"
title="<?php echo e(__('Edit')); ?>">
    <i class="ti ti-pencil"></i>
</button>
<?php endif; // app('laratrust')->permission ?>
<?php if (app('laratrust')->hasPermission('Delete Page')) : ?>
<?php echo Form::open(['method' => 'DELETE', 'route' => ['pages.destroy', $page->id], 'class' => 'd-inline']); ?>

<button type="button" class="btn btn-sm btn-danger show_confirm" data-bs-toggle="tooltip" data-confirm="<?php echo e(__('Are You Sure?')); ?>"
data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>" data-text-yes="<?php echo e(__('Yes')); ?>" data-text-no="<?php echo e(__('No')); ?>" 
title="<?php echo e(__('Delete')); ?>">
    <i class="ti ti-trash"></i>
</button>
<?php echo Form::close(); ?>

<?php endif; // app('laratrust')->permission ?>
</span><?php /**PATH B:\xampp\htdocs\ecommers\resources\views/page/action.blade.php ENDPATH**/ ?>