<?php

namespace Database\Seeders;

use App\Models\TipoConvenio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoConvenioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoConvenio::create([
            'descripcion' => 'Macro'            
        ]);
        TipoConvenio::create([
            'descripcion' => 'Específico'            
        ]);
    }
}
