<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class opcoes_parametros extends Model
{
  protected $fillable = [
    'id', 'dfvalor', 'dftipo', 'dfparametros', 'dfhabilitado', 'dfdescricao', 'dfgrupo'
  ];

}
