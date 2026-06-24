<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \Illuminate\Support\Facades\View::composer(
            ['partials.header', 'partials.sidebar', 'partials.search-overlay', 'partials.footer'],
            function ($view) {
                $view->with('globalCategories', \App\Models\Category::whereNull('parent_id')->get())
                     ->with('globalProducts', \App\Models\Product::latest()->take(5)->get());
            }
        );

        \Illuminate\Support\Facades\View::composer(
            'partials.mini-cart',
            function ($view) {
                $cart = \Illuminate\Support\Facades\Session::get('cart', []);
                $productIds = array_keys($cart);
                $products = \App\Models\Product::whereIn('id', $productIds)->get();
                
                $cartItems = [];
                $cartTotal = 0;
                
                foreach ($products as $product) {
                    $qty = $cart[$product->id] ?? 0;
                    $cartItems[] = [
                        'product' => $product,
                        'quantity' => $qty,
                        'subtotal' => $product->price * $qty
                    ];
                    $cartTotal += ($product->price * $qty);
                }
                
                $view->with('cartItems', $cartItems)
                     ->with('cartTotal', $cartTotal);
            }
        );
    }
}
