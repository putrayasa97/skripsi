<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table='tb_anggota';
    protected $primaryKey='id_ang';
    //public $timestamps=false;

    protected $fillable=['no_ang','nm_ang','tgl_lahir','alamat','jk','pekerjaan','tlp','status','foto','id_paketdtl','id_user'];


    protected $casts = [
        'created_at' => 'datetime',
        'date_actv' => 'datetime',
        'date_expiry' => 'datetime',
    ];
    public function paketdtl()
    {
        return $this->belongsTo('App\Model\PaketDetail', 'id_paketdtl');
    }
}
