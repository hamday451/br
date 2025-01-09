
<?php $__currentLoopData = $best_seller_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
    <div class="category-card">
        <div class="category-img">
            <img src="<?php echo e(get_file($category->image_path ?? '', $currentTheme)); ?>" alt="bakers">
        </div>
        <div class="category-card-body">
            <div class="title-wrapper">
                <h3 class="title"><?php echo e($category->name); ?></h3>
            </div>
            <p>

            </p>
            <div class="btn-wrapper">
                <a href="<?php echo e(route('page.product-list', [$slug, 'main_category' => $category->id])); ?>" class="btn"
                    id="<?php echo e(($section->category->section->button_second->slug ?? '')); ?>_preview">
                    <?php echo $section->category->section->button_second->text ?? ""; ?> <svg
                        xmlns="http://www.w3.org/2000/svg" width="4" height="6" viewBox="0 0 4 6" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M0.65976 0.662719C0.446746 0.879677 0.446746 1.23143 0.65976 1.44839L2.18316 3L0.65976 4.55161C0.446747 4.76856 0.446747 5.12032 0.65976 5.33728C0.872773 5.55424 1.21814 5.55424 1.43115 5.33728L3.34024 3.39284C3.55325 3.17588 3.55325 2.82412 3.34024 2.60716L1.43115 0.662719C1.21814 0.445761 0.872773 0.445761 0.65976 0.662719Z"
                            fill="white"></path>
                    </svg></a>
            </div>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH B:\xampp\htdocs\ecommers\themes\grocery\views/front_end/sections/homepage/category_slider.blade.php ENDPATH**/ ?>