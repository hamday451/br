<?php if (app('laratrust')->hasPermission('Status Customer')) : ?>
    <?php if($customer->regiester_date != null): ?>
        <div class="form-check form-switch">
            <input class="form-check-input page-checkbox" id="<?php echo e($customer->id); ?>"
                type="checkbox" name="page_active" data-onstyle="success"
                data-offstyle="danger" data-toggle="toggle" data-on="off"
                data-off="on"
                <?php if($customer->status == 1): ?> checked="checked" <?php endif; ?> />
        </div>
    <?php endif; ?>
<?php endif; // app('laratrust')->permission ?><?php /**PATH B:\xampp\htdocs\ecommers\resources\views/customer/status.blade.php ENDPATH**/ ?>