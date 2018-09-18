<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class PaketDetail extends Model
{
    protected $table='tb_paketdetail';
    protected $primaryKey='id_paketdtl';

    protected $fillable=['harga','bulan','id_paket'];

    public function paket()
    {
        return $this->belongsTo('App\Model\Paket', 'id_paket');
    }
    public function anggota()
    {
        return $this->belongsTo('App\Model\Anggota', 'id_anggota');
    }
}
