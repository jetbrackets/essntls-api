<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\RestockOrderController;
use App\Http\Controllers\Customer\OrderController as CustomerOrderController;
use App\Http\Controllers\Driver\OrderController as DriverOrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/v1/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/v1/logout', [AuthController::class, 'logout']);

    //Routes Admin
    Route::prefix('admin/v1')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index']);
        Route::get('/orders', [OrderController::class, 'index']);
        Route::get('/drivers', [AdminUserController::class, 'getDrivers']);
        Route::get('/customers', [AdminUserController::class, 'getCustomers']);
        Route::get('/restock-orders', [RestockOrderController::class, 'index']);

        //User
        Route::prefix('user')->group(function () {
            Route::get('/block/{id}', [AdminUserController::class, 'blockUser']);
            Route::get('/approve/{id}', [AdminUserController::class, 'approveUser']);
            Route::post('/store', [AdminUserController::class, 'store']);
        });
    });

    //Routes Customers

    Route::prefix('customer/v1')->group(function () {

        //Order
        Route::prefix('order')->group(function () {
            Route::post('/store', [CustomerOrderController::class, 'store']);
            Route::get('/my', [CustomerOrderController::class, 'myOrders']);
            Route::get('/{id}/cancel', [CustomerOrderController::class, 'cancel']);
        });
    });

    //Routes Drivers

    Route::prefix('driver/v1')->group(function () {

        //Order
        Route::prefix('order')->group(function () {
            Route::post('/{id}/accept', [DriverOrderController::class, 'accept']);
            Route::get('/pending', [DriverOrderController::class, 'pending']);
            Route::get('/my', [DriverOrderController::class, 'myOrders']);
            Route::get('/{id}/cancel', [DriverOrderController::class, 'cancel']);
        });
    });
});
