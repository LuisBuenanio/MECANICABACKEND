<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
        Storage::deleteDirectory('public/noticias');
        Storage::makeDirectory('public/noticias');

        $this->call(RoleSeeder::class);

        $this->call(UserSeeder::class);
        $this->call(NoticiaSeeder::class);
        
        $this->call(EscuelaSeeder::class);
        $this->call(AsociacionSeeder::class);

        $this->call(TipoAutoridadSeeder::class);
        $this->call(AutoridadSeeder::class);

        
        $this->call(TipoIntegranteSeeder::class);
        $this->call(IntegranteSeeder::class);

        
        $this->call(DocenteSeeder::class);

        
    }
}
