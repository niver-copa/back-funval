<?php

use App\Http\Controllers\PersonaController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(PersonaController::class)->group(function(){
    Route::get('/personas', 'index');
    Route::put('/crear-persona', 'store');
    Route::get('/persona/{id}', 'show');
    Route::post('/persona/{id}', 'update');
    Route::delete('/persona/{id}', 'destroy');
});