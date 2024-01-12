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
use App\Http\Controllers\LineaEscuelaController;
use App\Http\Controllers\LineaFacultadController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\TitulacionController;
use App\Http\Controllers\SecretariaContController;
use App\Http\Controllers\SecretariaOficController;
use App\Http\Controllers\SecretariaController;
use App\Http\Controllers\GrupoInvestigacionController;
use App\Http\Controllers\CalendarioController;
use App\Http\Livewire\Calendario;


Route::group([], function () {

    Route::get('/', [HomeController::class, 'index'])-> name('inicio');

    Route::get('noticias', [NoticiaController::class, 'noticias'])-> name('noticias');
    Route::get('noticia/{noticia}', [NoticiaController::class, 'noticia'])->name('noticia');

    Route::get('docentes', [DocenteController::class, 'docentes'])-> name('docentes');
    Route::get('docente/{docente}', [DocenteController::class, 'docente'])->name('docente');

    Route::get('galerias', [GaleriaController::class, 'galerias'])-> name('galerias');
    Route::get('galeria/{galeria}', [GaleriaController::class, 'showGaleria'])->name('galeria');

    Route::get('asociacion', [AsociacionController::class, 'aso'])-> name('asociacion');

    Route::get('convenios', [ConvenioController::class, 'conveniost'])-> name('convenios');

    Route::get('proyectos', [ProyectoController::class, 'proyectost'])-> name('proyectos');

    Route::get('postgrados', [PostgradoController::class, 'postgradost'])-> name('postgrados');


    Route::get('maestrias', [MaestriaController::class, 'maestrias'])-> name('maestrias');
    Route::get('maestria/{maestria}', [MaestriaController::class, 'maestria'])->name('maestria');


    Route::get('lineasesc', [LineaEscuelaController::class, 'lineasesct'])-> name('lineasesc');
    Route::get('lineasfac', [LineaFacultadController::class, 'lineasfact'])-> name('lineasfac');

    Route::get('gruposinvestigacion', [GrupoInvestigacionController::class, 'gruposinvestigacion'])-> name('gruposinvestigacion');
    Route::get('grupoinvestigacion/{grupo}', [GrupoInvestigacionController::class, 'grupoinvestigacion'])-> name('grupoinvestigacion');

    Route::get('titulacion', [TitulacionController::class, 'titulaciont'])-> name('titulacion');
    Route::get('secretaria', [SecretariaController::class, 'secretaria'])-> name('secretaria');

    Route::get('secretariaconts', [SecretariaContController::class, 'secretariacontf'])-> name('secretariaconts');
    Route::get('secretariaofics', [SecretariaOficController::class, 'secretariaoficf'])-> name('secretariaofics');

    Route::get('calendario', [CalendarioController::class, 'calendario'])-> name('calendario');
 
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])
    ->group(function () {
        
        

        Route::get('/chat', function () {
            return redirect()->route('chat');
        })->name('chat');

    });

    Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])
    ->group(function () {
        
        

        Route::get('/chat', function () {
            return redirect()->route('chat');
        })->name('chat');

    });
    Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])
    ->group(function () {
        
        

        Route::get('/chat', function () {
            return redirect()->route('chat');
        })->name('chat');

    });
