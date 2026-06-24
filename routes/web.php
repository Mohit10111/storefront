<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/category/{category}', [HomeController::class, 'category'])
    ->name('category.products');

Route::get('/categories', [HomeController::class, 'categories'])
    ->name('home.categories');

Route::get('/products', [HomeController::class, 'products'])
    ->name('home.products');

Route::get('/product/{product}', [HomeController::class, 'show'])
    ->name('home.product.show');

Route::post('/cart/add/{product}', [\App\Http\Controllers\CartController::class, 'add'])
    ->name('cart.add');
Route::post('/cart/remove/{product}', [\App\Http\Controllers\CartController::class, 'remove'])
    ->name('cart.remove');
Route::post('/cart/update/{product}', [\App\Http\Controllers\CartController::class, 'update'])
    ->name('cart.update');

Route::get('/checkout', [\App\Http\Controllers\CheckoutController::class, 'index'])
    ->name('checkout.index');
Route::post('/checkout', [\App\Http\Controllers\CheckoutController::class, 'process'])
    ->name('checkout.process');
Route::get('/checkout/success/{order}', [\App\Http\Controllers\CheckoutController::class, 'success'])
    ->name('checkout.success');

Route::get('/wishlist', [\App\Http\Controllers\WishlistController::class, 'index'])
    ->name('wishlist.index');

Route::post('/wishlist/{product}', [\App\Http\Controllers\WishlistController::class, 'toggle'])
    ->name('wishlist.toggle');

Route::middleware(['auth', 'is_admin'])->prefix('admin')->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('coupons', \App\Http\Controllers\CouponController::class);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
