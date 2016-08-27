<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertFloorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('floors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rooms_total');
            $table->integer('house_id')->unsigned();
            $table->foreign('house_id')->references('id')->on('houses');

            $table->timestamps();
        });

        Schema::table('rooms', function ($table) {
            $table->integer('floor_id')->unsigned();
            $table->foreign('floor_id')->references('id')->on('floors');
            $table->dropColumn('floor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_rooms');
        Schema::drop('rooms');
        Schema::drop('floors');
    }
}
