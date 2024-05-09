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
        Schema::create('message1s', function (Blueprint $table) {
            $table->id();            
            $table->unsignedBigInteger('message_media_id');            
            $table->unsignedBigInteger('user_id');            
            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('answer_for_id')->nullable(); // Agrega la columna para la relación reflexiva

            
            $table->foreign('message_media_id')->references('id')->on('message_media')->onDelete('restrict')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('restrict');
            $table->foreign('answer_for_id')->references('id')->on('message1s')->onDelete('restrict')->nullable();


            $table->longtext('content')->nullable();
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
        Schema::dropIfExists('message1s');
    }
};
