<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $table='tb_userdetail';
    protected $primaryKey='id_userdtl';

    protected $fillable=['kode_userdtl','nm_lengkap','tgl_lahir','alamat','tlp','jk','foto'];
}
