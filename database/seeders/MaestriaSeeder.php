<?php

namespace Database\Seeders;

use App\Models\Maestria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaestriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Maestria::create([
            'nombre' => 'Maestría en Diseño Mecánico',
            'titulo' => 'Master en Diseño Mecánico',  
            'foto' => 'maestria.jpg', 
            'perfil_ingreso' => '',
            'perfil_profesional' => 'Formar Magísteres en diseño mecánico con alto nivel científico, innovativo y responsabilidad ambiental, elevando la competitividad y desempeño del profesional en Diseño Mecánico, con capacidad para elaborar y gestionar proyectos de investigación científica y de desarrollo tecnológico, perfeccionar los métodos y herramientas del diseño de máquinas y sistemas mecánicos así como desarrollar nuevos y/o mejorados productos mecánicos que respondan a las demandas que impone el desarrollo nacional en los campos de la maquinaria agrícola y automotriz empleando métodos y herramientas científicos e ingenieriles de avanzada, el trabajo en grupos multidisciplinarios y con un alto grado de independencia.',            
            'objetivo' => 'Formar Magísteres en diseño mecánico con alto nivel científico, innovativo y responsabilidad ambiental, elevando la competitividad y desempeño del profesional en Diseño Mecánico, con capacidad para elaborar y gestionar proyectos de investigación científica y de desarrollo tecnológico, perfeccionar los métodos y herramientas del diseño de máquinas y sistemas mecánicos así como desarrollar nuevos y/o mejorados productos mecánicos que respondan a las demandas que impone el desarrollo nacional en los campos de la maquinaria agrícola y automotriz empleando métodos y herramientas científicos e ingenieriles de avanzada, el trabajo en grupos multidisciplinarios y con un alto grado de independencia.',            
            'duracion' => 'Cuatro módulos académicos y un módulo para el desarrollo del trabajo de titulación',
            'malla' => 'malla_maestria_disenio_mec.pdf', 
            'modalidad' => 'Presencial', 
            'formacion' => 'Profesional', 
            'estado' => '2',       
        ]);         
    }
}
