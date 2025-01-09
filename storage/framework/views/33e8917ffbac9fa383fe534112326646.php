<?php if(module_is_active('ProductPricing') && isset($item->sale_price)): ?>
    <ins><?php echo e(currency_format_with_sym($item->sale_price, $store->id, $currentTheme) ?? SetNumberFormat($item->sale_price)); ?>

    </ins>
<?php else: ?>
    <ins><?php echo e(currency_format_with_sym($item->final_price, $store->id, $currentTheme) ?? SetNumberFormat($item->final_price)); ?>

    </ins>
<?php endif; ?>
<?php /**PATH B:\xampp\htdocs\ecommers\resources\views/front_end/hooks/manage_checkout_price.blade.php ENDPATH**/ ?>