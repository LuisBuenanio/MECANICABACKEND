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
        Schema::create('integrante', function (Blueprint $table) {
            
            $table->id();
            $table->string('nombre');  
            $table->string('telefono')->nullable();                        
            $table->string('foto')->nullable();            
            $table->string('email')->unique();
            $table->enum('estado',[1,2])->default(1);

            $table->unsignedBigInteger('asociacion_id');
            $table->unsignedBigInteger('tipo_integrante_id');

            $table->foreign('asociacion_id')->references('id')->on('asociacion')->onDelete('cascade');

            $table->foreign('tipo_integrante_id')->references('id')->on('tipo_integrante')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('integrante');
    }
};
