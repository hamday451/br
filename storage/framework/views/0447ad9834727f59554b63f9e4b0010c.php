<?php $__env->startSection('page-title'); ?>
    <?php echo e(ucfirst($page->page_name ?? __('Home Page'))); ?>

<?php $__env->stopSection(); ?>
<style>
    .padding-top {
        padding-top: 185px !important;
    }
</style>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('front_end.sections.partision.header_section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php
        $theme_favicon = \App\Models\Utility::GetValueByName('theme_favicon', $currentTheme);
        $theme_favicons = get_file($theme_favicon, $currentTheme);
        $theme_logo = \App\Models\Utility::GetValueByName('theme_logo', $currentTheme);
        $theme_logo = get_file($theme_logo, $currentTheme);
        $currantLang = Cookie::get('LANGUAGE');
        if (!isset($currantLang)) {
            $currantLang = $store->default_language;
        }
    ?>
    <div class="padding-top order-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-12">
                    <div class="common-banner-content">
                        <div class="row">
                            <div class="col-xl-5">
                                <div class="section-title">
                                    <h2><?php echo e(__('Your Order Details')); ?></h2>
                                </div>
                            </div>
                            <div class="col-xl-7">
                                <div class="gap-1 d-flex all-button-box justify-content-md-end justify-content-end text-end">
                                    <?php if(module_is_active('AutomaticOrderPrinting')): ?>
                                        <?php echo $__env->yieldPushContent('invoice-button'); ?>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('shippinglabel.pdf', \Illuminate\Support\Facades\Crypt::encrypt($order['id']))); ?>"
                                            target="_blank" class="btn btn-sm btn-primary btn-icon align-items-center"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Print"
                                            aria-label="Print">
                                            <i class="ti ti-printer" style="font-size:20px"></i>
                                        </a>
                                    <?php endif; ?>
                                    <span class="btn btn-sm btn-secondary" style="margin-left: 5px; pointer-events: none;">
                                        <?php echo e($order['order_status_text']); ?>

                                    </span>

                                    <?php if(
                                        $order['payment_status'] == 'Unpaid' &&
                                            $order['order_status_text'] != 'Cancel' &&
                                            $order_data['delivered_status'] == 0): ?>
                                        <a class="delstatus btn btn-sm btn-primary me-2 " style="margin-left: 5px"
                                            data-id="<?php echo e($order['id']); ?>">
                                            <i class="ti ti-trash " style="font-size:20px"></i>
                                            <span class="btn-inner--text text-white"><?php echo e(__('Order Cencel')); ?></span>
                                        </a>
                                    <?php endif; ?>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <section class="product-listing-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row order-details-modal product-modal-detail" id="printableArea">
                            <div class="col-xxl-7">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between">
                                        <p class="mb-0"><b><?php echo e(__('Items from Order')); ?> <?php echo e($order['order_id']); ?></b>
                                        </p>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th><?php echo e(__('Item')); ?></th>
                                                        <th><?php echo e(__('Quantity')); ?></th>
                                                        <th><?php echo e(__('Total')); ?></th>
                                                        <?php if($order['order_status'] == 1 && $order['is_guest'] == 0): ?>
                                                            <th><?php echo e(__('Return')); ?></th>
                                                        <?php endif; ?>
                                                        <?php if($order['order_status'] == 1): ?>
                                                            <th><?php echo e(__('Downloadable Product')); ?></th>
                                                        <?php endif; ?>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $order['product']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php
                                                            $download_prod = \App\Models\ProductVariant::where(
                                                                'id',
                                                                $item['variant_id'],
                                                            )->first();
                                                            $download_product = \App\Models\Product::where(
                                                                'id',
                                                                $item['product_id'],
                                                            )->first();
                                                        ?>
                                                        <tr>
                                                            <td class="total">
                                                                <span class="p text-sm"> <a
                                                                        href="#"><?php echo e($item['name']); ?></a> </span>
                                                                <br>
                                                                <span class="text-sm"> <?php echo e($item['variant_name']); ?>

                                                                </span>
                                                            </td>
                                                            <td>
                                                                <?php if($order['paymnet_type'] == 'POS'): ?>
                                                                    <?php echo e($item['quantity']); ?>

                                                                <?php else: ?>
                                                                    <?php echo e($item['qty']); ?>

                                                                <?php endif; ?>
                                                            </td>
                                                            <td>
                                                                <?php if($order['paymnet_type'] == 'POS'): ?>
                                                                    <?php echo e(currency_format_with_sym($item['orignal_price'] ?? 0, $store->id, $store->theme_id) ?? SetNumberFormat($item['orignal_price'])); ?>

                                                                <?php else: ?>
                                                                    <?php echo \App\Models\Product::ManageProductPrice($item, $store, $store->theme_id); ?>

                                                                <?php endif; ?>
                                                            </td>
                                                            <?php if($order['order_status'] == 1 && $order['is_guest'] == 0): ?>
                                                                <td> - </td>
                                                            <?php endif; ?>
                                                            <?php if($order['order_status_text'] == 'Delivered'): ?>
                                                                <?php if(!empty($download_prod->downloadable_product) || !empty($download_product->downloadable_product)): ?>
                                                                    <td>
                                                                        <div class="detail-bottom">
                                                                            <?php if(!empty($download_product->downloadable_product)): ?>
                                                                                <a class="download_prod_<?php echo e($item['product_id']); ?>"
                                                                                    href="<?php echo e(get_file($download_product->downloadable_product)); ?>"
                                                                                    download style="display: none;"></a>
                                                                            <?php endif; ?>
                                                                            <?php if(!empty($download_prod->downloadable_product)): ?>
                                                                                <a class="download_prod_<?php echo e($item['product_id']); ?>"
                                                                                    href="<?php echo e(get_file($download_prod->downloadable_product)); ?>"
                                                                                    download style="display: none;"></a>
                                                                            <?php endif; ?>
                                                                            <a class="btn cart-btn downloadable_product_variant"
                                                                                href="<?php echo e(get_file($download_product->downloadable_product)); ?>"
                                                                                data-product-id="<?php echo e($item['product_id']); ?>"
                                                                                download><?php echo e(__('Download')); ?>

                                                                                <i class="fas fa-shopping-basket"></i></a>
                                                                        </div>
                                                                    </td>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-lg-6 ">
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between">
                                                <b class=""><?php echo e(__('Shipping Information')); ?></b>
                                            </div>
                                            <div class="card-body pt-0" style="overflow: auto;">
                                                <address class="mb-0 text-sm">
                                                    <ul class="row mt-4 align-items-center">
                                                        <li class="col-sm-5 col-6 text-sm"><b><?php echo e(__('Name')); ?></b></li>
                                                        <li class="col-sm-7 col-6 text-sm">
                                                            <?php echo e(!empty($order['delivery_informations']['name']) ? $order['delivery_informations']['name'] : ''); ?>

                                                        </li>
                                                        <li class="col-sm-5 col-6 text-sm"><b><?php echo e(__('Email')); ?></b></li>
                                                        <li class="col-sm-7 col-6 text-sm">
                                                            <?php echo e(!empty($order['delivery_informations']['email']) ? $order['delivery_informations']['email'] : ''); ?>

                                                        </li>
                                                        <li class="col-sm-5 col-6 text-sm"><b><?php echo e(__('City')); ?></b></li>
                                                        <li class="col-sm-7 col-6 text-sm">
                                                            <?php echo e(!empty($order['delivery_informations']['city']) ? $order['delivery_informations']['city'] : ''); ?>

                                                        </li>
                                                        <li class="col-sm-5 col-6 text-sm"><b><?php echo e(__('State')); ?></b></li>
                                                        <li class="col-sm-7 col-6 text-sm">
                                                            <?php echo e(!empty($order['delivery_informations']['state']) ? $order['delivery_informations']['state'] : ''); ?>

                                                        </li>
                                                        <li class="col-sm-5 col-6 text-sm"><b><?php echo e(__('Country')); ?></b></li>
                                                        <li class="col-sm-7 col-6 text-sm">
                                                            <?php echo e(!empty($order['delivery_informations']['country']) ? $order['delivery_informations']['country'] : ''); ?>

                                                        </li>
                                                        <li class="col-sm-5 col-6 text-sm"><b><?php echo e(__('Postal Code')); ?></b>
                                                        </li>
                                                        <li class="col-sm-7 col-6 text-sm">
                                                            <?php echo e(!empty($order['delivery_informations']['post_code']) ? $order['delivery_informations']['post_code'] : ''); ?>

                                                        </li>
                                                        <li class="col-sm-5 col-6 text-sm"><b><?php echo e(__('Phone')); ?> </b></li>
                                                        <li class="col-sm-7 col-6 text-sm">
                                                            <a href="https://api.whatsapp.com/send?phone=<?php echo e(!empty($order['delivery_informations']['phone']) ? $order['delivery_informations']['phone'] : ''); ?>&amp;text=Hi"
                                                                target="_blank">
                                                                <?php echo e(!empty($order['delivery_informations']['phone']) ? $order['delivery_informations']['phone'] : ''); ?>

                                                            </a>
                                                        </li>

                                                    </ul>
                                                </address>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-lg-6 ">
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between">
                                                <b class=""><?php echo e(__('Billing Information')); ?></b>
                                            </div>
                                            <div class="card-body pt-0" style="overflow: auto;">
                                                <address class="mb-0 text-sm">
                                                    <ul class="row mt-4 align-items-center">
                                                        <li class="col-sm-5 col-6 text-sm"><b><?php echo e(__('Name')); ?></b></li>
                                                        <dd class="col-sm-7 col-6 text-sm pb-2">
                                                            <?php echo e(!empty($order['billing_informations']['name']) ? $order['billing_informations']['name'] : ''); ?>

                                                        </dd>
                                                        <li class="col-sm-5 col-6 text-sm"><b><?php echo e(__('Email')); ?></b></li>
                                                        <dd class="col-sm-7 col-6 text-sm">
                                                            <?php echo e(!empty($order['billing_informations']['email']) ? $order['billing_informations']['email'] : ''); ?>

                                                        </dd>
                                                        <li class="col-sm-5 col-6 text-sm"><b><?php echo e(__('City')); ?></b></li>
                                                        <dd class="col-sm-7 col-6 text-sm">
                                                            <?php echo e(!empty($order['billing_informations']['city']) ? $order['billing_informations']['city'] : ''); ?>

                                                        </dd>
                                                        <li class="col-sm-5 col-6 text-sm"><b><?php echo e(__('State')); ?></b></li>
                                                        <dd class="col-sm-7 col-6 text-sm">
                                                            <?php echo e(!empty($order['billing_informations']['state']) ? $order['billing_informations']['state'] : ''); ?>

                                                        </dd>
                                                        <li class="col-sm-5 col-6 text-sm"><b><?php echo e(__('Country')); ?></b></li>
                                                        <dd class="col-sm-7 col-6 text-sm">
                                                            <?php echo e(!empty($order['billing_informations']['country']) ? $order['billing_informations']['country'] : ''); ?>

                                                        </dd>
                                                        <li class="col-sm-5 col-6 text-sm"><b><?php echo e(__('Postal Code')); ?></b>
                                                        </li>
                                                        <dd class="col-sm-7 col-6 text-sm">
                                                            <?php echo e(!empty($order['billing_informations']['post_code']) ? $order['billing_informations']['post_code'] : ''); ?>

                                                        </dd>
                                                        <li class="col-sm-5 col-6 text-sm"><b><?php echo e(__('Phone')); ?></b></li>
                                                        <li class="col-sm-7 col-6 text-sm">
                                                            <a href="https://api.whatsapp.com/send?phone=<?php echo e(!empty($order['billing_informations']['phone']) ? $order['billing_informations']['phone'] : ''); ?>&amp;text=Hi"
                                                                target="_blank">
                                                                <?php echo e(!empty($order['billing_informations']['phone']) ? $order['billing_informations']['phone'] : ''); ?>

                                                            </a>
                                                        </li>
                                                    </ul>
                                                </address>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php echo $__env->yieldPushContent('showdigitalproductattachment'); ?>
                                <?php echo $__env->yieldPushContent('CheckoutAttachment'); ?>
                                <?php echo $__env->yieldPushContent('ViewAdditionalFields'); ?>
                            </div>
                            <div class="col-xxl-5 col-md-6 col-12">
                                <div class="card  p-0">
                                    <div class="card-header d-flex justify-content-between pb-0">
                                        <b class="mb-4"><?php echo e(__('Extra Information')); ?></b>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo e(__('Sub Total')); ?> :</td>
                                                        <td><?php echo e(currency_format_with_sym($order['sub_total'] ?? 0, $store->id, $store->theme_id) ?? SetNumberFormat($order['sub_total'])); ?>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo e(__('Estimated Tax')); ?> :</td>
                                                        <td>
                                                            <?php if($order['paymnet_type'] == 'POS'): ?>
                                                                <?php echo e(currency_format_with_sym($order['tax_price'] ?? 0, $store->id, $store->theme_id) ?? SetNumberFormat($order['tax_price'])); ?>

                                                            <?php else: ?>
                                                                
                                                                <?php echo e(currency_format_with_sym($order['tax_price'] ?? 0, $store->id, $store->theme_id) ?? SetNumberFormat($order['tax_price'])); ?>

                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                    <?php if($order['paymnet_type'] == 'POS'): ?>
                                                        <tr>
                                                            <td><?php echo e(__('Discount')); ?> :</td>
                                                            <td><?php echo e(!empty($order['coupon_price']) ? currency_format_with_sym($order['coupon_price'] ?? 0, $store->id, $store->theme_id) ?? SetNumberFormat($order['coupon_price']) : SetNumberFormat(0)); ?>

                                                            </td>
                                                        </tr>
                                                    <?php else: ?>
                                                        <tr>
                                                            <td><?php echo e(__('Apply Coupon')); ?> :</td>
                                                            <td><?php echo e(!empty($order['coupon_info']['discount_amount']) ? currency_format_with_sym($order['coupon_info']['discount_amount'] ?? 0, $store->id, $store->theme_id) ?? currency_format_with_sym($order['coupon_info']['discount_amount'] ?? 0, $store->id, $store->theme_id) : currency_format_with_sym(0, $store->id, $store->theme_id)); ?>

                                                            </td>
                                                        </tr>
                                                    <?php endif; ?>
                                                    <?php echo $__env->yieldPushContent('savePriceShowOrderPage'); ?>
                                                    <tr>
                                                        <td><?php echo e(__('Delivered Charges')); ?> :</td>
                                                        <td><?php echo e(currency_format_with_sym($order['delivered_charge'] ?? 0, $store->id, $store->theme_id) ?? SetNumberFormat($order['delivered_charge'])); ?>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo e(__('Grand Total')); ?> :</td>
                                                        <td><b><?php echo e(currency_format_with_sym($order['final_price'] ?? 0, $store->id, $store->theme_id) ?? SetNumberFormat($order['final_price'])); ?></b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo e(__('Payment Type')); ?> :</td>
                                                        <td> <?php echo e($order['paymnet_type']); ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo e(__('Order Status')); ?> :</td>
                                                        <td><?php echo e($order['order_status_text']); ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <?php if(!empty($order_note)): ?>
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between">
                                            <p class="mb-0"><b><?php echo e(__('Order updates for')); ?>

                                                    <?php echo e($order['order_id']); ?></b>
                                            </p>
                                        </div>
                                        <div class="card-body">
                                            <?php
                                                $i = 1;
                                            ?>
                                            <?php $__currentLoopData = $order_note; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="card">
                                                    <div class="card-header">
                                                        <span class="time">
                                                            <?php echo e($i); ?> .
                                                            <?php echo e($note->created_at->format('l jS \\of F Y, h:ia')); ?>

                                                        </span>
                                                        <span class="tl-btn licence-btn">
                                                            <?php echo e($note->notes); ?>

                                                        </span>
                                                    </div>
                                                </div>
                                                <?php
                                                    $i++;
                                                ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php echo $__env->yieldPushContent('OrderPartialPaymentView'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="social-media">
            <?php if(isset($section->footer->section->footer_link)): ?>
                <div class="container">
                    <ul class="social-links justify-content-end">
                        <?php for($i = 0; $i < $section->footer->section->footer_link->loop_number ?? 1; $i++): ?>
                            <li>
                                <a href="<?php echo e($section->footer->section->footer_link->social_link->{$i} ?? '#'); ?>"
                                    target="_blank" id="social_link_<?php echo e($i); ?>">
                                    <img src="<?php echo e(asset($section->footer->section->footer_link->social_icon->{$i}->image ?? 'themes/' . $currentTheme . '/assets/images/youtube.svg')); ?>"
                                        class="<?php echo e('social_icon_' . $i . '_preview'); ?>" alt="icon"
                                        id="social_icon_<?php echo e($i); ?>">
                                </a>
                            </li>
                        <?php endfor; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php echo $__env->make('front_end.sections.partision.footer_section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
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

        document.querySelectorAll('.downloadable_product_variant').forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.getAttribute('data-product-id');
                const downloadLink = document.querySelector('.download_prod_' + productId);
                if (downloadLink) {
                    downloadLink.click();
                } else {
                    console.error('Download link not found for product ID:', productId);
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('front_end.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH B:\xampp\htdocs\ecommers\resources\views/front_end/sections/order_detail.blade.php ENDPATH**/ ?>