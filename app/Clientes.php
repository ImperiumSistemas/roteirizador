<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Clientes extends Model
{
    //
    //use SoftDeletes;
    protected $fillable = [
      'ativoInativo', 'dataInativacao', 'PRACA_id', 'PESSOA_id'
    ];
}
