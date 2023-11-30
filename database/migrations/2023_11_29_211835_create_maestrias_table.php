<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maestrias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();  
            $table->string('titulo')->nullable();                        
            $table->string('foto')->nullable();            
            $table->longText('perfil_ingreso')->nullable();   
            $table->longText('perfil_profesional')->nullable();
            $table->longText('objetivo')->nullable();                     
            $table->string('duracion')->nullable();                      
            $table->string('malla')->nullable();                         
            $table->string('modalidad')->nullable();                   
            $table->string('formacion')->nullable(); 
            $table->enum('estado',[1,2])->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maestrias');
    }
};
