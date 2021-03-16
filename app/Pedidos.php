<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    //
   protected $fillable = [

       'id', 'codPedido', 'codCliente', 'nomePedido', 'peso', 'cubagem', 'valorPedido', 'codFilial', 'cargaErp', 'codPraca',
       'dataPedido', 'podeFormarCarga', 'statusPedido', 'ativoInativo', 'dataInativacao'
    ];
}
