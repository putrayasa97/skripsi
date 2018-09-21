<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table='tb_transaksi';
    protected $primaryKey='id_trans';

    protected $fillable=['id_ang','harga'];


    public function anggota()
    {
        return $this->belongsTo('App\Model\Anggota', 'id_ang');
    }
}
