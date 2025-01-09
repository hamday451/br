<table class="order-history-tbl">
    <thead>
        <tr>
            <th scope="col"><?php echo e(__('Order ID')); ?></th>
            <th scope="col"><?php echo e(__('Order Date')); ?></th>
            <th scope="col"><?php echo e(__('Product')); ?></th>
            <th scope="col"><?php echo e(__('Price')); ?></th>
            <th scope="col"> <?php echo e(__('Payment Type')); ?></th>
            <th scope="col"> <?php echo e(__('Delivered Status')); ?></th>
            <th class=""><?php echo e(__('Action')); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php if(count($orders)): ?>
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $order_data = $Order->order_detail($Order->id);
                    $store = \App\Models\Store::find($Order->store_id);
                ?>
                <tr>
                    <td> <?php echo e($order_data['order_id']); ?> </td>
                    <td> <?php echo e($Order->order_date); ?> </td>
                    <td> <?php echo e(implode(', ', array_column($order_data['product'], 'name'))); ?> </td>
                    <td> <?php echo e($order_data['final_price']); ?> </td>
                    <td> <?php echo e($order_data['paymnet_type']); ?> </td>
                    <td> <?php echo e($order_data['order_status_text']); ?> </td>
                    <td class="text-end row">
                        <?php if(
                            $order_data['payment_status'] == 'Unpaid' &&
                                $order_data['order_status_text'] != 'Cancel' &&
                                $Order->delivered_status == 0): ?>
                            <a class="delstatus btn btn-sm btn-primary me-2 " data-id="<?php echo e($order_data['id']); ?>"
                                data-title="<?php echo e(__('View Order')); ?>">
                                <i class="ti ti-trash text-white py-1"></i>
                            </a>
                        <?php endif; ?>
                        <?php echo \App\Models\Order::OrderActionButton($store->theme_id, $store->slug, $Order); ?>

                        <button class="btn btn-sm btn-primary me-2 "
                            data-url="<?php echo e(route('customer.order', [$store->slug, Crypt::encrypt($Order->id)])); ?>"
                            data-size="lg" data-ajax-popup="true" data-title="<?php echo e(__('View Order')); ?>">
                            <i class="ti ti-eye text-white py-1"></i>
                        </button>
                        <?php
                            $showRefundButton = false;
                        ?>
                        <?php $__currentLoopData = $order_refunds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $refund): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($refund->order_id == $Order['id']): ?>
                                <?php
                                    $showRefundButton = true;
                                    break;
                                ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php if(!$showRefundButton): ?>
                            <?php if($Order['delivered_status'] == '1'): ?>
                                <button class="btn btn-sm btn-primary me-2"
                                    data-url="<?php echo e(route('order.refund', [$store->slug, $Order->id, 'refund' => true])); ?>"
                                    data-size="lg" data-ajax-popup="true" data-title="<?php echo e(__('Order Refund')); ?>">
                                    <i class="ti ti-truck-return text-white py-1"></i>
                                </button>
                            <?php endif; ?>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <tr>
                <td colspan="7">
                    <h2><?php echo e(__('No records found')); ?></h2>
                </td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<?php if(isset($orders) && $orders->total() > 10): ?>
<div class="right-result-tbl text-right">
    <?php if(isset($orders)): ?>
    <b>Showing <?php echo e($orders->firstItem()); ?></b> to <?php echo e($orders->lastItem()); ?> of <?php echo e($orders->currentPage()); ?>

    (<?php echo e($orders->lastPage()); ?> Pages)
    <?php endif; ?>
</div>

<div class="form-container">
    <div class="d-flex acc-back-btn-wrp align-items-center justify-content-end">
        <?php
            $previousPageUrl = '';
            $nextPageUrl = '';
            if (isset($orders) && $orders->currentPage() < 1) {
                $previousPageUrl = $orders->previousPageUrl();
            }
            if (isset($orders) && $orders->lastPage() > 1 && $orders->currentPage() != $orders->lastPage()) {
                $nextPageUrl = $orders->nextPageUrl();
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
<?php endif; ?>
<script>
    $(document).on('click', '.delstatus', function() {
        var order_id = $(this).attr('data-id');
        var data = {
            order_id: order_id,
            order_status: 'cancel',
        }
        $.ajax({
            url: '<?php echo e(route('status.cancel', $store->slug)); ?>',
            data: data,
            type: 'post',
            success: function(data) {
                $('#loader').fadeOut();
                if (data.status == 'error') {
                    show_toastr('<?php echo e(__('Error')); ?>', data.message, 'error')
                } else {
                    show_toastr('<?php echo e(__('Success')); ?>', data.message, 'success')
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                }
            }
        });
    });
</script>
<?php /**PATH B:\xampp\htdocs\ecommers\resources\views/front_end/sections/order_list.blade.php ENDPATH**/ ?>