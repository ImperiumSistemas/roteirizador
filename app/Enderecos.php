<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Enderecos extends Model
{
    //

    protected $fillable = [

       'rua','numero','bairro','cidade', 'cep', 'estado', 'pais', 'PESSOAS_id', 'latitude', 'longitude',
        'confirmado', 'ativoInativo', 'dataInativacao'

    ];
}
