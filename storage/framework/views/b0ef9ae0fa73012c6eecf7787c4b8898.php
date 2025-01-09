<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale()) ?? 'en'); ?>">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author"
        content="Style - The Impressive Fashion Shopify Theme complies with contemporary standards. Meet The Most Impressive Fashion Style Theme Ever. Well Toasted, and Well Tested.">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
    <title><?php echo $__env->yieldContent('page-title'); ?>
        </title>
    <meta name="base-url" content="<?php echo e(URL::to('/')); ?>">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <?php echo metaKeywordSetting($metakeyword ?? '',$metadesc ?? '',$metaimage ?? '',$slug); ?>


    <link rel="shortcut icon"
    href="<?php echo e(get_file((isset($theme_favicon) && !empty($theme_favicon)) ? $theme_favicon : 'themes/' . $currentTheme  . '/assets/images/Favicon.png', $currentTheme)); ?>" type="image/x-icon">
   <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
        <link
        href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=Outfit:wght@100;200;300;400;500;600;700;800;900&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <?php if($currantLang == 'ar' || $currantLang == 'he'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('themes/' . $currentTheme .  '/assets/css/rtl-main-style.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('themes/' . $currentTheme .  '/assets/css/rtl-responsive.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('css/rtl-custom.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/css/rtl-customizer.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/rtl-floating-wpp.min.css')); ?>">

    <?php else: ?>
        <link rel="stylesheet" href="<?php echo e(asset('themes/' . $currentTheme .  '/assets/css/main-style.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('themes/' . $currentTheme .  '/assets/css/responsive.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('css/custom.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/css/customizer.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/floating-wpp.min.css')); ?>">
    <?php endif; ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/fonts/fontawesome.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/notifier.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/tabler-icons.min.css')); ?>">




    <link rel="stylesheet" href="<?php echo e(asset('public/assets/fonts/feather.css')); ?>">
    
    <meta name="mobile-wep-app-capable" content="yes">
    <meta name="apple-mobile-wep-app-capable" content="yes">
    <meta name="msapplication-starturl" content="/">
    <link rel="apple-touch-icon" href="<?php echo e(get_file((isset($theme_favicon) && !empty($theme_favicon)) ? $theme_favicon : 'themes/' . $currentTheme  . '/assets/images/Favicon.png', $currentTheme)); ?>">
    <?php if($store->enable_pwa_store == 'on'): ?>
        <link rel="manifest"
            href="<?php echo e(asset('storage/uploads/customer_app/store_' . $store->id . '/manifest.json')); ?>" />
    <?php endif; ?>
    <?php if(!empty($store->pwa_store($store->slug)->theme_color)): ?>
        <meta name="theme-color" content="<?php echo e($store->pwa_store($store->slug)->theme_color); ?>" />
    <?php endif; ?>
    <?php if(!empty($store->pwa_store($store->slug)->background_color)): ?>
        <meta name="apple-mobile-web-app-status-bar"
            content="<?php echo e($store->pwa_store($store->slug)->background_color); ?>" />
    <?php endif; ?>
    <style>
        <?php echo $storecss ?? ''; ?>

    </style>
    <?php echo $__env->yieldPushContent('page-style'); ?>
</head>

<body>
    <?php if(isset($pixelScript)): ?>
        <?php $__currentLoopData = $pixelScript; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $script): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?= $script ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

    <?php echo $__env->yieldContent('content'); ?>

    <!--scripts start here-->
    <script src="<?php echo e(asset('themes/' . $currentTheme . '/assets/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('themes/' . $currentTheme . '/assets/js/slick.min.js')); ?>" defer="defer"></script>
    <script src="<?php echo e(asset('themes/' . $currentTheme . '/assets/js/slick-lightbox.js')); ?>" defer="defer"></script>
     <?php if($currantLang == 'ar' || $currantLang == 'he'): ?>
    <script src="<?php echo e(asset('themes/' . $currentTheme . '/assets/js/rtl-custom.js')); ?>" defer="defer"></script>
    <?php else: ?>
    <script src="<?php echo e(asset('themes/' . $currentTheme . '/assets/js/custom.js')); ?>" defer="defer"></script>
    <?php endif; ?>
    <!-- Include jQuery Validation plugin from a CDN -->
    <script src="<?php echo e(asset('assets/js/jquery.validate.min.js')); ?>"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="<?php echo e(asset('assets/js/floating-wpp.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/plugins/notifier.js')); ?>"></script>
    <script src="<?php echo e(asset('js/custom.js')); ?>" defer="defer"></script>
    <script src="<?php echo e(asset('public/assets/js/plugins/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/plugins/feather.min.js')); ?>"></script>
    <!--Theme Routes Script-->
    <?php echo $__env->make('front_end.jQueryRoute', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--scripts end here-->
   <?php if($message = Session::get('success')): ?>
        <script>
            var site_url = $('meta[name="base-url"]').attr('content');
            notifier.show('Success', '<?php echo $message; ?>', 'success', site_url +
                '/public/assets/images/notification/ok-48.png', 4000);
        </script>
    <?php endif; ?>

    <?php if($message = Session::get('error')): ?>
        <script>
            var site_url = $('meta[name="base-url"]').attr('content');
            notifier.show('Error', '<?php echo $message; ?>', 'danger', site_url +
                '/public/assets/images/notification/high_priority-48.png', 4000);
        </script>
    <?php endif; ?>
    <?php echo $__env->yieldPushContent('page-script'); ?>
</body>
</html>
<?php /**PATH B:\xampp\htdocs\ecommers\themes\grocery\views/front_end/layouts/app.blade.php ENDPATH**/ ?>