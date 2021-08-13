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
use App\Http\Controllers\RoleController;
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

// Route::apiResource('users', UserController::class);
// Route::prefix('user')->group(function (){
//     Route::patch()
// });

//rutas para clientes
Route::apiResource('clients', ClientController::class);
Route::prefix('client')->group(function () {
    Route::get('{client}', [ClientController::class, 'show']);
    Route::patch('destroy', [ClientController::class, 'destroy']);
});

//rutas para conductores
Route::apiResource('drivers', DriverController::class);
Route::prefix('driver')->group(function () {
    Route::get('{driver}', [DriverController::class, 'show']);
    Route::patch('destroys', [DriverController::class, 'destroys']);
});

//rutas para los distribuidores
Route::apiResource('dealers', DealerController::class);
Route::prefix('dealer')->group(function () {
    Route::patch('destroys', [DealerController::class, 'destroys']);
});

//rutas para los roles
Route::apiResource('roles',RoleController::class);
Route::prefix('role')->group(function () {
    Route::get('{role}', [RoleController::class, 'show']);
});

//ruta de los productos
Route::get('products', [ProductController::class, 'products']);
Route::prefix('profuct')->group(function () {
    Route::get('{products}', [ProductController::class, 'show']);
});

//ruta de las ordenes
Route::apiResource('clients-orders', OrderController::class);
Route::prefix('order')->group(function () {
    Route::patch('destroys', [OrderController::class, 'destroys']);
});

//ruta de los detalles de las ordenes
Route::apiResource('details-orders', DetailOrderController::class);
Route::prefix('detail-order')->group(function () {
    Route::get('{details-orders}', [DetailOrderController::class, 'show']);
});

//ruta de los viajes
Route::apiResource('travels',TravelController::class);
Route::prefix('travel')->group(function () {
    Route::get('{travels}', [TravelController::class, 'show']);
});










