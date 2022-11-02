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
        Schema::create('investigador', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('email')->unique;
            $table->enum('estado',[1,2])->default(2);

            $table->unsignedBigInteger('tipo_investigador_id')->nullable();
            $table->unsignedBigInteger('grupo_investigacion_id')->nullable();



            $table->foreign('tipo_investigador_id')
                    ->references('id')->on('tipo_investigador')
                    ->onDelete('set null');
            

            $table->foreign('grupo_investigacion_id')
                    ->references('id')->on('grupo_investigacion')
                    ->onDelete('set null');

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
        Schema::dropIfExists('investigador');
    }
};
