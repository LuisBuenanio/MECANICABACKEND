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
        Schema::create('linea_investigacion_programa_investigacion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('linea_investigacion_id');
            $table->unsignedBigInteger('programa_investigacion_id');
            $table->foreign('linea_investigacion_id', 'fk_linea_inv_progra_inv')->references('id')->on('lineas_investigacion')->onDelete('cascade');
            $table->foreign('programa_investigacion_id', 'fk_progra_inv_linea_inv')->references('id')->on('programas_investigacion')->onDelete('cascade');
    
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
        Schema::dropIfExists('linea_investigacion_programa_investigacion');
    }
};
