<div class="card" id="shopify_Setting">
    <?php echo e(Form::open(['route' => 'shopify.settings', 'method' => 'post', 'enctype' => 'multipart/form-data'])); ?>

    <div class="card-header d-flex justify-content-between ">
        <h5 class=""> <?php echo e(__('Shopify Settings')); ?> </h5>
        <?php echo Form::hidden('shopify_setting_enabled', 'off'); ?>

        <div class="form-check form-switch d-inline-block">
            <?php echo Form::checkbox(
            'shopify_setting_enabled',
            'on',
            isset($setting['shopify_setting_enabled']) && $setting['shopify_setting_enabled'] == 'on',
            [
            'class' => 'form-check-input',
            'id' => 'shopify_setting_enabled',
            ],
            ); ?>

            <label class="custom-control-label form-control-label" for="shopify_setting_enabled"></label>
        </div>

    </div>
    <div class="card-body p-4">
        <div class="row">
            <div class="form-group col-md-12">
                <?php echo e(Form::label('shopify_store_url', __('Shopify store url'), ['class' => 'form-label'])); ?>

                <div class="input-group">
                    <?php echo e(Form::text('shopify_store_url', !empty($setting['shopify_store_url']) ? $setting['shopify_store_url'] : '', ['class' => 'form-control', 'placeholder' => __('Shopify store url')])); ?>

                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2"><?php echo e(__('.myshopify.com')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 form-group">
                <?php echo Form::label('shopify_access_token', __('Shopify access token'), ['class' => 'form-label']); ?>

                <?php echo Form::text(
                'shopify_access_token',
                !empty($setting['shopify_access_token']) ? $setting['shopify_access_token'] : '',
                [
                'class' => 'form-control',
                'placeholder' => 'Shopify Access Token',
                ],
                ); ?>

            </div>
        </div>
    </div>
    <div class="card-footer d-flex justify-content-end flex-wrap ">
        <input type="submit" value="<?php echo e(__('Save Changes')); ?>" class="btn-submit btn btn-primary btn-badge">
    </div>
    <?php echo Form::close(); ?>

</div>
<?php /**PATH B:\xampp\htdocs\ecommers\resources\views/setting/shopify_setting.blade.php ENDPATH**/ ?>