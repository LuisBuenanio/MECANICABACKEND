<?php

namespace Database\Seeders;

Use App\Models\Escuela;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EscuelaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Escuela::create([
        
        'nombre' => 'Escuela de Ingeniería Mecánica',
        'mision' => 'Formar ingenieros mecánicos idóneos, competitivos, emprendedores, conscientes de su identidad local y nacional, justicia social, democracia y preservación, democracia y preservación del ambiente, a través de la generación, transmisión, adaptación y aplicación del conocimiento científico y tecnológico en el área mecánica para contribuir al desarrollo integral y sustentable del país, en consideración a las políticas del Plan Nacional del Buen Vivir.',
        'vision' => 'Ser en el siguiente quinquenio la carrera de ingeniería mecánica líder en educación superior en el país y en el soporte científico, tecnológico e industrial, para el desarrollo integral de la provincia de Chimborazo y del país, con calidad, pertinencia y reconocimiento social.',
        'telefono' => '593(03) 2998-200 Ext',
        'email' => 'mecanica@espoch.edu.ec',
        'mapa'=> 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1994.07642890057!2d-78.678571!3d-1.655555!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe12e5a03f277fc67!2sFacultad%20de%20Ciencias%20-%20ESPOCH!5e0!3m2!1ses-419!2sec!4v1587590089807!5m2!1ses-419!2sec',
        'direccion' => 'Panamericana Sur km 1 1/2',
        'malla' => 'PLAN DE ESTUDIOS DE CARRERA DE MECANICA.pdf',
        'duracion' => '10 semestres',
        'perfil' => 'Petróleo y derivados',
        'campo' => 'Petróleo y derivados',
        'titulo' => 'Ingeniero/a Mecánico/a',
        'modalidad' => 'Presencial',
        'fecha_creacion' => '1973-07-20',
        'logo_escuela' => 'logo-mecanica-color2.png',            
        ]);
        /* Escuela::factory(1)->create(); */
    }
}
