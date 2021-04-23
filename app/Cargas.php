<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Cargas extends Model
{
    //
    //use SoftDeletes;
    protected $fillable = [
      'id','cargaERP','status','veiculo_id','motorista_id'
    ];
}
