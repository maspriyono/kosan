<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HousesAndRooms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('address');
            $table->string('picture')->nullable();
            $table->string('phone')->nullable();
            $table->string('floors_total');
            $table->timestamps();
        });

        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('floor');
            $table->string('number');
            $table->string('picture')->nullable();
            $table->string('phone')->nullable();
            $table->timestamps();
        });

        Schema::create('user_rooms', function (Blueprint $table) {
            $table->integer('room_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('houses');
        Schema::drop('rooms');
        Schema::drop('user_rooms');
    }
}
