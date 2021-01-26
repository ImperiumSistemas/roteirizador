<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Filiais;
use Illuminate\Database\Eloquent\SoftDeletes;

class Motoristas extends Model
{
    //

    use SoftDeletes;
    protected $fillable = [
        'id', 'cpf', 'nome', 'data_admissao', 'telefone', 'numero_cnh', 'data_validade_cnh', 'tipo_contrato', 'PESSOAS_id', 'ativoInativo', 'dataInativacao'
    ];
}
