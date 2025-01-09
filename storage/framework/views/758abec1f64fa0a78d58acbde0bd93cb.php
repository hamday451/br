<footer class="site-footer" style="position: relative;<?php if(isset($option) && $option->is_hide == 1): ?> opacity: 0.5; <?php else: ?> opacity: 1; <?php endif; ?>" data-index="<?php echo e($option->order ?? ''); ?>" data-id="<?php echo e($option->order ?? ''); ?>" data-value="<?php echo e($option->id ?? ''); ?>" data-hide="<?php echo e($option->is_hide  ?? ''); ?>" data-section="<?php echo e($option->section_name  ?? ''); ?>"  data-store="<?php echo e($option->store_id  ?? ''); ?>" data-theme="<?php echo e($option->theme_id ?? ''); ?>">
<div class="custome_tool_bar"></div>
    <div class="container">
        <?php echo $__env->make('front_end.hooks.footer_link', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="footer-row">
            <div class="footer-col footer-store-detail">
                <div class="footer-widget">
                    <div class="footer-logo">
                        <a href="<?php echo e(route('landing_page', $slug)); ?>">
                        <img src="<?php echo e(get_file(((isset($theme_logo) && !empty($theme_logo)) ? $theme_logo : 'themes/' . $currentTheme . '/assets/images/logo.png'), $currentTheme)); ?>"
                                    alt="Logo">
                        </a>
                    </div>
                    <?php if(isset($section->footer->section->description)): ?>
                    <div class="store-detail">
                        <p id="<?php echo e($section->footer->section->description->slug ?? ''); ?>_preview"> <?php echo $section->footer->section->description->text ?? ''; ?></p>
                    </div>
                    <?php endif; ?>
                    <div class="social-media">
                        <?php if(isset($section->footer->section->footer_link)): ?>
                        <ul class="social-links">
                            <?php for($i = 0; $i < $section->footer->section->footer_link->loop_number ?? 1; $i++): ?>
                                <li>
                                    <a href="<?php echo e($section->footer->section->footer_link->social_link->{$i} ?? '#'); ?>" target="_blank" id="social_link_<?php echo e($i); ?>">
                                        <img src="<?php echo e(get_file($section->footer->section->footer_link->social_icon->{$i}->image ?? 'themes/' . $currentTheme . '/assets/images/youtube.svg', $currentTheme)); ?>" class="<?php echo e('social_icon_'. $i .'_preview'); ?>" alt="icon" id="social_icon_<?php echo e($i); ?>">
                                    </a>
                                </li>
                            <?php endfor; ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if(isset($section->footer->section->footer_menu_type)): ?>
                <?php for($i = 0; $i < $section->footer->section->footer_menu_type->loop_number ?? 1; $i++): ?>
                <div class="footer-col footer-link footer-link-1">
                    <div class="footer-widget">
                        <h4> <?php echo e($section->footer->section->footer_menu_type->footer_title->{$i} ?? ''); ?> </h4>
                        <?php
                            $footer_menu_id = $section->footer->section->footer_menu_type->footer_menu_ids->{$i} ?? '';
                            $footer_menu = get_nav_menu($footer_menu_id);
                        ?>
                        <ul>
                            <?php if(!empty($footer_menu)): ?>
                                <?php $__currentLoopData = $footer_menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $nav): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($nav->type == 'custom'): ?>
                                        <li><a href="<?php echo e(url($nav->slug)); ?>"
                                                target="<?php echo e($nav->target); ?>">
                                                <?php if($nav->title == null): ?>
                                                    <?php echo e($nav->title); ?>

                                                <?php else: ?>
                                                    <?php echo e($nav->title); ?>

                                                <?php endif; ?>
                                            </a></li>
                                    <?php elseif($nav->type == 'category'): ?>
                                        <li><a href="<?php echo e(url($slug.'/'.$nav->slug)); ?>"
                                                target="<?php echo e($nav->target); ?>">
                                                <?php if($nav->title == null): ?>
                                                    <?php echo e($nav->title); ?>

                                                <?php else: ?>
                                                    <?php echo e($nav->title); ?>

                                                <?php endif; ?>
                                            </a></li>
                                    <?php elseif($nav->type == 'brand'): ?>
                                        <li><a href="<?php echo e(url($slug.'/'.$nav->slug)); ?>"
                                                target="<?php echo e($nav->target); ?>">
                                                <?php if($nav->title == null): ?>
                                                    <?php echo e($nav->title); ?>

                                                <?php else: ?>
                                                    <?php echo e($nav->title); ?>

                                                <?php endif; ?>
                                            </a></li>
                                    <?php else: ?>
                                        <li><a href="<?php echo e(url($slug.'/custom/'.$nav->slug)); ?>"
                                                target="<?php echo e($nav->target); ?>">
                                                <?php if($nav->title == null): ?>
                                                    <?php echo e($nav->title); ?>

                                                <?php else: ?>
                                                    <?php echo e($nav->title); ?>

                                                <?php endif; ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <?php endfor; ?>
            <?php endif; ?>

        </div>
        <div class="footer-bottom">
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                    <p id="<?php echo e($section->footer->section->copy_right->slug ?? ''); ?>_preview"><?php echo e($section->footer->section->copy_right->text ?? __('© 2022 Foodmart. All rights reserved')); ?></p>
                </div>
                <div class="col-12 col-md-6">
                    <ul class="policy-links d-flex align-items-center justify-content-end">
                        <li><a href="<?php echo e($section->footer->section->privacy_policy->link ?? '#'); ?>"><span id="<?php echo e($section->footer->section->privacy_policy->slug ?? ''); ?>_preview"><?php echo e($section->footer->section->privacy_policy->text ?? __('Policy Privacy')); ?></span></a></li>
                        <li><a href="<?php echo e($section->footer->section->terms_and_conditions->link ?? '#'); ?>"><span id="<?php echo e($section->footer->section->terms_and_conditions->slug ?? ''); ?>_preview"><?php echo e($section->footer->section->terms_and_conditions->text ?? __('Terms and conditions')); ?></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>




<?php /**PATH B:\xampp\htdocs\ecommers\themes\grocery\views/front_end/sections/partision/footer_section.blade.php ENDPATH**/ ?>