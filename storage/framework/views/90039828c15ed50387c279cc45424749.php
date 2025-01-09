<div class="card" id="Tax_Option_Setting">
    <?php echo e(Form::open(['route' => 'tax-option.settings', 'method' => 'post', 'enctype' => 'multipart/form-data'])); ?>

        <div class="card-header">
            <div class="row g-0">
                <div class="col-6">
                    <h5> <?php echo e(__('Tax Option Settings')); ?> </h5>
                    <small><?php echo e(__('Edit your Tax Option Settings')); ?></small>
                </div>
            </div>
        </div>
        <div class="">
            <div class="row g-0">
                <div class="card-body table-border-style">
                    <div class="form-group row">
                        <label class="col-4 col-form-label"><?php echo e(__('Prices entered with tax')); ?></label>
                        <div class="col-6">
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input type" id="customRadio5" name="price_type" value="inclusive" <?php echo e(isset($tax_option['price_type']) && $tax_option['price_type'] == 'inclusive' ? 'checked="checked"' : ''); ?>>
                                <label class="custom-control-label form-label" for="customRadio5"><?php echo e(__('Yes, I will enter prices inclusive of tax')); ?></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input type" id="customRadio6" name="price_type" value="exclusive" <?php echo e(isset($tax_option['price_type']) && $tax_option['price_type'] == 'exclusive' ? 'checked="checked"' : ''); ?>>
                                <label class="custom-control-label form-label" for="customRadio6"><?php echo e(__('No, I will enter prices exclusive of tax')); ?></label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group  col-md-4">
                            <?php echo Form::label('', __('Tax Class'), ['class' => 'form-label']); ?>

                            <?php echo Form::select('tax_id', $taxes, isset($tax_option['tax_id']) ? $tax_option['tax_id'] : null, [
                                'class' => 'form-control',
                                'data-role' => 'tagsinput',
                                'id' => 'tax_id',
                                'data-val' => isset($tax_option['tax_id']) ? $tax_option['tax_id'] : null,
                            ]); ?>

                        </div>
                        <div class="form-group col-4">
                            <?php echo Form::label('', __('Display prices in the shop'), ['class' => 'form-label']); ?>

                            <?php echo Form::select(
                                'shop_price',
                                [
                                    'including' => __('Including Tax'),
                                    'exclusive' => __('Exclusive Tax'),
                                ],
                                $tax_option['shop_price'] ?? null,
                                [
                                    'class' => 'form-control select',
                                    'data-role' => 'tagsinput',
                                    'id' => 'shop_price',
                                    'name' => 'shop_price',
                                ],
                            ); ?>

                        </div>
                        <div class="form-group col-4">
                            <?php echo Form::label('', __('Display prices during cart and checkout'), ['class' => 'form-label']); ?>

                            <?php echo Form::select(
                                'checkout_price',
                                [
                                    'including' => __('Including Tax'),
                                    'exclusive' => __('Exclusive Tax'),
                                ],
                                $tax_option['checkout_price'] ?? null,
                                [
                                    'class' => 'form-control select',
                                    'data-role' => 'tagsinput',
                                    'id' => 'checkout_price',
                                    'name' => 'checkout_price',
                                ],
                            ); ?>

                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-4">
                            <?php echo Form::label('', __('Display tax totals'), ['class' => 'form-label']); ?>

                            <?php echo Form::select(
                                'display_tax_option',
                                [
                                    'single_total' => __('As a single total'),
                                    'itemized' => __('Itemized'),
                                ],
                                $tax_option['display_tax_option'] ?? null,
                                [
                                    'class' => 'form-control select',
                                    'data-role' => 'tagsinput',
                                    'id' => 'display_tax_option',
                                    'name' => 'display_tax_option',
                                ],
                            ); ?>

                        </div>
                        <div class="form-group col-4">
                            <?php echo Form::label('price_suffix', __('Price Display Suffix'), ['class' => 'form-label']); ?>

                            <?php echo Form::text('price_suffix', !empty($tax_option['price_suffix']) ? $tax_option['price_suffix'] : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Price Display Suffix',
                            ]); ?>

                        </div>
                    </div>
                </div>

                <div class="card-footer d-flex justify-content-end flex-wrap ">
                    <input type="submit" value="<?php echo e(__('Save Changes')); ?>" class="btn-submit btn btn-primary btn-badge">
                </div>
            </div>
        </div>
    <?php echo Form::close(); ?>

</div>
<?php /**PATH B:\xampp\htdocs\ecommers\resources\views/setting/tax_opt_setting.blade.php ENDPATH**/ ?>