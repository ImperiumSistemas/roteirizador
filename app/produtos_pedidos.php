<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produtos_pedidos extends Model
{
    //
    protected $fillable = [

      'id', 'idProduto', 'idPedido'
    ];
}
