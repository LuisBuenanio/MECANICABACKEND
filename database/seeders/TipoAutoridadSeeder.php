<?php

namespace Database\Seeders;

use App\Models\TipoAutoridad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoAutoridadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        TipoAutoridad::create([
            'descripcion' => 'Decano'            
        ]);
        TipoAutoridad::create([
            'descripcion' => 'Subdecano'            
        ]);
        TipoAutoridad::create([
            'descripcion' => 'Director Carrera de Mecánica'            
        ]);
        TipoAutoridad::create([
            'descripcion' => 'Director Carrera Mantenimiento Industrial'            
        ]);
        TipoAutoridad::create([
            'descripcion' => 'Director Carrera Ingeniería Automotriz'            
        ]);	
    }
}
