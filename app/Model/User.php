<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table='tb_user';
    protected $primaryKey='id_user';

    protected $fillable=['username','password','id_level','id_userdtl','id_usaha'];

    public function leveluser()
    {
        return $this->belongsTo('App\Model\LevelUser', 'id_level');
    }
    public function userdetail()
    {
        return $this->belongsTo('App\Model\LevelUser', 'id_leveldtl');
    }
    public function usaha()
    {
        return $this->belongsTo('App\Model\LevelUser', 'id_usaha');
    }
}
