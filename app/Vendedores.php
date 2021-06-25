<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendedores extends Model
{
  protected $fillable = [

    'id', 'codVendedor', 'fisicoJuridico', 'PESSOAS_id', 'ativoInativo', 'dataInativacao'
  ];
}
