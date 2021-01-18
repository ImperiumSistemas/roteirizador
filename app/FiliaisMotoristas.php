<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FiliaisMotoristas extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'FILIAL_id', 'MOTORISTA_id'
    ];
}
