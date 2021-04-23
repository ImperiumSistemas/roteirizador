<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class papeisPermissoes extends Model
{
  protected $fillable = [

     'id', 'permissao_id', 'papel_id'
  ];
}
