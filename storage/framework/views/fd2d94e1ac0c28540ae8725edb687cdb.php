<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['dataTable']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['dataTable']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>
<?php $__env->startPush('css'); ?>
   <?php echo $__env->make('layouts.includes.datatable-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>
<div class="card">
   <div class="card-body table-border-style">
      <div class="table-responsive ecom-data-table">
           <?php echo $dataTable->table(['width' => '100%']); ?>

       </div>
   </div>
</div>
<?php $__env->startPush('scripts'); ?>
   <?php echo $__env->make('layouts.includes.datatable-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <?php echo e($dataTable->scripts()); ?>


   <?php if(module_is_active('BulkDelete')): ?>
      <?php echo $__env->make('bulk-delete::pages.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <?php endif; ?>

   <script>
   $(document).ready(function () {
      removeSortingOrderFromHeader();
   });
   function removeSortingOrderFromHeader() {
      // Remove 'sorting_desc' class from all <th> elements containing a checkbox
      $('table').each(function() {
         $(this).find('th').each(function() {
            if (($(this).hasClass('sorting_desc') || $(this).hasClass('sorting_asc')) && $(this).find('input[type="checkbox"]').length) {
                  $(this).removeClass('sorting sorting_asc sorting_desc');
            }
         });
      });

      // Ensure class is removed every time sorting is triggered on any DataTable
      $('table').on('order.dt', function() {
         $(this).find('th').each(function() {
            if (($(this).hasClass('sorting_desc') || $(this).hasClass('sorting_asc')) && $(this).find('input[type="checkbox"]').length) {
                  $(this).removeClass('sorting sorting_asc sorting_desc');
            }
         });
      });
   }
   </script>
<?php $__env->stopPush(); ?>
<?php /**PATH B:\xampp\htdocs\ecommers\resources\views/components/datatable.blade.php ENDPATH**/ ?>