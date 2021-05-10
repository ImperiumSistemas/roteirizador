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
      $dados = $req->all();
      $usuarios = User::all();

      $pessoa = DB::table('fisicas')
      ->join('pessoas', 'fisicas.PESSOAS_ID', '=', 'pessoas.id')
      ->select('pessoas.id as id', 'pessoas.nome as nome', 'fisicas.cpf as cpf')
      ->where('fisicas.cpf', '=', $dados['cpf'])->get();

      $encontraCpf = false;  // Iniciando a variavel como falso, atribuindo verdadeiro se ela entrar na condição abaixo.

      foreach($pessoa as $pe){
        if($pe->cpf == $dados['cpf']){
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
