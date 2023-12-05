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

        
        $this->call(MaestriaSeeder::class);
        $this->call(SecretariaSeeder::class);

        $this->call(TipoConvenioSeeder::class);
        $this->call(ConvenioSeeder::class);

        $this->call(TipoProyectoSeeder::class);
        $this->call(ProyectoSeeder::class);

        $this->call(TipoTitulacionSeeder::class);
        $this->call(TitulacionSeeder::class);

        
        $this->call(TipoInvestigadorSeeder::class);
        $this->call(InvestigadorSeeder::class);

        
        $this->call(GrupoInvestigacionSeeder::class);

        $this->call(LineaInvestigacionSeeder::class);
        $this->call(ProgramaInvestigacionSeeder::class);
        
    }
}
