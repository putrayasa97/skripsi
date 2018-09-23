<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;


class Paket extends Model
{
    protected $table='tb_paket';
    protected $primaryKey='id_paket';

    protected $fillable=['nm_paket'];

    public function paketdtl()
    {
        return $this->hasMany('App\Model\Paket', 'id_paket');
    }
}
