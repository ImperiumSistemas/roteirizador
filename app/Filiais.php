<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Filiais extends Model
{
    //

    protected $fillable = [
        'cnpj', 'telefone', 'pais', 'estado', 'cidade', 'bairro', 'cep', 'EMPRESA_id'
    ];

    
}
