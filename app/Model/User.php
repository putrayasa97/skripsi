<?php

namespace App\Model;


use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table='tb_user';
    protected $primaryKey='id_user';

    protected $fillable=['username','password','id_level','id_userdtl','id_usaha'];

    public function leveluser()
    {
        return $this->belongsTo('App\Model\LevelUser', 'id_level');
    }
    public function userdetail()
    {
        return $this->belongsTo('App\Model\UserDetail', 'id_userdtl');
    }
    public function usaha()
    {
        return $this->belongsTo('App\Model\Usaha', 'id_usaha');
    }

    public function role(... $id_level) //parameter banyak role atau level akses
    {
        foreach($id_level as $role) { //berulang sesuai jumlah id_level
            if($this->id_level == $role) //jika benar makan mengembalikan nilai true
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }
}
