<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class FiliaisVeiculos extends Model
{
    //
    //use SoftDeletes;
    protected $fillable = [
        'FILIAL_id', 'VEICULO_id'
    ];

}
