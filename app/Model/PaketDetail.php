<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class PaketDetail extends Model
{
    use SoftDeletes;
    protected $table='tb_paketdetail';
    protected $primaryKey='id_paketdtl';
    protected $dates =['deleted_at'];

    protected $fillable=['harga','bulan','id_paket'];

    public function paket()
    {
        return $this->belongsTo('App\Model\Paket', 'id_paket');
    }
    public function anggota()
    {
        return $this->hasMany('App\Model\Anggota', 'id_anggota');
    }
}
