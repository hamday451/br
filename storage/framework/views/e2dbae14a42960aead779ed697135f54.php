<script src="<?php echo e(asset('vendor/datatables/datatables.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/datatables/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/datatables/buttons.bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/datatables/buttons.colVis.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/datatables/buttons.server-side.js')); ?>"></script>
<script>
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
</script><?php /**PATH B:\xampp\htdocs\ecommers\resources\views/layouts/includes/datatable-js.blade.php ENDPATH**/ ?>