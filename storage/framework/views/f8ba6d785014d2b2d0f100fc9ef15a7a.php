
<div id="whatsapp-notification-settings" class="card">
    <?php echo e(Form::model($setting, ['route' => 'whatsapp-notification', 'method' => 'post'])); ?>

    <?php echo csrf_field(); ?>
    <div class="col-md-12">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <h5><?php echo e(__('WhatsApp Business API')); ?></h5>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-lg-6 form-group">
                    <?php echo Form::label('whatsapp_phone_number_id', __('WhatsApp Phone number ID'), ['class' =>
                    'form-label']); ?>

                    <?php echo Form::text('whatsapp_phone_number_id', $setting['whatsapp_phone_number_id'] ?? '', [
                    'class' => 'form-control',
                    'placeholder' => 'WhatsApp Phone number ID',
                    'id' => 'whatsapp_phone_number_id',
                    ]); ?>

                </div>
                <div class="col-lg-6 form-group">
                    <?php echo Form::label('whatsapp_access_token', __('WhatsApp Access Token'), ['class' => 'form-label']); ?>

                    <?php echo Form::text('whatsapp_access_token', $setting['whatsapp_access_token'] ?? '', [
                    'class' => 'form-control',
                    'placeholder' => 'WhatsApp Access Token',
                    'id' => 'whatsapp_access_token',
                    ]); ?>

                </div>

                <?php $__currentLoopData = $WhatsappNotification; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-6 col-sm-6 form-group">
                    <div class="list-group">
                        <div class="list-group-item form-switch form-switch-right">
                            <label class="form-label" style="margin-left:5%;"><?php echo e($notification->name); ?></label>

                            <input class="form-check-input whatsapp-notification" name='<?php echo e($notification->id); ?>'
                                id="<?php echo e($notification->id); ?>" type="checkbox" <?php if($notification->is_active == 1): ?>
                            checked="checked" <?php endif; ?>
                            type="checkbox" value="1" />
                            <label class="form-check-label" for="<?php echo e($notification->id); ?>"></label>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <div class="card-footer d-flex gap-2 justify-content-between flex-wrap ">
            <a href="#" data-ajax-popup1="true" data-size="md"
                            data-title="<?php echo e(__('Send Test whatsapp massage')); ?>"
                            data-url="<?php echo e(route('whatsappmassage.test')); ?>" data-toggle="tooltip"
                            title="<?php echo e(__('Test WhatsApp Massage')); ?>" class="btn btn-badge btn-primary test-whatsapp-massage">
                            <?php echo e(__('Send Test Message')); ?>

                        </a>

            <input type="submit" value="<?php echo e(__('Save Changes')); ?>" class="btn-submit btn btn-primary btn-badge">
        </div>
    </div>
    <?php echo e(Form::close()); ?>

</div>
<?php /**PATH B:\xampp\htdocs\ecommers\resources\views/setting/whatsapp_notify_setting.blade.php ENDPATH**/ ?>