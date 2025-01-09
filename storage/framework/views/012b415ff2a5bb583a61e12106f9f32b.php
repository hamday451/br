<?php if(module_is_active('ProductPricing') && isset($item->sale_price)): ?>
    <li><?php echo e($item->qty); ?> <?php echo e($item->name); ?>

        (<?php echo e(currency_format_with_sym($item->sale_price, $store->id, $currentTheme) ?? SetNumberFormat($item->sale_price)); ?>)
    </li>
<?php else: ?>
    <li><?php echo e($item->qty); ?> <?php echo e($item->name); ?>

        (<?php echo e(currency_format_with_sym($item->final_price, $store->id, $currentTheme) ?? SetNumberFormat($item->final_price)); ?>)
    </li>
<?php endif; ?>
<?php /**PATH B:\xampp\htdocs\ecommers\resources\views/front_end/hooks/manage_checkout_product_price.blade.php ENDPATH**/ ?>