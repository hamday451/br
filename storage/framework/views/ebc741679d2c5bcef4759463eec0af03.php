<table class="order-history-tbl">
    <thead>
        <tr>
            <th scope="col"> <?php echo e(__('Order ID')); ?></th>
            <th scope="col"> <?php echo e(__('Order Date')); ?></th>
            <th scope="col"> <?php echo e(__('Product')); ?></th>
            <th scope="col"> <?php echo e(__('Refund Status')); ?></th>
            <th scope="col"> <?php echo e(__('Refund Reason')); ?></th>
            <th scope="col"> <?php echo e(__('Action')); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php if(count($order_refunds)): ?>
            <?php $__currentLoopData = $order_refunds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $order_refund): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $order_data = \App\Models\Order::find($order_refund->order_id);
                    $product_refund_ids = json_decode($order_refund->product_refund_id, true);
                ?>
                <tr>
                    <td><?php echo e($order_data->product_order_id); ?> </td>
                    <td><?php echo e($order_data->delivery_date); ?> </td>
                    <td>
                        <?php $__currentLoopData = $product_refund_ids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_refund_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $product = json_decode($order_data->product_json, true);
                                $matching_product = null;
                                foreach ($product as $item) {
                                    if ($item['product_id'] == $product_refund_id['product_refund_id']) {
                                        $matching_product = $item;
                                        break;
                                    }
                                }
                            ?>
                            <?php if($matching_product): ?>
                                <?php echo e($matching_product['name']); ?><br>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                    <td> <?php echo e($order_refund->refund_status); ?> </td>
                    <?php if($order_refund->refund_reason != 'Other'): ?>
                        <td> <?php echo e($order_refund->refund_reason); ?> </td>
                    <?php else: ?>
                        <td><?php echo e($order_refund->custom_refund_reason); ?></td>
                    <?php endif; ?>
                    <td>
                        <button class="btn btn-sm btn-primary me-2"
                                data-url="<?php echo e(route('order.refund', [$store->slug, $order_refund->id])); ?>"
                                data-size="lg"
                                data-ajax-popup="true"
                                data-title="<?php echo e(__('Order Refund')); ?>">
                            <i class="ti ti-eye text-white py-1"></i>
                        </button>
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
<?php if(isset($order_refunds) && $order_refunds->total() > 10): ?>
<div class="right-result-tbl text-right">
    <b>Showing <?php echo e($order_refunds->firstItem()); ?></b> to <?php echo e($order_refunds->lastItem()); ?> of <?php echo e($order_refunds->currentPage()); ?> (<?php echo e($order_refunds->lastPage()); ?> Pages)
</div>

<div class="form-container">
    <div class="d-flex acc-back-btn-wrp align-items-center justify-content-end">
        <?php
            $previousPageUrl = '';
            $nextPageUrl = '';
            if ($order_refunds->currentPage() < 1) {
                $previousPageUrl = $order_refunds->previousPageUrl();
            }
            if ($order_refunds->lastPage() > 1 && $order_refunds->currentPage() != $order_refunds->lastPage()) {
                $nextPageUrl = $order_refunds->nextPageUrl();
            }
        ?>
        <button class="btn-secondary back-btn-acc" onclick="get_order('<?php echo e($previousPageUrl); ?>')">
            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="14" viewBox="0 0 35 14" fill="none">
                <path d="M25.0749 14L35 7L25.0805 0L29.12 6.06667H0V7.93333H29.12L25.0749 14Z"></path>
            </svg>
            <?php echo e(__('Back')); ?>

        </button>
        <button class="btn continue-btn" onclick="get_order('<?php echo e($nextPageUrl); ?>')">
            <?php echo e(__('Next')); ?>

            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="14" viewBox="0 0 35 14" fill="none">
                <path d="M25.0749 14L35 7L25.0805 0L29.12 6.06667H0V7.93333H29.12L25.0749 14Z"></path>
            </svg>
        </button>
    </div>
</div>
<?php endif; ?><?php /**PATH B:\xampp\htdocs\ecommers\resources\views/front_end/sections/order_return_list.blade.php ENDPATH**/ ?>