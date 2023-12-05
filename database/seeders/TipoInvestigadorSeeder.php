<?php

namespace Database\Seeders;


use App\Models\TipoInvestigador;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoInvestigadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoInvestigador::create([
            'descripcion' => 'Investigador'            
        ]);
        TipoInvestigador::create([
            'descripcion' => 'Coordinador del Grupo'            
        ]);
        TipoInvestigador::create([
            'descripcion' => 'Coordinador Subrogante'            
        ]);

        TipoInvestigador::create([
            'descripcion' => 'Investigador Externo'            
        ]);
    }
}
