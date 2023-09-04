<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\SuspensionController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\SucursalController;

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

Route::prefix('marcas')->group(function () {
    Route::get('/', [MarcaController::class, 'index']);
    Route::get('/{id}', [MarcaController::class, 'show']);
    Route::post('/', [MarcaController::class, 'create']);
    Route::put('/{id}', [MarcaController::class, 'update']);
    Route::delete('/{id}', [MarcaController::class, 'destroy']);
});



Route::prefix('modelos')->group(function () {
    Route::get('/', [ModeloController::class, 'index']);
    Route::get('/{id}', [ModeloController::class, 'show']);
    Route::post('/', [ModeloController::class, 'create']);
    Route::put('/{id}', [ModeloController::class, 'update']);
    Route::delete('/{id}', [ModeloController::class, 'destroy']);
});

Route::prefix('suspensiones')->group(function () {
    Route::get('/', [SuspensionController::class, 'index']);
    Route::get('/{id}', [SuspensionController::class, 'show']);
    Route::post('/', [SuspensionController::class, 'create']);
    Route::put('/{id}', [SuspensionController::class, 'update']);
    Route::delete('/{id}', [SuspensionController::class, 'destroy']);
});

Route::prefix('vehiculos')->group(function () {
    Route::get('/', [VehiculoController::class, 'index']);
    Route::get('/{id}', [VehiculoController::class, 'show']);
    Route::post('/', [VehiculoController::class, 'create']);
    Route::put('/{id}', [VehiculoController::class, 'update']);
    Route::delete('/{id}', [VehiculoController::class, 'destroy']);
});

Route::prefix('sucursales')->group(function () {
    Route::get('/', [SucursalController::class, 'index']);
    Route::get('/{id}', [SucursalController::class, 'show']);
    Route::post('/', [SucursalController::class, 'create']);
    Route::put('/{id}', [SucursalController::class, 'update']);
    Route::delete('/{id}', [SucursalController::class, 'destroy']);
});