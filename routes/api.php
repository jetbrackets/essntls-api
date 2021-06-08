<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\UserController;
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

Route::post('admin/v1/login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('admin/v1')->group(function () {
        Route::get('/logout', [UserController::class, 'logout']);
        Route::get('/dashboard', [AdminDashboardController::class, 'index']);
        Route::get('/orders', [OrderController::class, 'index']);
    });
});
