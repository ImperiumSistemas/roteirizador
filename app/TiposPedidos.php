<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class TiposPedidos extends Model
{
    //
    //use SoftDeletes;
    protected $fillable = [
      'id', 'codTipoPedido', 'descricao'
    ];
}
