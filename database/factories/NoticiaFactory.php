<?php

namespace Database\Factories;

use App\Models\Noticia;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;

       
class NoticiaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     *  @var string
     */
    protected $model = Noticia::class;
    
    /**
     * Define the model's default state.
     *
     * @return array
     */
    
    public function definition()
    {
        $titulo = $this->faker->unique()->sentence();

        return [
            'titulo' => $titulo,
            'slug' => Str::slug($titulo),
            'entradilla' => $this->faker->text(250),
            'contenido' => $this->faker->text(2000),
            'estado' => $this->faker->randomElement([1, 2]),
            'portada_path' => 'noticias/portada.jpg',
            'fecha_publicacion' => $this->faker->date()               
        ];
    }
}
