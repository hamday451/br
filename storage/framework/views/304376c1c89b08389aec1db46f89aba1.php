<section class="padding-bottom today-discounts"
    style="position: relative;<?php if(isset($option) && $option->is_hide == 1): ?> opacity: 0.5; <?php else: ?> opacity: 1; <?php endif; ?>"
    data-index="<?php echo e($option->order ?? ''); ?>" data-id="<?php echo e($option->order ?? ''); ?>" data-value="<?php echo e($option->id ?? ''); ?>"
    data-hide="<?php echo e($option->is_hide ?? ''); ?>" data-section="<?php echo e($option->section_name ?? ''); ?>"
    data-store="<?php echo e($option->store_id ?? ''); ?>" data-theme="<?php echo e($option->theme_id ?? ''); ?>">
    <div class="custome_tool_bar"></div>
    <div class="container">
        <div class="section-title d-flex align-items-center justify-content-between">
            <h2 class="title" id="<?php echo e($section->bestseller_slider->section->title->slug ?? ''); ?>_preview">
                <?php echo $section->bestseller_slider->section->title->text ?? ''; ?></h2>
            <a href="<?php echo e(route('page.product-list', ['storeSlug' => $slug])); ?>" class="btn"
                id="<?php echo e($section->bestseller_slider->section->button->slug ?? ''); ?>_preview">
                <?php echo $section->bestseller_slider->section->button->text ?? ''; ?>

                <svg xmlns="http://www.w3.org/2000/svg" width="4" height="6" viewBox="0 0 4 6" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M0.65976 0.662719C0.446746 0.879677 0.446746 1.23143 0.65976 1.44839L2.18316 3L0.65976 4.55161C0.446747 4.76856 0.446747 5.12032 0.65976 5.33728C0.872773 5.55424 1.21814 5.55424 1.43115 5.33728L3.34024 3.39284C3.55325 3.17588 3.55325 2.82412 3.34024 2.60716L1.43115 0.662719C1.21814 0.445761 0.872773 0.445761 0.65976 0.662719Z"
                        fill="white"></path>
                </svg>
            </a>
        </div>
        <div class="product-row today-discounts-slider">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="product-card">
                    <div class="product-card-inner">
                        <div class="product-card-image">
                            <a href="<?php echo e(url($slug . '/product/' . $item->slug)); ?>">
                                <img src="<?php echo e(get_file($item->cover_image_path, $currentTheme)); ?>" class="default-img">
                                <?php if($item->Sub_image($item->id)['status'] == true): ?>
                                    <img src="<?php echo e(get_file($item->Sub_image($item->id)['data'][0]->image_path ?? '', $currentTheme)); ?>"
                                        class="hover-img">
                                <?php else: ?>
                                    <img src="<?php echo e(get_file($item->Sub_image($item->id), $currentTheme)); ?>"
                                        class="hover-img">
                                <?php endif; ?>
                                <a href="javascript:void(0)" class="wishlist-btn wishbtn-globaly" tabindex="0"
                                    product_id="<?php echo e($item->id); ?>"
                                    in_wishlist="<?php echo e($item->in_whishlist ? 'remove' : 'add'); ?>">
                                    <i class="<?php echo e($item->in_whishlist ? 'fa fa-heart' : 'ti ti-heart'); ?>"></i>
                                </a>
                                <?php echo \App\Models\Product::actionLinks($currentTheme, $slug, $item); ?>

                            </a>
                        </div>

                        <?php echo \App\Models\Product::productSalesPage($currentTheme, $slug, $item->id); ?>


                        <div class="product-content">
                            <div class="product-content-top">
                                <div class="product-type"></div>
                                <h3 class="product-title">
                                    <a href="<?php echo e(url($slug . '/product/' . $item->slug)); ?>">
                                        <?php echo e($item->name); ?>

                                    </a>
                                </h3>
                                <div class="reviews-stars-wrap">
                                    <div class="reviews-stars-outer">
                                        <?php for($i = 0; $i < 5; $i++): ?>
                                            <i
                                                class="ti ti-star review-stars <?php echo e($i < $item->average_rating ? 'text-warning' : ''); ?> ">
                                            </i>
                                        <?php endfor; ?>
                                    </div>
                                    <div class="point-wrap">
                                        <span class="review-point"><?php echo e($item->average_rating); ?>.0 /
                                            <span>5.0</span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content-bottom">
                                <?php if($item->variant_product == 0): ?>
                                    <div class="price">
                                    <?php echo \App\Models\Product::getProductPrice ($item, $store, $currentTheme); ?>

                                    </div>
                                <?php else: ?>
                                    <div class="price">
                                        <ins><?php echo e(__('In Variant')); ?></ins>
                                    </div>
                                <?php endif; ?>
                                <button class="addtocart-btn btn   addcart-btn-globaly" tabindex="0"
                                    product_id="<?php echo e($item->id); ?>" variant_id="0" qty="1">
                                    <span> <?php echo e($section->common_page->section['cart_button']['text'] ?? __('Add to cart')); ?> </span>
                                    <svg viewBox="0 0 10 5">
                                        <path
                                            d="M2.37755e-08 2.57132C-3.38931e-06 2.7911 0.178166 2.96928 0.397953 2.96928L8.17233 2.9694L7.23718 3.87785C7.07954 4.031 7.07589 4.28295 7.22903 4.44059C7.38218 4.59824 7.63413 4.60189 7.79177 4.44874L9.43039 2.85691C9.50753 2.78197 9.55105 2.679 9.55105 2.57146C9.55105 2.46392 9.50753 2.36095 9.43039 2.28602L7.79177 0.69418C7.63413 0.541034 7.38218 0.544682 7.22903 0.702329C7.07589 0.859976 7.07954 1.11192 7.23718 1.26507L8.1723 2.17349L0.397965 2.17336C0.178179 2.17336 3.46059e-06 2.35153 2.37755e-08 2.57132Z">
                                        </path>
                                    </svg>
                                </button>
                                <?php echo \App\Models\Product::ProductcardButton($currentTheme, $slug, $item); ?>

                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        </div>
    </div>
    <div class="right-side-image">
        <img src=" <?php echo e(asset('themes/' . $currentTheme . '/assets/images/right-Warstwa.png')); ?>" alt="">
    </div>
</section>
<?php /**PATH B:\xampp\htdocs\ecommers\themes\grocery\views/front_end/sections/homepage/bestseller_slider_section.blade.php ENDPATH**/ ?>