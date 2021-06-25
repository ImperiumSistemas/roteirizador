<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pessoas;
use App\Fisicas;
use App\User;

class PesquisaPessoaController extends Controller
{
    //

    public function pesquisaUsuario(Request $req){

      $pesquisaCpfFormulario = $req->cpf;

      $usuarios = User::all();

      $pessoa = DB::table('fisicas')
      ->join('pessoas', 'fisicas.PESSOAS_ID', '=', 'pessoas.id')
      ->join('users', 'users.PESSOAS_id', 'pessoas.id')
      ->select('pessoas.id as id', 'pessoas.nome as nome',
               'fisicas.cpf as cpf', 'fisicas.rg as rg',
               'users.name as name', 'users.email as email')->where('fisicas.cpf', '=', $pesquisaCpfFormulario)->first();

      $encontraCpf = false;  // Iniciando a variavel como falso, atribuindo verdadeiro se ela entrar na condição abaixo.

      foreach($pessoa as $pe){

        if($pessoa->cpf == $pesquisaCpfFormulario){

            $encontraCpf = true;
        }
      }

      if($encontraCpf == true){
        return view('layout.adicionarUsuario', compact('pessoa', 'usuarios'));
      }else{
        return redirect()->route('layout.adicionarUsuarioFisica');
      }
    }
}
