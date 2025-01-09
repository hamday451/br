@if (!empty($product->custom_field))
    @foreach (json_decode($product->custom_field, true) as $item)
        <div class="pdp-detail d-flex  align-items-center">
            <b>{{ $item['custom_field'] }} :</b>
            <span class="lbl">{{ $item['custom_value'] }}</span>
        </div>
    @endforeach
@endif