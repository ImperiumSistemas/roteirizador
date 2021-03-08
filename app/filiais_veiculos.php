<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class filiais_veiculos extends Model
{
    //
    //use SoftDeletes;
    protected $fillable = [
        'FILIAL_id', 'VEICULO_id'
    ];
}
