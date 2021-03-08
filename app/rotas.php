<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class rotas extends Model
{
    //
    //use SoftDeletes;
    protected $fillable = [

      'id', 'numeroPedagio', 'gastoPedagio', 'descricaoRota', 'REGIAO_id', 'ativoInativo', 'dataInativacao'
    ];

}
