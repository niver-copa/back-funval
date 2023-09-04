<?php

use App\Http\Controllers\PersonaController;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\ClienteController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProveedorController;
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


Route::controller(PersonaController::class)->group(function () {
    Route::get('/persona', 'index');
    Route::put('/crear-persona', 'store');
    Route::get('/persona/{id}', 'show');
    Route::post('/persona/{id}', 'update');
    Route::put('/persona/{id}', 'destroy');
});

Route::get('/vendedor', [VendedorController::class, 'index']);
Route::get('/vendedor/{id}', [VendedorController::class, 'getById']);
Route::post('/vendedor', [VendedorController::class, 'create']);
Route::put('/vendedor/update/{id}', [VendedorController::class, 'update']);
Route::put('/vendedor/destroy/{id}', [VendedorController::class, 'delete']);

Route::controller(ClienteController::class)->group(function () {
    Route::get('cliente', "index");
    Route::get('cliente/{id}', "show");
    Route::post('cliente/create', "create");
    Route::put('cliente/destroy', "destroy");
    Route::put('cliente/update', "update");
});

Route::get('/proveedores', [ProveedorController::class, 'show']);
Route::get('/proveedores/{id}', [ProveedorController::class, 'getById']);
Route::post('/proveedores/new', [ProveedorController::class, 'new']);
Route::put('/proveedores/edit/{id}', [ProveedorController::class, 'update']);
Route::put('/proveedores/delete/{id}', [ProveedorController::class, 'delete']);

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
