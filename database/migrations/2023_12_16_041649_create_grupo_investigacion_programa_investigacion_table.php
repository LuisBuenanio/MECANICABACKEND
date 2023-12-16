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
        Schema::create('grupo_investigacion_programa_investigacion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('grupo_investigacion_id');
            $table->unsignedBigInteger('programa_investigacion_id');

            $table->foreign('grupo_investigacion_id','fk_grupo_inv_progra_inv')->references('id')->on('grupos_investigacion')->onDelete('cascade');
            $table->foreign('programa_investigacion_id', 'fk_progra_inv_grupo_inv')->references('id')->on('programas_investigacion')->onDelete('cascade');

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
        Schema::dropIfExists('grupo_investigacion_programa_investigacion');
    }
};
