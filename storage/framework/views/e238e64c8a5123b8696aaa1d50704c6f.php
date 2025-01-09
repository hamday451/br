<span class="d-flex gap-1 justify-content-end">
    <?php if(($customer && $customer->id) || $activityLogEntry): ?>
        <a href="<?php echo e(route('customer.timeline', $customer->id)); ?>"
            class="btn btn-sm btn-icon btn-warning"
            data-bs-placement="top" data-bs-toggle="tooltip" title="<?php echo e(__('Show')); ?>">
            <i class="ti ti-eye"></i>
        </a>
    <?php endif; ?>
    <?php if (app('laratrust')->hasPermission('Show Customer')) : ?>
        <a href="<?php echo e(route('customer.show', $customer->id)); ?>"
            class="btn btn-sm btn-icon btn-info" data-bs-placement="top" data-bs-toggle="tooltip" title="<?php echo e(__('Cart')); ?>">
            <i class="ti ti-shopping-cart"></i>
        </a>
    <?php endif; // app('laratrust')->permission ?>
    <?php if(module_is_active('RewardClubPoint')): ?>
        <?php echo $__env->make('reward-club-point::admin.clubPointHistoryBtn', ['customerId' => $customer->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
</span><?php /**PATH B:\xampp\htdocs\ecommers\resources\views/customer/action.blade.php ENDPATH**/ ?>