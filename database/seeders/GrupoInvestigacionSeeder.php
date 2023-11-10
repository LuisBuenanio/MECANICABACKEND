<?php

namespace Database\Seeders;

use App\Models\GrupoInv;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GrupoInvestigacionSeeder extends Seeder
{
    /*
    
    $table->string('codigo');             
            $table->string('siglas');             
            $table->string('nombre');
            $table->string('mision');  
            $table->string('vision'); 
            $table->string('objetivo');  
            $table->string('linea_investigacion'); 
            $table->string('integrante');                        
            $table->string('portada')->nullable();  
            $table->enum('estado',[1,2])->default(1);
            $table->timestamps();

    */
    public function run()
    {
        GrupoInv::create([
            'codigo' => 'FMGI-014',   
            'siglas' => 'CBFLT',         
            'nombre' => 'GRUPO DE INVESTIGACIÓN CONTEXT-BASED FOREIGN-LANGUAGES TEACHING', 
            'mision' => 'Comprender la realidad de la enseñanza y aprendizaje de lenguas maternas y extranjeras en el ecuador para repensar ente proceso reconociendo su identidad plurinacional, pluricultural y multiétnica, a fin de identificar los posibles factores que obstaculizan o facilitan la concreción de los objetivos académicos y en tal sentido, proponer alternativas de mejora o cambio',  
            'vision' => 'Ser un Grupo de investigación revolucionario capaz de romper paradigmas tradicionales de la enseñanza y aprendizaje de lenguas maternas y extrajeras en el Ecuador, el cual desde una postura crítica contribuye al mejoramiento del nivel de los idiomas Kichwa, Inglés y Francés', 
            'objetivo' => 'Ser un Grupo de investigación revolucionario capaz de romper paradigmas tradicionales de la enseñanza y aprendizaje de lenguas maternas y extrajeras en el Ecuador, el cual desde una postura crítica contribuye al mejoramiento del nivel de los idiomas Kichwa, Inglés y Francés',  
            'linea_investigacion' => ' EDUCACIÓN Y PEDAGOGÍA
            ENSEÑANZA DE LENGUAS NATIVAS Y EXTRANJERAS', 
            'integrante' => 'LUIS FRANCISCO MANTILLA CABRERA', 
            'portada' => 'docente.png',  
            'estado' => '2',       
        ]); 
    }
}
