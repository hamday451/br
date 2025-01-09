<?php
$store = \Cache::remember("store_{$slug}", now()->addMinutes(30), function () use ($slug) {
                        return \App\Models\Store::where('slug', $slug)->first();
                    });
    if ($store) {
        $user = \App\Models\User::find($store->created_by);
    }
    $order_data = \App\Models\Order::find($order->id);
    $order_status = \App\Models\Utility::GetValueByName('set_order_status', $store->theme_id, $store->id);
?>
<?php if(module_is_active('PartialPayments')): ?>
    <?php if($order_data['delivered_status'] == 7 && $order_status != 'null'): ?>
        <?php
            $pending_order = \Workdo\PartialPayments\app\Models\OrderPartialPayments::where(
                'order_id',
                $order_data->product_order_id,
            )
                ->where('payment_status', 'Pending payment')
                ->whereNot('payment_amount', 0)
                ->first();
        ?>
        <?php if(isset($pending_order) && $pending_order != null): ?>
            <?php echo $__env->make('partial-payments::theme.payment-button', [
                'order' => $order ?? null,
                'slug' => $slug ?? null,
                'currentTheme' => $currentTheme,
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    <?php endif; ?>
<?php endif; ?>
<?php /**PATH B:\xampp\htdocs\ecommers\resources\views/front_end/hooks/order_action_button.blade.php ENDPATH**/ ?>