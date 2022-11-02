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

        
    }
}
