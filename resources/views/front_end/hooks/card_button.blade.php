@php
$store = \Cache::remember("store_{$slug}", now()->addMinutes(30), function () use ($slug) {
                        return \App\Models\Store::where('slug', $slug)->first();
                    });
@endphp
@if (module_is_active('QuickCheckout'))
    @php
        $enable_quick_checkout =  \App\Models\Utility::GetValueByName('enable_quick_checkout',$store->theme_id, $store->id);
    @endphp
    @if (isset($enable_quick_checkout) && $enable_quick_checkout == 'on')
        @include('quick-checkout::theme.button', ['product_slug' => $product->slug ?? null, 'slug' => $slug ?? null, 'currentTheme' => $currentTheme])
    @endif
@endif
@if(module_is_active('SkipCart'))
    @php
        $enable_skip_cart =  \App\Models\Utility::GetValueByName('enable_skip_cart',$currentTheme, $store->id);
    @endphp
    @if(isset($enable_skip_cart) && $enable_skip_cart == 'on')
        @include('skip-cart::theme.skip_cart_button', ['product_slug' => $product->slug ?? null, 'slug' => $slug ?? null, 'currentTheme' => $currentTheme])
    @endif
@endif

