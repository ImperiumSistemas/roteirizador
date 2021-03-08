<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class regioes extends Model
{
    //
    //use SoftDeletes;
    protected $fillable = [
        'id', 'nomeRegiao', 'ativoInativo', 'dataInativacao', 'dataAtivacao'
    ];
}
