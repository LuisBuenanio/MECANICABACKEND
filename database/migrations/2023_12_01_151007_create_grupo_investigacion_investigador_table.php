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
        Schema::create('grupo_investigacion_investigador', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('investigador_id');
            $table->unsignedBigInteger('grupo_investigacion_id');
            
            $table->foreign('investigador_id')->references('id')->on('investigadores')->onDelete('cascade');

            $table->foreign('grupo_investigacion_id')->references('id')->on('grupos_investigacion')->onDelete('cascade');
            
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
        Schema::dropIfExists('grupo_investigacion_investigador');
    }
};
