<?php echo e(Form::open(['route' => 'menus.store', 'method' => 'post', 'enctype' => 'multipart/form-data'])); ?>

    <div class="row">
        <div class="form-group col-md-12">
            <?php echo Form::label('', __('Name'), ['class' => 'form-label']); ?>

            <?php echo Form::text('name', null, ['class' => 'form-control' , 'required']); ?>

        </div>
        <div class="modal-footer pb-0">
            <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn btn-badge btn-secondary" data-bs-dismiss="modal">
            <input type="submit" value="<?php echo e(__('Create')); ?>" class="btn btn-badge btn-primary mx-1">
        </div>
    </div>
<?php echo Form::close(); ?>

<?php /**PATH B:\xampp\htdocs\ecommers\resources\views/menu/create.blade.php ENDPATH**/ ?>