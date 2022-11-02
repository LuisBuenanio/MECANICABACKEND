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
        Schema::create('autoridad', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');  
            $table->string('telefono')->nullable();                                   
            $table->string('hoja_vida')->nullable();                       
            $table->string('foto')->nullable();     

            $table->enum('estado',[1,2])->default(1);

            $table->unsignedBigInteger('tipo_autoridad_id');


            $table->foreign('tipo_autoridad_id')
                    ->references('id')
                    ->on('tipo_autoridad')
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
        Schema::dropIfExists('autoridad');
    }
};
