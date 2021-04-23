<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class modelosAgrupamentos extends Model
{
    //
    //use SoftDeletes;
    protected $fillable = [
      'id','descricao','utilizaTodosVeiculos'
    ];
}
