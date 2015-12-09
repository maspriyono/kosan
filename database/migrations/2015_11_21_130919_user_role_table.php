<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name');
        $table->string('email')->unique();
        $table->string('password', 60);
        $table->string('address');
        $table->string('phone');

        $table->rememberToken();
        $table->timestamps();
      });

      Schema::create('roles', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name');
        $table->timestamps();
      });

      Schema::create('user_roles', function (Blueprint $table) {
        $table->integer('role_id')->unsigned();
        $table->integer('user_id')->unsigned();

        $table->foreign('role_id')->references('id')->on('roles');
        $table->foreign('user_id')->references('id')->on('users');

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
        Schema::drop('users');
        Schema::drop('roles');
        Schema::drop('user_roles');
    }
}
