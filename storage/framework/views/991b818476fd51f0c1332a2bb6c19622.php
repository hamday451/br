<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Store Create')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item" aria-current="page"><?php echo e(__('Add')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo Form::open(['route' => 'stores.store', 'method' => 'post', 'enctype' => 'multipart/form-data', 'autocomplete' => 'off']); ?>


    <?php if(auth()->user()->type == 'super admin' && !empty($setting['chatgpt_key'])): ?>
        <div class="d-flex justify-content-end">
            <a href="#" class="btn btn-primary btn-badge me-2 ai-btn" data-size="lg" data-ajax-popup-over="true"
                data-url="<?php echo e(route('generate', ['store'])); ?>" data-bs-toggle="tooltip" data-bs-placement="top"
                title="<?php echo e(__('Generate')); ?>" data-title="<?php echo e(__('Generate Content With AI')); ?>">
                <i class="fas fa-robot"></i> <?php echo e(__('Generate with AI')); ?>

            </a>
        </div>
    <?php endif; ?>

    <?php if(auth()->user()->type == 'admin' && $plan && $plan->enable_chatgpt == 'on'): ?>
        <div class="d-flex justify-content-end">
            <a href="#" class="btn btn-primary me-2 ai-btn btn-badge" data-size="lg" data-ajax-popup-over="true"
                data-url="<?php echo e(route('generate', ['store'])); ?>" data-bs-toggle="tooltip" data-bs-placement="top"
                title="<?php echo e(__('Generate')); ?>" data-title="<?php echo e(__('Generate Content With AI')); ?>">
                <i class="fas fa-robot"></i> <?php echo e(__('Generate with AI')); ?>

            </a>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="form-group col-md-12">
            <?php echo Form::label('storename', __('Store Name'), ['class' => 'form-label']); ?>

            <?php echo Form::text('storename', null, [
                'class' => 'form-control',
                'id' => 'storename',
                'placeholder' => __('Enter Store Name'),
                'required' => 'true',
            ]); ?>

        </div>

        <?php if(auth()->user()->type == 'admin'): ?>
            <div class="form-group col-md-12">
                <?php
                    $store = App\Models\Store::where('id', getCurrentStore())->first();
                ?>
                <div class="mt-4 select-themes plan-select">
                    <div class="d-flex align-items-center justify-content-between">
                        <?php echo Form::label('', __('Theme'), ['class' => 'form-label']); ?>

                        <div class="col-md-2">
                            <input type="text" id="theme-search" placeholder="<?php echo e(__('Search Themes')); ?>"
                                class="mt-3 form-control">
                        </div>
                    </div>
                    <ul class="pt-3 uploaded-pics row" id="theme-list">
                        <?php $__currentLoopData = $themes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="col-xxl-3 col-xl-4 col-md-6 theme-item  p-1">
                                <input class="form-check-input email-template-checkbox d-none" type="radio"
                                    id="theme_<?php echo e(!empty($value) ? $value : ''); ?>" name="theme_id"
                                    value="<?php echo e(!empty($value) ? $value : ''); ?>"
                                    <?php if(!empty($value) ? $store->theme_id == $value : 0): ?> checked="checked" <?php endif; ?> />
                                <label for="theme_<?php echo e(!empty($value) ? $value : ''); ?>">
                                    <span class="theme-label"><?php echo e(ucfirst($value)); ?></span>
                                    <img src="<?php echo e(asset('themes/' . $value . '/theme_img/img_1.png')); ?>" />
                                </label>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>

        <?php if(auth()->user()->type == 'super admin'): ?>
            <div class="form-group col-md-12">
                <?php echo Form::label('name', __('Name'), ['class' => 'form-label']); ?>

                <?php echo Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => __('Enter Name')]); ?>

            </div>
            <div class="form-group col-md-12">
                <?php echo Form::label('email', __('Email'), ['class' => 'form-label']); ?>

                <?php echo Form::email('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => __('Enter Email')]); ?>

            </div>
            <div class="form-group col-md-12">
                <?php echo Form::label('password', __('Password'), ['class' => 'form-label']); ?>

                <?php echo e(Form::password('password', ['class' => 'form-control', 'id' => 'password', 'placeholder' => __('Enter Password')])); ?>

            </div>
        <?php endif; ?>

        <div class="pb-0 modal-footer">
            <a href="<?php echo e(route('dashboard')); ?>"class="btn btn-secondary btn-badge me-2"><?php echo e(__('Back')); ?> </a>
            <input type="submit" value="Create" class="btn btn-primary btn-badge">
        </div>
    </div>
    <?php echo Form::close(); ?>



<?php $__env->stopSection(); ?>

<?php $__env->startPush('custom-script'); ?>
    <script>
        $(document).on('keyup', '#theme-search', function() {
            var value = $(this).val().toLowerCase();
            $('#theme-list .theme-item').filter(function() {
                $(this).toggle($(this).find('.theme-label').text().toLowerCase().indexOf(value) > -1)
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH B:\xampp\htdocs\ecommers\resources\views/store/create.blade.php ENDPATH**/ ?>