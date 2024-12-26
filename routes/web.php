<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Front\ShopController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Ajax\DashboardController as AjaxDashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Middleware\AuthenticateMiddleware;
use App\Http\Middleware\loginMiddleware;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Ajax\LocationController;
use App\Models\frontend\Product;
use App\Http\Controllers\Front\CommentController;
Route::get('/', function () {
    return view('welcome');
});



/*backend routes */
Route::get('dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index')->middleware(AuthenticateMiddleware::class);
/*user*/
Route::group(['prefix' => 'user'],function () {
    
    Route::get('index', [UserController::class, 'index'])->name('user.index')->middleware(AuthenticateMiddleware::class); 

    Route::get('create', [UserController::class, 'create'])->name('user.create')->middleware(AuthenticateMiddleware::class);

    Route::post('store', [UserController::class, 'store'])->name('user.store')->middleware(AuthenticateMiddleware::class);

    Route::get('{id}/edit', [UserController::class, 'edit'])->where(['id' => '[0-9]+'])->name('user.edit')->middleware(AuthenticateMiddleware::class);

    Route::post('{id}/update', [UserController::class, 'update'])->where(['id' => '[0-9]+'])->name('user.update')->middleware(AuthenticateMiddleware::class);

    Route::get('{id}/delete', [UserController::class, 'delete'])->where(['id' => '[0-9]+'])->name('user.delete')->middleware(AuthenticateMiddleware::class);

    Route::delete('{id}/destroy', [UserController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('user.destroy')->middleware(AuthenticateMiddleware::class);

    Route::get('dangky', [UserController::class, 'dangky'])->name('user.dangky');

    Route::post('register', [UserController::class, 'register'])->name('user.register');
});
/*ajax*/ 

Route::get('ajax/location/getLocation', [LocationController::class, 'getLocation'])->name('location.index');

Route::post('ajax/dashboard/changeStatus', [AjaxDashboardController::class, 'changeStatus'])->name('ajax.Dashboard.changeStatus')->middleware(AuthenticateMiddleware::class);

/*dang nhap*/

Route::get('login', [AuthController::class, 'showLoginForm'])->name('auth.login');


Route::post('login', [AuthController::class, 'login'])->name('auth.login.post');


Route::get('admin', [AuthController::class, 'index'])->name('auth.admin')->middleware(loginMiddleware::class);

Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(RoleMiddleware::class . ':admin')
    ->name('dashboard.index');





/*quanlysanpham*/

Route::get('Product/index', [ProductController::class, 'index'])->name('Product.index')->middleware(AuthenticateMiddleware::class);

Route::get('/product/create', [ProductController::class, 'createsanpham'])->name('Product.createsanpham')->middleware(AuthenticateMiddleware::class);

Route::post('storesanpham', [ProductController::class, 'storesanpham'])->name('Product.storesanpham')->middleware(AuthenticateMiddleware::class);

 
 Route::get('/edit/{id}', [ProductController::class, 'editsanpham'])->name('Product.editsanpham')->middleware(AuthenticateMiddleware::class);


 Route::put('/product/update/{id}', [ProductController::class, 'updatesanpham'])->name('Product.updatesanpham')->middleware(AuthenticateMiddleware::class);


 Route::post('/products/delete/{id}', [ProductController::class, 'destroy'])->name('Product.delete')->middleware(AuthenticateMiddleware::class);

/*quanlydanhmuc*/ 

    Route::get('Category/index', [CategoryController::class, 'index'])->name('Category.index')->middleware(AuthenticateMiddleware::class); 
    Route::get('/create', [CategoryController::class, 'create'])->name('Category.create')->middleware(AuthenticateMiddleware::class);
    Route::post('/store', [CategoryController::class, 'store'])->name('Category.store')->middleware(AuthenticateMiddleware::class); 
    Route::get('Category/edit/{category_id}', [CategoryController::class, 'edit'])->name('Category.edit')->middleware(AuthenticateMiddleware::class); 
    Route::put('Category/update/{category_id}', [CategoryController::class, 'update'])->name('Category.update')->middleware(AuthenticateMiddleware::class);
    Route::delete('Category/delete/{category_id}', [CategoryController::class, 'destroy'])->name('Category.destroy')->middleware(AuthenticateMiddleware::class); 



/*SHOP*/
 Route::get('/', [ShopController::class, 'index'])->middleware(RoleMiddleware::class . ':member')->name('Shop.index'); 
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
Route::get('/profile', [ShopController::class, 'profile'])->name('shop.profile');
Route::put('shop/{id}/profileupdate', [ShopController::class, 'profileupdate'])->name('shop.profileupdate');
Route::get('/category/{id}', [ShopController::class, 'categoryProducts'])->name('category.products');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/reviews', [CommentController::class, 'danhgia'])->name('reviews.danhgia');
Route::post('/reviews', [CommentController::class, 'store'])
    ->name('reviews.store')
    ->middleware('auth');

/*don hang*/ 
Route::get('Order/index', [OrderController::class, 'index'])->name('Order.index')->middleware(AuthenticateMiddleware::class);
Route::get('/orders/{id}', [OrderController::class, 'View'])->name('Order.View')->middleware(AuthenticateMiddleware::class); 
Route::post('/orders/delete/{id}', [OrderController::class, 'delete'])->name('Order.delete')->middleware(AuthenticateMiddleware::class); 
Route::post('/orders/update-status/{id}', [OrderController::class, 'updateStatus'])->name('Order.updateStatus')->middleware(AuthenticateMiddleware::class);
