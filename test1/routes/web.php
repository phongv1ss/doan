<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
Route::get('/', [ShopController::class, 'index'])->name('shop.index'); 
Route::get('shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('shop/{id}', [ShopController::class, 'show'])->name('shop.show');
Route::get('/shop-grid', [ShopController::class, 'shopGrid'])->name('shop.grid');
Route::get('/search', [ShopController::class, 'search'])->name('products.search');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout/process', [CheckoutController::class, 'processCheckout'])->name('checkout.process');
Route::get('/checkout/success', [CheckoutController::class,"successCheckout"])->name('checkout.success');
Route::get('/category/{id}', [ShopController::class, 'categoryProducts'])->name('category.products');



