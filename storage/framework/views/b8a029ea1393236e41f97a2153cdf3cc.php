<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-lg-4 col-xl-4 col-md-4 col-sm-6 col-12 product-card">
        <div class="product-card-inner">
            <div class="product-card-image">
                <a href="<?php echo e(url($slug.'/product/'.$product->slug)); ?>">
                    <img src="<?php echo e(get_file($product->cover_image_path,$currentTheme)); ?>" class="default-img">
                    <?php if($product->Sub_image($product->id)['status'] == true): ?>
                        <img src="<?php echo e(get_file($product->Sub_image($product->id)['data'][0]->image_path,$currentTheme)); ?>"
                            class="hover-img">
                    <?php else: ?>
                        <img src="<?php echo e(get_file($product->Sub_image($product->id),$currentTheme)); ?>" class="hover-img">
                    <?php endif; ?>
                </a>
                <a href="javascript:void(0)" class="wishlist-btn wishbtn-globaly" tabindex="0"
                    product_id="<?php echo e($product->id); ?>"
                    in_wishlist="<?php echo e($product->in_whishlist ? 'remove' : 'add'); ?>">
                    <i class="<?php echo e($product->in_whishlist ? 'fa fa-heart' : 'ti ti-heart'); ?>"></i>
                </a>
                <?php echo \App\Models\Product::actionLinks($currentTheme, $slug, $product); ?>

            </div>

            <?php echo \App\Models\Product::productSalesPage($currentTheme, $slug, $product->id); ?>


            <div class="product-content">
                <div class="product-content-top">
                    <div class="product-type"><?php echo e(ucfirst($product->label->name ?? '')); ?></div>
                    <h3 class="product-title">
                        <a href="<?php echo e(url($slug.'/product/'.$product->slug)); ?>">
                            <?php echo e($product->name); ?>

                        </a>
                    </h3>
                    <div class="reviews-stars-wrap">
                        <div class="reviews-stars-outer">
                            <?php for($i = 0; $i < 5; $i++): ?>
                                <i
                                    class="ti ti-star review-stars <?php echo e($i < $product->average_rating ? 'text-warning' : ''); ?> "></i>
                            <?php endfor; ?>

                        </div>
                        <div class="point-wrap">
                            <span class="review-point"><?php echo e($product->average_rating); ?>.0 / <span>5.0</span></span>
                        </div>
                    </div>
                </div>

                <div class="product-content-bottom">
                    <?php if($product->variant_product == 0): ?>
                        <div class="price">
                        <?php echo \App\Models\Product::getProductPrice ($product, $store, $currentTheme); ?>

                        </div>
                    <?php else: ?>
                        <div class="price">
                            <ins><?php echo e(__('In Variant')); ?></ins>
                        </div>
                    <?php endif; ?>
                    <button class="addtocart-btn btn   addcart-btn-globaly" tabindex="0"
                        product_id="<?php echo e($product->id); ?>" variant_id="0" qty="1">
                        <span> <?php echo e($section->common_page->section['cart_button']['text'] ?? __('Add to cart')); ?> </span>
                        <svg viewBox="0 0 10 5">
                            <path
                                d="M2.37755e-08 2.57132C-3.38931e-06 2.7911 0.178166 2.96928 0.397953 2.96928L8.17233 2.9694L7.23718 3.87785C7.07954 4.031 7.07589 4.28295 7.22903 4.44059C7.38218 4.59824 7.63413 4.60189 7.79177 4.44874L9.43039 2.85691C9.50753 2.78197 9.55105 2.679 9.55105 2.57146C9.55105 2.46392 9.50753 2.36095 9.43039 2.28602L7.79177 0.69418C7.63413 0.541034 7.38218 0.544682 7.22903 0.702329C7.07589 0.859976 7.07954 1.11192 7.23718 1.26507L8.1723 2.17349L0.397965 2.17336C0.178179 2.17336 3.46059e-06 2.35153 2.37755e-08 2.57132Z">
                            </path>
                        </svg>
                    </button>
                    <?php echo \App\Models\Product::ProductcardButton($currentTheme, $slug, $product); ?>

                </div>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php
$page_no = !empty($page) ? $page : 1;
?>
<div class="d-flex justify-content-end col-12">
    <nav class="dataTable-pagination">
        <ul class="dataTable-pagination-list">
            <li class="pagination">
                <?php echo e($products->onEachSide(0)->links('pagination::bootstrap-4')); ?>

            </li>
        </ul>
    </nav>
</div>
<?php /**PATH B:\xampp\htdocs\ecommers\themes\grocery\views/front_end/sections/pages/product_list_filter.blade.php ENDPATH**/ ?>