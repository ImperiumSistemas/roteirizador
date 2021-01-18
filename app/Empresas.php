<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empresas extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'id', 'nome_empresa'
    ];
}
