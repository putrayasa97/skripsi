<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsahaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_usaha', function (Blueprint $table) {
            $table->increments('id_usaha');
            $table->char('kode_usaha',10)->unique();
            $table->string('nm_usaha');
            $table->string('email_usaha');
            $table->string('kota');
            $table->string('alamat');
            $table->string('web');
            $table->char('tlp', 15);
            $table->text('logo');
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
        Schema::dropIfExists('usaha');
    }
}
