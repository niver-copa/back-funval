<?php

use App\Http\Controllers\CajaController;
use App\Http\Controllers\CombustibleController;
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
use App\Http\Controllers\UserController;

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

///////////////////// EXTRA ///////////////////
Route::controller(PersonaController::class)->group(function () {
    Route::get('/personas', 'index');
    Route::post('/crear-persona', 'store');
    Route::get('/persona/{id}', 'show');
    Route::put('/persona/{id}', 'update');
    Route::put('/persona/{id}', 'destroy');
});

///////////////////// MAIN ///////////////////////////

Route::controller(UserController::class)->group(function () {
    Route::get('user', "index");
    Route::post('user/login', "login");
    Route::post('user/create', "create");
    Route::put('user/delete/{id}', "delete");
});

Route::get('/vendedor', [VendedorController::class, 'index']);
Route::get('/vendedor/{id}', [VendedorController::class, 'getById']);
Route::post('/vendedor/create', [VendedorController::class, 'create']);
Route::put('/vendedor/update/{id}', [VendedorController::class, 'update']);
Route::put('/vendedor/delete/{id}', [VendedorController::class, 'delete']);

Route::controller(ClienteController::class)->group(function () {
    Route::get('cliente', "index");
    Route::get('cliente/{id}', "show");
    Route::post('cliente/create', "create");
    Route::put('cliente/delete/{id}', "destroy");
    Route::put('cliente/update/{id}', "update");
});

Route::get('/proveedor', [ProveedorController::class, 'show']);
Route::get('/proveedor/{id}', [ProveedorController::class, 'getById']);
Route::post('/proveedor/create', [ProveedorController::class, 'new']);
Route::put('/proveedor/update/{id}', [ProveedorController::class, 'update']);
Route::put('/proveedor/delete/{id}', [ProveedorController::class, 'delete']);

Route::prefix('marcas')->group(function () {
    Route::get('/', [MarcaController::class, 'index']);
    Route::get('/full', [MarcaController::class, 'indexf']);
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

Route::prefix('cajas')->group(function () {
    Route::get('/', [CajaController::class, 'index']);
});

Route::prefix('combustibles')->group(function () {
    Route::get('/', [CombustibleController::class, 'index']);
});
