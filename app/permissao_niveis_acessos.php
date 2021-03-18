<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class permissao_niveis_acessos extends Model
{
    //
    protected $fillable = [

       'id', 'idNivelAcesso', 'idPermissao'
    ];
}
