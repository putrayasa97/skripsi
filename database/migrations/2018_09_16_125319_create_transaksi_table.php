<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_transaksi', function (Blueprint $table) {
            $table->increments('id_trans');
            $table->integer('id_ang')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->integer('id_usaha');
            $table->integer('harga');
            $table->timestamps();

            $table->foreign('id_ang')->references('id_ang')->on('tb_anggota');
            $table->foreign('id_user')->references('id_user')->on('tb_user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
