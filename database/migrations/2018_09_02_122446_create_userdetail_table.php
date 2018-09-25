<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserdetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_userdetail', function (Blueprint $table) {
            $table->increments('id_userdtl');
            $table->char('kode_userdtl',10)->unique();
            $table->string('nm_lengkap');
            $table->date('tgl_lahir');
            $table->string('alamat');
            $table->char('tlp',15);
            $table->integer('jk');
            $table->text('foto');
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
        Schema::dropIfExists('userdetail');
    }
}
