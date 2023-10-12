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
            
            // iDE DE NOTICIA AUTOINCREMENTABLE 
            $table->id();

            //COLUMNAS DE LA NOTICIA        -ññ
            
            $table->string('titulo');
            $table->string('slug')->nullable(); 

            $table->text('entradilla')->nullable();
            $table->longText('contenido')->nullable();     

            $table->enum('estado',[1,2])->default(1);

            $table->timestamp('fecha_publicacion', $precision = 0);
            
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
