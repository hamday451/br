<div class="product-btn-wrp">
    <?php
    $store = \Cache::remember("store_{$slug}", now()->addMinutes(30), function () use ($slug) {
                        return \App\Models\Store::where('slug', $slug)->first();
                    });
    ?>
    <?php if(module_is_active('ProductQuickView')): ?>
        <?php
            $enable_quickview = \App\Models\Utility::GetValueByName('enable_product_quickview', $store->theme_id, $store->id);
        ?>
        <?php if(isset($enable_quickview) && $enable_quickview == 'on'): ?>
            <?php echo $__env->make('product-quick-view::pages.button', ['product_slug' => $product->slug ?? null, 'slug' => $slug ?? null, 'currentTheme' => $currentTheme], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    <?php endif; ?>

    <?php if(module_is_active('ProductCompare')): ?>
        <?php
            $enable_compare = \App\Models\Utility::GetValueByName('enable_product_compare', $store->theme_id, $store->id);
        ?>
        <?php if(isset($enable_compare) && $enable_compare == 'on'): ?>
            <?php echo $__env->make('product-compare::pages.button', ['product_slug' => $product->slug ?? null, 'slug' => $slug ?? null, 'currentTheme' => $currentTheme], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    <?php endif; ?>


    <?php if(module_is_active('ProductsPDF')): ?>
        <?php
            $ProductsPDF_enable = \App\Models\Utility::GetValueByName('products_pdf_enable', $store->theme_id, $store->id);
        ?>
        <?php if(isset($ProductsPDF_enable) && $ProductsPDF_enable == 'on'): ?>

            <?php echo $__env->make('products-pdf::pages.button', ['product_slug' => $product->slug ?? null, 'slug' => $slug ?? null, 'currentTheme' => $currentTheme], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    <?php endif; ?>
    <?php if(module_is_active('ProductCSV')): ?>
        <?php
            $product_csvswich_is_enable = \App\Models\Utility::GetValueByName('product_csvswich_is_enable', $store->theme_id, $store->id);
        ?>
        <?php if(isset($product_csvswich_is_enable) && $product_csvswich_is_enable == 'on'): ?>
            <?php echo $__env->make('product-csv::pages.button', ['product_slug' => $product->slug ?? null, 'slug' => $slug ?? null, 'currentTheme' => $currentTheme], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    <?php endif; ?>
</div>
<?php /**PATH B:\xampp\htdocs\ecommers\resources\views/front_end/hooks/action_link.blade.php ENDPATH**/ ?>