<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class opcoes_parametros_empresas extends Model
{
  protected $fillable = [
    'id', 'id_empresa', 'id_parametro', 'dfvalor'
  ];

}
