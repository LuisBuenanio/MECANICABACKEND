<?php

namespace Database\Factories;

use App\Models\Escuela;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;


class EscuelaFactory extends Factory
{
    
    protected $model = Escuela::class;
    
    /**
     * Define the model's default state.
     *
     * @return array
     */
    
    public function definition()
    {
        $nombre = $this->faker->unique()->sentence();

        return [
            'nombre' => $nombre,
            'logo_escuela' => Str::slug($nombre),
            'mision' => $this->faker->text(250),
            'vision' => $this->faker->text(250),
            'telefono' => $this->faker->text(10),
            'email' => $this->faker->unique()->safeEmail(),
            'mapa' => $this->faker->text(2000),
            'direcion' => $this->faker->text(250),
            'malla' => $this->faker->text(250),
            'duracion' => $this->faker->text(250),
            'perfil' => $this->faker->text(250),
            'campo' => $this->faker->text(250),
            'titulo' => $this->faker->text(250),
            'modalida' => $this->faker->text(250),
            'fecha_creacion' => $this->faker->date()  
                 
        ];
    }
}
