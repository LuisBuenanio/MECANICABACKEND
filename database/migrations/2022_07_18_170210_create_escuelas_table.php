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
        Schema::create('escuela', function (Blueprint $table) {
           
            $table->id();

            $table->string('nombre');
            $table->longtext('mision')->nullable(); 
            $table->longtext('vision')->nullable();
            $table->string('telefono')->nullable(); 
            $table->string('email')->unique();  
            $table->longtext('mapa')->nullable();             
            $table->string('direccion')->nullable();              
            $table->string('malla')->nullable();             
            $table->string('duracion')->nullable();                       
            $table->longText('perfil')->nullable();                       
            $table->string('campo')->nullable();                        
            $table->string('titulo')->nullable();           
            $table->string('modalidad')->nullable();          
            $table->date('fecha_creacion'); 
            $table->string('logo_escuela')->nullable(); ;

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
        Schema::dropIfExists('escuela');
    }
};
