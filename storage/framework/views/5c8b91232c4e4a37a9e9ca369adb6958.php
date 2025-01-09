<table class="order-history-tbl">
    <thead>
        <tr>
            <th scope="col"><?php echo e(__('Order ID')); ?></th>
            <th scope="col"><?php echo e(__('Order Date')); ?></th>
            <th scope="col"><?php echo e(__('Reward point')); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php if(count($orders) > 0): ?>
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $order_data = $Order->order_detail($Order->id); ?>
                <tr>
                    <td> <?php echo e($order_data['order_id']); ?> </td>
                    <td> <?php echo e($order_data['delivery_date']); ?> </td>
                    <td> <?php echo e($order_data['order_reward_point']); ?> </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <tr>
                <td colspan="3"><h2><?php echo e(__('No records found')); ?></h2></td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<?php if(isset($orders) && $orders->total() > 10): ?>
<div class="right-result-tbl text-right">
    <?php if(isset($orders)): ?>
    <b>Showing <?php echo e($orders->firstItem()); ?></b> to <?php echo e($orders->lastItem()); ?> of <?php echo e($orders->currentPage()); ?> (<?php echo e($orders->lastPage()); ?> Pages)
    <?php endif; ?>
</div>
<div class="form-container">
    <div class="d-flex acc-back-btn-wrp align-items-center justify-content-end">
        <?php
            $previousPageUrl = '';
            $nextPageUrl = '';
            if (isset($orders) && $orders->currentPage() < 1) {
                $previousPageUrl = $orders->previousPageUrl();
            }
            if (isset($orders) && $orders->lastPage() > 1 && $orders->currentPage() != $orders->lastPage()) {
                $nextPageUrl = $orders->nextPageUrl();
            }
        ?>
        <button class="btn-secondary back-btn-acc" onclick="get_reward('<?php echo e($previousPageUrl); ?>')">
            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="14" viewBox="0 0 35 14" fill="none">
                <path d="M25.0749 14L35 7L25.0805 0L29.12 6.06667H0V7.93333H29.12L25.0749 14Z"></path>
            </svg>
            <?php echo e(__('Back')); ?>

        </button>
        <button class="btn continue-btn" onclick="get_reward('<?php echo e($nextPageUrl); ?>')">
            <?php echo e(__('Next')); ?>

            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="14" viewBox="0 0 35 14" fill="none">
                <path d="M25.0749 14L35 7L25.0805 0L29.12 6.06667H0V7.93333H29.12L25.0749 14Z"></path>
            </svg>
        </button>
    </div>
</div>
<?php endif; ?><?php /**PATH B:\xampp\htdocs\ecommers\resources\views/front_end/sections/reward_list.blade.php ENDPATH**/ ?>