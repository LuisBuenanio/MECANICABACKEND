<?php

namespace Database\Seeders;

use App\Models\Asociacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AsociacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Asociacion::create([
        
                      
            'nombre' => 'Asociacion de Ingeniería Mecánica',
            'mision' => 'Descripción de la Misión',
            'vision'=> 'Descripción de la Visión',
            'telefono' => '0995191833',
            'logo' => 'Logo_MecAnica.jpg',
            'fecha_creacion' => '2018-01-01',
            'fecha_cierre' => '2022-10-01',
            'email' => 'aso.mecanica@espoch.edu.ec',
            'facebook' => 'https://www.facebook.com/profile.php?id=100066499724250'
          
        ]);

       /*  Asociacion::factory(1)->create(); */
    }
}
