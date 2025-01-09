<h3 class="check-head"><?php echo e(__('Select Your Payments')); ?></h3>
<p><?php echo e(__('Please select the preferred shipping method to use on this order.')); ?></p>
<div class="payment-method-form">
    <?php if($payment_list->status == 1): ?>
        <?php $__currentLoopData = $payment_list->data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment_key => $payment_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($payment_data->status == 'on'): ?>
                <div class="radio-group">
                    <div class="payment_type">
                    <input type="radio" id="<?php echo e($payment_data->name); ?>"
                        name="payment_type" <?php echo e($payment_key == 0 ? 'checked' : ''); ?>

                        value="<?php echo e($payment_data->name); ?>" class="payment_change">
                    <label for="<?php echo e($payment_data->name); ?>">
                        <span><?php echo e($payment_data->name_string); ?></span>
                        <div class="center-descrp"> <?php echo e($payment_data->detail); ?> </div>
                        <div class="radio-right">
                            <img src="<?php echo e(asset($payment_data->image)); ?>" alt="<?php echo e($payment_data->name ?? 'cod'); ?>" class="paymentimag<?php echo e($payment_data->name); ?>">
                        </div>
                    </label>
                    <?php if($payment_data->name == 'whatsapp'): ?>
                        <form method="POST" action="<?php echo e(route('user.whatsapp',$slug)); ?>" class="payment-method-form">
                            <?php echo csrf_field(); ?>
                            <div class="form-group mt-3 w-100">
                                <input name="wts_number" class="phone-number" value="<?php echo e(old('wts_number')); ?>"  id="wts_number" type="text" placeholder="Enter Your Phone Number">
                            </div>

                        </form>
                    <?php endif; ?>
                    <?php if($payment_data->name == 'bank_transfer'): ?>
                        <div class="form-group mt-3 w-100">
                            <input type="file" name="payment_receipt" class="form-control mb-3">
                        </div>
                    <?php endif; ?>
                    <?php if($payment_data->name == 'Paiementpro'): ?>
                        <div class="form-group col-md-6" id="mobile_div">
                            <input type="text" name="mobile_number" value="<?php echo e(old('mobile_number')); ?>"  class="form-control font-style mobile_number" id="mobile_number" placeholder="Enter Your Phone Number">
                        </div>
                        <div class="form-group col-md-6" id="channel_div">
                            <input type="text" name="channel" value="<?php echo e(old('channel')); ?>"  class="form-control font-style channel" id="channel" placeholder="Enter Your channel number">
                            <small class="text-danger">Example : OMCIV2,MOMO,CARD,FLOOZ ,PAYPAL</small>
                        </div>
                    <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <div class="form-group">
        <label><?php echo e(__('Add Comments About Your Order')); ?>:</label>
        <textarea class="form-control" name="payment_comment" placeholder="Description" rows="8"></textarea>
    </div>

    <?php echo $__env->yieldPushContent('CustomFieldView'); ?>
    <?php echo $__env->yieldPushContent('addCheckoutAttachment'); ?>
    <div class="form-container">
        <div class="d-flex acc-back-btn-wrp align-items-center justify-content-end">
            <div class="checkbox-custom">
                <input type="checkbox" id="agg">
                <label for="agg">
                    <span><?php echo e(__('I have read and agree to the')); ?> <a
                            href="#"><?php echo e(__('Terms')); ?> &amp;
                            <?php echo e(__('Conditions')); ?>.</a> </span>
                </label>
            </div>
            <button class="btn continue-btn payment_done" type="button">
                <?php echo e(__('Continue')); ?>

                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="12"
                    viewBox="0 0 11 12" fill="none">
                    <g clip-path="url(#down)">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M5.28956 0.546387C5.04611 0.546383 4.84876 0.743733 4.84875 0.987181L4.84862 9.59851L3.84237 8.56269C3.67274 8.38807 3.39367 8.38403 3.21905 8.55366C3.04443 8.72329 3.04039 9.00236 3.21002 9.17698L4.97323 10.992C5.05623 11.0774 5.17028 11.1257 5.2894 11.1257C5.40852 11.1257 5.52257 11.0774 5.60558 10.992L7.36878 9.17698C7.53841 9.00236 7.53437 8.72329 7.35975 8.55366C7.18514 8.38403 6.90606 8.38807 6.73643 8.56269L5.73022 9.59847L5.73035 0.987195C5.73036 0.743747 5.53301 0.54639 5.28956 0.546387Z"
                            fill="white"></path>
                    </g>
                    <defs>
                        <clipPath id="down">
                            <rect width="10.5792" height="10.5792" fill="white"
                                transform="translate(10.5791 0.546387) rotate(90)"></rect>
                        </clipPath>
                    </defs>
                </svg>
            </button>
        </div>
    </div>
</div>
<?php /**PATH B:\xampp\htdocs\ecommers\resources\views/front_end/sections/payment_list.blade.php ENDPATH**/ ?>