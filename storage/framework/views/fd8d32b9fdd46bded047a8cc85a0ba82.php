<?php echo e(Form::open(['route' => 'testimonial.store', 'method' => 'post', 'enctype' => 'multipart/form-data'])); ?>

<div class="row">

    <div class="form-group  col-md-12">
        <?php echo Form::label('', __('Title'), ['class' => 'form-label']); ?>

        <?php echo Form::text('title', null, ['class' => 'form-control']); ?>

    </div>
    <div class="form-group  col-md-12">
        <?php echo Form::label('', __('Description'), ['class' => 'form-label']); ?>

        <?php echo Form::textarea('description', null, ['class' => 'form-control autogrow', 'rows' => '3']); ?>

    </div>
    <div class="form-group  col-md-6">
        <?php echo Form::label('', __('Category'), ['class' => 'form-label']); ?>

        <?php echo Form::select('maincategory_id', $main_categorys, null, ['class' => 'form-control', 'data-role' => 'tagsinput', 'id' => 'maincategory_id']); ?>

    </div>

    <div class="form-group  col-md-6 subcategory_id_div" data_val='0'>
        <?php echo Form::label('', __('Subcategory'), ['class' => 'form-label']); ?>

        <span>
            <?php echo Form::select('subcategory_id', [], null, ['class' => 'form-control', 'data-role' => 'tagsinput', 'id' => 'subcategory-dropdown']); ?>

        </span>
    </div>
    <div class="form-group  col-md-6 product_id_div" data_val='0'>
        <?php echo Form::label('', __('Product'), ['class' => 'form-label']); ?>

        <span>
            <?php echo Form::select('product_id', [], null, ['class' => 'form-control', 'data-role' => 'tagsinput', 'id' => 'product-dropdown']); ?>

        </span>
    </div>
    <div class="form-group  col-md-6">
        <?php echo Form::label('', __('Rating'), ['class' => 'form-label']); ?>

        <?php echo Form::select('rating_no', ['1' => 1,'2' => 2,'3' => 3,'4' => 4,'5' => 5,], null, ['class' => 'form-control', 'data-role' => 'tagsinput', 'id' => 'rating_no']); ?>

    </div>

    <div class="form-group col-md-4">
        <?php echo Form::label('', __('Status'), ['class' => 'form-label']); ?>

        <div class="form-check form-switch">
            <input type="hidden" name="status" value="0">
            <input type="checkbox" name="status" class="form-check-input input-primary" id="customCheckdef1" value="1"
                checked>
            <label class="form-check-label" for="customCheckdef1"></label>
        </div>
    </div>

    <div class="modal-footer pb-0">
        <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn btn-badge btn-secondary" data-bs-dismiss="modal">
        <input type="submit" value="<?php echo e(__('Create')); ?>" class="btn btn-badge btn-primary mx-1">
    </div>
</div>
<?php echo Form::close(); ?>

<?php /**PATH B:\xampp\htdocs\ecommers\resources\views/testimonial/create.blade.php ENDPATH**/ ?>