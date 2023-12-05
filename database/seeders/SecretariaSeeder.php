<?php

namespace Database\Seeders;

use App\Models\Secretaria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SecretariaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Secretaria::create([
            'nombre_secretaria' => 'Tatiana Monserrath López Arroba',
            'telefono_secretaria' => '032998200 Ext: 3205',  
            'email_secretaria' => 'tatianam.lopez@espoch.edu.ec', 
            'foto_secretaria' => 'secretaria.png',
            'nombre_documento' => 'Oficio',            
            'detalle_documento' => 'Oficio',            
            'documento' => 'oficio.pdf',
               
        ]); 
    }
}
