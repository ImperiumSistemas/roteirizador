<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipo_veiculos extends Model
{
  protected $fillable = [

     'descricao', 'ativoInativo', 'dataInativacao'
  ];
}
