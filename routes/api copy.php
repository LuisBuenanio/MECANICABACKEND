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
use App\Http\Controllers\SliderController;

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
/* Rutas sin proteger */ 

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



Route::get('/sliders', [SliderController::class, 'index']);
Route::get('/sliders/{id}', [SliderController::class, 'show']);




/* /* Ruta de inicio de sesión */ 
Route::post('/signin', [AuthenticationController::class, 'signin'])->middleware('throttle:5,1'); 

/* Rutas para restablecer la contraseña */ 
Route::post('/password/email', [PasswordResetController::class,'sendPasswordResetLink'])->middleware('throttle:5,1')->name('password.email'); 
Route::post('/password/reset', [PasswordResetController::class, 'resetPassword'])->middleware('throttle:5,1')->name('password.reset'); 




/* Rutas protegidas por el middleware de sanctum */ 
Route::middleware(['auth:sanctum'])->group(function () { 
    
    /* Rutas para obtener datos del usuario autentificado */ 
    Route::get('/user', [AuthenticationController::class, 'user']); 
    
    /* Rutas para cerrar sesión */ 
    Route::post('/signout', [AuthenticationController::class, 'signout']); 
    
    /* Rutas para acceso a archivos privados de avatares */ 
    Route::get('users/get_avatar/{image}', ObtainAvatar::class); 
        
    /* Rutas de usuario */     
    Route::apiResource('users', UserController::class); 
                 
    /* Rutas salas de chat */ 
    Route::apiResource( 'rooms', RoomController::class ); 
    Route::post('rooms/{room}/add', [RoomController::class, 'addPartipant']); 
    Route::post('rooms/{room}/modify', [RoomController::class,'togglePermision']); 
    Route::post('rooms/{room}/remove', [RoomController::class,'removeParticipant']); 
    Route::get('rooms/{room}/exit', [RoomController::class, 'exitRoom']); 
    Route::get('rooms/{room}/avatar', [RoomController::class, 'getRoomAvatar']);
    Route::get('rooms/{room}/read', [RoomController::class, 'markAsReadRoom']);
    
    /* Rutas de mensajes  */ 
    Route::apiResource( 'messages', MessageController::class )->except(['update']); 
    Route::get('messages/{message}/download', [MessageController::class,'getMessageFile']); 
    Route::get('messages/{message}/thumbnail', [MessageController::class,'getMessageFileThumbnail']); 
    Route::post('messages/{message}/faqs/add', [MessageController::class,'addMessageToSubjectFaqs']); 
});
  */