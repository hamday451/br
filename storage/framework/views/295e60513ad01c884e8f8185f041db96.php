<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Order Page')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('front_end.sections.partision.header_section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <section class="order-summery-page padding-bottom padding-top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-12">
                    <div class="section-title text-center">
                        <?php if(!empty($order_data)): ?>
                            <h2><?php echo e(__('Your order #')); ?><?php echo e($order_data->product_order_id); ?> <?php echo e(__(' has been placed!')); ?>

                            </h2>
                        <?php else: ?>
                            <h2><?php echo e(__('Your order #')); ?><?php echo e($order_id); ?><?php echo e(__(' has been placed!')); ?> </h2>
                        <?php endif; ?>
                        <p><b><?php echo e($order_complate_title); ?></b><br>
                            <?php echo e($order_complate_description); ?>  </p>
                        <?php if(!empty($order_data)): ?>
                            <div class="order-summery-input input-wrapper">
                                <input type="text"
                                    value="<?php echo e(env('APP_URL') .'/'. $slug . '/order/' . \Illuminate\Support\Facades\Crypt::encrypt($order_data->id ?? '')); ?>"
                                    aria-label="Recipient's username" aria-describedby="button-addon2" readonly="">
                                <button class="btn btn-outline-primary" type="button" onclick="copyToClipboard(this)"
                                    id="<?php echo e(env('APP_URL').'/'. $slug . '/order/' . \Illuminate\Support\Facades\Crypt::encrypt($order_data->id ?? '')); ?>"><i
                                        class="far fa-copy"></i> <?php echo e(__('Copy Link')); ?></button>
                            </div>
                        <?php else: ?>
                            <div class="order-summery-input input-wrapper">
                                <input type="text"
                                    value="<?php echo e(env('APP_URL').'/' . $slug . '/order/' . \Illuminate\Support\Facades\Crypt::encrypt($orders_data->id ?? '')); ?>"
                                    aria-label="Recipient's username" aria-describedby="button-addon2" readonly="">
                                <button class="btn btn-outline-primary" type="button" onclick="copyToClipboard(this)"
                                    id="<?php echo e(env('APP_URL').'/' . $slug . '/order/' . \Illuminate\Support\Facades\Crypt::encrypt($orders_data->id ?? '')); ?>"><i
                                        class="far fa-copy"></i> <?php echo e(__('Copy Link')); ?></button>
                            </div>
                        <?php endif; ?>
                        <div class="d-flex justify-content-center backbtn">
                            <a href="<?php echo e(route('landing_page', $slug)); ?>" class="btn btn-secondary">
                                <svg viewBox="0 0 10 5">
                                    <path
                                        d="M2.37755e-08 2.57132C-3.38931e-06 2.7911 0.178166 2.96928 0.397953 2.96928L8.17233 2.9694L7.23718 3.87785C7.07954 4.031 7.07589 4.28295 7.22903 4.44059C7.38218 4.59824 7.63413 4.60189 7.79177 4.44874L9.43039 2.85691C9.50753 2.78197 9.55105 2.679 9.55105 2.57146C9.55105 2.46392 9.50753 2.36095 9.43039 2.28602L7.79177 0.69418C7.63413 0.541034 7.38218 0.544682 7.22903 0.702329C7.07589 0.859976 7.07954 1.11192 7.23718 1.26507L8.1723 2.17349L0.397965 2.17336C0.178179 2.17336 3.46059e-06 2.35153 2.37755e-08 2.57132Z">
                                    </path>
                                </svg>
                                <?php echo e(__('Back to dashboard')); ?>

                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php echo $__env->make('front_end.sections.partision.footer_section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<?php $__env->stopPush(); ?>

<script>
    function copyToClipboard(element) {
        var copyText = element.id;
        document.addEventListener('copy', function(e) {
            e.clipboardData.setData('text/plain', copyText);
            e.preventDefault();
        }, true);

        document.execCommand('copy');
        show_toastr('success', 'Url copied to clipboard', 'success');
    }
</script>

<?php echo $__env->make('front_end.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH B:\xampp\htdocs\ecommers\resources\views/front_end/sections/pages/order-summary.blade.php ENDPATH**/ ?>