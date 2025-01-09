<div class="form-container">
    <div class="d-flex acc-back-btn-wrp align-items-center justify-content-end">
        <a href="javascript:void(0)" class="btn btn-sm btn-primary"
            data-ajax-popup="true"
            data-size="xs" data-title="Add Address"
            data-url="<?php echo e(route('add.address.form',$slug)); ?>" data-toggle="tooltip"
            title="<?php echo e(__('Add Ticket')); ?>">
            <i class="ti ti-plus"></i><?php echo e(__('Add Address')); ?>

        </a>
    </div>
</div>

<table class="order-history-tbl">
    <thead>
        <tr>
            <th scope="col"><?php echo e(__('Title')); ?></th>
            <th scope="col"><?php echo e(__('Address')); ?></th>
            <th scope="col"><?php echo e(__('Postcode')); ?></th>
            <th scope="col"><?php echo e(__('Default Address')); ?></th>
            <th scope="col"> <?php echo e(__('Action')); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php if(count($DeliveryAddress)): ?>
            <?php $__currentLoopData = $DeliveryAddress; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td> <?php echo e($address->title); ?> </td>
                    <td> <?php echo e($address->address); ?> </td>
                    <td> <?php echo e($address->postcode); ?> </td>
                    <td> <?php echo e($address->default_address); ?> </td>
                    <td data-label="Action">
                    <a href="javascript:void(0)" class="btn btn-sm btn-primary me-2 " data-ajax-popup="true"
            data-size="xs" data-title="Edit Address"
            data-url="<?php echo e(route('edit.address.form',[$slug,'id'=>$address->id])); ?>" data-toggle="tooltip"
            title="<?php echo e(__('Edit Address')); ?>">
            <i class="ti ti-eye text-white py-1 edit_address"  data-id="<?php echo e($address->id); ?>" data-bs-toggle="tooltip" title="edit"></i>
        </a>

<a href="javascript:void(0)" class="btn btn-sm btn-primary me-2 ">
                        <i class="ti ti-trash text-white py-1 delete_address" data-id="<?php echo e($address->id); ?>" data-bs-toggle="tooltip" title="delete"></i></a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <tr>
                <td colspan="5"><h2><?php echo e(__('No records found')); ?></h2></td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<?php if(isset($DeliveryAddress) && $DeliveryAddress->total() > 10): ?>
<div class="right-result-tbl text-right">
    <?php if(isset($DeliveryAddress)): ?>
    <b>Showing <?php echo e($DeliveryAddress->firstItem()); ?></b> to <?php echo e($DeliveryAddress->lastItem()); ?> of <?php echo e($DeliveryAddress->currentPage()); ?> (<?php echo e($DeliveryAddress->lastPage()); ?> Pages)
    <?php endif; ?>
</div>
<div class="form-container">
    <div class="d-flex acc-back-btn-wrp align-items-center justify-content-end">
        <?php
            $previousPageUrl = '';
            $nextPageUrl = '';
            if (isset($DeliveryAddress) && $DeliveryAddress->currentPage() < 1) {
                $previousPageUrl = $DeliveryAddress->previousPageUrl();
            }
            if (isset($DeliveryAddress) && $DeliveryAddress->lastPage() > 1 && $DeliveryAddress->currentPage() != $DeliveryAddress->lastPage()) {
                $nextPageUrl = $DeliveryAddress->nextPageUrl();
            }
        ?>
        <button class="btn-secondary back-btn-acc" onclick="get_address('<?php echo e($previousPageUrl); ?>')">
            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="14" viewBox="0 0 35 14" fill="none">
                <path d="M25.0749 14L35 7L25.0805 0L29.12 6.06667H0V7.93333H29.12L25.0749 14Z"></path>
            </svg>
            <?php echo e(__('Back')); ?>

        </button>
        <button class="btn continue-btn" onclick="get_address('<?php echo e($nextPageUrl); ?>')">
            <?php echo e(__('Next')); ?>

            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="14" viewBox="0 0 35 14" fill="none">
                <path d="M25.0749 14L35 7L25.0805 0L29.12 6.06667H0V7.93333H29.12L25.0749 14Z"></path>
            </svg>
        </button>
    </div>
</div>
<?php endif; ?>
<?php /**PATH B:\xampp\htdocs\ecommers\resources\views/front_end/sections/addressbook.blade.php ENDPATH**/ ?>