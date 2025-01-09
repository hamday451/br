<?php if(module_is_active('ProductBarCode')): ?>
<?php
    $enable_product_barcode = \App\Models\Utility::GetValueByName('enable_product_barcode', $store->theme_id, $store->id);
?>
    <?php if(isset($enable_product_barcode) && $enable_product_barcode == 'on'): ?>
        <?php echo $__env->make('product-bar-code::pages.qrcode', ['product_id' => $item->product_id ?? null ,'slug' => $slug ?? null], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php endif; ?>
<?php /**PATH B:\xampp\htdocs\ecommers\resources\views/front_end/hooks/cart_table_body.blade.php ENDPATH**/ ?>