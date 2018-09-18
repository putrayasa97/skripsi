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
            $table->integer('id_paketdtl')->unsigned();
            $table->integer('id_ang')->unsigned();
            $table->integer('harga');
            $table->timestamps();

            $table->foreign('id_paketdtl')->references('id_paketdtl')->on('tb_paketdetail');
            $table->foreign('id_ang')->references('id_ang')->on('tb_anggota');
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
