<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\NoticiaController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\EscuelaController;
use App\Http\Controllers\Admin\IntegranteController;
use App\Http\Controllers\Admin\AsociacionController;
use App\Http\Controllers\Admin\TipoIntegranteController;
use App\Http\Controllers\Admin\TipoAutoridadController;
use App\Http\Controllers\Admin\AutoridadController;
use App\Http\Controllers\Admin\TipoConvenioController;
use App\Http\Controllers\Admin\ConvenioController;
use App\Http\Controllers\Admin\GaleriaController;
use App\Http\Controllers\Admin\MultimediaController;
use App\Http\Controllers\Admin\TipoProyectoController;
use App\Http\Controllers\Admin\ProyectoController;
use App\Http\Controllers\Admin\CalendarioController;

use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\DocenteController;
use App\Http\Controllers\Admin\TitulacionController;
use App\Http\Controllers\Admin\TipoTitulacionController;



Route::get('', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');


Route::resource('users', UserController::class)->names('admin.users');


Route::resource('roles', RoleController::class)->names('admin.roles');


Route::resource('noticias', NoticiaController::class)->except('show')->names('admin.noticias');

Route::resource('escuela', EscuelaController::class)->except('show')->names('admin.escuela');

Route::resource('integrantes', IntegranteController::class)->except('show')->names('admin.integrantes');



Route::resource('tipointegrantes', TipoIntegranteController::class)->except('show')->names('admin.tipointegrantes');

Route::resource('asociacion', AsociacionController::class)->except('show')->names('admin.asociacion');

Route::resource('tipoautoridad', TipoAutoridadController::class)->except('show')->names('admin.tipoautoridad');

Route::resource('autoridades', AutoridadController::class)->except('show')->names('admin.autoridades');


Route::resource('galerias', GaleriaController::class)->except('show')->names('admin.galerias');


Route::resource('multimedias', MultimediaController::class)->except('show')->names('admin.multimedias');

Route::resource('tipoconvenio', TipoConvenioController::class)->except('show')->names('admin.tipoconvenio');
Route::resource('convenio', ConvenioController::class)->except('show')->names('admin.convenio');

Route::resource('tipoproyecto', TipoProyectoController::class)->except('show')->names('admin.tipoproyecto');
Route::resource('proyectos', ProyectoController::class)->except('show')->names('admin.proyectos');


Route::resource('calendario', CalendarioController::class)->except('show')->names('admin.calendario');


Route::resource('slider', SliderController::class)->except('show')->names('admin.slider');


Route::resource('docentes', DocenteController::class)->except('show')->names('admin.docentes');


Route::resource('titulacion', TitulacionController::class)->except('show')->names('admin.titulacion');
Route::resource('tipotitulacion', TipoTitulacionController::class)->except('show')->names('admin.tipotitulacion');