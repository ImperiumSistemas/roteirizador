<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class filiais_clientes extends Model
{
    //
    protected $fillable = [
        'FILIAL_id', 'CLIENTE_id'
    ];
}
