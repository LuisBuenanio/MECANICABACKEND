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
        Schema::create('asociacion', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');  
            $table->text('mision')->nullable();                                   
            $table->text('vision')->nullable(); 
            $table->string('telefono', 10)->nullable(); ;                   
            $table->string('logo')->nullable(); 
            $table->date('fecha_creacion')->nullable();            
            $table->date('fecha_cierre')->nullable(); 
            $table->string('email')->unique();                   
            $table->string('facebook')->nullable();  
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
        Schema::dropIfExists('asociacion');
    }
};
