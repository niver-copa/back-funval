<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProveedorController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(ClienteController::class)->group(function(){
    Route::post('create', "create");
    Route::put('destroy', "destroy");
    Route::put('update', "update");

});
Route::get('/proveedores', [ProveedorController::class, 'show']);
Route::get('/proveedores/{id}', [ProveedorController::class, 'getById']);
Route::post('/proveedores/new', [ProveedorController::class, 'new']);
Route::put('/proveedores/edit/{id}', [ProveedorController::class, 'update']);
Route::put('/proveedores/delete/{id}', [ProveedorController::class, 'delete']);
