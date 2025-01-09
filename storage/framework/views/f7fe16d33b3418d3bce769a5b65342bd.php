<?php if(!empty($product_review)): ?>
<div class="pdp-review-box d-flex justify-content-between w-100">
    <div class="pdp-review-left">
        <p><?php echo e(strip_tags($product_review->description)); ?></p>
    </div>
    <div class="review-star-pdp text-right">
        <div class="review-wrapper">
            <?php for($i = 0; $i < 5; $i++): ?>
                <i class="ti ti-star <?php echo e($i < $product_review->rating_no ? 'text-warning' : ''); ?> "></i>
            <?php endfor; ?>
            <span><?php echo e($product_review->rating_no); ?>.0 / 5.0</span>
        </div>
        <p><?php echo e(!empty($product_review->UserData) ? ($product_review->UserData->first_name ? ($product_review->UserData->first_name .',') : '') : ''); ?> Client</p>
    </div>
</div>
<?php endif; ?>
<?php /**PATH B:\xampp\htdocs\ecommers\themes\grocery\views/front_end/sections/pages/product_review.blade.php ENDPATH**/ ?>