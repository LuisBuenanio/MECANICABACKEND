<?php

namespace Database\Factories;

use App\Models\TipoAutoridad;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TipoAutoridad>
 */
class TipoAutoridadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $descripcion = $this->faker->unique()->sentence();

        return [
            'descripcion' => $descripcion,                 
        ];
    }
}
