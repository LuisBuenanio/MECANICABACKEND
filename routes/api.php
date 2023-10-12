<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EscuelaController;
use App\Http\Controllers\AutoridadController;
use App\Http\Controllers\Tipo_AutoridadController;
use App\Http\Controllers\AsociacionController;
use App\Http\Controllers\IntegranteController;
use App\Http\Controllers\Tipo_IntegranteController;
use App\Http\Controllers\NoticiaController;

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


Route::get('/autoridades', [AutoridadController::class, 'index']);
Route::get('/autoridades/{id}', [AutoridadController::class, 'show']);

Route::get('/asociaciones', [AsociacionController::class, 'index']);
Route::get('/asociaciones/{id}', [AsociacionController::class, 'show']);


Route::get('/tipo_autoridades', [Tipo_AutoridadController::class, 'index']);
Route::get('/tipo_autoridades/{id}', [Tipo_AutoridadController::class, 'show']);

Route::get('/escuelas', [EscuelaController::class, 'index']);
Route::get('/escuelas/{id}', [EscuelaController::class, 'show']);



Route::get('/integrantes', [IntegranteController::class, 'index']);
Route::get('/integrantes/{id}', [IntegranteController::class, 'show']);


Route::get('/tipo_integrantes', [Tipo_IntegranteController::class, 'index']);
Route::get('/tipo_integrantes/{id}', [Tipo_IntegranteController::class, 'show']);


Route::get('/noticias', [NoticiaController::class, 'index']);
Route::get('/noticias/{id}', [NoticiaController::class, 'show']);
