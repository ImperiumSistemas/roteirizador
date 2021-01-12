<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rotas extends Model
{
    //
    protected $fillable = [
      'id', 'numeroPedagio', 'gastoPedagio', 'descricaoRota', 'REGIAO_id'
    ];

}
