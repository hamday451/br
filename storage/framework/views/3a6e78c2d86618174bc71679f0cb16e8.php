<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Login Page')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('front_end.sections.partision.header_section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <section class="register-page padding-bottom padding-top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-12">
                    <div class="d-flex justify-content-center back-toshop">
                        <a href="<?php echo e(route('page.product-list',  ['storeSlug' => $slug])); ?>" class="back-btn">
                            <span class="svg-ic">
                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="5" viewBox="0 0 11 5" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5791 2.28954C10.5791 2.53299 10.3818 2.73035 10.1383 2.73035L1.52698 2.73048L2.5628 3.73673C2.73742 3.90636 2.74146 4.18544 2.57183 4.36005C2.40219 4.53467 2.12312 4.53871 1.9485 4.36908L0.133482 2.60587C0.0480403 2.52287 -0.000171489 2.40882 -0.000171488 2.2897C-0.000171486 2.17058 0.0480403 2.05653 0.133482 1.97353L1.9485 0.210321C2.12312 0.0406877 2.40219 0.044729 2.57183 0.219347C2.74146 0.393966 2.73742 0.673036 2.5628 0.842669L1.52702 1.84888L10.1383 1.84875C10.3817 1.84874 10.5791 2.04609 10.5791 2.28954Z" fill="white"></path>
                                </svg>
                            </span>
                            <?php echo e(__('Back to Shop')); ?>

                        </a>
                    </div>
                    <div class="section-title text-center">
                        <h2 class="h1"><?php echo e(__('Log In')); ?></h2>
                    </div>
                    <div class="form-wrapper">
                        <form  method="POST" action="<?php echo e(route('customer.login.save',$slug)); ?>" class="login-form">
                            <?php echo csrf_field(); ?>
                            <div class="form-container">
                                <div class="form-heading">
                                    <h4><?php echo e(__('Log in')); ?></h4>
                                </div>
                            </div>
                            <div class="form-container">
                                <div class="row">
                                    <div class="col-12">
                                        <p><?php echo e(__('I am a returning customer')); ?></p>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label><?php echo e(__('E-mail')); ?><sup aria-hidden="true">*</sup>:</label>
                                            <input type="email" name="email" value="<?php echo e(old('email')); ?>" class="form-control" placeholder="shop@company.com" required="">
                                        </div>
                                    </div>


                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label><?php echo e(__('Password')); ?><sup aria-hidden="true">*</sup>:</label>
                                            <input type="password" name="password" value="<?php echo e(old('password')); ?>"  class="form-control" placeholder="**********" required="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-container">
                                <div class="row align-items-center form-footer justify-content-end">
                                    <div class="col-lg-12  col-12 d-flex align-items-center justify-content-end mobile-direction-column">
                                        <a href="<?php echo e(route('customer.password.request',$slug)); ?>" class="forgot-pass"><?php echo e(__('Forgot Password?')); ?></a>
                                        <?php echo Form::hidden('type', 'customer'); ?>

                                        <button type="submit" class="btn submit-btn login-do-btn" id="login_button">
                                            <?php echo e(__('Login')); ?>

                                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="14" viewBox="0 0 35 14" fill="none">
                                                <path d="M25.0749 14L35 7L25.0805 0L29.12 6.06667H0V7.93333H29.12L25.0749 14Z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-container">
                                <div class="row align-items-center">
                                    <div class="col-sm-12 col-12 d-flex align-items-center justify-content-center">
                                        <div class="reg-lbl"><?php echo e(__('If you dont have account')); ?></div>
                                        <a href="<?php echo e(route('customer.register',$slug)); ?>" class="btn register-btn" type="submit">
                                            <?php echo e(__('Register')); ?>

                                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="14" viewBox="0 0 35 14" fill="none">
                                                <path d="M25.0749 14L35 7L25.0805 0L29.12 6.06667H0V7.93333H29.12L25.0749 14Z"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php echo $__env->make('front_end.sections.partision.footer_section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('front_end.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH B:\xampp\htdocs\ecommers\resources\views/front_end/Auth/login.blade.php ENDPATH**/ ?>