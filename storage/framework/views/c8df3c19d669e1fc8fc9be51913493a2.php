<?php if(!empty($product->custom_field)): ?>
    <?php $__currentLoopData = json_decode($product->custom_field, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="pdp-detail d-flex  align-items-center">
            <b><?php echo e($item['custom_field']); ?> :</b>
            <span class="lbl"><?php echo e($item['custom_value']); ?></span>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?><?php /**PATH B:\xampp\htdocs\ecommers\resources\views/front_end/common/product/custom_filed.blade.php ENDPATH**/ ?>