<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class filiais_motoristas extends Model
{
    //

  //  use SoftDeletes;
    protected $fillable = [
        'FILIAL_id', 'MOTORISTA_id'
    ];
}
