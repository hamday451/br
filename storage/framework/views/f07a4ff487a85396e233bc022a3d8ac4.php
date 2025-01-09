<div class="card" id="twilio_setting">
    <?php echo e(Form::open(['route' => 'twilio.settings', 'method' => 'post', 'enctype' => 'multipart/form-data'])); ?>

    <div class="card-header d-flex justify-content-between ">
        <h5> <?php echo e(__('Twilio Settings')); ?> </h5>
        <?php echo Form::hidden('twilio_setting_enabled', 'off'); ?>

        <div class="form-check form-switch d-inline-block">
            <?php echo Form::checkbox(
            'twilio_setting_enabled',
            'on',
            isset($setting['twilio_setting_enabled']) && $setting['twilio_setting_enabled'] === 'on',
            [
            'class' => 'form-check-input',
            'id' => 'twilio_setting_enabled',
            ],
            ); ?>

            <label class="custom-control-label form-control-label" for="twilio_setting_enabled"></label>
        </div>
    </div>
    <div class="card-body p-4">
        <div class="row">
            <div class="col-lg-6 form-group">
                <?php echo Form::label('twilio_sid', __('Twilio SID'), ['class' => 'form-label']); ?>

                <?php echo Form::text('twilio_sid', !empty($setting['twilio_sid']) ? $setting['twilio_sid'] : '', [
                'class' => 'form-control',
                'placeholder' => 'Twilio SID',
                ]); ?>

            </div>
            <div class="col-lg-6 form-group">
                <?php echo Form::label('twilio_token', __('Twilio Token'), ['class' => 'form-label']); ?>

                <?php echo Form::text('twilio_token', !empty($setting['twilio_token']) ? $setting['twilio_token'] : '', [
                'class' => 'form-control',
                'placeholder' => 'Twilio Token',
                ]); ?>

            </div>
            <div class="col-lg-6 form-group">
                <?php echo Form::label('twilio_from', __('Twilio From'), ['class' => 'form-label']); ?>

                <?php echo Form::text('twilio_from', !empty($setting['twilio_from']) ? $setting['twilio_from'] : '', [
                'class' => 'form-control',
                'placeholder' => 'twilio consumer secret',
                ]); ?>

            </div>

            <div class="col-lg-6 form-group">
                <?php echo Form::label('twilio_notification_number', __('Notification Number'), ['class' => 'form-label']); ?>

                <?php echo Form::text(
                'twilio_notification_number',
                !empty($setting['twilio_notification_number']) ? $setting['twilio_notification_number'] : '',
                ['class' => 'form-control', 'placeholder' => 'twilio consumer secret'],
                ); ?>

                <small>* <?php echo e(__('Use country code with your number')); ?> *</small>
            </div>
        </div>
    </div>
    <div class="card-footer d-flex justify-content-end flex-wrap ">
        <input type="submit" value="<?php echo e(__('Save Changes')); ?>" class="btn-submit btn btn-primary btn-badge">
    </div>
    <?php echo Form::close(); ?>

</div>
<?php /**PATH B:\xampp\htdocs\ecommers\resources\views/setting/twilio_setting.blade.php ENDPATH**/ ?>