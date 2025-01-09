<?php
    $displaylang = App\Models\Utility::languages();
    if (auth()->user() && auth()->user()->language) {
        $currentLanguage = auth()->user() ? auth()->user()->language : 'en';
    } else {
        $currentLanguage = Cookie::get('LANGUAGE');
        if (empty($currentLanguage)) {
            $currentLanguage = auth()->user() ? auth()->user()->language : 'en';
        }
    }
?>

<?php if(isset($setting['cust_theme_bg']) && $setting['cust_theme_bg'] == 'on'): ?>
    <header class="dash-header transprent-bg">
<?php else: ?>
    <header class="dash-header">
<?php endif; ?>
<div class="header-wrapper">
    <div class="me-auto dash-mob-drp">
        <ul class="list-unstyled gap-2">
            <li class="dash-h-item mob-hamburger">
                <a href="#!" class="dash-head-link" id="mobile-collapse">
                    <div class="hamburger hamburger--arrowturn">
                        <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                        </div>
                    </div>
                </a>
            </li>
            <li class="dropdown dash-h-item drp-company">
                <a class="dash-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false">
                    <span class="theme-avtar">
                        <img alt="#" style="height:inherit;"
                            src="<?php echo e(!empty(auth()->user()->profile_image) && file_exists(auth()->user()->profile_image)  ? get_file(auth()->user()->profile_image) : asset(Storage::url('uploads/profile/avatar.png'))); ?>"
                            class="header-avtar">

                    </span>
                    <span class="hide-mob ms-2">
                        <?php if(!Auth::guest()): ?>
                            <?php echo e(__('Hi, ')); ?><?php echo e(!empty(Auth::user()) ? Auth::user()->name : ''); ?>!
                        <?php else: ?>
                            <?php echo e(__('Guest')); ?>

                        <?php endif; ?>
                    </span>
                    <i class="ti ti-chevron-down drp-arrow nocolor hide-mob"></i>
                </a>
                <div class="dropdown-menu dash-h-dropdown">

                    <a href="<?php echo e(route('profile')); ?>" class="dropdown-item">
                        <i class="ti ti-user"></i>
                        <span><?php echo e(__(' Profile')); ?></span>
                    </a>
                    <form method="POST" action="<?php echo e(route('logout')); ?>" id="form_logout">
                        <a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();"
                            class="dropdown-item">
                            <i class="ti ti-power"></i>
                            <?php echo csrf_field(); ?>
                            <?php echo e(__(' Log Out')); ?>

                        </a>
                    </form>
                </div>
            </li>
        </ul>
    </div>
    <div class="dash-center-drp">
        <ul class="list-unstyled exit-company-btn">
            <?php if (is_impersonating($guard = null)) : ?>
                <li class="dropdown dash-h-item">
                    <a class="dropdown-item dash-head-link dropdown-toggle arrow-none cust-btn bg-danger"
                        href="<?php echo e(route('exit.admin')); ?>"><i class="ti ti-ban"></i>
                        <?php echo e(__('Exit Admin Login')); ?>

                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
    <div class="dash-right-drp">
        <ul class="list-unstyled gap-1">

                <?php if(auth()->user() && auth()->user()->type == 'admin'): ?>
                    <li class="dropdown dash-h-item drp-language">
                        <a href="<?php echo e(route('stores.create')); ?>" class="dropdown-item dash-head-link dropdown-toggle arrow-none cust-btn bg-primary" data-size="lg">
                            <i class="ti ti-circle-plus"></i>
                            <span class="text-store"><?php echo e(__('Create New Store')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if(auth()->user() && auth()->user()->type == 'admin'): ?>
                    <li class="dash-h-item drp-language menu-lnk has-item">
                        <?php
                            $activeStore = getCurrentStore();
                            $store = \Cache::remember('store_' . $activeStore, 3600, function () use ($activeStore) {
                                return \App\Models\Store::find($activeStore);
                            });
                            $stores = auth()->user()->stores;
                        ?>
                        <a class="dash-head-link arrow-none me-0 cust-btn megamenu-btn bg-warning" data-bs-toggle="dropdown"
                            href="#" role="button" aria-haspopup="false" aria-expanded="false"
                            data-bs-placement="bottom" data-bs-original-title="Select Store">
                            <i class="ti ti-building-store"></i>
                            <span class="hide-mob"><?php echo e(ucfirst($store->name ?? '')); ?></span>
                            <i class="ti ti-chevron-down drp-arrow nocolor"></i>
                        </a>
                        <div class="dropdown-menu dash-h-dropdown dropdown-menu-end">
                            <input type="text" id="searchInput" class="form-control mb-2" placeholder="<?php echo e(__('Search...')); ?>">
                            <div id="storeList" style="max-height: 200px; overflow-y: auto;">
                                <?php if(auth()->user()->type == 'admin'): ?>
                                    <?php $__currentLoopData = $stores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($store->is_active): ?>
                                        <a href="<?php if($activeStore == $store->id): ?> # <?php else: ?> <?php echo e(route('change.store', $store->id)); ?> <?php endif; ?>"
                                            class="dropdown-item">
                                            <?php if($activeStore == $store->id): ?>
                                                <i class="ti ti-checks text-primary"></i>
                                            <?php endif; ?>
                                            <?php echo e(ucfirst($store->name)); ?>

                                        </a>
                                        <?php else: ?>
                                            <a href="#!" class="dropdown-item">
                                                <i class="ti ti-lock"></i>
                                                <span><?php echo e($store->name); ?></span>
                                                <?php if(isset(auth()->user()->type)): ?>
                                                    <?php if(auth()->user()->type == 'admin'): ?>
                                                        <span class="badge bg-dark"><?php echo e(__(auth()->user()->type)); ?></span>
                                                    <?php else: ?>
                                                        <span class="badge bg-dark"><?php echo e(__('Shared')); ?></span>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </a>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <?php $__currentLoopData = $user->stores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($store->is_active): ?>
                                            <a href="#"
                                                class="dropdown-item">
                                                <?php if($activeStore == $store->id): ?>
                                                    <i class="ti ti-checks text-primary"></i>
                                                <?php endif; ?>
                                                <?php echo e(ucfirst($store->name)); ?>

                                            </a>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </li>
                <?php endif; ?>

            <li class="dropdown dash-h-item drp-language">
                <a class="dash-head-link dropdown-toggle arrow-none me-0 bg-info" data-bs-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="ti ti-world nocolor"></i>
                    <span class="mx-1"><?php echo e(Str::upper($currentLanguage)); ?></span>
                    <i class="ti ti-chevron-down drp-arrow nocolor"></i>
                </a>

                <div class="dropdown-menu dash-h-dropdown dropdown-menu-end">
                    <?php $__currentLoopData = $displaylang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(isset($setting['disable_lang']) && str_contains($setting['disable_lang'], $key)): ?>
                            <?php unset($key); ?>
                            <?php continue; ?>
                        <?php endif; ?>
                        <a href="<?php echo e(route('change.language', $key)); ?>"
                            class="dropdown-item <?php echo e($currentLanguage == $key ? 'text-primary' : ''); ?>">
                            <span><?php echo e(Str::ucfirst($lang)); ?></span>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if(auth()->user() && auth()->user()->type == 'super admin'): ?>
                        <a href="<?php echo e(route('manage.language', [auth()->user()->language])); ?>"
                            class="dropdown-item border-top py-1 text-primary"><?php echo e(__('Manage Languages')); ?>

                        </a>
                    <?php endif; ?>
                </div>
            </li>
        </ul>
    </div>
</div>
</header>
<?php /**PATH B:\xampp\htdocs\ecommers\resources\views/partision/header.blade.php ENDPATH**/ ?>