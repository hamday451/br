<div class="card" id="Refund_Setting">
    <?php echo e(Form::open(['route' => 'refund.settings', 'method' => 'post', 'enctype' => 'multipart/form-data'])); ?>

    <div class="card-header d-flex justify-content-between">
        <h5><?php echo e(__('Refund Settings')); ?> </h5>
    </div>
    <?php
        $order_refunds = App\Models\OrderRefundSetting::where('theme_id', APP_THEME())
            ->where('store_id', getCurrentStore())
            ->pluck('is_active', 'name')->toArray();
    ?>
    <div class="card-body p-4">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 form-group">
                <div class="list-group">
                    <div class="list-group-item form-switch form-switch-right">
                        <label class="form-label"
                            style="margin-left:5%;"><?php echo e(__('Manage Stock')); ?></label>
                        <input type="hidden" name="manage_stock" value="0">
                        <input type="checkbox" class="form-check-input" id="manage_stock"
                            name="manage_stock"
                            <?php if($order_refunds['manage_stock'] ?? '' == 1): ?> checked="checked" <?php endif; ?> type="checkbox"
                            value="1" data-url="" />
                        <label class="form-check-label f-w-600 pl-1" for="manage_stock"></label>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 form-group">
                <div class="list-group">
                    <div class="list-group-item form-switch form-switch-right">
                        <label class="form-label"
                            style="margin-left:5%;"><?php echo e(__('Attachment')); ?></label>
                        <input type="hidden" name="attachment" value="0">
                        <input type="checkbox" class="form-check-input" id="attachment"
                            name="attachment"
                            <?php if($order_refunds['attachment'] ?? '' == 1): ?> checked="checked" <?php endif; ?> type="checkbox"
                            value="1" data-url="" />
                        <label class="form-check-label f-w-600 pl-1" for="attachment"></label>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 form-group">
                <div class="list-group">
                    <div class="list-group-item form-switch form-switch-right">
                        <label class="form-label"
                            style="margin-left:5%;"><?php echo e(__('Shipment amount deduct during')); ?></label>
                        <input type="hidden" name="shiping_deduct" value="0">
                        <input type="checkbox" class="form-check-input" id="shiping_deduct"
                            name="shiping_deduct"
                            <?php if($order_refunds['shiping_deduct'] ?? '' == 1): ?> checked="checked" <?php endif; ?> type="checkbox"
                            value="1" data-url="" />
                        <label class="form-check-label f-w-600 pl-1" for="shiping_deduct"></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer d-flex justify-content-end flex-wrap ">
        <input type="submit" value="<?php echo e(__('Save Changes')); ?>" class="btn-submit btn btn-primary btn-badge">
    </div>
    <?php echo Form::close(); ?>

</div>
<?php /**PATH B:\xampp\htdocs\ecommers\resources\views/setting/refund_setting.blade.php ENDPATH**/ ?>