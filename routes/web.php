<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\AsociacionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GaleriaController;
use App\Http\Controllers\ConvenioController;
use App\Http\Controllers\ProyectoController;

use App\Http\Controllers\PostgradoController;

use App\Http\Controllers\MaestriaController;
use App\Http\Controllers\InvestigacionController;
use App\Http\Controllers\FullCalenderController;


use App\Http\Controllers\LineaEscuelaController;

use App\Http\Controllers\LineaFacultadController;

use App\Http\Controllers\DocenteController;
use App\Http\Controllers\TitulacionController;


use App\Http\Controllers\SecretariaContController;
use App\Http\Controllers\SecretariaOficController;

Route::get('/', [HomeController::class, 'index'])-> name('inicio');

Route::get('noticias', [NoticiaController::class, 'noticias'])-> name('noticias');
Route::get('noticia/{noticia}', [NoticiaController::class, 'noticia'])->name('noticia');

Route::get('galerias', [GaleriaController::class, 'galerias'])-> name('galerias');
Route::get('galeria/{galeria}', [GaleriaController::class, 'showGaleria'])->name('galeria');


/* Route::get('galerias', [HomeController::class, 'galerias'])-> name('galerias');  */

Route::get('asociacion', [AsociacionController::class, 'aso'])-> name('asociacion');


Route::get('convenios', [ConvenioController::class, 'conveniost'])-> name('convenios');

Route::get('proyectos', [ProyectoController::class, 'proyectost'])-> name('proyectos');

Route::get('postgrados', [PostgradoController::class, 'postgradost'])-> name('postgrados');


Route::get('maestrias', [MaestriaController::class, 'maestriast'])-> name('maestrias');


Route::get('lineasesc', [LineaEscuelaController::class, 'lineasesct'])-> name('lineasesc');
Route::get('lineasfac', [LineaFacultadController::class, 'lineasfact'])-> name('lineasfac');


Route::get('docentes', [DocenteController::class, 'docentest'])-> name('docentes');
Route::get('titulacion', [TitulacionController::class, 'titulaciont'])-> name('titulacion');

Route::get('secretariaconts', [SecretariaContController::class, 'secretariacontf'])-> name('secretariaconts');
Route::get('secretariaofics', [SecretariaOficController::class, 'secretariaoficf'])-> name('secretariaofics');



Route::get('grupos_investigacion', [InvestigacionController::class, 'investigaciont'])-> name('grupos_investigacion');
Route::get('grupo_investigacion/{grupo_investigacion}', [InvestigacionController::class, 'showinvestigacion'])->name('grupo_investigacion');
Route::get('investigacion', [InvestigacionController::class, 'investigacionts'])-> name('investigacion');

/* Route::middleware(['auth:sanctum',config('jetstream.auth_session'), 'verified'])->group(function () { Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
}); */


 
/* Calenario final  */


Route::controller(FullCalenderController::class)->group(function(){
    Route::get('calendario', 'index')->name('calendario');
    Route::post('calendarioAjax', 'ajax');
});
