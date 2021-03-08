<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Enderecos extends Model
{
    //

    protected $fillable = [

       'rua','numero','bairro','cidade', 'estado', 'pais', 'PESSOAS_id', 'latitude', 'longitude',
        'confirmado', 'cep', 'ativoInativo', 'dataInativacao'

    ];
}
