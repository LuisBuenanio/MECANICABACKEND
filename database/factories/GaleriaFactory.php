<?php

namespace Database\Factories;

use App\Models\Galeria;
use Illuminate\Database\Eloquent\Factories\Factory;
 

class GaleriaFactory extends Factory
{
    
    /**
     * Define the model's default state.
     *
     * @var string
     */
    protected $model = Galeria::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Smknstd\FakerPicsumImages\FakerPicsumImagesProvider($faker));
        
        return [
            'url' => 'galerias/' . $faker->image('public/storage/galerias', 640, 480, false),
        ];
    }
}
