<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaketdetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_paketdetail', function (Blueprint $table) {
            $table->increments('id_paketdtl');
            $table->integer('harga');
            $table->integer('bulan');
            $table->integer('id_paket')->unsigned();
            $table->timestamps();

            $table->foreign('id_paket')->references('id_paket')->on('tb_paket');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('harga');
    }
}
