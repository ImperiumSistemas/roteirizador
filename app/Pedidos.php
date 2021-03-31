<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    //

    protected $fillable = [

        'id', 'codPedido', 'codCliente', 'peso', 'cubagem', 'valorPedido', 'codFilial', 'cargaErp', 'codPraca',
        'dataPedido', 'podeFormarCarga', 'statusPedido', 'sequenciaEntrega', 'cargas_id','filialFaturamento_id'

    ];
}
