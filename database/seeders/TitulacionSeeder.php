<?php

namespace Database\Seeders;

use App\Models\Titulacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TitulacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Titulacion::create([
            'descripciont' => 'En esta guía se consideran los requisitos para la presentación escrita de un trabajo trabajo de Integración Curricular, con el fin de orientar al estudiante, docente e investigador en su elaboración. No se enfatiza en los aspectos metodológicos de la investigación, sino en los aspectos formales de la presentación.'   ,
            'resumen' => 'De acuerdo a la RESOLUCIÓN 510.CP.2022 (15 de septiembre de 2022). En la Escuela Superior Politécnica de Chimborazo se considera las siguientes modalidades para titulación:'   ,
            'portada' => 'titulacion.png',  
            
        ]);
    }
}
