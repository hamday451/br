<?php
    $modules = \App\Models\Webhook::modules();
    $methods = \App\Models\Webhook::methods();
?>

<?php echo e(Form::open(['route' => ['webhook.store'], 'method' => 'post'])); ?>

<div class="row">
    <div class="col-12">
        <div class="form-group">
            <?php echo e(Form::label('Module', __('Module'), ['class' => 'col-form-label'])); ?>

            <select name="module" class="form-control select2 multi-select" id="module">
                <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($key); ?>"> <?php echo e(__($value)); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <?php echo e(Form::label('Method', __('Method'), ['class' => 'col-form-label'])); ?>

            <select name="method" class="form-control select2 multi-select" id="method">
                <?php $__currentLoopData = $methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($key); ?>"> <?php echo e(__($value)); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <?php echo e(Form::label('Url', __('Url'), ['class' => 'col-form-label'])); ?>

            <?php echo e(Form::text('webbbook_url', !empty($setting['webbbook_url']) ? $setting['webbbook_url'] : '', ['class' => 'form-control ', 'placeholder' => 'WebBook Url'])); ?>

        </div>
    </div>
</div>
<div class="modal-footer pb-0">
    <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn btn-secondary btn-badge" data-bs-dismiss="modal">
    <input type="submit" value="<?php echo e(__('Create')); ?>" class="btn btn-primary mx-1 btn-badge">
</div>

<?php echo e(Form::close()); ?>


<script src="<?php echo e(asset('assets/js/plugins/choices.min.js')); ?>"></script>
<script>
    if ($(".multi-select").length > 0) {
        $($(".multi-select")).each(function(index, element) {
            var id = $(element).attr('id');
            var multipleCancelButton = new Choices(
                '#' + id, {
                    removeItemButton: true,
                }
            );
        });
    }
    var textRemove = new Choices(
        document.getElementById('choices-text-remove-button'), {
            delimiter: ',',
            editItems: true,
            maxItemCount: 5,
            removeItemButton: true,
        }
    );
</script>
<?php /**PATH B:\xampp\htdocs\ecommers\resources\views/webhook/create.blade.php ENDPATH**/ ?>