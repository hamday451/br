<table class="order-history-tbl">
    <thead>
        <tr>
            <th scope="col"><?php echo e(__('Product')); ?></th>
            <th scope="col"><?php echo e(__('Name')); ?></th>
            <th scope="col"><?php echo e(__('date')); ?></th>
            <th scope="col"><?php echo e(__('Price')); ?></th>
            <th scope="col"><?php echo e(__('Total')); ?></th>
            <th scope="col"><?php echo e(__('Action')); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php if(count($wishlists) > 0): ?>
            <?php $__currentLoopData = $wishlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wishlist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $p_id = $wishlist->ProductData->id;
                ?>
                <tr>
                    <td data-label="Product">
                        <a href="<?php echo e(route('page.product',[$slug,$wishlist->ProductData->slug])); ?>">
                            <img src="<?php echo e(asset($wishlist->ProductData->cover_image_path)); ?>">
                        </a>
                    </td>
                    <td data-label="Name">
                        <a href="<?php echo e(route('page.product',[$slug,$p_id])); ?>"><?php echo e(!empty($wishlist->ProductData) ? $wishlist->ProductData->name : ''); ?></a>
                        <div class="product-option">
                            <dt><?php echo e(!empty($wishlist->GetVariant) ? $wishlist->GetVariant->variant : ''); ?></dt>
                        </div>
                    </td>
                    <td data-label="date"><?php echo e($wishlist->created_at->format('d M, Y ')); ?></td>
                    <td data-label="Price">
                        <?php echo e($currency_icon.$wishlist->ProductData->price); ?>

                    </td>
                    <td data-label="Total">
                        <?php echo e($currency_icon.$wishlist->ProductData->sale_price); ?>

                    </td>
                    <td data-label="Action">
                        <a href="javascript:void(0)" class="btn btn-sm btn-primary me-2 ">
                        <i class="ti ti-trash text-white py-1 delete_wishlist" data-id="<?php echo e($wishlist->id); ?>" data-bs-toggle="tooltip" title="delete"></i> </a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <tr>
                <td colspan="6"><h2><?php echo e(__('No records found')); ?></h2></td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<?php if(isset($wishlists) && $wishlists->total() > 10): ?>
<div class="right-result-tbl text-right">
    <?php if(isset($wishlists)): ?>
    <b>Showing <?php echo e($wishlists->firstItem()); ?></b> to <?php echo e($wishlists->lastItem()); ?> of <?php echo e($wishlists->currentPage()); ?> (<?php echo e($wishlists->lastPage()); ?> Pages)
    <?php endif; ?>
</div>
<div class="form-container">
    <div class="d-flex acc-back-btn-wrp align-items-center justify-content-end">
        <?php
            $previousPageUrl = '';
            $nextPageUrl = '';
            if (isset($wishlists) && $wishlists->currentPage() < 1) {
                $previousPageUrl = $wishlists->previousPageUrl();
            }
            if (isset($wishlists) && $wishlists->lastPage() > 1 && $wishlists->currentPage() != $wishlists->lastPage()) {
                $nextPageUrl = $wishlists->nextPageUrl();
            }
        ?>
        <button class="btn-secondary back-btn-acc" onclick="get_wishlist('<?php echo e($previousPageUrl); ?>')">
            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="14" viewBox="0 0 35 14" fill="none">
                <path d="M25.0749 14L35 7L25.0805 0L29.12 6.06667H0V7.93333H29.12L25.0749 14Z"></path>
            </svg>
            <?php echo e(__('Back')); ?>

        </button>
        <button class="btn continue-btn" onclick="get_wishlist('<?php echo e($nextPageUrl); ?>')">
            <?php echo e(__('Next')); ?>

            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="14" viewBox="0 0 35 14" fill="none">
                <path d="M25.0749 14L35 7L25.0805 0L29.12 6.06667H0V7.93333H29.12L25.0749 14Z"></path>
            </svg>
        </button>
    </div>
</div>
<?php endif; ?><?php /**PATH B:\xampp\htdocs\ecommers\resources\views/front_end/sections/wish_list.blade.php ENDPATH**/ ?>