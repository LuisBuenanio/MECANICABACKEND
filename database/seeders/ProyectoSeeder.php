<?php

namespace Database\Seeders;

use App\Models\Proyecto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProyectoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Proyecto::create([
            'codigo' => '01.PYP.2023 ',
            'nombre' => 'NOMBRE DE PROYECTO DE PRUEBA',
            'objetivo' => 'OBJETIVOS DEL PROYECTO DE PRUEBA', 
            'coordinador' => 'Ing. PRUEBA',
            'estado' => '2',
            'ejecutandose' => false ,   
            'tipo_proyecto_id' => '2', 
            
        ]);    
        Proyecto::create([
            'codigo' => '01.PYP.2023 ',
            'nombre' => 'NOMBRE DE PROYECTO DE PRUEBA',
            'objetivo' => 'OBJETIVOS DEL PROYECTO DE PRUEBA', 
            'coordinador' => 'Ing. PRUEBA',
            'estado' => '2',
            'ejecutandose' => true ,   
            'tipo_proyecto_id' => '3', 
            
        ]);    
    }
}
