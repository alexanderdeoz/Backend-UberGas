<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;


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
Route::get('Welcome', function () {
    return response()->json('Todo posi');
});


Route::get('init', function () {
    if (env('APP_ENV') != 'local') {
        return response()->json('El sistema se encuentra en producción.', 500);
    }
    DB::select('drop schema if exists public cascade;');
    DB::select('drop schema if exists authentication cascade;');
    DB::select('drop schema if exists app cascade;');

    DB::select('create schema authentication;');
    DB::select('create schema app;');


    Artisan::call('migrate', ['--seed' => true]);
    return response()->json([
        'msg' => [
            'Los esquemas fueron creados correctamente.',
            'Las migraciones fueron creadas correctamente',
            'Cliente para la aplicación creado correctamente',
        ]
    ]);
});
