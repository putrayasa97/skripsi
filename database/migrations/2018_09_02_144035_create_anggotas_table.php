<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnggotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_anggota', function (Blueprint $table) {
            $table->increments('id_ang');
            $table->string('nm_ang',255);
            $table->date('tgl_lahir');
            $table->text('alamat');
            $table->integer('jk');
            $table->string('pekerjaan', 100);
            $table->char('tlp', 15);
            $table->integer('status');
            $table->integer('id_user')->unsigned();
            $table->timestamps();

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
        Schema::dropIfExists('anggotas');
    }
}
