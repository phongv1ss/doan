<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Ajax\DashboardController as AjaxDashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Middleware\AuthenticateMiddleware;
use App\Http\Middleware\loginMiddleware;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Ajax\LocationController;

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
    Route::get('{id}/edit', [UserController::class, 'edit'])
    ->where(['id' => '[0-9]+'])
    ->name('user.edit')
    ->middleware(AuthenticateMiddleware::class);
    Route::post('{id}/update', [UserController::class, 'update'])->where(['id' => '[0-9]+'])->name('user.update')->middleware(AuthenticateMiddleware::class);
    Route::get('{id}/delete', [UserController::class, 'delete'])->where(['id' => '[0-9]+'])->name('user.delete')->middleware(AuthenticateMiddleware::class);
    Route::delete('{id}/destroy', [UserController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('user.destroy')->middleware(AuthenticateMiddleware::class);



});
/*ajax*/ 

Route::get('ajax/location/getLocation', [LocationController::class, 'getLocation'])->name('location.index')->middleware(AuthenticateMiddleware::class);
Route::post('ajax/dashboard/changeStatus', [AjaxDashboardController::class, 'changeStatus'])
    ->name('ajax.Dashboard.changeStatus')
    ->middleware(AuthenticateMiddleware::class);



Route::get('admin', [AuthController::class, 'index'])->name('auth.admin')->middleware(loginMiddleware::class);
Route::post('login', [AuthController::class, 'login'])->name('auth.login');
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');