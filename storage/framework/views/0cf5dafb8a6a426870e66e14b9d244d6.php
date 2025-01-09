<section class="home-blog-section padding-bottom" style="position: relative;<?php if(isset($option) && $option->is_hide == 1): ?> opacity: 0.5; <?php else: ?> opacity: 1; <?php endif; ?>" data-index="<?php echo e($option->order ?? ''); ?>" data-id="<?php echo e($option->order ?? ''); ?>" data-value="<?php echo e($option->id ?? ''); ?>" data-hide="<?php echo e($option->is_hide ?? ''); ?>" data-section="<?php echo e($option->section_name ?? ''); ?>"  data-store="<?php echo e($option->store_id ?? ''); ?>" data-theme="<?php echo e($option->theme_id ?? ''); ?>">
    <div class="custome_tool_bar"></div>
    <div class="container">
        <div class="section-title">
            <h2 class="title" id="<?php echo e($section->blog->section->title->slug ?? ''); ?>_preview"><?php echo $section->blog->section->title->text ?? ''; ?></h2>
            <div class="descripion">
                <p id="<?php echo e($section->blog->section->description->slug ?? ''); ?>_preview"><?php echo $section->blog->section->description->text ?? ''; ?></p>
            </div>
        </div>
        <div class="blog-slider-home">
            <?php echo \App\Models\Blog::HomePageBlog($currentTheme, $slug, 4); ?>

        </div>
    </div>
</section>
<?php /**PATH B:\xampp\htdocs\ecommers\themes\grocery\views/front_end/sections/homepage/blog_section.blade.php ENDPATH**/ ?>