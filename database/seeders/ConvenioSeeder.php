<?php

namespace Database\Seeders;


use App\Models\Convenio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConvenioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Convenio::create([
            'resolucion' => '039.CP.2022 ',
            'nombre' => 'CONVENIO ESPECÍFICO DE COOPERACIÓN INTERINSTITUCIONAL PARA EL DESARROLLO DE PRÁCTICAS PRE PROFESIONALES ENTRE LA ESCUELA SUPERIOR POLITÉCNICA DE CHIMBORAZO Y CORPORACIÓN ELÉCTRICA DEL ECUADOR CELEC EP - UNIDAD DE NEGOCIO   TERMOESMERALDAS',
            'objetivo' => 'Tiene por objeto: instrumentar la cooperación interinstitucional para integrar la formación académica con la realización de Prácticas Pre profesionales, con el propósito de fortalecer y generar logros de aprendizaje y competencias, capacidades y nuevos conocimientos en los estudiantes de la ESPOCH a través de la participación solidaria y comprometida en diversos programas, proyectos y servicios que desarrolla la CELEC EP - Unidad de Negocio Termoesmeraldas', 
            'coordinador' => 'Ing. Lidia Castro',
            'fecha_legalizacion' => '2022-02-03',
            'vigencia' => '3 AÑOS',
            'estado' => '2',            
            'tipo_convenio_id' => '1', 
            
        ]);    
    }
}
