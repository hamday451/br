<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('DeliveryBoy')); ?>

<?php $__env->stopSection(); ?>

<?php
    $logo = asset(Storage::url('uploads/profile/'));
?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item" aria-current="page"><?php echo e(__('DeliveryBoy')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-button'); ?>
    <?php if (app('laratrust')->hasPermission('Create DeliveryBoy')) : ?>
        <div class="text-end d-flex all-button-box justify-content-md-end justify-content-center">
            <a href="#" class="btn btn-sm btn-primary btn-badge mx-1" data-ajax-popup="true" data-size="md" data-title="<?php echo e(__('Create DeliveryBoy')); ?>"
                data-url="<?php echo e(route('deliveryboy.create')); ?>" data-bs-toggle="tooltip" title="<?php echo e(__('Add DeliveryBoy')); ?>">
                <i class="ti ti-plus"></i>
            </a>
        </div>
    <?php endif; // app('laratrust')->permission ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="delivery-user-cards">
        <div class="row">
            <?php $__currentLoopData = $deliveryboys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deliveryboy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="card text-center">
                        <div class="card-inner">
                            <div class="card-header border-0 pb-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0">
                                        <div class="badge p-2 px-3 rounded bg-primary"><?php echo e(ucfirst($deliveryboy->type)); ?></div>
                                    </h6>
                                </div>
                                    <div class="card-header-right">
                                        <div class="btn-group card-option">
                                            <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <i class="feather icon-more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <?php if (app('laratrust')->hasPermission('Edit Deliveryboy')) : ?>
                                                    <a href="#" class="dropdown-item"
                                                        data-url="<?php echo e(route('deliveryboy.edit', $deliveryboy->id)); ?>" data-size="md"
                                                        data-ajax-popup="true" data-title="<?php echo e(__('Update DeliveryBoy')); ?>">
                                                        <i class="ti ti-edit"></i>
                                                        <span class="ms-2"><?php echo e(__('Edit')); ?></span>
                                                    </a>
                                                <?php endif; // app('laratrust')->permission ?>
                                                <?php if (app('laratrust')->hasPermission('Reset password Deliveryboy')) : ?>
                                                    <a href="#" class="dropdown-item"
                                                        data-url="<?php echo e(route('deliveryboy.reset', \Crypt::encrypt($deliveryboy->id))); ?>"
                                                        data-ajax-popup="true" data-size="md" data-title="<?php echo e(__('Change Password')); ?>">
                                                        <i class="ti ti-key"></i>
                                                        <span class="ms-2"><?php echo e(__('Reset Password')); ?></span>
                                                    </a>
                                                <?php endif; // app('laratrust')->permission ?>
                                                <?php if (app('laratrust')->hasPermission('Delete Deliveryboy')) : ?>
                                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['deliveryboy.destroy', $deliveryboy->id], 'class' => 'd-inline']); ?>

                                                    <a href="#" class="bs-pass-para dropdown-item show_confirm" data-confirm="<?php echo e(__('Are You Sure?')); ?>"
                                                        data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>" data-text-yes="<?php echo e(__('Yes')); ?>" data-text-no="<?php echo e(__('No')); ?>" 
                                                        data-confirm-yes="delete-form-<?php echo e($deliveryboy->id); ?>"><i class="ti ti-trash"></i>
                                                        <span class="ms-2"><?php echo e(__('Delete')); ?></span>
                                                    </a>
                                                    <?php echo Form::close(); ?>

                                                <?php endif; // app('laratrust')->permission ?>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="card-body">
                                <div class="img-fluid rounded-circle card-avatar">
                                    <a href="<?php echo e(!empty($deliveryboy->profile_image) ? asset($deliveryboy->profile_image) : asset('storage/uploads/profile/avatar.png')); ?>"
                                        target="_blank">
                                        <img src="<?php echo e(!empty($deliveryboy->profile_image) ? asset($deliveryboy->profile_image) : asset('storage/uploads/profile/avatar.png')); ?>"
                                            class="img-user wid-80 round-img rounded-circle">
                                    </a>
                                </div>
                                <h4 class="mt-2 text-primary"><?php echo e($deliveryboy->name); ?></h4>
                                <small class=""><?php echo e($deliveryboy->email); ?></small>
                            </div>
                        </div>
                    
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 col-sm-6 col-md-6">
                <?php if (app('laratrust')->hasPermission('Create DeliveryBoy')) : ?>
                    <a class="btn-addnew-project" data-url="<?php echo e(route('deliveryboy.create')); ?>" data-title="<?php echo e(__('Create DeliveryBoy')); ?>"
                        data-ajax-popup="true" style="cursor: pointer; ">
                        <div class="btn btn-sm btn-primary btn-badge" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Add DeliveryBoy')); ?>">
                            <i class="ti ti-plus"></i>
                        </div>
                        <h6 class="mt-4 mb-2"><?php echo e(__('Create New DeliveryBoy')); ?></h6>
                        <p class="text-muted text-center"><?php echo e(__('Click here to Create New DeliveryBoy')); ?></p>
                    </a>
                <?php endif; // app('laratrust')->permission ?>
            </div>
        </div>
    </div>
   
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH B:\xampp\htdocs\ecommers\resources\views/deliveryboy/index.blade.php ENDPATH**/ ?>