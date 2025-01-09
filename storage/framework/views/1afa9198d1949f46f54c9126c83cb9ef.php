<?php echo e(Form::open(['route' => 'shipping.store', 'method' => 'post', 'enctype' => 'multipart/form-data'])); ?>


<?php if(isset(auth()->user()->currentPlan) && auth()->user()->currentPlan->enable_chatgpt == 'on'): ?>
    <div class="mb-1 d-flex justify-content-end">
        <a href="#" class="btn btn-primary me-2 ai-btn btn-badge" data-size="lg" data-ajax-popup-over="true"
            data-url="<?php echo e(route('generate', ['shipping'])); ?>" data-bs-toggle="tooltip" data-bs-placement="top"
            title="<?php echo e(__('Generate')); ?>" data-title="<?php echo e(__('Generate Content With AI')); ?>">
            <i class="fas fa-robot"></i> <?php echo e(__('Generate with AI')); ?>

        </a>
    </div>
<?php endif; ?>

<div class="row">
    <div class="form-group col-md-12">
        <?php echo Form::label('', __('Name'), ['class' => 'form-label']); ?>

        <?php echo Form::text('name', null, ['class' => 'form-control', 'required' => 'required']); ?>

    </div>
    <div class="form-group col-md-12">
        <?php echo Form::label('', __('Description'), ['class' => 'form-label']); ?>

        <?php echo Form::textarea('description', null, [
            'class' => 'form-control autogrow',
            'required' => 'required',
            'rows' => '3',
        ]); ?>

    </div>
    <div class="pb-0 modal-footer">
        <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn btn-badge btn-secondary" data-bs-dismiss="modal">
        <input type="submit" value="<?php echo e(__('Create')); ?>" class="btn btn-badge btn-primary mx-1">
    </div>
</div>
<?php echo Form::close(); ?>

<?php /**PATH B:\xampp\htdocs\ecommers\resources\views/shipping/create.blade.php ENDPATH**/ ?>