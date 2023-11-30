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
        Schema::create('secretarias', function (Blueprint $table) {
            
            $table->id(); 
            $table->string('nombre_secretaria')->nullable();  
            $table->string('telefono_secretaria')->nullable();                        
            $table->string('email_secretaria')->unique();   
            $table->string('foto_secretaria')->nullable();    

            $table->string('nombre_documento')->nullable();                      
            $table->string('detalle_documento')->nullable();                         
            $table->string('documento')->nullable();   

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
        Schema::dropIfExists('secretarias');
    }
};
