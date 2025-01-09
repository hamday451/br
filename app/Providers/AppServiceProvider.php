<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Classes\Module;
use Illuminate\Support\Facades\Cache;
use App\Models\Product;
use App\Models\Store;
use App\Models\Plan;
use App\Models\User;
use App\Models\Setting;
use App\Models\Tax;
use App\Models\TaxOption;
use App\Models\AddOnManager;
use App\Models\TaxMethod;
use App\Models\Blog;
use App\Models\Page;
use App\Models\FlashSale;
use App\Models\Order;
use App\Models\Cart;
use App\Models\ProductVariant;
use App\Models\Themes\ThemeSection;
use App\Models\Themes\ThemeSectionDraft;
use App\Models\Themes\ThemeSectionMap;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton('module', function ($app) {
            return new Module();
        });
       
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Product::updated(function ($product) {
            Cache::flush();  // Clear the entire cache
        });

        ProductVariant::updated(function ($productVariant) {
            Cache::flush();  // Clear the entire cache
        });

        Store::updated(function ($store) {
            Cache::flush();  // Clear the entire cache
        });

        Plan::updated(function ($plan) {
            Cache::flush();  // Clear the entire cache
        });

        User::updated(function ($user) {
            Cache::flush();  // Clear the entire cache
        });

        Setting::updated(function ($setting) {
            Cache::flush();  // Clear the entire cache
        });

        TaxOption::updated(function ($taxOption) {
            Cache::flush();  // Clear the entire cache
        });

        Tax::updated(function ($tax) {
            Cache::flush();  // Clear the entire cache
        });

        TaxMethod::updated(function ($taxMethod) {
            Cache::flush();  // Clear the entire cache
        });
        
        AddOnManager::updated(function ($addOnManager) {
            Cache::flush();  // Clear the entire cache
        });

        Blog::updated(function ($blog) {
            Cache::flush();  // Clear the entire cache
        });

        Page::updated(function ($page) {
            Cache::flush();  // Clear the entire cache
        });

        FlashSale::updated(function ($flashsale) {
            Cache::flush();  // Clear the entire cache
        });

        Order::updated(function ($order) {
            Cache::flush();  // Clear the entire cache
        });

        Cart::updated(function ($cart) {
            Cache::flush();  // Clear the entire cache
        });

        ThemeSection::updated(function ($cart) {
            Cache::flush();  // Clear the entire cache
        });

        ThemeSectionDraft::updated(function ($cart) {
            Cache::flush();  // Clear the entire cache
        });

        ThemeSectionMap::updated(function ($cart) {
            Cache::flush();  // Clear the entire cache
        });
    }
}
