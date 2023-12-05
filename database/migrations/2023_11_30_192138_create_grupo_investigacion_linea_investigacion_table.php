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
        Schema::create('grupo_investigacion_linea_investigacion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('grupo_investigacion_id');
            $table->unsignedBigInteger('linea_investigacion_id');

            $table->foreign('grupo_investigacion_id','fk_grupo_inv_linea_inv')->references('id')->on('grupos_investigacion')->onDelete('cascade');
            $table->foreign('linea_investigacion_id', 'fk_linea_inv_grupo_inv')->references('id')->on('lineas_investigacion')->onDelete('cascade');

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
        Schema::dropIfExists('grupo_investigacion_linea_investigacion');
    }
};
