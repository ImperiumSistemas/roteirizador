<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enderecos extends Model
{
    //

    protected $fillable = [

       'numero','BAIRRO_cod_bairro', 'PAIS_id', 'CIDADE_codCidade', 'PESSOAS_id'
    ];
}
