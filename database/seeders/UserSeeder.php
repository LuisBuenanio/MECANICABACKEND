<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        User::create([
            'name' => 'Jose Luis Buenaño',
            'email' => 'luisbuenao51@hotmail.com',
            'password' => bcrypt('luis1996')
        ])->assignRole('Admin');

        User::create([
            'name' => 'LIDIA DEL ROCÍO CASTRO CEPEDA',
            'email' => 'lidia.castro@espoch.edu.ec',
            'password' => bcrypt('lidia12345')
        ])->assignRole('Admin');       

    }
}
