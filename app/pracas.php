<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class pracas extends Model
{
    //

    protected $fillable = [

      'codPraca', 'praca', 'ROTA_id', 'ativoInativo', 'dataInativacao'
    ];
}
