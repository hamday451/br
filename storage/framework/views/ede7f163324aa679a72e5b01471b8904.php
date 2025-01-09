<?php $__env->startSection('page-title', __('Roles')); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><?php echo e(__('Roles')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-button'); ?>
    <?php if (app('laratrust')->hasPermission('Create Role')) : ?>
        <div class="text-end d-flex all-button-box justify-content-md-end justify-content-center">
            <a href="#" class="btn btn-sm btn-primary" data-ajax-popup="true" data-size="xl" data-title="<?php echo e(__('Create Role')); ?>"
                data-url="<?php echo e(route('roles.create')); ?>" data-bs-toggle="tooltip" title="<?php echo e(__('Add Role')); ?>">
                <i class="ti ti-plus"></i>
            </a>
        </div>
    <?php endif; // app('laratrust')->permission ?>
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

<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
    function Checkall(module = null) {
        var ischecked = $("#checkall-" + module).prop('checked');
        if (ischecked == true) {
            $('.checkbox-' + module).prop('checked', true);
        } else {
            $('.checkbox-' + module).prop('checked', false);
        }

       // Get all checkboxes with IDs that start with 'module_checkbox_' and include the module
        var checkboxes = document.querySelectorAll('input[id^="module_checkbox_"]');

        // Check or uncheck all checkboxes based on the 'checkall' checkbox state
        checkboxes.forEach(function(checkbox) {
            var check = $("#checkall-" + module).prop('checked');
            if (checkbox.id.includes(module)) {
                checkbox.checked = check
            }
        });

        // Call CheckModule to update the module checkbox state
        CheckModule('module_checkbox_' + module);
    }

    function CheckModule(cl = null) {
        var ischecked = $("#" + cl).prop('checked');
        if (ischecked == true) {
            $('.' + cl).find("input[type=checkbox]").prop('checked', true);
        } else {
            $('.' + cl).find("input[type=checkbox]").prop('checked', false);
        }
    }

    function CheckPermission(cl = null, module = null) {
        var ischecked = $("#" + cl).prop('checked');
        var allChecked = true;

        // Check if all permissions for the given module are checked
        $('.' + module).find("input[type=checkbox]").each(function() {
            if (!$(this).prop('checked')) {
                allChecked = false;
                return false; // Exit the loop
            }
        });

        // Update the module checkbox based on the state of permissions
        if (allChecked) {
            $('#' + module).prop('checked', true);
        } else {
            $('#' + module).prop('checked', false);
        }
    }

    $(document).ready(function() {
        // Attach the CheckPermission function to all permission checkboxes
        $(document).on('change', 'input[type=checkbox]', function() {
            var id = $(this).attr('id');
            var module = $(this).data('module');
            CheckPermission(id, module);
        });
    });

    // Click event for "Show more" link
    $(document).on('click', '.show-more', function(e) {
        e.preventDefault();
        $(this).addClass('d-none'); // Hide "Show more"
       
        // Show hidden permission items
        $(this).closest('.role-permission-table').find('.nav-item.d-none').removeClass('d-none');

        $(this).closest('.role-permission-table').find('.show-more').addClass('d-none'); // Show "Show less"
    });

    // Click event for "Show less" link
    $(document).on('click', '.show-less', function(e) {
        e.preventDefault();
        $(this).addClass('d-none'); // Hide "Show less"
        // Hide permissions after the 10th item
        $(this).closest('.role-permission-table').find('.nav-item').slice(11).addClass('d-none');
        // Show the "Show more" link
        $(this).closest('.role-permission-table').find('.show-more').removeClass('d-none');
    });
</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH B:\xampp\htdocs\ecommers\resources\views/roles/index.blade.php ENDPATH**/ ?>