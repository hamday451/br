<?php $__env->startSection('page-title', __('Testimonial')); ?>

<?php $__env->startSection('action-button'); ?>
    <?php if (app('laratrust')->hasPermission('Create Testimonial')) : ?>
    <div class=" text-end d-flex all-button-box justify-content-md-end justify-content-center">
        <a href="#" class="btn btn-sm btn-primary" data-ajax-popup="true" data-size="md"
            data-title="<?php echo e(__('Add Testimonial')); ?>" data-url="<?php echo e(route('testimonial.create')); ?>" data-bs-toggle="tooltip"
            title="<?php echo e(__('Add Testimonial')); ?>">
            <i class="ti ti-plus"></i>
        </a>
    </div>
    <?php endif; // app('laratrust')->permission ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><?php echo e(__('Testimonial')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xl-12">
            <?php if (isset($component)) { $__componentOriginal8aaf9779783cdf64609094123653a0b9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8aaf9779783cdf64609094123653a0b9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.datatable','data' => ['dataTable' => $dataTable]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('datatable'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['dataTable' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($dataTable)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8aaf9779783cdf64609094123653a0b9)): ?>
<?php $attributes = $__attributesOriginal8aaf9779783cdf64609094123653a0b9; ?>
<?php unset($__attributesOriginal8aaf9779783cdf64609094123653a0b9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8aaf9779783cdf64609094123653a0b9)): ?>
<?php $component = $__componentOriginal8aaf9779783cdf64609094123653a0b9; ?>
<?php unset($__componentOriginal8aaf9779783cdf64609094123653a0b9); ?>
<?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('custom-script'); ?>
    <script>
        $(document).on('change', '#maincategory_id', function(e) {
            var id = $(this).val();
            var val = $('.subcategory_id_div').attr('data_val');
            var data = {
                id: id,
                val: val

            }
            $.ajax({
                url: '<?php echo e(route('get.subcategory')); ?>',
                method: 'POST',
                data: data,
                context: this,
                success: function(response) {
                    $('#loader').fadeOut();
                    $.each(response, function(key, value) {
                        $("#subcategory-dropdown").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                    var val = $('.subcategory_id_div').attr('data_val', 0);
                    $('.subcategory_id_div span').html(response.html);
                    comman_function();
                }
            });

        });
        $(document).on('change', '#subcategory-dropdown', function(e) {
            var id = $(this).val();
            var val = $('.product_id_div').attr('data_val');

            var data = {
                id: id,
                val: val

            }
            $.ajax({
                url: '<?php echo e(route('get.product')); ?>',
                method: 'POST',
                data: data,
                context: this,
                success: function(response) {
                    $('#loader').fadeOut();
                    $.each(response, function(key, value) {
                        $("#product-dropdown").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                    var val = $('.product_id_div').attr('data_val', 0);
                    $('.product_id_div span').html(response.html);
                    comman_function();
                }
            });

        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH B:\xampp\htdocs\ecommers\resources\views/testimonial/index.blade.php ENDPATH**/ ?>