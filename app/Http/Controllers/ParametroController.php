<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParametroController extends Controller
{
    //
    public function listaParametro(){
      $parametros = DB::table('opcoes_parametros_empresas')
                   ->join('empresas', 'opcoes_parametros_empresas.id_empresa', '=', 'empresas.id')
                   ->join('opcoes_parametros', 'opcoes_parametros_empresas.id_parametro', '=', 'opcoes_parametros.id')
                   ->select('opcoes_parametros.id as idParametro', 'opcoes_parametros.dfdescricao as descricaoParametro',
                            'opcoes_parametros_empresas.dfvalor as valor')->get();

     return view('listagem.listaParametro', compact('parametros'));
    }
}
