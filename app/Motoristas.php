<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Filiais;

class Motoristas extends Model
{
    //


    protected $fillable = [
        'id', 'cpf', 'nome', 'data_admissao', 'telefone', 'numero_cnh', 'data_validade_cnh', 'tipo_contrato', 'PESSOAS_id'
    ];
}
