<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Faqs')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('front_end.sections.partision.header_section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <section class="common-banner-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="common-banner-content">
                        <a href="<?php echo e(route('landing_page',$slug)); ?>" class="back-btn">
                            <span class="svg-ic">
                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="5" viewBox="0 0 11 5" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5791 2.28954C10.5791 2.53299 10.3818 2.73035 10.1383 2.73035L1.52698 2.73048L2.5628 3.73673C2.73742 3.90636 2.74146 4.18544 2.57183 4.36005C2.40219 4.53467 2.12312 4.53871 1.9485 4.36908L0.133482 2.60587C0.0480403 2.52287 -0.000171489 2.40882 -0.000171488 2.2897C-0.000171486 2.17058 0.0480403 2.05653 0.133482 1.97353L1.9485 0.210321C2.12312 0.0406877 2.40219 0.044729 2.57183 0.219347C2.74146 0.393966 2.73742 0.673036 2.5628 0.842669L1.52702 1.84888L10.1383 1.84875C10.3817 1.84874 10.5791 2.04609 10.5791 2.28954Z" fill="white"></path>
                                </svg>
                            </span>
                            <?php echo $page_json->faq_page->section->button->text ?? __('Back to Home'); ?>

                        </a>
                        <div class="section-title">
                            <h2> <?php echo $page_json->faq_page->section->title->text ?? '<b>Featured</b> asked questions'; ?> </h2>
                            <p><?php echo $page_json->faq_page->section->description->text ?? ''; ?> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <section class="faq-page padding-bottom padding-top">
            <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="container">
                    <div class="section-title">
                        <h2><?php echo e($faq->topic); ?></h2>
                    </div>

                    <div class="faqs-container row">
                        <?php if($faq->description): ?>
                            <?php $__currentLoopData = json_decode($faq->description, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-4 col-sm-6 col-12">
                                    <div class="set has-children">
                                        <a href="javascript:;" class="acnav-label">
                                            <span><?php echo e($item['question']); ?></span>
                                        </a>
                                        <div class="acnav-list">
                                            <p><?php echo e($item['answer']); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </section>
    <?php echo $__env->make('front_end.sections.partision.footer_section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front_end.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH B:\xampp\htdocs\ecommers\themes\grocery\views/front_end/sections/pages/faq_page_section.blade.php ENDPATH**/ ?>