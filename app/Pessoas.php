<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Pessoas extends Model
{
    //
    //use SoftDeletes;
    protected $fillable = [

       'nome', 'numero_telefone','ativoInativo','dataInativacao'
    ];
}
