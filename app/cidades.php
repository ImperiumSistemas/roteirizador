<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class cidades extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
         'nomeCidade', 'ativoInativo'
    ];

}
