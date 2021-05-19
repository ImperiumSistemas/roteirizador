<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

//use Illuminate\Database\Eloquent\SoftDeletes;

class Filiais extends Model
{
    //
    //use SoftDeletes;
    protected $fillable = [
        'cnpj', 'telefone', 'pais', 'estado', 'cidade', 'bairro', 'cep', 'rua', 'numero', 'descricao',
        'inscricao_estadual', 'razao_social', 'fantasia', 'EMPRESA_id', 'ativoInativo', 'dataInativacao',
        'latitude', 'longitude'
    ];
}
