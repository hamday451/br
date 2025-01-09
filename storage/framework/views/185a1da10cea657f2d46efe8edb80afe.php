<?php if(module_is_active('ProductPricing') && isset($item->sale_price)): ?>
    <ins><?php echo e(currency_format_with_sym($item->sale_price, $store->id, $currentTheme)); ?>

    </ins><del><?php echo e(currency_format_with_sym($item->total_orignal_price, $store->id, $currentTheme) ?? SetNumberFormat($item->total_orignal_price)); ?></del>
<?php else: ?>
    <ins><?php echo e(currency_format_with_sym($item->final_price, $store->id, $currentTheme)); ?>

    </ins><del><?php echo e(currency_format_with_sym($item->total_orignal_price, $store->id, $currentTheme)); ?></del>
<?php endif; ?>
<?php /**PATH B:\xampp\htdocs\ecommers\resources\views/front_end/hooks/manage_cart_price.blade.php ENDPATH**/ ?>