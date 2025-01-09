<?php $__env->startSection('page-title', __('Order Detail')); ?>

<?php
    if ($order['deliveryboy_id'] == 0 && $order['order_status'] == 0) {
        $disableSelectBox = false;
    } else {
        $disableSelectBox = true;
    }
?>
<?php $__env->startSection('action-button'); ?>
    <div class="text-end d-flex flex-wrap all-button-box justify-content-md-end justify-content-center">

        <?php if($order['payment_receipt']): ?>
            <a href="<?php echo e(asset($order['payment_receipt'])); ?>"
                target="_blank" class="btn btn-badge mr-2 btn-sm btn-primary btn-icon d-flex align-items-center" data-bs-toggle="tooltip"
                data-bs-placement="top" title="Payment Receipt" aria-label="Payment Receipt" download>
                <i class="ti ti-download" style="font-size:20px"></i>
            </a>
        <?php endif; ?>
        <?php if(module_is_active('AutomaticOrderPrinting')): ?>
            <?php echo $__env->yieldPushContent('invoice-button'); ?>
        <?php else: ?>
            <a href="<?php echo e(route('shippinglabel.pdf', \Illuminate\Support\Facades\Crypt::encrypt($order['id']))); ?>"
                target="_blank" class="btn btn-badge mr-2 btn-sm btn-primary btn-icon d-flex align-items-center" data-bs-toggle="tooltip"
                data-bs-placement="top" title="Print" aria-label="Print">
                <i class="ti ti-printer" style="font-size:20px"></i>
            </a>
        <?php endif; ?>
        <a href="<?php echo e(route('order.receipt', \Illuminate\Support\Facades\Crypt::encrypt($order['id']))); ?>"
            class="mx-1 btn btn-sm btn-badge mr-2 btn-primary btn-icon d-flex align-items-center" data-bs-toggle="tooltip"
            data-bs-placement="top" title="<?php echo e(__('Receipt')); ?>"><i class="ti ti-receipt" style="font-size:20px"></i>
        </a>
        <a href="#"
            id="<?php echo e(env('APP_URL') . '/' . $store->slug . '/order/' . \Illuminate\Support\Facades\Crypt::encrypt($order['id'])); ?>"
            class="btn btn-sm btn-primary btn-badge mr-2 btn-icon d-flex align-items-center" onclick="copyToClipboard(this)"
            title="Copy Link" data-bs-toggle="tooltip" data-original-title="<?php echo e(__('Click to copy')); ?>"><i class="ti ti-link"
                style="font-size:20px"></i></a>
        <?php
            $btn_class = 'btn-info';
            if ($order['order_status'] == 2 || $order['order_status'] == 3) {
                $btn_class = 'btn-danger';
            } elseif ($order['order_status'] == 1) {
                $btn_class = 'btn-success';
            } elseif ($order['order_status'] == 4) {
                $btn_class = ' btn-warning';
            } elseif ($order['order_status'] == 5) {
                $btn_class = 'btn-secondary';
            } elseif ($order['order_status'] == 6) {
                $btn_class = 'btn-dark';
            }

        ?>


    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('order.index')); ?>"><?php echo e(__('Order')); ?></a></li>
    <li class="breadcrumb-item"> <?php echo e(__('Items from Order')); ?> <?php echo e($order['order_id']); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
    <div class="col-md-12">
            <div class="mt-2 " id="multiCollapseExample1">
                <div class="card">
                    <div class="card-body">
                        <div class="row row-gap align-items-center justify-content-end">
                            <div class="col-xxl-2 col-lg-3 col-sm-4 col-12 px-2">
                                <div class="btn-group w-100" id="deliver_btn">
                                    <button
                                        class="btn-badge w-100  btn <?php echo e($btn_class); ?> <?php echo e(in_array($order['order_status'], [0, 1, 4, 5, 6]) ? 'dropdown-toggle' : ''); ?> order_status_btn"
                                        type="button" <?php echo e(in_array($order['order_status'], [2, 3]) ? 'data-bs-toggle="dropdown"' : ''); ?>

                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <?php echo e(__('Status')); ?> : <?php echo e($order['order_status_text']); ?>

                                    </button>
                                    <?php if(in_array($order['order_status'], [0, 1, 4, 5, 6, 7])): ?>
                                        <div class="dropdown-menu" data-popper-placement="bottom-start">
                                            <h5 class="dropdown-header" style="font-size: 14px;"><?php echo e(__('Set order status')); ?></h5>
                                            <?php if($order['order_status'] == 0): ?>
                                                <a class="dropdown-item order_status" href="#" data-value="confirmed">
                                                    <i class="fa fa-check-circle text-success me-1" style="margin-left: -5px;"></i> <?php echo e(__(' Confirmed')); ?>

                                                </a>
                                                <?php echo $__env->yieldPushContent('AddOrderStatus'); ?>
                                            <?php endif; ?>
                                            <?php if($order['order_status'] == 0 || $order['order_status'] == 4 || $order['order_status'] == 7): ?>
                                                <a class="dropdown-item order_status" href="#" data-value="pickedup">
                                                    <i class="fa fa-truck text-success me-1" style="margin-left: -5px;"></i> <?php echo e(__(' Picked Up')); ?>

                                                </a>
                                            <?php endif; ?>
                                            <?php if(
                                                $order['order_status'] == 0 ||
                                                    $order['order_status'] == 5 ||
                                                    $order['order_status'] == 4 ||
                                                    $order['order_status'] == 7): ?>
                                                <a class="dropdown-item order_status" href="#" data-value="shipped">
                                                    <i class="fa fa-spinner text-success me-1" style="margin-left: -5px;"></i> <?php echo e(__(' Shipped')); ?>

                                                </a>
                                            <?php endif; ?>
                                            <?php if(
                                                $order['order_status'] == 0 ||
                                                    $order['order_status'] == 4 ||
                                                    $order['order_status'] == 5 ||
                                                    $order['order_status'] == 6 ||
                                                    $order['order_status'] == 7): ?>
                                                <a class="dropdown-item order_status" href="#" data-value="delivered">
                                                    <i class="fa fa-check text-success me-1" style="margin-left: -5px;"></i> <?php echo e(__(' Delivered')); ?>

                                                </a>
                                            <?php endif; ?>
                                            <?php if(
                                                $order['order_status'] == 0 ||
                                                    $order['order_status'] == 4 ||
                                                    $order['order_status'] == 5 ||
                                                    $order['order_status'] == 6 ||
                                                    $order['order_status'] == 7): ?>
                                                <a class="dropdown-item order_status text-danger" href="#" data-value="cancel">
                                                    <i class="fa fa-check text-danger me-1" style="margin-left: -5px;"></i> <?php echo e(__(' Cancel Order')); ?>

                                                </a>
                                            <?php endif; ?>
                                            <?php if($order['order_status'] == 1 && $order['is_guest'] == 0): ?>
                                                <a class="dropdown-item order_status text-danger" href="#" data-value="return">
                                                    <i class="fa fa-check text-danger me-1" style="margin-left: -5px;"></i> <?php echo e(__(' Return Order')); ?>

                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-xxl-2 col-lg-3 col-sm-4 col-12  px-2">
                                <?php echo Form::select('delivery_boy', $deliveryboys, $order['deliveryboy_id'], [
                                    'class' => 'form-control select category',
                                    'style' => 'padding-right: 35px !important;',
                                    'id' => 'delivery_boy',
                                    'disabled' => $disableSelectBox,
                                ]); ?>

                            </div>
                            <div class="col-xxl-2 col-lg-3 col-sm-4 col-12 px-2">
                                <?php echo Form::select('payment_status', App\Models\order::payment_status(), $order['payment_status'], [
                                    'class' => 'form-control select category btn-badge',
                                    'id' => 'payment_status',
                                ]); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="row" id="printableArea">
                <div class="col-xxl-7">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-lg-6 ">
                                <div class="p-3 d-flex gap-3">
                                    <div style="background-color: #E8F8FF; border-radius: 4px; padding: 5px; display: inline-flex;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" fill="none">
                                            <circle cx="18" cy="18" r="18" fill="#E8F8FF"></circle>
                                            <path d="M16.98 28.055C17.0959 28.2289 17.291 28.3333 17.5 28.3333C17.709 28.3333 17.9041 28.2289 18.02 28.055C19.4992 25.8364 21.6778 23.0963 23.196 20.3096C24.4099 18.0815 25 16.1811 25 14.5C25 10.3645 21.6355 7 17.5 7C13.3645 7 10 10.3645 10 14.5C10 16.1811 10.5901 18.0815 11.804 20.3096C13.3211 23.0942 15.5039 25.841 16.98 28.055ZM17.5 8.25C20.9462 8.25 23.75 11.0538 23.75 14.5C23.75 15.9668 23.2097 17.6716 22.0983 19.7116C20.7897 22.1137 18.9222 24.5503 17.5 26.5987C16.078 24.5506 14.2104 22.1138 12.9017 19.7116C11.7903 17.6716 11.25 15.9668 11.25 14.5C11.25 11.0538 14.0538 8.25 17.5 8.25Z" fill="#002332"></path>
                                            <path d="M17.5 18.25C19.5677 18.25 21.25 16.5677 21.25 14.5C21.25 12.4323 19.5677 10.75 17.5 10.75C15.4323 10.75 13.75 12.4323 13.75 14.5C13.75 16.5677 15.4323 18.25 17.5 18.25ZM17.5 12C18.8785 12 20 13.1215 20 14.5C20 15.8785 18.8785 17 17.5 17C16.1215 17 15 15.8785 15 14.5C15 13.1215 16.1215 12 17.5 12Z" fill="#002332"></path>
                                        </svg>
                                    </div>
                                    <h5 class="d-flex align-items-center mb-0"><?php echo e(__('Shipping Information')); ?></h5>
                                </div>

                                <div class="card-body pb-3 pt-0">
                                    <address class="mb-0 text-sm">
                                        <dl class="row mb-0 align-items-center">
                                            <dt class="col-sm-3 h6 text-sm"><?php echo e(__('Name')); ?></dt>
                                            <dd class="col-sm-9 text-sm">
                                                <?php echo e(!empty($order['delivery_informations']['name']) ? $order['delivery_informations']['name'] : ''); ?>

                                            </dd>
                                            <dt class="col-sm-3 h6 text-sm"><?php echo e(__('Email')); ?></dt>
                                            <dd class="col-sm-9 text-sm">
                                                <?php echo e(!empty($order['delivery_informations']['email']) ? $order['delivery_informations']['email'] : ''); ?>

                                            </dd>
                                            <dt class="col-sm-3 h6 text-sm"><?php echo e(__('City')); ?></dt>
                                            <dd class="col-sm-9 text-sm">
                                                <?php echo e(!empty($order['delivery_informations']['city']) ? $order['delivery_informations']['city'] : ''); ?>

                                            </dd>
                                            <dt class="col-sm-3 h6 text-sm"><?php echo e(__('State')); ?></dt>
                                            <dd class="col-sm-9 text-sm">
                                                <?php echo e(!empty($order['delivery_informations']['state']) ? $order['delivery_informations']['state'] : ''); ?>

                                            </dd>
                                            <dt class="col-sm-3 h6 text-sm"><?php echo e(__('Country')); ?></dt>
                                            <dd class="col-sm-9 text-sm">
                                                <?php echo e(!empty($order['delivery_informations']['country']) ? $order['delivery_informations']['country'] : ''); ?>

                                            </dd>
                                            <dt class="col-sm-3 h6 text-sm"><?php echo e(__('Postal Code')); ?></dt>
                                            <dd class="col-sm-9 text-sm">
                                                <?php echo e(!empty($order['delivery_informations']['post_code']) ? $order['delivery_informations']['post_code'] : ''); ?>

                                            </dd>
                                            <dt class="col-sm-3 h6 text-sm mb-0"><?php echo e(__('Phone')); ?></dt>
                                            <dd class="col-sm-9 text-sm mb-0">
                                                <a href="https://api.whatsapp.com/send?phone=<?php echo e(!empty($order['delivery_informations']['phone']) ? $order['delivery_informations']['phone'] : ''); ?>&amp;text=Hi"
                                                    target="_blank">
                                                    <?php echo e(!empty($order['delivery_informations']['phone']) ? $order['delivery_informations']['phone'] : ''); ?>

                                                </a>
                                            </dd>
                                        </dl>
                                    </address>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-lg-6 ">
                            <div class="p-3 d-flex gap-3">
                                <div style="background-color: rgba(255, 174, 189, 0.41) !important; border-radius: 4px; padding: 5px; display: inline-flex;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" fill="none">
                                        <circle cx="18" cy="18" r="18" fill="rgba(255, 174, 189, 0.41) !important" fill-opacity="0.31" />
                                        <path d="M27.1475 22.2505V22.2605C27.1421 22.9341 26.5923 23.4806 25.9175 23.4806H10.0834C9.40525 23.4806 8.85336 22.9287 8.85336 22.2505V13.0835C8.85336 12.4053 9.40525 11.8534 10.0834 11.8534H25.9175C26.5956 11.8534 27.1475 12.4053 27.1475 13.0835V22.2505ZM25.9175 10.98H10.0834C8.924 10.98 7.98 11.924 7.98 13.0835V22.2506C7.98 23.41 8.924 24.354 10.0834 24.354H25.9175C27.0769 24.354 28.0209 23.41 28.0209 22.2506V13.0835C28.0209 11.924 27.0769 10.98 25.9175 10.98Z" fill="#D80027" stroke="#D80027" stroke-width="0.04" />
                                        <path d="M27.1475 15.9801H8.85336V14.3534H27.1475V15.9801ZM27.5842 13.48H8.4167C8.17564 13.48 7.98 13.6756 7.98 13.9167V16.4168C7.98 16.6579 8.17564 16.8535 8.4167 16.8535H27.5843C27.8253 16.8535 28.021 16.6579 28.021 16.4168V13.9167C28.0209 13.6756 27.8253 13.48 27.5842 13.48Z" fill="#D80027" stroke="#D80027" stroke-width="0.04" />
                                        <path d="M14.2503 19.314H10.9168C10.6757 19.314 10.4801 19.5096 10.4801 19.7507C10.4801 19.9917 10.6757 20.1873 10.9168 20.1873H14.2503C14.4913 20.1873 14.687 19.9917 14.687 19.7506C14.687 19.5096 14.4913 19.314 14.2503 19.314Z" fill="#D80027" stroke="#D80027" stroke-width="0.04" />
                                        <path d="M16.7504 20.98H10.9168C10.6757 20.98 10.4801 21.1756 10.4801 21.4167C10.4801 21.6578 10.6757 21.8534 10.9168 21.8534H16.7504C16.9914 21.8534 17.1871 21.6578 17.1871 21.4167C17.1871 21.1756 16.9914 20.98 16.7504 20.98Z" fill="#D80027" stroke="#D80027" stroke-width="0.04" />
                                    </svg>
                                </div>
                                <h5 class="d-flex align-items-center mb-0"><?php echo e(__('Billing Information')); ?></h5>
                            </div>

                                <div class="card-body pb-3 pt-0">
                                    <dl class="row mb-0 align-items-center">
                                        <dt class="col-sm-3 h6 text-sm"><?php echo e(__('Name')); ?></dt>
                                        <dd class="col-sm-9 text-sm">
                                            <?php echo e(!empty($order['billing_informations']['name']) ? $order['billing_informations']['name'] : ''); ?>

                                        </dd>
                                        <dt class="col-sm-3 h6 text-sm"><?php echo e(__('Email')); ?></dt>
                                        <dd class="col-sm-9 text-sm">
                                            <?php echo e(!empty($order['billing_informations']['email']) ? $order['billing_informations']['email'] : ''); ?>

                                        </dd>
                                        <dt class="col-sm-3 h6 text-sm"><?php echo e(__('City')); ?></dt>
                                        <dd class="col-sm-9 text-sm">
                                            <?php echo e(!empty($order['billing_informations']['city']) ? $order['billing_informations']['city'] : ''); ?>

                                        </dd>
                                        <dt class="col-sm-3 h6 text-sm"><?php echo e(__('State')); ?></dt>
                                        <dd class="col-sm-9 text-sm">
                                            <?php echo e(!empty($order['billing_informations']['state']) ? $order['billing_informations']['state'] : ''); ?>

                                        </dd>
                                        <dt class="col-sm-3 h6 text-sm"><?php echo e(__('Country')); ?></dt>
                                        <dd class="col-sm-9 text-sm">
                                            <?php echo e(!empty($order['billing_informations']['country']) ? $order['billing_informations']['country'] : ''); ?>

                                        </dd>
                                        <dt class="col-sm-3 h6 text-sm"><?php echo e(__('Postal Code')); ?></dt>
                                        <dd class="col-sm-9 text-sm">
                                            <?php echo e(!empty($order['billing_informations']['post_code']) ? $order['billing_informations']['post_code'] : ''); ?>

                                        </dd>
                                        <dt class="col-sm-3 h6 text-sm mb-0"><?php echo e(__('Phone')); ?></dt>
                                        <dd class="col-sm-9 text-sm mb-0">
                                            <a href="https://api.whatsapp.com/send?phone=<?php echo e(!empty($order['billing_informations']['phone']) ? $order['billing_informations']['phone'] : ''); ?>&amp;text=Hi"
                                                target="_blank">
                                                <?php echo e(!empty($order['billing_informations']['phone']) ? $order['billing_informations']['phone'] : ''); ?>

                                            </a>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="mb-0"><?php echo e(__('Items from Order')); ?> <?php echo e($order['order_id']); ?> </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th><?php echo e(__('Item')); ?></th>
                                            <th><?php echo e(__('Quantity')); ?></th>
                                            <?php if($order['order_status'] == 1): ?>
                                                <th><?php echo e(__('Downloadable Product')); ?></th>
                                            <?php endif; ?>
                                            <th><?php echo e(__('Total')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $order['product']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $variant = \App\Models\ProductVariant::where(
                                                    'id',
                                                    $item['variant_id'],
                                                )->first();
                                                $product = \App\Models\Product::where(
                                                    'id',
                                                    $item['product_id'],
                                                )->first();
                                            ?>

                                            <tr>
                                                <td class="total">
                                                    <span class="h6 text-sm"> <a href="#"><?php echo e($item['name']); ?></a>
                                                    </span> <br>
                                                    <span class="text-sm"> <?php echo e($item['variant_name']); ?> </span>
                                                </td>
                                                <td>
                                                    <?php if($order['paymnet_type'] == 'POS'): ?>
                                                        <?php echo e($item['quantity']); ?>

                                                    <?php else: ?>
                                                        <?php echo e($item['qty']); ?>

                                                    <?php endif; ?>
                                                </td>
                                                <?php if($product || $variant): ?>
                                                    <?php if($order['order_status'] == 1): ?>
                                                        <?php if(!empty($variant->downloadable_product) != null || !empty($product->downloadable_product) != null): ?>
                                                            <td>
                                                                <?php if(!empty($variant->downloadable_product)): ?>
                                                                    <a class="downloadable_product_<?php echo e($item['product_id']); ?>"
                                                                        href="<?php echo e(get_file($variant->downloadable_product)); ?>"
                                                                        download style="display: none;"></a>
                                                                <?php endif; ?>
                                                                <?php if(!empty($product->downloadable_product)): ?>
                                                                    <a class="downloadable_product_<?php echo e($item['product_id']); ?>"
                                                                        href="<?php echo e(get_file($product->downloadable_product)); ?>"
                                                                        download style="display: none;"></a>
                                                                <?php endif; ?>
                                                                <button
                                                                    class="download-btn action-btn btn-primary btn btn-sm align-items-center"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="<?php echo e(__('Download')); ?>"
                                                                    data-product-id="<?php echo e($item['product_id']); ?>">
                                                                    <i class="ti ti-download text-white"></i>
                                                                </button>
                                                            </td>
                                                        <?php else: ?>
                                                            <td>-</td>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                <td>
                                                    <?php if($order['paymnet_type'] == 'POS'): ?>
                                                        <?php echo e(currency_format_with_sym(($item['orignal_price'] ?? 0) * ($item['quantity'] ?? 0), getCurrentStore(), APP_THEME()) ?? SetNumberFormat(($item['orignal_price'] ?? 0) * ($item['quantity'] ?? 0))); ?>

                                                    <?php else: ?>
                                                        <?php if(module_is_active('ProductPricing') && isset($item['sale_price'])): ?>
                                                            <?php echo e(currency_format_with_sym($item['sale_price'] ?? 0, getCurrentStore(), APP_THEME()) ?? SetNumberFormat($item['sale_price'])); ?>

                                                        <?php else: ?>
                                                            <?php echo e(currency_format_with_sym($item['final_price'] ?? 0, getCurrentStore(), APP_THEME()) ?? SetNumberFormat($item['final_price'])); ?>

                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </td>


                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="sub-total-footer">
                                <ul class="list-unstyled mt-4">
                                    <li class="d-flex justify-content-end">
                                        <span><?php echo e(__('Sub Total')); ?> :</span>
                                        <span
                                            class="text-start ps-3"><b><?php echo e(currency_format_with_sym($order['sub_total'] ?? 0, getCurrentStore(), APP_THEME()) ?? SetNumberFormat($order['sub_total'])); ?></b></span>
                                    </li>
                                    <li class="d-flex justify-content-end">
                                        <span><?php echo e(__('Estimated Tax')); ?> :</span>
                                        <span class="text-start ps-3"><b>
                                                <?php if($order['paymnet_type'] == 'POS'): ?>
                                                    <?php echo e(currency_format_with_sym($order['tax_price'] ?? 0, getCurrentStore(), APP_THEME()) ?? SetNumberFormat($order['tax_price'])); ?>

                                                <?php else: ?>
                                                    <?php echo e(currency_format_with_sym($order['tax_price'] ?? 0, getCurrentStore(), APP_THEME()) ?? SetNumberFormat($order['tax_price'])); ?>

                                                <?php endif; ?>
                                            </b></span>
                                    </li>
                                    <?php if($order['paymnet_type'] == 'POS'): ?>
                                        <li class="d-flex justify-content-end">
                                            <span><?php echo e(__('Discount')); ?> :</span>
                                            <span
                                                class="text-start ps-3"><b><?php echo e(currency_format_with_sym($order['coupon_price'] ?? 0, getCurrentStore(), APP_THEME()) ?? (!empty($order['coupon_price']) ? SetNumberFormat($order['coupon_price']) : SetNumberFormat(0))); ?></b></span>
                                        </li>
                                    <?php else: ?>
                                        <li class="d-flex justify-content-end">
                                            <span><?php echo e(__('Discount')); ?> :</span>
                                            <span
                                                class="text-start ps-3"><b><?php echo e(currency_format_with_sym($order['coupon_info']['discount_amount'] ?? 0, getCurrentStore(), APP_THEME()) ?? (!empty($order['coupon_info']['discount_amount']) ? SetNumberFormat($order['coupon_info']['discount_amount']) : SetNumberFormat(0))); ?></b></span>
                                        </li>
                                    <?php endif; ?>
                                    <?php echo $__env->yieldPushContent('savePriceShowAdminOrder'); ?>
                                    <li class="d-flex justify-content-end">
                                        <span><?php echo e(__('Delivered Charges')); ?> :</span>
                                        <span
                                            class="text-start ps-3"><b><?php echo e(currency_format_with_sym($order['delivered_charge'] ?? 0, getCurrentStore(), APP_THEME()) ?? SetNumberFormat($order['delivered_charge'])); ?></b></span>
                                    </li>
                                    <li class="d-flex justify-content-end">
                                        <span><b><?php echo e(__('Grand Total')); ?> :</b></span>
                                        <span
                                            class="text-start ps-3"><b><?php echo e(currency_format_with_sym($order['final_price'] ?? 0, getCurrentStore(), APP_THEME()) ?? SetNumberFormat($order['final_price'])); ?></b></span>
                                    </li>

                                    <li class="d-flex justify-content-end">
                                        <span><?php echo e(__('Return')); ?> :</span>
                                        <span
                                            class="text-start ps-3"><b><?php echo e(currency_format_with_sym($order['return_price'] ?? 0, getCurrentStore(), APP_THEME()) ?? SetNumberFormat($order['return_price'])); ?></b></span>
                                    </li>
                                    <li class="d-flex justify-content-end">
                                        <span><?php echo e(__('Payment Type')); ?> :</span>
                                        <span class="text-start ps-3"><b><?php echo e($order['paymnet_type']); ?></b></span>
                                    </li>
                                    <li class="d-flex justify-content-end">
                                        <span><?php echo e(__('Order Status')); ?> :</span>
                                        <span class="text-start ps-3"><b><?php echo e($order['order_status_text']); ?></b></span>
                                    </li>
                                    <li class="d-flex justify-content-end">
                                        <span><?php echo e(__('Last Return Date')); ?> :</span>
                                        <span class="text-start ps-3"><b>-</b></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php echo $__env->yieldPushContent('OrderPartialPaymentView'); ?>
                </div>
                <div class="col-xxl-5">
                    <?php if (app('laratrust')->hasPermission('Manage Order Note')) : ?>
                    <div class="card  p-0">
                        <div class="card-header d-flex justify-content-between pb-0">
                            <h4 class="mb-4"><?php echo e(__('Order Notes')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php $__currentLoopData = $order_notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="card">
                                    <?php if($note->status == 'Stock Manage'): ?>
                                        <div class="card-header note-bg-color  stock-mange-note">
                                            <span class="tl-btn licence-btn ">
                                                <?php echo e($note->notes); ?>

                                            </span>
                                            <div class="cart-time-wrapper">
                                                <span
                                                    class="time"><?php echo e($note->created_at->format('d M Y h:i A')); ?><?php echo e(__(' by ')); ?><?php echo e(Auth::user()->name ?? ''); ?></span>
                                                <?php if (app('laratrust')->hasPermission('Delete Order Note')) : ?>
                                                <?php echo Form::open([
                                                    'method' => 'DELETE',
                                                    'route' => ['order-note.destroy', $note->id],
                                                    'class' => 'd-inline',
                                                ]); ?>

                                                <button type="button" class="btn btn-sm show_confirm order-not-dlt" data-confirm="<?php echo e(__('Are You Sure?')); ?>"
                                                data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>" data-text-yes="<?php echo e(__('Yes')); ?>" data-text-no="<?php echo e(__('No')); ?>" >
                                                    <i class="ti ti-trash" data-bs-toggle="tooltip"
                                                        title="Delete"></i>
                                                </button>
                                                <?php echo Form::close(); ?>

                                                <?php endif; // app('laratrust')->permission ?>
                                            </div>
                                        </div>
                                    <?php elseif($note->status == 'Order Created'): ?>
                                        <div class="card-header note-bg-color order-create-note">
                                            <span class="tl-btn licence-btn ">
                                                <?php echo e($note->notes); ?>

                                            </span>
                                            <div class="cart-time-wrapper">
                                                <span
                                                    class="time"><?php echo e($note->created_at->format('d M Y h:i A')); ?><?php echo e(__(' by ')); ?><?php echo e(Auth::user()->name ?? ''); ?></span>
                                                <?php if (app('laratrust')->hasPermission('Delete Order Note')) : ?>
                                                <?php echo Form::open([
                                                    'method' => 'DELETE',
                                                    'route' => ['order-note.destroy', $note->id],
                                                    'class' => 'd-inline',
                                                ]); ?>

                                                <button type="button" class="btn btn-sm  show_confirm order-not-dlt" data-confirm="<?php echo e(__('Are You Sure?')); ?>"
                                                data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>" data-text-yes="<?php echo e(__('Yes')); ?>" data-text-no="<?php echo e(__('No')); ?>" >
                                                    <i class="ti ti-trash" data-bs-toggle="tooltip"
                                                        title="Delete"></i>
                                                </button>
                                                <?php echo Form::close(); ?>

                                                <?php endif; // app('laratrust')->permission ?>
                                            </div>
                                        </div>
                                    <?php elseif($note->status == 'Order status change'): ?>
                                        <div class="card-header note-bg-color order-status-note">
                                            <span class="tl-btn licence-btn ">
                                                <?php echo e($note->notes); ?>

                                            </span>
                                            <div class="cart-time-wrapper">
                                                <span
                                                    class="time"><?php echo e($note->created_at->format('d M Y h:i A')); ?><?php echo e(__(' by ')); ?><?php echo e(Auth::user()->name ?? ''); ?></span>
                                                <?php if (app('laratrust')->hasPermission('Delete Order Note')) : ?>
                                                <?php echo Form::open([
                                                    'method' => 'DELETE',
                                                    'route' => ['order-note.destroy', $note->id],
                                                    'class' => 'd-inline',
                                                ]); ?>

                                                <button type="button" class="btn btn-sm  show_confirm order-not-dlt" data-confirm="<?php echo e(__('Are You Sure?')); ?>"
                                                data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>" data-text-yes="<?php echo e(__('Yes')); ?>" data-text-no="<?php echo e(__('No')); ?>" >
                                                    <i class="ti ti-trash text-white py-1" data-bs-toggle="tooltip"
                                                        title="Delete"></i>
                                                </button>
                                                <?php echo Form::close(); ?>

                                                <?php endif; // app('laratrust')->permission ?>
                                            </div>
                                        </div>
                                    <?php elseif($note->status == '' && $note->note_type == 'private_note'): ?>
                                        <div class="card-header note-bg-color admin-private-note">
                                            <span class="tl-btn licence-btn ">
                                                <?php echo e($note->notes); ?>

                                            </span>
                                            <div class="cart-time-wrapper">
                                                <span
                                                    class="time"><?php echo e($note->created_at->format('d M Y h:i A')); ?><?php echo e(__(' by ')); ?><?php echo e(Auth::user()->name ?? ''); ?></span>
                                                <?php if (app('laratrust')->hasPermission('Delete Order Note')) : ?>
                                                <?php echo Form::open([
                                                    'method' => 'DELETE',
                                                    'route' => ['order-note.destroy', $note->id],
                                                    'class' => 'd-inline',
                                                ]); ?>

                                                <button type="button" class="btn btn-sm  show_confirm order-not-dlt" data-confirm="<?php echo e(__('Are You Sure?')); ?>"
                                                data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>" data-text-yes="<?php echo e(__('Yes')); ?>" data-text-no="<?php echo e(__('No')); ?>" >
                                                    <i class="ti ti-trash text-white py-1" data-bs-toggle="tooltip"
                                                        title="Delete"></i>
                                                </button>
                                                <?php echo Form::close(); ?>

                                                <?php endif; // app('laratrust')->permission ?>
                                            </div>
                                        </div>
                                    <?php elseif($note->status == '' && $note->note_type == 'to_customer'): ?>
                                        <div class="card-header note-bg-color customer-note">
                                            <span class="tl-btn licence-btn ">
                                                <?php echo e($note->notes); ?>

                                            </span>
                                            <div class="cart-time-wrapper">
                                                <span
                                                    class="time"><?php echo e($note->created_at->format('d M Y h:i A')); ?><?php echo e(__(' by ')); ?><?php echo e(Auth::user()->name ?? ''); ?></span>
                                                <?php if (app('laratrust')->hasPermission('Delete Order Note')) : ?>
                                                <?php echo Form::open([
                                                    'method' => 'DELETE',
                                                    'route' => ['order-note.destroy', $note->id],
                                                    'class' => 'd-inline',
                                                ]); ?>

                                                <button type="button" class="btn btn-sm  show_confirm order-not-dlt" data-confirm="<?php echo e(__('Are You Sure?')); ?>"
                                                data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>" data-text-yes="<?php echo e(__('Yes')); ?>" data-text-no="<?php echo e(__('No')); ?>" >
                                                    <i class="ti ti-trash text-white py-1" data-bs-toggle="tooltip"
                                                        title="Delete"></i>
                                                </button>
                                                <?php echo Form::close(); ?>

                                                <?php endif; // app('laratrust')->permission ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if (app('laratrust')->hasPermission('Create Order Note')) : ?>
                            <?php echo e(Form::open(['route' => 'order-note.store', 'method' => 'POST', 'id' => 'choice_form', 'enctype' => 'multipart/form-data'])); ?>

                            <div class="row">
                                <input type="hidden" class="hidden" name="order_id" value="<?php echo e($order['id']); ?>">
                                <div class="form-group col-md-8">
                                    <?php echo Form::label('', __('Note'), ['class' => 'form-label']); ?>

                                    <textarea name="note" rows="3" class="autogrow form-control" placeholder="Enter Message here..."></textarea>
                                </div>
                                <div class="form-group col-md-4">
                                    <?php echo Form::label('', __('Note Type'), ['class' => 'form-label']); ?>

                                    <?php echo Form::select('note_type', ['private_note' => 'Private Note', 'to_customer' => 'To Customer'], null, [
                                        'class' => 'form-control',
                                    ]); ?>

                                </div>
                                <div class="form-group col-md-4">
                                    <input type="submit" value="Create" class="btn btn-primary btn-badge">
                                </div>
                            </div>
                            <?php echo Form::close(); ?>

                            <?php endif; // app('laratrust')->permission ?>
                        </div>
                    </div>
                    <?php endif; // app('laratrust')->permission ?>
                    <?php echo $__env->yieldPushContent('showdigitalproductattachment'); ?>
                    <?php echo $__env->yieldPushContent('CheckoutAttachment'); ?>
                    <?php echo $__env->yieldPushContent('ViewAdditionalFields'); ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('custom-script'); ?>
    <script src="<?php echo e(asset('js/html2pdf.bundle.min.js')); ?><?php echo e('?' . time()); ?>"></script>
    <script>
        var filename = $('#filesname').val();

        function saveAsPDF() {
            var element = document.getElementById('printableArea');
            var opt = {
                margin: 0.3,
                filename: filename,
                image: {
                    type: 'jpeg',
                    quality: 1
                },
                html2canvas: {
                    scale: 4,
                    dpi: 72,
                    letterRendering: true
                },
                jsPDF: {
                    unit: 'in',
                    format: 'A2'
                }
            };
            html2pdf().set(opt).from(element).save();

        }

        $(document).on('click', '.order_return', function() {
            var product_id = $(this).attr('product-id');
            var variant_id = $(this).attr('variant-id');
            var order_id = $(this).attr('order-id');

            var data = {
                product_id: product_id,
                variant_id: variant_id,
                order_id: order_id
            }
            $.ajax({
                url: '<?php echo e(route('order.return')); ?>',
                method: 'POST',
                data: data,
                context: this,
                success: function(data) {
                    $('#loader').fadeOut();
                    if (data.status == 'error') {
                        show_toastr('<?php echo e(__('Error')); ?>', data.message, 'error')
                    } else {
                        show_toastr('<?php echo e(__('Success')); ?>', data.message, 'success')
                        $(this).parent().append('<h6 class="text-danger"><?php echo e(__('Returned')); ?></h6>');
                        $(this).parent().find('.order_return').remove();
                    }
                }
            });
        });

        $(document).on('click', '.order_status', function() {
            var status = $(this).attr('data-value');

            var data = {
                delivered: status,
                id: "<?php echo e($order['id']); ?>",
            }
            $('#loader').fadeIn();
            $.ajax({
                url: '<?php echo e(route('order.status.change', $order['id'])); ?>',
                method: 'POST',
                data: data,
                context: this,
                success: function(data) {
                    $('#loader').fadeOut();
                    if (data.status == false) {
                        show_toastr('<?php echo e(__('Error')); ?>', data.message, 'error')
                    } else {
                        var newStatusText = data.order_status;
                        $('.order_status_btn').text('<?php echo e(__('Status')); ?> : ' + newStatusText);
                    }
                },
                error: function(xhr, status, error) {
                    $('#loader').fadeOut();
                    show_toastr('<?php echo e(__('Error')); ?>', error, 'error');
                },
                complete: function() {
                    $('#loader').fadeOut();
                   show_toastr('<?php echo e(__('Success')); ?>', 'Order status changed.', 'success');
                }
            });
        });

        $(document).on('change', '#payment_status', function() {
            var payment_status = $(this).val();
            var data = {
                payment_status: payment_status,
                order_id: "<?php echo e($order['id']); ?>",

            }
            $.ajax({
                url: '<?php echo e(route('order.payment.status')); ?>',
                method: 'POST',
                data: data,
                context: this,
                success: function(data) {
                    $('#loader').fadeOut();
                    show_toastr('<?php echo e(__('Success')); ?>', data.message, 'success')


                }
            });
        });

        $(document).on('change', '#delivery_boy', function() {
            var delivery_boy = $(this).val();

            var data = {
                delivery_boy: delivery_boy,
                order_id: "<?php echo e($order['id']); ?>",
            }

            $.ajax({
                url: '<?php echo e(route('order.assign')); ?>',
                method: 'POST',
                data: data,
                context: this,
                success: function(data) {
                    $('#loader').fadeOut();
                    show_toastr('<?php echo e(__('Success')); ?>', data.message, 'success')


                }
            });
        });

        function myFunction() {
            var copyText = document.getElementById("myInput");
            copyText.select();
            copyText.setSelectionRange(0, 99999)
            document.execCommand("copy");
            show_toastr('Success', 'Link copied', 'success');
        }

        function copyToClipboard(element) {

            var copyText = element.id;
            document.addEventListener('copy', function(e) {
                e.clipboardData.setData('text/plain', copyText);
                e.preventDefault();
            }, true);

            document.execCommand('copy');
            show_toastr('success', 'Url copied to clipboard', 'success');
        }

        document.querySelectorAll('.download-btn').forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.getAttribute('data-product-id');
                const downloadLink = document.querySelector('.downloadable_product_' + productId);

                if (downloadLink) {
                    downloadLink.click();
                } else {
                    console.error('Download link not found for product ID:', productId);
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH B:\xampp\htdocs\ecommers\resources\views/order/view.blade.php ENDPATH**/ ?>