<?php

namespace Database\Seeders;

use App\Models\TipoTitulacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoTitulacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoTitulacion::create([
            'descripcion' => 'Proyecto de Investigación de Grado'   ,
            'documento' => 'proyecto_de_investigación.pdf',  
            'estado' => '2',   
             
        ]);
        TipoTitulacion::create([
            'descripcion' => 'Emprendimiento',
            'documento' => 'tipo_emprendimiento.pdf',  
            'estado' => '2',          
        ]);
        TipoTitulacion::create([
            'descripcion' => 'Proyecto Técnico' ,
            'documento' => 'proyecto_técnico.pdf',   
            'estado' => '2',          
        ]);
        TipoTitulacion::create([
            'descripcion' => 'Trabajo Experimental' ,
            'documento' => 'trabajo_experimental.pdf',    
            'estado' => '2',         
        ]);
        TipoTitulacion::create([
            'descripcion' => 'Propuesta Tecnológica'  ,
            'documento' => 'propuesta_tecnológica.pdf',   
            'estado' => '2',         
        ]);
        TipoTitulacion::create([
            'descripcion' => 'Dispositivo Tecnológico' ,
            'documento' => 'dispositivo_tecnológico.pdf', 
            'estado' => '2',            
        ]);
        TipoTitulacion::create([
            'descripcion' => 'Estudio de Casos'  ,
            'documento' => 'estudio_de_casos.pdf',      
            'estado' => '2',      
        ]);
    }
}
