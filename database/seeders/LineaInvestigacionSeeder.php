<?php

namespace Database\Seeders;

use App\Models\LineaInvestigacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LineaInvestigacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        LineaInvestigacion::create([
            'descripcion' => 'ADMINISTRACIÓN Y ECONOMÍA POPULAR'            
        ]);
        LineaInvestigacion::create([
            'descripcion' => 'PROCESOS TECNOLÓGICOS, ARTESANALES E INDUSTRIALES'            
        ]);
        LineaInvestigacion::create([
            'descripcion' => 'MANEJO SUSTENTABLE DE LOS RECURSOS NATURALES'            
        ]);

        LineaInvestigacion::create([
            'descripcion' => 'ENERGÍAS RENOVABLES Y PROTECCIÓN AMBIENTAL.'            
        ]);

        
        LineaInvestigacion::create([
            'descripcion' => 'CIENCIAS BÁSICAS Y APLICADAS'            
        ]);

        LineaInvestigacion::create([
            'descripcion' => 'EDUCACIÓN Y PEDAGOGÍA'            
        ]);
        
    }
}
