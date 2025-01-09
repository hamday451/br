<?php if(count($combinations[0]) > 0): ?>
    <div class="card-body">
        <div class="faq" id="accordionExample">
            <div class="row">
                <div class="col-12">
                        <?php $__currentLoopData = $combinations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $combination): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $sku = $product_name;

                                $str = '';
                                foreach ($combination as $key => $item) {
                                    if ($key > 0) {
                                        $str .= '-' . str_replace(' ', '', $item);
                                        $sku .= '-' . str_replace(' ', '', $item);
                                    } else {
                                        $str .= str_replace(' ', '', $item);
                                        $sku .= '-' . str_replace(' ', '', $item);
                                    }
                                }
                                $option = \App\Models\ProductAttributeOption::where('terms', $str)->first();
                            ?>
                            <div class="accordion accordion-flush" id="">
                                <div id="" class="accordion-item card attribute_options_datas ">
                                    <?php if(strlen($str) > 0): ?>
                                    <div class="accordion-item card remove_option_<?php echo e($str); ?>">
                                            <h2 class="accordion-header" id="COD">
                                                <button class="accordion-button collapsed according-delete-input" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseone_<?php echo e($str); ?>"
                                                    aria-expanded="false" aria-controls="collapseone_<?php echo e($str); ?>">
                                                    <span class="d-flex align-items-center">
                                                        <i class="ti ti-credit-card me-2"></i><?php echo e($str); ?>

                                                            <a href="#" class="btn btn-sm btn-danger delete_option" data-id="<?php echo e($str); ?>" >
                                                                <i class="ti ti-trash"></i>
                                                            </a>
                                                    </span>
                                                </button>
                                            </h2>
                                            <div id="collapseone_<?php echo e($str); ?>" class="accordion-collapse collapse"
                                                aria-labelledby="COD" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <div class="row">
                                                        <div class="form-group col-md-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input input-primary enable_view" value="enabled" type="checkbox" name="variation_option_<?php echo e($str); ?>[]" id="enable_view_<?php echo e($str); ?>">
                                                                <label class="form-check-label" for="enable_view_<?php echo e($str); ?>"><?php echo e(__('Enabled')); ?></label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input input-primary downloadable" value="downloadable_product" name="variation_option_<?php echo e($str); ?>[]" type="checkbox" id="downloadable_product_<?php echo e($str); ?>">
                                                                <label class="form-check-label downloadable" for="downloadable_product_<?php echo e($str); ?>"><?php echo e(__('Downloadable')); ?></label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input input-primary virtual_product" value="virtual_product" type="checkbox" name="variation_option_<?php echo e($str); ?>[]" id="virtual_product_<?php echo e($str); ?>">
                                                                <label class="form-check-label" for="virtual_product_<?php echo e($str); ?>"><?php echo e(__('Virtual')); ?></label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input input-primary manage_stock" value="manage_stock" name="variation_option_<?php echo e($str); ?>[]" type="checkbox" id="manage_stock_<?php echo e($str); ?>">
                                                                <label class="form-check-label" for="manage_stock_<?php echo e($str); ?>"><?php echo e(__('Manage stock?')); ?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-6 sku">
                                                            <?php echo Form::label('', __('SKU'), ['class' => 'form-label']); ?>

                                                            <?php echo Form::text('product_sku_' . $str, $sku, ['class' => 'form-control']); ?>

                                                        </div>
                                                        <div class="form-group col-md-6 weight-div ">
                                                            <?php echo Form::label('', __('Weight(Kg)'), ['class' => 'form-label ']); ?>

                                                            <?php echo Form::number('product_weight_' . $str, null, ['class' => 'form-control', 'min' => '0', 'step' => '0.01']); ?>

                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <?php echo Form::label('', __('Variation Price'), ['class' => 'form-label']); ?>

                                                            <?php echo Form::number('product_variation_price_' . $str, null, ['class' => 'form-control', 'min' => '0', 'step' => '0.01']); ?>

                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <?php echo Form::label('', __('Sale Price'), ['class' => 'form-label']); ?>

                                                            <?php echo Form::number('product_sale_price_' . $str, $unit_price, ['class' => 'form-control', 'min' => '0', 'step' => '0.01']); ?>

                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-12 shipping-div">
                                                        <?php echo Form::label('', __('Shipping'), ['class' => 'form-label']); ?>

                                                        <?php echo Form::select('shipping_id_' . $str, $Shipping, null, [
                                                            'class' => 'form-control',
                                                            'data-role' => 'tagsinput',
                                                            'id' => 'Shipping',
                                                        ]); ?>

                                                    </div>
                                                    <div class="form-group col-md-12 stock_status">
                                                        <?php echo Form::label('', __('Stock Status'), ['class' => 'form-label']); ?>

                                                        <?php echo Form::select('stock_status_' . $str, ['' => 'Select option','in_stock' => 'In Stock', 'out_of_stock' => 'Out Of Stock', 'on_backorder' => 'On Backorder'], null, ['class' => 'form-control']); ?>

                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <?php echo Form::label('', __('Description'), ['class' => 'form-label']); ?>

                                                        <?php echo Form::textarea('product_description_' . $str, null, ['rows' => 4, 'class'=>'form-control']); ?>

                                                    </div>
                                                    <div class="row col-md-12 d-none enable_manage_stock manageble_stock_<?php echo e($str); ?>" id="enable_manage_stock" data-id="<?php echo e($str); ?>">
                                                        <div class="form-group col-md-4 " >
                                                            <?php echo Form::label('', __('Stock'), ['class' => 'form-label']); ?>

                                                            <?php echo Form::number('product_stock_' . $str, $stock, ['class' => 'form-control productVariantStock']); ?>

                                                        </div>
                                                        <div class="form-group col-md-5">
                                                        <?php echo Form::label('', __('Allow BackOrders:'), ['class' => 'form-label']); ?>

                                                            <div class="form-check m-1">
                                                                <input type="radio" id="not_allow_<?php echo e($str); ?>" value="not_allow" name="stock_order_status_<?php echo e($str); ?>" class="form-check-input code"
                                                                    checked="checked">
                                                                <label class="form-check-label" for="not_allow_<?php echo e($str); ?>"><?php echo e(__('Do Not Allow')); ?></label>
                                                            </div>
                                                            <div class="form-check m-1">
                                                                <input type="radio" id="notify_customer_<?php echo e($str); ?>" value="notify_customer" name="stock_order_status_<?php echo e($str); ?>" class="form-check-input code">
                                                                <label class="form-check-label" for="notify_customer_<?php echo e($str); ?>"><?php echo e(__('Allow, But notify customer')); ?></label>
                                                            </div>
                                                            <div class="form-check m-1">
                                                                <input type="radio" id="allow_<?php echo e($str); ?>" value="allow" name="stock_order_status_<?php echo e($str); ?>" class="form-check-input code">
                                                                <label class="form-check-label" for="allow_<?php echo e($str); ?>"><?php echo e(__('Allow')); ?></label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3 ">
                                                            <?php echo Form::label('', __('Low stock threshold'), ['class' => 'form-label ']); ?>

                                                            <?php echo Form::number('low_stock_threshold_' . $str, null, ['class' => 'form-control', 'min' => '0', 'step' => '0.01']); ?>

                                                        </div>
                                                    </div>
                                                    <input type="hidden" class="options_data_<?php echo e($str); ?>[]" name ="options[]" value="<?php echo e($str); ?>">
                                                    <div class="row download-product d-none down_product_<?php echo e($str); ?>" data-id="<?php echo e($str); ?>" id="download-product">
                                                        <div class="form-group mb-0">
                                                            <label for="downloadable_product"
                                                                class="form-label"><?php echo e(__('Downloadable Product')); ?></label>
                                                            <input type="file" name="downloadable_product_<?php echo e($str); ?>" id="downloadable_product" data-value="downloadable_product_<?php echo e($str); ?>"
                                                                class="form-control downloadable_product_variant"
                                                                onchange="document.getElementById('down_product').src = window.URL.createObjectURL(this.files[0])">
                                                            <img id="down_product" src="" width="20%" class="mt-2" />
                                                        </div>
                                                    </div>
                                                    <?php
                                                        $module = App\Facades\ModuleFacade::find('CartQuantityControl');
                                                        $setting = getAdminAllSetting(Auth::user()->id);
                                                    ?>
                                                    <?php if(isset($module) && $module->isEnabled()): ?>
                                                        <?php if(Auth::check() && strpos(Auth::user()->currentPlan['modules'] , 'CartQuantityControl')): ?>
                                                            <?php if(isset($setting['cart_quantity_control_enable']) && $setting['cart_quantity_control_enable'] == 'on'): ?>
                                                                <?php echo $__env->make('cart-quantity-control::pages.addCartQuantityControlVariant',['str' => $str], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>
<script>

    $(document).on('click', '.delete_option', function(event) {
        event.preventDefault(); // Prevent the default behavior of the button

        var id = $(this).attr('data-id');
        $('.remove_option_' + id).remove();
    });


    $('.enable_view').change(function() {
        if ($(this).prop('checked') == true) {
            var optionValue = $(this).val();
            if (optionValue == 'enabled') {
            }
        }
    });

    $(document).ready(function() {
        if($('.enable_product_stock').prop('checked') == true)
        {
            $('.stock_status').hide();
        }

    });
    $('#enable_product_stock').change(function() {
        $('.stock_status').show();
        if ($(this).prop('checked') == true) {
            $('.stock_status').hide();
        }
    });

    $(document).on('change', '.downloadable', function() {
        var optionValue = $(this).val();
        var container = $(this).closest('.accordion-item');

        if ($(this).prop('checked')) {
            if (optionValue == 'downloadable_product') {
                container.find('.download-product').removeClass('d-none');
            }
        } else {
            container.find('.download-product').addClass('d-none');
        }
    });

    $(document).on('change', '.virtual_product', function() {
        var optionValue = $(this).val();
        var container = $(this).closest('.accordion-item');

        if ($(this).prop('checked')) {
            if (optionValue == 'virtual_product') {
                container.find('.weight-div').addClass('d-none');
                container.find('.shipping-div').addClass('d-none');
            }
        } else {
            container.find('.weight-div').removeClass('d-none');
            container.find('.shipping-div').removeClass('d-none');
        }
    });

    $(document).on('change', '.manage_stock', function() {
        var optionValue = $(this).val();
        var container = $(this).closest('.accordion-item');
        if ($(this).prop('checked')) {
            if (optionValue == 'manage_stock') {
                container.find('.enable_manage_stock').removeClass('d-none');
                container.find('.stock_status').hide();
            }
        } else {
            container.find('.enable_manage_stock').addClass('d-none');
            container.find('.stock_status').show();
        }
    });

</script>
<?php /**PATH B:\xampp\htdocs\ecommers\resources\views/product/attribute_combinations.blade.php ENDPATH**/ ?>