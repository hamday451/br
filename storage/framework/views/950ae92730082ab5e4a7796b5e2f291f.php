<section class="loved-product padding-top" style="position: relative;<?php if(isset($option) && $option->is_hide == 1): ?> opacity: 0.5; <?php else: ?> opacity: 1; <?php endif; ?>" data-index="<?php echo e($option->order ?? ''); ?>" data-id="<?php echo e($option->order ?? ''); ?>" data-value="<?php echo e($option->id ?? ''); ?>" data-hide="<?php echo e($option->is_hide ?? ''); ?>" data-section="<?php echo e($option->section_name ?? ''); ?>"  data-store="<?php echo e($option->store_id ?? ''); ?>" data-theme="<?php echo e($option->theme_id ?? ''); ?>">
<div class="custome_tool_bar"></div>
    <div class="container">
        <div class="section-title d-flex align-items-start justify-content-between">
            <div class="left-side">
                <h2 class="title" id="<?php echo e($section->product->section->title->slug ?? ''); ?>_preview"><?php echo $section->product->section->title->text ?? ''; ?></h2>
                <div class="section-desc">
                    <p id="<?php echo e($section->product->section->description->slug ?? ''); ?>_preview"><?php echo $section->product->section->description->text ?? ''; ?></p>
                </div>
            </div>
            <a href="<?php echo e(route('page.product-list',  ['storeSlug' => $slug])); ?>" class="btn" id="<?php echo e($section->product->section->button->slug ?? ''); ?>_preview">
            <?php echo e($section->product->section->button->text ?? ''); ?>

                <svg xmlns="http://www.w3.org/2000/svg" width="4" height="6" viewBox="0 0 4 6" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M0.65976 0.662719C0.446746 0.879677 0.446746 1.23143 0.65976 1.44839L2.18316 3L0.65976 4.55161C0.446747 4.76856 0.446747 5.12032 0.65976 5.33728C0.872773 5.55424 1.21814 5.55424 1.43115 5.33728L3.34024 3.39284C3.55325 3.17588 3.55325 2.82412 3.34024 2.60716L1.43115 0.662719C1.21814 0.445761 0.872773 0.445761 0.65976 0.662719Z"
                        fill="white"></path>
                </svg>
            </a>
        </div>
        <div class="row row-gap">
        <?php echo \App\Models\MainCategory::HomePageBestCategory($currentTheme, $slug, $section, 4); ?>


        </div>
    </div>
</section><?php /**PATH B:\xampp\htdocs\ecommers\themes\grocery\views/front_end/sections/homepage/product_section.blade.php ENDPATH**/ ?>