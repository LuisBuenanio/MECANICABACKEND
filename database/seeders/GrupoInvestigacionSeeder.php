<?php

namespace Database\Seeders;

use App\Models\GrupoInvestigacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GrupoInvestigacionSeeder extends Seeder
{
    public function run()
    {
        GrupoInvestigacion::create([
            'codigo' => 'FMGI-014',   
            'siglas' => 'CBFLT',         
            'nombre' => 'GRUPO DE INVESTIGACIÓN CONTEXT-BASED FOREIGN-LANGUAGES TEACHING', 
            'mision' => 'Comprender la realidad de la enseñanza y aprendizaje de lenguas maternas y extranjeras en el ecuador para repensar ente proceso reconociendo su identidad plurinacional, pluricultural y multiétnica, a fin de identificar los posibles factores que obstaculizan o facilitan la concreción de los objetivos académicos y en tal sentido, proponer alternativas de mejora o cambio',  
            'vision' => 'Ser un Grupo de investigación revolucionario capaz de romper paradigmas tradicionales de la enseñanza y aprendizaje de lenguas maternas y extrajeras en el Ecuador, el cual desde una postura crítica contribuye al mejoramiento del nivel de los idiomas Kichwa, Inglés y Francés', 
            'objetivo' => 'Ser un Grupo de investigación revolucionario capaz de romper paradigmas tradicionales de la enseñanza y aprendizaje de lenguas maternas y extrajeras en el Ecuador, el cual desde una postura crítica contribuye al mejoramiento del nivel de los idiomas Kichwa, Inglés y Francés',  
             'portada' => 'grupo1.png',  
            'estado' => '2',       
        ]); 
    }
}
