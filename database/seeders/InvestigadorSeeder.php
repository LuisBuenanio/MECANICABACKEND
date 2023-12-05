<?php

namespace Database\Seeders;

use App\Models\Investigador;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InvestigadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Investigador::create([
            'nombre' => 'SANTIAGO ALEJANDRO LOPEZ ORTIZ',
            'email' => 'sa_lopez@espoch.edu.ec',
            'estado' => '2', 
            'tipo_investigador_id' => '1', 
            
        ]);   
        Investigador::create([
            'nombre' => 'EDISON PATRICIO ABARCA PEREZ',
            'email' => 'edison.abarca@espoch.edu.ec',
            'estado' => '2', 
            'tipo_investigador_id' => '4', 
            
        ]);    
        Investigador::create([
            'nombre' => 'VICTOR DAVID BRAVO MOROCHO',
            'email' => 'victor.bravo@espoch.edu.ec',
            'estado' => '2', 
            'tipo_investigador_id' => '1', 
            
        ]);   
    }
}
