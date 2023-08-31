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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/alumnos', [AlumnosController::class, 'index']);
Route::get('/alumnos/{id}', [AlumnosController::class, 'getById']);
Route::post('/alumnos', [AlumnosController::class, 'create']);
Route::put('/alumnos/{id}', [AlumnosController::class, 'update']);
Route::delete('/alumnos/{id}', [AlumnosController::class, 'delete']);
