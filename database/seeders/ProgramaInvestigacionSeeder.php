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
            'linea_investigacion_id' => '1',        
       
        ]);
        ProgramaInvestigacion::create([
            'descripcion' => 'DISEÑO Y GESTIÓN DE LA PRODUCCIÓN Y MANUFACTURA',            
            'linea_investigacion_id' => '1',      
        ]);

        ProgramaInvestigacion::create([
            'descripcion' => 'ELECTRÓNICA Y AUTOMATIZACIÓN',
            'linea_investigacion_id' => '2',  
                    
        ]);
        ProgramaInvestigacion::create([
            'descripcion' => 'ROBÓTICA Y CONTROL',
            'linea_investigacion_id' => '2',  
                    
        ]);
        ProgramaInvestigacion::create([
            'descripcion' => 'SISTEMAS DE RIEGO',
            'linea_investigacion_id' => '2',  
                    
        ]);

        ProgramaInvestigacion::create([
            'descripcion' => 'DISEÑO Y PRODUCCIÓN MECÁNICA',
            'linea_investigacion_id' => '2',  
        ]);

        

        ProgramaInvestigacion::create([
            'descripcion' => 'INGENIERÍA Y TECNOLOGÍAS VERDES',
            'linea_investigacion_id' => '3',  
                    
        ]);
        ProgramaInvestigacion::create([
            'descripcion' => 'SEGURIDAD Y AMBIENTE',
            'linea_investigacion_id' => '3',  
        ]);


        ProgramaInvestigacion::create([
            'descripcion' => 'MANEJO Y APROVECHAMIENTO DE LOS RECURSOS RENOVABLES',
            'linea_investigacion_id' => '4',  
        ]);


        ProgramaInvestigacion::create([
            'descripcion' => 'ENERGÍA Y AMBIENTE',
            'linea_investigacion_id' => '4',      
        ]);
        
        
        

    }
}
