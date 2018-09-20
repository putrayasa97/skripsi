<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paket extends Model
{
    use SoftDeletes;
    protected $table='tb_paket';
    protected $primaryKey='id_paket';
    protected $dates =['deleted_at'];

    protected $fillable=['nm_paket'];

    public function paketdtl()
    {
        return $this->hasMany('App\Model\Paket', 'id_paket');
    }
}
