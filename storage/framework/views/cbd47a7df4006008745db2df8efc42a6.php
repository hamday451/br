<?php $__env->startSection('page-title', __('Language')); ?>

<?php $__env->startSection('action-button'); ?>
<?php if(auth()->user()->type == 'super admin'): ?>
<div class="lang-setting">
    <?php if($currantLang != (!empty(env('default_language')) ? env('default_language') : 'en')): ?>
        <div class="form-check form-switch custom-switch-v1">
            <input type="hidden" name="disable_lang" value="off">
            <input type="checkbox" class="form-check-input input-primary" name="disable_lang" data-bs-placement="top" title="<?php echo e(__('Enable/Disable')); ?>" id="disable_lang" data-bs-toggle="tooltip" <?php echo e(!in_array($currantLang,$disabledLang) ? 'checked':''); ?> >
            <label class="form-check-label" for="disable_lang"></label>
        </div>
    <?php endif; ?>
    <div class="text-end d-flex all-button-box justify-content-md-end justify-content-center">
        <a href="#" class="btn btn-sm btn-primary" data-ajax-popup="true" data-size="md" data-title="<?php echo e(__('Add Language')); ?>"
        data-url="<?php echo e(route('create.language')); ?>" data-toggle="tooltip" title="<?php echo e(__('Create Language')); ?>">
        <i class="ti ti-plus"></i>
        </a>
    </div>

    <?php if($currantLang != (!empty(env('default_language')) ? env('default_language') : 'en')): ?>
    <?php echo Form::open(['method' => 'DELETE', 'route' => ['lang.destroy', $currantLang], 'class' => 'd-inline']); ?>

    <button type="button" class="btn btn-sm btn-danger show_confirm"  data-confirm="<?php echo e(__('Are You Sure?')); ?>"
    data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>" data-text-yes="<?php echo e(__('Yes')); ?>" data-text-no="<?php echo e(__('No')); ?>" >
        <i class="ti ti-trash text-white py-1" data-bs-toggle="tooltip"
            title="Delete"></i>
    </button>
    <?php echo Form::close(); ?>

    <?php endif; ?>
