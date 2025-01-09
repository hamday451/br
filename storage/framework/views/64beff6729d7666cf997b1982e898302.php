<?php if(isset($product->is_sale_enable) && $product->is_sale_enable == true): ?>
    <ins class="product_final_price"> <?php echo currency_format_with_sym(\App\Models\Product::ProductPrice($currentTheme, $slug, $product->id,$product->variant_id,($product->sale_price ?? $product->price)), $store->id, $currentTheme); ?></ins>
    <?php if(!empty($product->sale_price)): ?>
        <del class="product_orignal_price"> <?php echo currency_format_with_sym(\App\Models\Product::ProductPrice($currentTheme, $slug, $product->id,$product->variant_id,$product->price), $store->id, $currentTheme); ?></del>
    <?php endif; ?>
<?php else: ?> 
    <?php if(!empty($product->sale_price) && $product->sale_price < $product->price): ?>
        <ins class="product_final_price"> <?php echo currency_format_with_sym(\App\Models\Product::ProductPrice($currentTheme, $slug, $product->id,$product->variant_id,$product->sale_price), $store->id, $currentTheme); ?></ins>
        <del class="product_orignal_price"> <?php echo currency_format_with_sym(\App\Models\Product::ProductPrice($currentTheme, $slug, $product->id,$product->variant_id,$product->price), $store->id, $currentTheme); ?></del>
    <?php else: ?>
        <ins class="product_final_price"> <?php echo currency_format_with_sym(\App\Models\Product::ProductPrice($currentTheme, $slug, $product->id,$product->variant_id,$product->price), $store->id, $currentTheme); ?></ins>
    <?php endif; ?>
<?php endif; ?><?php /**PATH B:\xampp\htdocs\ecommers\resources\views/front_end/hooks/product_price.blade.php ENDPATH**/ ?>