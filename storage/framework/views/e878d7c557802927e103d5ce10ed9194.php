<?php
$store = \Cache::remember("store_{$slug}", now()->addMinutes(30), function () use ($slug) {
                        return \App\Models\Store::where('slug', $slug)->first();
                    });
?>
<?php if(module_is_active('QuickCheckout')): ?>
    <?php
        $enable_quick_checkout =  \App\Models\Utility::GetValueByName('enable_quick_checkout',$store->theme_id, $store->id);
    ?>
    <?php if(isset($enable_quick_checkout) && $enable_quick_checkout == 'on'): ?>
        <?php echo $__env->make('quick-checkout::theme.button', ['product_slug' => $product->slug ?? null, 'slug' => $slug ?? null, 'currentTheme' => $currentTheme], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php endif; ?>
<?php if(module_is_active('SkipCart')): ?>
    <?php
        $enable_skip_cart =  \App\Models\Utility::GetValueByName('enable_skip_cart',$currentTheme, $store->id);
    ?>
    <?php if(isset($enable_skip_cart) && $enable_skip_cart == 'on'): ?>
        <?php echo $__env->make('skip-cart::theme.skip_cart_button', ['product_slug' => $product->slug ?? null, 'slug' => $slug ?? null, 'currentTheme' => $currentTheme], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php endif; ?>

<?php /**PATH B:\xampp\htdocs\ecommers\resources\views/front_end/hooks/card_button.blade.php ENDPATH**/ ?>