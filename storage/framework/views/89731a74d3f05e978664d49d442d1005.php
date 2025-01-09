<div class="card" id="whatsapp_message_Setting">
    <?php echo e(Form::model($setting, ['route' => ['customMassage'], 'method' => 'POST'])); ?>

    <div class="card-header">
        <h5 class="">
            <?php echo e(__('Whatsapp Message Settings')); ?>

        </h5>
    </div>
    <div class="card-body p-4">

        <div class="row">
            <h6 class="font-weight-bold"><?php echo e(__('Order Variable')); ?></h6>
            <div class="form-group col-md-6">
                <p class="mb-1"><?php echo e(__('Store Name')); ?> : <span class="pull-right text-primary">{store_name}</span></p>
                <p class="mb-1"><?php echo e(__('Order No')); ?> : <span class="pull-right text-primary">{order_no}</span></p>
                <p class="mb-1"><?php echo e(__('Customer Name')); ?> : <span class="pull-right text-primary">{customer_name}</span>
                </p>
                <p class="mb-1"><?php echo e(__('Billing Address')); ?> : <span
                        class="pull-right text-primary">{billing_address}</span></p>
                <p class="mb-1"><?php echo e(__('Billing Country')); ?> : <span
                        class="pull-right text-primary">{billing_country}</span></p>
                <p class="mb-1"><?php echo e(__('Billing City')); ?> : <span class="pull-right text-primary">{billing_city}</span>
                </p>
                <p class="mb-1"><?php echo e(__('Billing Postalcode')); ?> : <span
                        class="pull-right text-primary">{billing_postalcode}</span></p>
                <p class="mb-1"><?php echo e(__('Shipping Address')); ?> : <span
                        class="pull-right text-primary">{shipping_address}</span></p>
                <p class="mb-1"><?php echo e(__('Shipping Country')); ?> : <span
                        class="pull-right text-primary">{shipping_country}</span></p>

                <p class="mb-1"><?php echo e(__('Shipping City')); ?> : <span class="pull-right text-primary">{shipping_city}</span>
                </p>
                <p class="mb-1"><?php echo e(__('Shipping Postalcode')); ?> : <span
                        class="pull-right text-primary">{shipping_postalcode}</span></p>
                <p class="mb-1"><?php echo e(__('Item Variable')); ?> : <span class="pull-right text-primary">{item_variable}</span>
                </p>
                <p class="mb-1"><?php echo e(__('Qty Total')); ?> : <span class="pull-right text-primary">{qty_total}</span></p>
                <p class="mb-1"><?php echo e(__('Sub Total')); ?> : <span class="pull-right text-primary">{sub_total}</span></p>
                <p class="mb-1"><?php echo e(__('Discount Amount')); ?> : <span
                        class="pull-right text-primary">{discount_amount}</span></p>
                <p class="mb-1"><?php echo e(__('Shipping Amount')); ?> : <span
                        class="pull-right text-primary">{shipping_amount}</span></p>
                <p class="mb-1"><?php echo e(__('Total Tax')); ?> : <span class="pull-right text-primary">{total_tax}</span></p>
                <p class="mb-1"><?php echo e(__('Final Total')); ?> : <span class="pull-right text-primary">{final_total}</span></p>
            </div>
            <div class="form-group col-md-6">
                <h6 class="font-weight-bold"><?php echo e(__('Item Variable')); ?></h6>
                <p class="mb-1"><?php echo e(__('Sku')); ?> : <span class="pull-right text-primary">{sku}</span>
                </p>
                <p class="mb-1"><?php echo e(__('Quantity')); ?> : <span class="pull-right text-primary">{quantity}</span></p>
                <p class="mb-1"><?php echo e(__('Product Name')); ?> : <span class="pull-right text-primary">{product_name}</span>
                </p>
                <p class="mb-1"><?php echo e(__('Variant Name')); ?> : <span class="pull-right text-primary">{variant_name}</span>
                </p>
                <p class="mb-1"><?php echo e(__('Item Tax')); ?> : <span class="pull-right text-primary">{item_tax}</span></p>
                <p class="mb-1"><?php echo e(__('Item total')); ?> : <span class="pull-right text-primary">{item_total}</span></p>
                <div class="form-group">
                    <label for="storejs" class="col-form-label">{item_variable}</label>
                    <?php echo e(Form::text('whatsapp_item_variable', $setting['whatsapp_item_variable'] ?? '', ['class' => 'form-control', 'placeholder' => '{quantity} x {product_name} - {variant_name} + {item_tax} = {item_total}'])); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('content', __('Whatsapp Message'), ['class' => 'col-form-label'])); ?>

                    <?php echo e(Form::textarea('whatsapp_content', $setting['whatsapp_content'] ?? '', ['class' => 'form-control', 'required' => 'required'])); ?>

                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="text-end">
            <div class="card-footer">
                <div class="col-sm-12 px-2">
                    <div class="d-flex justify-content-end">
                        <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary btn-badge'])); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo e(Form::close()); ?>

</div>
<?php /**PATH B:\xampp\htdocs\ecommers\resources\views/setting/whatsapp_msg_setting.blade.php ENDPATH**/ ?>