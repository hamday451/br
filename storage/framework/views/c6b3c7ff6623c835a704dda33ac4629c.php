<!--currency settings-->
    <div class="card" id="currency-setting-sidenav">
        <div class="card-header">
            <h5 class="small-title"><?php echo e(__('Currency Settings')); ?></h5>
        </div>
        <?php echo e(Form::open(['route' => ['currency.settings'], 'method' => 'post', 'id' => 'setting-currency-form'])); ?>

        <div class="card-body pb-0">
            <div class="row">
                <div class="col-6">
                    <div class="form-group col switch-width">
                        <?php echo e(Form::label('currency_format', __('Decimal Format'), ['class' => ' col-form-label'])); ?>

                        <select class="form-control currency_note" data-trigger name="currency_format"
                            id="currency_format" placeholder="<?php echo e(__('This is a search placeholder')); ?>">
                            <option value="0"
                                <?php echo e(isset($setting['currency_format']) && $setting['currency_format'] == '0' ? 'selected' : ''); ?>>
                                1</option>
                            <option value="1"
                                <?php echo e(isset($setting['currency_format']) && $setting['currency_format'] == '1' ? 'selected' : ''); ?>>
                                1.0</option>
                            <option value="2"
                                <?php echo e(isset($setting['currency_format']) && $setting['currency_format'] == '2' ? 'selected' : ''); ?>>
                                1.00</option>
                            <option value="3"
                                <?php echo e(isset($setting['currency_format']) && $setting['currency_format'] == '3' ? 'selected' : ''); ?>>
                                1.000</option>
                            <option value="4"
                                <?php echo e(isset($setting['currency_format']) && $setting['currency_format'] == '4' ? 'selected' : ''); ?>>
                                1.0000</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group col switch-width">
                        <?php echo e(Form::label('defult_currancy', __('Default Currancy'), ['class' => ' col-form-label'])); ?>

                        <select class="form-control currency_note" data-trigger name="defult_currancy"
                            id="defult_currancy" placeholder="<?php echo e(__('This is a search placeholder')); ?>">
                            <?php $__currentLoopData = currency(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($c->symbol); ?>-<?php echo e($c->code); ?>"
                                    data-symbol="<?php echo e($c->symbol); ?>"
                                    <?php echo e(isset($setting['defult_currancy']) && $setting['defult_currancy'] == $c->code ? 'selected' : ''); ?>>
                                    <?php echo e($c->symbol); ?> - <?php echo e($c->code); ?> </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group col-6">
                    <label for="decimal_separator" class="form-label"><?php echo e(__('Decimal Separator')); ?></label>
                    <select type="text" name="decimal_separator" class="form-control selectric currency_note"
                        id="decimal_separator">
                        <option value="dot" <?php if(@$setting['decimal_separator'] == 'dot'): ?> selected="selected" <?php endif; ?>>
                            <?php echo e(__('Dot')); ?></option>
                        <option value="comma" <?php if(@$setting['decimal_separator'] == 'comma'): ?> selected="selected" <?php endif; ?>>
                            <?php echo e(__('Comma')); ?></option>
                    </select>
                </div>
                <div class="form-group col-6">
                    <label for="thousand_separator" class="form-label"><?php echo e(__('Thousands Separator')); ?></label>
                    <select type="text" name="thousand_separator"
                        class="form-control selectric currency_note" id="thousand_separator">
                        <option value="dot" <?php if(@$setting['thousand_separator'] == 'dot'): ?> selected="selected" <?php endif; ?>>
                            <?php echo e(__('Dot')); ?></option>
                        <option value="comma" <?php if(@$setting['thousand_separator'] == 'comma'): ?> selected="selected" <?php endif; ?>>
                            <?php echo e(__('Comma')); ?></option>
                    </select>
                </div>
                <div class="form-group col-6">
                    <?php echo e(Form::label('currency_space', __('Currency Symbol Space'), ['class' => 'form-label'])); ?>

                    <div class="row ms-1">
                        <div class="form-check col-md-6">
                            <input class="form-check-input currency_note" type="radio"
                                name="currency_space" value="withspace"
                                <?php if(!isset($setting['currency_space']) || $setting['currency_space'] == 'withspace'): ?> checked <?php endif; ?> id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                <?php echo e(__('With space')); ?>

                            </label>
                        </div>
                        <div class="form-check col-6">
                            <input class="form-check-input currency_note" type="radio"
                                name="currency_space" value="withoutspace"
                                <?php if(!isset($setting['currency_space']) || $setting['currency_space'] == 'withoutspace'): ?> checked <?php endif; ?> id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                <?php echo e(__('Without space')); ?>

                            </label>
                        </div>
                    </div>
                    <?php $__errorArgs = ['currency_space'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-currency_space" role="alert">
                            <strong class="text-danger"><?php echo e($message); ?></strong>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="form-label"
                            for="example3cols3Input"><?php echo e(__('Currency Symbol Position')); ?></label>
                        <div class="row ms-1">
                            <div class="form-check col-md-6">
                                <input class="form-check-input currency_note" type="radio"
                                    name="site_currency_symbol_position" value="pre"
                                    <?php if(!isset($setting['site_currency_symbol_position']) || $setting['site_currency_symbol_position'] == 'pre'): ?> checked <?php endif; ?>
                                    id="currencySymbolPosition">
                                <label class="form-check-label" for="currencySymbolPosition">
                                    <?php echo e(__('Pre')); ?>

                                </label>
                            </div>
                            <div class="form-check col-md-6">
                                <input class="form-check-input currency_note" type="radio"
                                    name="site_currency_symbol_position" value="post"
                                    <?php if(isset($setting['site_currency_symbol_position']) && $setting['site_currency_symbol_position'] == 'post'): ?> checked <?php endif; ?> id="currencySymbolPost">
                                <label class="form-check-label" for="currencySymbolPost">
                                    <?php echo e(__('Post')); ?>

                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="form-label"
                            for="example3cols3Input"><?php echo e(__('Currency Symbol & Name')); ?></label>
                        <div class="row ms-1">
                            <div class="form-check col-md-6">
                                <input class="form-check-input currency_note" type="radio"
                                    name="site_currency_symbol_name" value="symbol"
                                    <?php if(!isset($setting['site_currency_symbol_name']) || $setting['site_currency_symbol_name'] == 'symbol'): ?> checked <?php endif; ?> id="currencySymbol">
                                <label class="form-check-label" for="currencySymbol">
                                    <?php echo e(__('With Currency Symbol')); ?>

                                </label>
                            </div>
                            <div class="form-check col-md-6">
                                <input class="form-check-input currency_note" type="radio"
                                    name="site_currency_symbol_name" value="symbolname"
                                    <?php if(isset($setting['site_currency_symbol_name']) && $setting['site_currency_symbol_name'] == 'symbolname'): ?> checked <?php endif; ?> id="currencySymbolName">
                                <label class="form-check-label" for="currencySymbolName">
                                    <?php echo e(__('With Currency Name')); ?>

                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="form-label" for="new_note_value"><?php echo e(__('Preview :')); ?></label>
                        <span id="formatted_price_span"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-end flex-wrap ">
            <input type="submit" value="<?php echo e(__('Save Changes')); ?>" class="btn-submit btn-badge btn btn-print-invoice btn-primary">
        </div>
        <?php echo e(Form::close()); ?>

    </div>
<!--currency settings end --><?php /**PATH B:\xampp\htdocs\ecommers\resources\views/setting/currency_setting.blade.php ENDPATH**/ ?>