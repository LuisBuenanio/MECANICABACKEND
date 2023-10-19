<?php

namespace Database\Seeders;

use App\Models\Autoridad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AutoridadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Autoridad::create([
            'nombre' => 'Ing. Marco Homero Almendariz Puente',
            'telefono' => '',  
            'hoja_vida' => 'Marco Armendariz.pdf', 
            'foto' => 'Marco Armendariz.jpg',              
            'estado' => '1',     
            'tipo_autoridad_id' => '1',        
        ]); 
        Autoridad::create([
            'nombre' => 'Ing. José Francisco Pérez Fiallos',
            'telefono' => '',  
            'hoja_vida' => 'José francisco Perez.pdf', 
            'foto' => 'José francisco Perez.jpg',              
            'estado' => '1',     
            'tipo_autoridad_id' => '2',        
        ]); 
        Autoridad::create([
            'nombre' => 'Msc. Edwin Viteri Nuñez',
            'telefono' => '',  
            'hoja_vida' => 'Edwin Viteri.pdf', 
            'foto' => 'Edwin Viteri.jpg',               
            'estado' => '1',     
            'tipo_autoridad_id' => '3',        
        ]); 
        Autoridad::create([
            'nombre' => 'Ing. Marco Antonio Ordoñez Viñan',
            'telefono' => '',  
            'hoja_vida' => 'Marco Ordoñez.pdf', 
            'foto' => 'ing-marco-antonio-ordonez-vinan.jpg',              
            'estado' => '1',     
            'tipo_autoridad_id' => '4',        
        ]); 
        Autoridad::create([
            'nombre' => 'Ing. Juan Carlos Rocha Hoyos',
            'telefono' => '',  
            'hoja_vida' => 'Juan Rocha.pdf', 
            'foto' => 'ing-juan-carlos-rocha-hoyos.jpg',              
            'estado' => '1',     
            'tipo_autoridad_id' => '5',        
        ]); 
    }
}