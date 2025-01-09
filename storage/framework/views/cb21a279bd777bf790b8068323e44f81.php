<span class="d-flex gap-1 justify-content-end">
<button class="btn btn-sm btn-info" data-url="<?php echo e(route('product-brand.edit', $brand->id)); ?>" data-size="md"
    data-ajax-popup="true" data-title="<?php echo e(__('Edit Brand')); ?>" data-bs-toggle="tooltip"
    title="<?php echo e(__('Edit')); ?>">
    <i class="ti ti-pencil"></i>
</button>
<?php echo Form::open([
    'method' => 'DELETE',
    'route' => ['product-brand.destroy', $brand->id],
    'class' => 'd-inline',
]); ?>

<button type="button" class="btn btn-sm btn-danger show_confirm" data-bs-toggle="tooltip" data-confirm="<?php echo e(__('Are You Sure?')); ?>"
data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>" data-text-yes="<?php echo e(__('Yes')); ?>" data-text-no="<?php echo e(__('No')); ?>" 
title="<?php echo e(__('Delete')); ?>">
    <i class="ti ti-trash"></i>
</button>
<?php echo Form::close(); ?>

</span><?php /**PATH B:\xampp\htdocs\ecommers\resources\views/product_brand/action.blade.php ENDPATH**/ ?>