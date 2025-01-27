<?php echo e(Form::open(['route' => 'tag.store', 'method' => 'post', 'enctype' => 'multipart/form-data'])); ?>

<div class="row">
    <div class="col-12">
        <div class="form-group">
            <?php echo e(Form::label('name', __('Tag Name'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Enter Tag Name')])); ?>

        </div>
    </div>


    <div class="modal-footer pb-0 ">
        <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn btn-secondary btn-badge" data-bs-dismiss="modal">
        <input type="submit" value="<?php echo e(__('Create')); ?>" class="btn btn-primary btn-badge mx-1">
    </div>
</div>
<?php echo e(Form::close()); ?>

<?php /**PATH B:\xampp\htdocs\ecommers\resources\views/tag/create.blade.php ENDPATH**/ ?>