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
        Schema::create('message_unread_user', function (Blueprint $table) {
            $table->id();            
            $table->unsignedBigInteger('message_id');            
            $table->unsignedBigInteger('user_id');            
            $table->unsignedBigInteger('room_id');
            $table->foreign('message_id')->references('id')->on('message1s')->onDelete('restrict')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('restrict');
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
        Schema::dropIfExists('message_unread_user');
    }
};