</div>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><?php echo e(__('Language')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php
    $modules = getshowModuleList(true);
?>
    <div class="row">
        <div class="card align-middle p-3" id="useradd-sidenav">
            <ul class="nav nav-pills w-100 row store-setting-tab" id="pills-tab" role="tablist">
                <li class="nav-item col-xxl-2 col-xl-3 col-md-4 col-sm-6  col-12 text-center">
                    <a class="nav-link btn-sm f-w-600 <?php echo e(( $module == 'General') ? ' active' : ''); ?> " href="<?php echo e(route('manage.language',[$currantLang])); ?>"><?php echo e(__('General')); ?></a>
                </li>
                <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                       // $item=$item->alias ?? $item->name;
                    ?>
                    <li class="nav-item col-xxl-2 col-xl-3 col-md-4 col-sm-6  col-12 text-center">
                        <a class="nav-link btn-sm f-w-600 <?php echo e(( $module == ($item)) ? ' active' : ''); ?> " href="<?php echo e(route('manage.language',[$currantLang,$item])); ?>"><?php echo e($item); ?></a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <div class="col-lg-3">
            <div class="card sticky-top " style="top:60px">
                <div class="list-group list-group-flush addon-set-tab p-3" id="useradd-sidenav">
                    <ul class="nav nav-pills flex-column w-100 gap-1" id="pills-tab" role="tablist">
                        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="nav-item " role="presentation">
                            <a href="<?php echo e(route('manage.language',[$key])); ?>"
                                class="nav-link <?php if($currantLang == $key): ?> active <?php endif; ?> list-group-item list-group-item-action border-0 rounded-1 text-center p-2 f-w-600">
                                <?php echo e(Str::upper($lang)); ?>

                            </a>

                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <?php if($module == 'General' || $module == ''): ?>
            <div class="p-3 card">
                    <ul class="nav nav-pills nav-fill" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-user-tab-1" data-bs-toggle="pill"
                                data-bs-target="#home" type="button"><?php echo e(__('Labels')); ?></button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-user-tab-2" data-bs-toggle="pill"
                                data-bs-target="#profile" type="button"><?php echo e(__('Messages')); ?></button>
                        </li>
                    </ul>

                </div>
                <?php endif; ?>
            <div class="col-xl-12 col-md-12">
                <div class="card card-fluid">
                    <div class="card-body" style="position: relative;">
                        <div class="tab-content no-padding" id="myTab2Content">
                            <div class="tab-pane fade show active" id="lang1" role="tabpanel" aria-labelledby="home-tab4">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <form method="post" action="<?php echo e(route('store.language.data',[$currantLang,$module])); ?>">
                                            <?php echo csrf_field(); ?>
                                            <div class="row">
                                                <?php $__currentLoopData = $arrLabel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="example3cols1Input"><?php echo e($label); ?> </label>
                                                            <input type="text" class="form-control" name="label[<?php echo e($label); ?>]" value="<?php echo e($value); ?>">
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-lg-12">
                                                    <div class="text-end">
                                                        <div class="d-flex justify-content-end">
                                                                <?php echo e(Form::submit(__('Save Changes'),array('class'=>'btn btn-xs btn-primary btn-badge'))); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <form method="post" action="<?php echo e(route('store.language.data',[$currantLang,$module])); ?>">
                                            <?php echo csrf_field(); ?>
                                            <div class="row">
                                                <?php $__currentLoopData = $arrMessage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fileName => $fileValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-lg-12">
                                                        <h5><?php echo e(ucfirst($fileName)); ?></h5>
                                                    </div>
                                                    <?php $__currentLoopData = $fileValue; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if(is_array($value)): ?>
                                                            <?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label2 => $value2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if(is_array($value2)): ?>
                                                                    <?php $__currentLoopData = $value2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label3 => $value3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php if(is_array($value3)): ?>
                                                                            <?php $__currentLoopData = $value3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label4 => $value4): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <?php if(is_array($value4)): ?>
                                                                                    <?php $__currentLoopData = $value4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label5 => $value5): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <div class="col-md-6">
                                                                                            <div class="form-group">
                                                                                                <label class="form-label"><?php echo e($fileName); ?>.<?php echo e($label); ?>.<?php echo e($label2); ?>.<?php echo e($label3); ?>.<?php echo e($label4); ?>.<?php echo e($label5); ?></label>
                                                                                                <input type="text" class="form-control" name="message[<?php echo e($fileName); ?>][<?php echo e($label); ?>][<?php echo e($label2); ?>][<?php echo e($label3); ?>][<?php echo e($label4); ?>][<?php echo e($label5); ?>]" value="<?php echo e($value5); ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                <?php else: ?>
                                                                                    <div class="col-lg-6">
                                                                                        <div class="form-group">
                                                                                            <label class="form-label"><?php echo e($fileName); ?>.<?php echo e($label); ?>.<?php echo e($label2); ?>.<?php echo e($label3); ?>.<?php echo e($label4); ?></label>
                                                                                            <input type="text" class="form-control" name="message[<?php echo e($fileName); ?>][<?php echo e($label); ?>][<?php echo e($label2); ?>][<?php echo e($label3); ?>][<?php echo e($label4); ?>]" value="<?php echo e($value4); ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                <?php endif; ?>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php else: ?>
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-label"><?php echo e($fileName); ?>.<?php echo e($label); ?>.<?php echo e($label2); ?>.<?php echo e($label3); ?></label>
                                                                                    <input type="text" class="form-control" name="message[<?php echo e($fileName); ?>][<?php echo e($label); ?>][<?php echo e($label2); ?>][<?php echo e($label3); ?>]" value="<?php echo e($value3); ?>">
                                                                                </div>
                                                                            </div>
                                                                        <?php endif; ?>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php else: ?>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label class="form-label"><?php echo e($fileName); ?>.<?php echo e($label); ?>.<?php echo e($label2); ?></label>
                                                                            <input type="text" class="form-control" name="message[<?php echo e($fileName); ?>][<?php echo e($label); ?>][<?php echo e($label2); ?>]" value="<?php echo e($value2); ?>">
                                                                        </div>
                                                                    </div>
                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php else: ?>
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label class="form-label"><?php echo e($fileName); ?>.<?php echo e($label); ?></label>
                                                                    <input type="text" class="form-control" name="message[<?php echo e($fileName); ?>][<?php echo e($label); ?>]" value="<?php echo e($value); ?>">
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="text-end">
                                                    <div class="d-flex justify-content-end">
                                                            <?php echo e(Form::submit(__('Save Changes'),array('class'=>'btn btn-xs btn-primary btn-badge'))); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('custom-script'); ?>
    <script>
        $(document).on('change','#disable_lang',function(){
        var val = $(this).prop("checked");
        if(val == true){
                var langMode = 'on';
        }
        else{
            var langMode = 'off';
        }

        $.ajax({
                type:'POST',
                url: "<?php echo e(route('disablelanguage')); ?>",
                datType: 'json',
                data:{
                    "_token": "<?php echo e(csrf_token()); ?>",
                    "mode":langMode,
                    "lang":"<?php echo e($currantLang); ?>"
                },
                success : function(data){
                    $('#loader').fadeOut();
                    show_toastr('Success',data.message, 'success')
                }
        });
        });
    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH B:\xampp\htdocs\ecommers\resources\views/language/index.blade.php ENDPATH**/ ?>