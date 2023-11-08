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
        Schema::create('docentes', function (Blueprint $table) {
            
            $table->id();
            
            $table->string('nombre');  
            $table->string('telefono')->nullable();                        
            $table->string('foto')->nullable();            
            $table->string('email')->unique();
            $table->text('titulo')->nullable();
            $table->longText('descripcion')->nullable();                        
            $table->string('hoja_vida')->nullable();                         
            $table->string('asignatura')->nullable(); 
            $table->enum('estado',[1,2])->default(1);
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
        Schema::dropIfExists('docentes');
    }
};
