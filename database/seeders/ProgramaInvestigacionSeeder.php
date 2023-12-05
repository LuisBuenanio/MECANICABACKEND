<?php

namespace Database\Seeders;

use App\Models\ProgramaInvestigacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramaInvestigacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProgramaInvestigacion::create([
            'descripcion' => 'SISTEMA DE GESTIÓN INTEGRADOS',          
       
        ]);
        ProgramaInvestigacion::create([
            'descripcion' => 'DISEÑO Y GESTIÓN DE LA PRODUCCIÓN Y MANUFACTURA',            
                    
        ]);

        ProgramaInvestigacion::create([
            'descripcion' => 'ELECTRÓNICA Y AUTOMATIZACIÓN',
             
                    
        ]);
        ProgramaInvestigacion::create([
            'descripcion' => 'ELECTRÓNICA Y AUTOMATIZACIÓN',
             
                    
        ]);
        ProgramaInvestigacion::create([
            'descripcion' => 'ROBÓTICA Y CONTROL',
             
                    
        ]);
        ProgramaInvestigacion::create([
            'descripcion' => 'SISTEMAS DE RIEGO',
             
                    
        ]);
        ProgramaInvestigacion::create([
            'descripcion' => 'BIOINGENIERÍASISTEMA DE GESTIÓN INTEGRADOS',
             
                    
        ]);

        ProgramaInvestigacion::create([
            'descripcion' => 'DISEÑO Y PRODUCCIÓN MECÁNICA',
        ]);

        

        ProgramaInvestigacion::create([
            'descripcion' => 'INGENIERÍA Y TECNOLOGÍAS VERDES',
                    
        ]);
        ProgramaInvestigacion::create([
            'descripcion' => 'SEGURIDAD Y AMBIENTE',
        ]);

        ProgramaInvestigacion::create([
            'descripcion' => 'MANEJO Y APROVECHAMIENTO DE LOS RECURSOS RENOVABLES',
                    
        ]);

        ProgramaInvestigacion::create([
            'descripcion' => 'MANEJO Y APROVECHAMIENTO DE LOS RECURSOS RENOVABLES',
                    
        ]);
        ProgramaInvestigacion::create([
            'descripcion' => 'EFICIENCIA ENERGÉTICA',
        ]);


        ProgramaInvestigacion::create([
            'descripcion' => 'ENERGÍA Y AMBIENTE',
                    
        ]);
        
        
        

    }
}
