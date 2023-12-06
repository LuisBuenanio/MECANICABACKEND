<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;
 

class ImageFactory extends Factory
{
    
    protected $model = Image::class;
    

    public function definition()
    {
        return [
            'noticia_id' => function () {
                return \App\Models\Noticia::factory()->create()->id;
            },
            'image_path' => $this->faker->imageUrl(),
        ];
    }
}
