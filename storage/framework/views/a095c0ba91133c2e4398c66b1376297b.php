<span class="d-flex gap-1 justify-content-end">

<?php if (app('laratrust')->hasPermission('Edit Tag')) : ?>
    <button class="btn btn-sm btn-badge btn-info"
        data-url="<?php echo e(route('tag.edit', $tag->id)); ?>" data-size="md"
        data-ajax-popup="true" data-title="<?php echo e(__('Edit Tag')); ?>"  data-bs-toggle="tooltip"
        title="<?php echo e(__('Edit')); ?>">
        <i class="ti ti-pencil"></i>
    </button>
<?php endif; // app('laratrust')->permission ?>


<?php if (app('laratrust')->hasPermission('Delete Tag')) : ?>
    <?php echo Form::open(['method' => 'DELETE', 'route' => ['tag.destroy', $tag->id], 'class' => 'd-inline']); ?>

    <button type="button" class="btn btn-sm btn-danger btn-badge mr-1 show_confirm"  data-bs-toggle="tooltip" data-confirm="<?php echo e(__('Are You Sure?')); ?>"
    data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>" data-text-yes="<?php echo e(__('Yes')); ?>" data-text-no="<?php echo e(__('No')); ?>" 
    title="<?php echo e(__('Delete')); ?>">
        <i class="ti ti-trash"></i>
    </button>
    <?php echo Form::close(); ?>

<?php endif; // app('laratrust')->permission ?>
</span>
<?php /**PATH B:\xampp\htdocs\ecommers\resources\views/tag/action.blade.php ENDPATH**/ ?>