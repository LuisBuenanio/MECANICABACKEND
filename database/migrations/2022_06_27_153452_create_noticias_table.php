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
        Schema::create('noticias', function (Blueprint $table) {
            
            
            $table->id();  
            
            $table->string('titulo');
            $table->string('slug')->nullable(); 

            $table->text('entradilla')->nullable();
            $table->longText('contenido')->nullable();     

            $table->string('portada')->nullable();
            $table->enum('estado',[1,2])->default(1);


            $table->date('fecha_publicacion')->nullable();
            
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
        Schema::dropIfExists('noticias');
    }
};
