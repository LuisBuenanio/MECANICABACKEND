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
        Schema::create('convenio', function (Blueprint $table) {
            $table->id();
            $table->string('resolucion');  
            $table->string('nombre');
            $table->text('objetivo')->nullable();                                   
            $table->string('coordinador')->nullable();
            $table->date('fecha_legalizacion'); 
            $table->string('vigencia')->nullable;             

            $table->enum('estado',[1,2])->default(2);

            $table->unsignedBigInteger('tipo_convenio_id')->nullable();


            $table->foreign('tipo_convenio_id')
                    ->references('id')->on('tipo_convenio')
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
        Schema::dropIfExists('convenio');
    }
};
