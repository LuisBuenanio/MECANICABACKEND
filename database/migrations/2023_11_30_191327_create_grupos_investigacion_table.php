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
        Schema::create('grupos_investigacion', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');             
            $table->string('siglas')->nullable();             
            $table->string('nombre_gr')->nullable();
            $table->longText('mision')->nullable();
            $table->longText('vision')->nullable();
            $table->longText('objetivo')->nullable(); 
            $table->string('portada')->nullable();  
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
        Schema::dropIfExists('grupos_investigacion');
    }
};
