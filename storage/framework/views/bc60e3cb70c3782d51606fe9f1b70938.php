<!--Email Notification Setting-->
<div id="email-notification-settings" class="card">
    <?php echo e(Form::model($setting, ['route' => ['update.email.statue'], 'method' => 'post'])); ?>

    <?php echo csrf_field(); ?>
    <div class="col-md-12">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <h5><?php echo e(__('Email Notification Settings')); ?></h5>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <?php $__currentLoopData = $emailTemplates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $EmailTemplate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-6 col-sm-6 form-group">
                    <div class="list-group">
                        <div class="list-group-item form-switch form-switch-right">
                            <label class="form-label" style="margin-left:5%;"><?php echo e($EmailTemplate->name); ?></label>

                            <input class="form-check-input" name='<?php echo e($EmailTemplate->id); ?>' id="email_tempalte_<?php echo e($EmailTemplate->template->id); ?>" type="checkbox" <?php if($EmailTemplate->template->is_active == 1): ?> checked="checked" <?php endif; ?> type="checkbox" value="1" />
                            <label class="form-check-label"
                                for="email_tempalte_<?php echo e($EmailTemplate->template->id); ?>"></label>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-end flex-wrap ">
            <input type="submit" value="<?php echo e(__('Save Changes')); ?>" class="btn btn-print-invoice btn-badge btn-primary">
        </div>
    </div>
    <?php echo e(Form::close()); ?>

</div>
<!--End Email Notification Setting-->
<?php /**PATH B:\xampp\htdocs\ecommers\resources\views/setting/email_notify_setting.blade.php ENDPATH**/ ?>