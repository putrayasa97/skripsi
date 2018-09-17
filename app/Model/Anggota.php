<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table='tb_anggota';
    protected $primaryKey='id_ang';
    //public $timestamps=false;

    protected $fillable=['nm_ang','tgl_lahir','alamat','jk','pekerjaan','tlp','status','id_user'];
}
