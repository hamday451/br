<?php if(module_is_active('ProductPricing') && isset($item['sale_price'])): ?>
<?php echo e(currency_format_with_sym($item['sale_price'] ?? 0, $store->id, $store->theme_id) ?? SetNumberFormat($item['sale_price'])); ?>

<?php else: ?>
<?php echo e(currency_format_with_sym($item['final_price'] ?? 0, $store->id, $store->theme_id) ?? SetNumberFormat($item['final_price'])); ?>

<?php endif; ?>

<?php /**PATH B:\xampp\htdocs\ecommers\resources\views/front_end/hooks/manage_product_price.blade.php ENDPATH**/ ?>