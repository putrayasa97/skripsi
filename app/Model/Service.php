<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table='tb_service';
    protected $primaryKey='id_service';

    protected $fillable=['nm_service','data_limit','harga','type_service'];
}
