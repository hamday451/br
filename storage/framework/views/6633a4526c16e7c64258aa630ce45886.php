<?php echo $__env->yieldPushContent("BadgeView"); ?>
<?php $__currentLoopData = $latestSales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productId => $saleData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="custom-output">
        <div class="option">
            <?php if($saleData['discount_type'] == 'flat'): ?>
                -<?php echo e($saleData['discount_amount']); ?><?php echo e($currency_icon ?? '$'); ?>

            <?php elseif($saleData['discount_type'] == 'percentage'): ?>
                -<?php echo e($saleData['discount_amount']); ?>%
            <?php endif; ?>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH B:\xampp\htdocs\ecommers\resources\views/front_end/sections/product_sales.blade.php ENDPATH**/ ?>