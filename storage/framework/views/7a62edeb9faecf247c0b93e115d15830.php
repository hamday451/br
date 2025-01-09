<div class="card" id="Pixel_Setting">
    <div class="card-header">
        <div class="row g-0">
            <div class="col-6">
                <h5> <?php echo e(__('Pixel Fields Settings')); ?> </h5>
                <small><?php echo e(__('Enter Your Pixel Fields Settings')); ?></small>
            </div>
            <div class="col-6 text-end">
                <a href="javascript:;" class="btn btn-sm btn-icon btn-primary me-2" data-ajax-popup="true"
                    data-url="<?php echo e(route('pixel-setting.create')); ?>" data-toggle="tooltip"
                    data-bs-placement="top" title="<?php echo e(__('Add New Pixel')); ?>"
                    data-title="<?php echo e(__('Create New Pixel')); ?>">
                <i class="ti ti-plus"></i>

                </a>
            </div>
        </div>
    </div>
    <div class="">
        <div class="row g-0">
            <div class="card-body table-border-style">
                <div class="datatable-container">
                    <div class="table-responsive custom-field-table">
                        <table class="table dataTable-table" id="pc-dt-simple" data-repeater-list="fields">
                            <thead class="thead-light">
                                <tr>
                                    <th><?php echo e(__('Platform')); ?></th>
                                    <th><?php echo e(__('Pixel Id')); ?></th>
                                    <th class="text-end">
                                        <?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $PixelFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $PixelField): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-capitalize">
                                            <?php echo e($PixelField->platform); ?>

                                        </td>
                                        <td>
                                            <?php echo e($PixelField->pixel_id); ?>

                                        </td>
                                        <td>
                                            <div class="d-flex gap-1 justify-content-end">
                                                <?php echo Form::open([
                                                    'method' => 'DELETE',
                                                    'route' => ['pixel-setting.destroy', $PixelField->id],
                                                    'class' => 'd-inline',
                                                ]); ?>

                                                <button type="button"
                                                    class="btn btn-sm btn-danger btn-badge show_confirm" data-toggle="tooltip"
                                                    title="<?php echo e(__('Delete')); ?>">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                                <?php echo Form::close(); ?>

                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH B:\xampp\htdocs\ecommers\resources\views/setting/pixel_field_setting.blade.php ENDPATH**/ ?>