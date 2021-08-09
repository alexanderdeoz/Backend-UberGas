<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('clients', ClientController::class);
Route::apiResource('deliveries', DeliveryManController::class);
Route::apiResource('enterprises', EnterpriseController::class);
Route::get('products', [ProductController::class, 'products']);
Route::apiResource('enterprises.products', ProductController::class);
Route::apiResource('categories', CategoriesController::class);
Route::apiResource('clients.orders', OrderController::class);
Route::apiResource('orders-details', OrderDetailController::class);
Route::apiResource('enterprise-categories', EnterpriseCategoryController::class);
Route::apiResource('favorites', FavoriteController::class);