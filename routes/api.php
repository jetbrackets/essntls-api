<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\RestockOrderController;
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

Route::post('admin/v1/login', [AdminUserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('admin/v1')->group(function () {
        Route::get('/logout', [AdminUserController::class, 'logout']);
        Route::get('/dashboard', [AdminDashboardController::class, 'index']);
        Route::get('/orders', [OrderController::class, 'index']);
        Route::get('/drivers', [AdminUserController::class, 'getDrivers']);
        Route::get('/customers', [AdminUserController::class, 'getCustomers']);
        Route::get('/restock-orders', [RestockOrderController::class, 'index']);

        //User
        Route::prefix('user')->group(function () {
            Route::get('/block/{id}', [AdminUserController::class, 'blockUser']);
            Route::get('/approve/{id}', [AdminUserController::class, 'approveUser']);
        });
    });
});
