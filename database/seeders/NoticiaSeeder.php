<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Noticia;

use Illuminate\Database\Seeder;

class NoticiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $noticia = Noticia::create([
            'titulo' => 'Hic sed dolores nostrum mollitia dolore.',   
            'slug' => 'hic-sed-dolores-nostrum-mollitia-dolore',         
            'entradilla' => 'Id sunt a molestias qui. Delectus ipsum aut quia et dignissimos asperiores et. Odit distinctio libero repudiandae aut aliquam. Qui repudiandae quidem sed quisquam.',  
            'contenido' => 'Ser un Grupo de investigación revolucionario capaz de romper paradigmas tradicionales de la enseñanza y aprendizaje de lenguas maternas y extrajeras en el Ecuador, el cual desde una postura crítica contribuye al mejoramiento del nivel de los idiomas Kichwa, Inglés y Francés', 
            'portada' => 'portada.jpg',  
            'estado' => '2',  
            'fecha_publicacion' => '2023-12-05',     
        ]); 

        $imagenes = [
            '1.jpg',
            '2.jpg',
            '3.jpg',
        ];
        
        foreach ($imagenes as $imagen) {
            $noticia->images()->create(['image_path' => $imagen]);
        }
        
        
    }
}
