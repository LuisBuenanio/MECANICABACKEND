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
        Schema::create('proyecto', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->nullable();  
            $table->longText('nombre');
            $table->longText('objetivo')->nullable();                                   
            $table->string('coordinador')->nullable();  
                     

            $table->enum('estado',[1,2])->default(2);

            $table->enum('ejecutandose',[1,2])->default(2);

           
            $table->unsignedBigInteger('tipo_proyecto_id')->nullable();


            $table->foreign('tipo_proyecto_id')
                    ->references('id')->on('tipo_proyecto')
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
        Schema::dropIfExists('proyecto');
    }
};
