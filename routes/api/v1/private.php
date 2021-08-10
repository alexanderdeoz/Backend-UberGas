<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DealerController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DetailOrderController;
use App\Http\Controllers\TravelController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;
use App\Models\User;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('users', UserController::class);
Route::apiResource('clients', ClientController::class);
Route::apiResource('drivers', DriverController::class);
Route::apiResource('dealeares', DealerController::class);
//Route::get('products', [ProductController::class, 'products']);
Route::apiResource('roles',RoleController::class);
Route::apiResource('products', ProductController::class);
Route::apiResource('orders', OrderController::class);
Route::apiResource('details-orders', DetailOrderController::class);
Route::apiResource('favorites', FavoriteController::class);
Route::apiResource('travels',TravelController::class);