<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Enderecos extends Model
{
    //

    protected $fillable = [

       'rua', 'bairro', 'numero','BAIRRO_cod_bairro', 'ESTADO_id', 'PAIS_id', 'CIDADE_codCidade', 'PESSOAS_id', 'ativoInativo', 'dataInativacao'
    ];
}
