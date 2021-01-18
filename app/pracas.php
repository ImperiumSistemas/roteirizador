<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class pracas extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [

      'id', 'praca', 'ROTA_id'
    ];
}
