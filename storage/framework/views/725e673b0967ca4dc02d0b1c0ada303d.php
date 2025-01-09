<div class="card" id="Loyality_program">
    <?php echo e(Form::open(['route' => 'loyality.program.settings', 'method' => 'post', 'enctype' => 'multipart/form-data'])); ?>

    <div class="card-header d-flex justify-content-between ">
        <h5 class=""> <?php echo e(__('Loyality Program')); ?> </h5>
        <?php echo Form::hidden('loyality_program_enabled', 'off'); ?>

        <div class="form-check form-switch d-inline-block">
            <?php echo Form::checkbox(
            'loyality_program_enabled',
            'on',
            isset($setting['loyality_program_enabled']) && $setting['loyality_program_enabled'] == 'on',
            [
            'class' => 'form-check-input',
            'id' => 'loyality_program_enabled',
            ],
            ); ?>

            <label class="custom-control-label form-control-label" for="loyality_program_enabled"></label>
        </div>
    </div>

    <div class="card-body p-4">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-4 form-group">
                <?php echo Form::label('', __('Reward points on orders of ' . (isset($setting['CURRENCY']) ? $setting['CURRENCY'] : '$') . '1000'), ['class' =>
                'form-label']); ?>

                <?php echo Form::number('reward_point', $setting['reward_point'] ?? '', [
                'class' => 'form-control',
                'placeholder' => 'Enter Point',
                'step' => 0.01,
                ]); ?>


            </div>
        </div>
    </div>
    <div class="card-footer d-flex justify-content-end flex-wrap ">
        <input type="submit" value="<?php echo e(__('Save Changes')); ?>" class="btn-submit btn btn-primary btn-badge">
    </div>
    <?php echo Form::close(); ?>

</div>
<?php /**PATH B:\xampp\htdocs\ecommers\resources\views/setting/loyality_pro_setting.blade.php ENDPATH**/ ?>