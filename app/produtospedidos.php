<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produtospedidos extends Model
{
    //
    protected $fillable = [

      'id', 'codProduto', 'codPedido','qtde','cubagem','peso'
    ];
}
