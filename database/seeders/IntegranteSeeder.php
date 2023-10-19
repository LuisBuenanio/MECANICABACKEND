<?php

namespace Database\Seeders;

use App\Models\Integrante;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IntegranteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Integrante::create([
            'nombre' => 'Marlon EnriquE Abarca Sigcho',
            'telefono' => '',  
            'foto' => 'marlon-enrique-abarca-sigcho.jpg',              
            'email' => 'marlom@espoch.edu.ec',  
            'estado' => '1',
            'asociacion_id' => '1',   
            'tipo_integrante_id' => '1',        
        ]); 
        Integrante::create([
            'nombre' => 'David Sebastián Saltos Colcha',
            'telefono' => '',  
            'foto' => 'david-sebastian-saltos-colcha.jpg',              
            'email' => 'david@espoch.edu.ce',  
            'estado' => '1',
            'asociacion_id' => '1',   
            'tipo_integrante_id' => '2',        
        ]); 
        Integrante::create([
            'nombre' => 'Steven José Cevallos Silva',
            'telefono' => '',  
            'foto' => 'steven-jose-cevallos-silva.jpg',              
            'email' => 'est@espoch.edu.ce',  
            'estado' => '1',
            'asociacion_id' => '1',   
            'tipo_integrante_id' => '3',        
        ]); 
        Integrante::create([
            'nombre' => 'Juliana Rosaura Buenaño Mendoza',
            'telefono' => '',  
            'foto' => 'juliana-rosaura-buenano-mendoza.jpg',              
            'email' => 'jr@espoch.edu.ce',  
            'estado' => '1',
            'asociacion_id' => '1',   
            'tipo_integrante_id' => '4',        
        ]); 
        Integrante::create([
            'nombre' => 'Luis Jaleel Hernández Salazar',
            'telefono' => '',  
            'foto' => 'luis-jaleel-hernandez-salazar.jpg',              
            'email' => 'lj@espoch.edu.ce',  
            'estado' => '1',
            'asociacion_id' => '1',   
            'tipo_integrante_id' => '5',        
        ]); 
        Integrante::create([
            'nombre' => 'Patricio David Guerra Vinueza',
            'telefono' => '',  
            'foto' => 'patricio-david-guerra-vinueza.jpg',              
            'email' => 'pd@espoch.edu.ce',  
            'estado' => '1',
            'asociacion_id' => '1',   
            'tipo_integrante_id' => '6',        
        ]); 
        Integrante::create([
            'nombre' => 'Fausto Enrique Orozco Hernández',
            'telefono' => '',  
            'foto' => 'fausto-enrique-orozco-hernandez.jpg',              
            'email' => 'fer@espoch.edu.ce',  
            'estado' => '1',
            'asociacion_id' => '1',   
            'tipo_integrante_id' => '7',        
        ]); 
        Integrante::create([
            'nombre' => 'Sofía Anabel Correa Quinatoa',
            'telefono' => '',  
            'foto' => 'sofia-anabel-correa-quinatoa.jpg',              
            'email' => 'ssda@espoch.edu.ce',  
            'estado' => '1',
            'asociacion_id' => '1',   
            'tipo_integrante_id' => '8',        
        ]); 
        Integrante::create([
            'nombre' => 'Lizbeth Aracelly Vargas Favicela',
            'telefono' => '',  
            'foto' => 'lizbeth-aracelly-vargas-favicela.jpg',              
            'email' => 'ladsf@espoch.edu.ce',  
            'estado' => '1',
            'asociacion_id' => '1',   
            'tipo_integrante_id' => '9',        
        ]); 
        
    }
}
