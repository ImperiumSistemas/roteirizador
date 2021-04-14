<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class papel_permissao extends Model
{
  protected $fillable = [

     'id', 'permissao_id', 'papel_id'
  ];
}
