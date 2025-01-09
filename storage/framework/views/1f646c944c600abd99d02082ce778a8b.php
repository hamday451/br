<div class="card" id="Webhook_Setting">
    <div class="card-header">
        <div class="row g-0">
            <div class="col-6">
                <h5> <?php echo e(__('Webhook Settings')); ?> </h5>
                <small><?php echo e(__('Edit your Webhook Settings')); ?></small>
            </div>
            <div class="col-6 text-end">
                <a href="javascript:;" class="btn btn-sm btn-icon btn-primary me-2" data-ajax-popup="true"
                    data-url="<?php echo e(route('webhook.create')); ?>" data-toggle="tooltip" data-bs-placement="top"
                    title="<?php echo e(__('Add Webhook')); ?>" data-title="<?php echo e(__('Create New Webhook')); ?>">
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
                                    <th><?php echo e(__('module')); ?></th>

                                    <th><?php echo e(__('url')); ?></th>
                                    <th><?php echo e(__('method')); ?></th>
                                    <th class="text-end"><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <?php $__currentLoopData = $webhooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $webhook): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tbody>
                                <td><?php echo e($webhook->module); ?></td>
                                <td><?php echo e($webhook->url); ?></td>
                                <td><?php echo e($webhook->method); ?></td>
                                <td>
                                    <div class="d-flex gap-1 justify-content-end">
                                        <button class="btn btn-sm btn-info"
                                            data-url="<?php echo e(route('webhook.edit', $webhook->id)); ?>" data-size="md"
                                            data-ajax-popup="true" data-title="<?php echo e(__('Edit webhook')); ?>" data-toggle="tooltip"
                                            title="<?php echo e(__('Edit')); ?>">
                                            <i class="ti ti-pencil"></i>
                                        </button>

                                        <?php echo Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['webhook.destroy', $webhook->id],
                                        'class' => 'd-inline',
                                        ]); ?>

                                        <button type="button" class="btn btn-sm btn-danger show_confirm" data-toggle="tooltip"
                                        title="<?php echo e(__('Delete')); ?>">
                                            <i class="ti ti-trash"></i>
                                        </button>
                                        <?php echo Form::close(); ?>

                                    </div>
                                </td>
                            </tbody>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH B:\xampp\htdocs\ecommers\resources\views/setting/webhook_setting.blade.php ENDPATH**/ ?>