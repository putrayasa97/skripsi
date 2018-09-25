<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Usaha extends Model
{
    protected $table='tb_usaha';
    protected $primaryKey='id_usaha';

    protected $fillable=['kode_usaha','nm_usaha','email_usaha','kota','alamat','web','tlp','logo'];
}
