<?php echo e(Form::open(['route' => 'faqs.store', 'method' => 'post', 'enctype' => 'multipart/form-data'])); ?>

<div class="row">
    <div class="form-group col-md-12">
        <?php echo Form::label('', __('Topic'), ['class' => 'form-label']); ?>

        <?php echo Form::text('topic', old('topic'), ['class' => 'form-control', 'required' => 'required']); ?>

    </div>
</div>

<div class="pb-0 modal-footer">
    <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn btn-secondary btn-badge" data-bs-dismiss="modal">
    <input type="submit" value="<?php echo e(__('Create')); ?>" class="btn btn-primary btn-badge mx-1">
</div>
</div>
<?php echo Form::close(); ?>

<?php /**PATH B:\xampp\htdocs\ecommers\resources\views/faq/create.blade.php ENDPATH**/ ?>