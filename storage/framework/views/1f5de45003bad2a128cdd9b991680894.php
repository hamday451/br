<?php
    $logo = asset(Storage::url('uploads/logo/'));
    $company_logo = \App\Models\Utility::GetLogo();
    $company_logo = get_file($company_logo, APP_THEME());
?>
<!-- [ Pre-loader ] start -->
<div class="loader-bg">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
</div>

<!-- [ Pre-loader ] End -->
<!-- [ navigation menu ] start -->
<?php if(isset($setting['cust_theme_bg']) && $setting['cust_theme_bg'] == 'on'): ?>
<nav class="dash-sidebar light-sidebar transprent-bg">
    <?php else: ?>
<nav class="dash-sidebar light-sidebar">
<?php endif; ?>
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="<?php echo e(route('dashboard')); ?>" class="b-brand">
                <!-- ========   change your logo hear   ============ -->
               <img src="<?php echo e(isset($company_logo) && !empty($company_logo) ? $company_logo . '?timestamp=' . time() : $logo . '/logo-dark.svg' . '?timestamp=' . time()); ?>"
                alt="" class="logo logo-lg" />
            </a>
        </div>

        <div class="navbar-content">
            <ul class="dash-navbar">
                <?php echo getMenu(); ?>


            </ul>
        </div>
    </div>
</nav>
<!-- [ navigation menu ] end -->
<?php /**PATH B:\xampp\htdocs\ecommers\resources\views/partision/sidebar.blade.php ENDPATH**/ ?>