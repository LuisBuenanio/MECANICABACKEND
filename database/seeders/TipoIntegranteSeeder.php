<?php

namespace Database\Seeders;

use App\Models\TipoIntegrante;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoIntegranteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoIntegrante::create([
            'descripcion' => 'Presidente'            
        ]);
        TipoIntegrante::create([
            'descripcion' => 'Vicepresidente'            
        ]);
        TipoIntegrante::create([
            'descripcion' => 'Tesorero'            
        ]);
        TipoIntegrante::create([
            'descripcion' => 'Secretario'            
        ]);
        TipoIntegrante::create([
            'descripcion' => 'Delegado Principal Comité Ejecutivo Fepoch'            
        ]);	
        TipoIntegrante::create([
            'descripcion' => 'Delegado Suplente Comité Ejecutivo Fepoch'            
        ]);
        TipoIntegrante::create([
            'descripcion' => 'LDP Principal'            
        ]);
        TipoIntegrante::create([
            'descripcion' => 'LDP Suplente'            
        ]);
        TipoIntegrante::create([
            'descripcion' => 'Delegado de Secretaría de Inclusión y Equidad de Género'            
        ]);
    }
}
	