<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;
 

class ImageFactory extends Factory
{
    
    /**
     * Define the model's default state.
     *
     * @var string
     */
    protected $model = Image::class;
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
            'url' => 'noticias/' . $faker->image('public/storage/noticias', 640, 480, false),
        ];
    }
}
