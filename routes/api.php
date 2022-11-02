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


Route::group(['middleware' => 'cors'], function(){
    Route::resource('escuela', 'EscuelaController', ['only' =>['index','show']]);
    Route::resource('autoridades', 'AutoridadController', ['only' =>['index','show']]);
    Route::resource('tipo_autoridades', 'Tipo_AutoridadController', ['only' =>['index','show']]);
    Route::resource('galeria', 'GaleriaController', ['only' =>['index','show']]);
    Route::resource('convenio', 'ConvenioController', ['only' =>['index','show']]);
    Route::resource('proyecto', 'ProyectoController', ['only' =>['index','show']]);
    Route::resource('slider', 'SliderController', ['only' =>['index','show']]);
    Route::resource('noticia', 'NoticiaController', ['only' =>['index','show']]);
    Route::resource('asociaciones', 'AsociacionController', ['only' =>['index','show']]);
}); 