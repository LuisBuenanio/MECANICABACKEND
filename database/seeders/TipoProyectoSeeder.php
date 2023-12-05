<?php

namespace Database\Seeders;


use App\Models\TipoProyecto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoProyectoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoProyecto::create([
            'descripcion' => ''            
        ]);
        TipoProyecto::create([
            'descripcion' => 'VINCULACIÓN INSTITUCIONAL CON LA SOCIEDAD'            
        ]);
        TipoProyecto::create([
            'descripcion' => 'FORMACIÓN EMPRESARIAL Y EMPRENDIMIENTO'            
        ]);
    }
}
