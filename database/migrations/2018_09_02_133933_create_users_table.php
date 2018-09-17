<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_user', function (Blueprint $table) {
            $table->increments('id_user');
            $table->string('username');
            $table->string('email');
            $table->string('password');
            $table->integer('id_level')->unsigned();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('id_level')->references('id_level')->on('tb_leveluser');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
