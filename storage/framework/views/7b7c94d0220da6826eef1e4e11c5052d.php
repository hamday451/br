<div class="card" id="Woocommerce_Setting">
    <?php echo e(Form::open(['route' => 'woocommerce.settings', 'method' => 'post', 'enctype' => 'multipart/form-data'])); ?>

    <div class="card-header d-flex justify-content-between ">
        <h5 class=""> <?php echo e(__('Woocommerce Settings')); ?> </h5>
        <?php echo Form::hidden('woocommerce_setting_enabled', 'off'); ?>

        <div class="form-check form-switch d-inline-block">
            <?php echo Form::checkbox(
            'woocommerce_setting_enabled',
            'on',
            isset($setting['woocommerce_setting_enabled']) && $setting['woocommerce_setting_enabled'] == 'on',
            [
            'class' => 'form-check-input',
            'id' => 'woocommerce_setting_enabled',
            ],
            ); ?>

            <label class="custom-control-label form-control-label" for="woocommerce_setting_enabled"></label>
        </div>
    </div>
    <div class="card-body p-4">
        <div class="row">
            <div class="col-lg-12 form-group">
                <?php echo Form::label('woocommerce_store_url', __('Store Url'), ['class' => 'form-label']); ?>

                <?php echo Form::text(
                'woocommerce_store_url',
                !empty($setting['woocommerce_store_url']) ? $setting['woocommerce_store_url'] : '',
                [
                'class' => 'form-control',
                'placeholder' => 'Woocommerce store url',
                ],
                ); ?>

            </div>
            <div class="col-lg-12 form-group">
                <?php echo Form::label('woocommerce_consumer_key', __('Consumer Key'), ['class' => 'form-label']); ?>

                <?php echo Form::text(
                'woocommerce_consumer_key',
                !empty($setting['woocommerce_consumer_key']) ? $setting['woocommerce_consumer_key'] : '',
                [
                'class' => 'form-control',
                'placeholder' => 'Woocommerce consumer key',
                ],
                ); ?>

            </div>
            <div class="col-lg-12 form-group">
                <?php echo Form::label('woocommerce_consumer_secret', __('Consumer Secret'), ['class' => 'form-label']); ?>

                <?php echo Form::text(
                'woocommerce_consumer_secret',
                !empty($setting['woocommerce_consumer_secret']) ? $setting['woocommerce_consumer_secret'] : '',
                ['class' => 'form-control', 'placeholder' => 'Woocommerce consumer secret'],
                ); ?>

            </div>

        </div>
    </div>
    <div class="card-footer d-flex justify-content-end flex-wrap ">
        <input type="submit" value="<?php echo e(__('Save Changes')); ?>" class="btn-submit btn btn-primary btn-badge">
    </div>
    <?php echo Form::close(); ?>

</div>
<?php /**PATH B:\xampp\htdocs\ecommers\resources\views/setting/woocom_setting.blade.php ENDPATH**/ ?>