<div class="form-container">
    <div class="d-flex acc-back-btn-wrp align-items-center justify-content-end">
        <a href="javascript:void(0)" class="btn btn-sm btn-primary"
            data-ajax-popup="true"
            data-size="xs" data-title="Create Support Tickets"
            data-url="<?php echo e(route('add.support.ticket',$slug)); ?>" data-toggle="tooltip"
            title="<?php echo e(__('Add Ticket')); ?>">
            <i class="ti ti-plus"></i><?php echo e(__('Add Ticket')); ?>

        </a>
    </div>
</div>
<table class="order-history-tbl">
    <thead>
        <tr>
            <th scope="col"><?php echo e(__('Title')); ?></th>
            <th scope="col"><?php echo e(__('Ticket Id')); ?></th>
            <th scope="col"><?php echo e(__('Order Id')); ?></th>
            <th scope="col"><?php echo e(__('Customer')); ?></th>
            <th scope="col"><?php echo e(__('Status')); ?></th>
            <th scope="col"> <?php echo e(__('Action')); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php if(count($tickets)): ?>
            <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $order = \App\Models\Order::find($ticket->order_id);
                    $order_data = $order->order_detail($order->id);
                ?>
                <tr>
                    <td> <?php echo e($ticket->title); ?> </td>
                    <td>  #<?php echo e($ticket->ticket_id); ?></td>
                    <td> <?php echo e(!empty($order_data['order_id']) ? $order_data['order_id'] : '-'); ?></td>
                    <td> <?php echo e($ticket->UserData->name ?? '-'); ?> </td>
                    <td> <?php echo e($ticket->status); ?> </td>

                    <td class="text-end row">
                        <button class="btn btn-sm btn-primary me-2 "
                            data-url="<?php echo e(route('get.support.ticket',[$slug,$ticket->id])); ?>" data-size="lg"
                            data-ajax-popup="true" data-title="<?php echo e(__('Edit Ticket')); ?>">
                            <i class="ti ti-pencil text-white py-1"></i>
                        </button>
                        <button class="btn btn-sm  me-2 "
                            data-url="<?php echo e(route('reply.support.ticket',[$slug,$ticket->id])); ?>" data-size="lg"
                            data-ajax-popup="true" data-title="<?php echo e(__('Reply Ticket')); ?>">
                            <i class="fas fa-share"></i>
                        </button>
                        <?php echo Form::open(['method' => 'GET', 'route' => ['destroy.ticket', $slug, $ticket->id], 'class' => 'd-inline']); ?>

                            <button type="submit" class="btn btn-sm btn-danger mx-2">
                                <i class="ti ti-trash text-white py-1 " data-id="<?php echo e($ticket->id); ?>" data-bs-toggle="tooltip" title="delete"></i>
                            </button>
                        <?php echo Form::close(); ?>

                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <tr>
                <td colspan="6"><h2 class=""><?php echo e(__('No records found')); ?></h2></td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<?php if($tickets->lastItem() >= 10): ?>
<div class="right-result-tbl text-right">
    <?php if(isset($tickets)): ?>
    <b>Showing <?php echo e($tickets->firstItem()); ?></b> to <?php echo e($tickets->lastItem()); ?> of <?php echo e($tickets->currentPage()); ?> (<?php echo e($tickets->lastPage()); ?> Pages)
    <?php endif; ?>
</div>
<div class="form-container">
    <div class="d-flex acc-back-btn-wrp align-items-center justify-content-end">
        <?php
            $previousPageUrl = '';
            $nextPageUrl = '';
            if (isset($tickets) && $tickets->currentPage() < 1) {
                $previousPageUrl = $tickets->previousPageUrl();
            }
            if (isset($tickets) && $tickets->lastPage() > 1 && $tickets->currentPage() != $tickets->lastPage()) {
                $nextPageUrl = $tickets->nextPageUrl();
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
<?php /**PATH B:\xampp\htdocs\ecommers\resources\views/front_end/sections/support_ticket.blade.php ENDPATH**/ ?>