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
        Schema::create('galeria_imagenes', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('grupo_investigacion_id');
            $table->string('imagen_path'); // Puedes ajustar según tus necesidades
            

            $table->foreign('grupo_investigacion_id')
                ->references('id')->on('grupos_investigacion')
                ->onDelete('cascade');
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
        Schema::dropIfExists('galeria_imagenes');
    }
};
