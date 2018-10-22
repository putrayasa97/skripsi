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
            $table->char('no_ang',10)->unique();
            $table->string('nm_ang',255);
            $table->date('tgl_lahir');
            $table->text('alamat');
            $table->integer('jk');
            $table->string('pekerjaan', 100);
            $table->char('tlp', 15);
            $table->integer('status');//0= tidakaktif/pepanjang, 1=anggota aktif, 2= tidak anggota
            $table->text('foto');
            $table->integer('id_paketdtl')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->integer('id_usaha');
            $table->timestamp('date_actv')->nullable($value = true);
            $table->timestamp('date_expiry')->nullable($value = true);
            $table->timestamps();

            $table->foreign('id_user')->references('id_user')->on('tb_user');
            $table->foreign('id_paketdtl')->references('id_paketdtl')->on('tb_paketdetail');
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
