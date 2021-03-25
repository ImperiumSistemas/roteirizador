<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pessoas;
use App\niveis_acessos;
use App\permissao_niveis_acessos;
use App\permissao_acessos;
use App\User;

class UsuarioController extends Controller
{
    //

    public function adicionarPermissao($nivelAcesso){
      $permissoes = permissao_niveis_acessos::where('idNivelAcesso', '=', $nivelAcesso)->get(); // Buscando tudo da tabela permissao_niveis_acessos onde o idNivelAcesso = ao Id que está sendo recebido pela função.
      $idPermissaoAcesso = permissao_acessos::where('descricao', '=', "CADASTRO USUARIO")->first(); // Buscando na tabela a informação onde o nome da permissão for EMPRESAS.
      $situaçãoNivelAcesso = false; // iniciando a variavel como falsa, para inserir ela como verdadeira dentro do foreach caso a comparação seja verdade.

      foreach ($permissoes as $permissao) {
        if($permissao->idPermissao == $idPermissaoAcesso->id){
          $situaçãoNivelAcesso = true;
        }
      }

      if($situaçãoNivelAcesso == true){

        $pessoas = Pessoas::all();
        $nivelAcessos = niveis_acessos::all();

        return view('layout.adicionarUsuario', compact('pessoas', 'nivelAcessos'));

      }else{
        return redirect()->route('site');
      }
    }

    public function adicionar(){
      $pessoas = Pessoas::all();
      $nivelAcessos = niveis_acessos::all();
      return view('layout.adicionarUsuario', compact('pessoas', 'nivelAcessos'));
    }

    public function salvar(Request $req){
      $nome = $req->name;
      $senha = $req->password;
      $email = $req->email;
      $idNivelAcesso = $req->idNivelAcesso;

      User::create(['name' => $nome, 'email' => $email, 'password' => bcrypt($senha), 'idNivelAcesso' => $idNivelAcesso]);
      return redirect()->route('site');
    }
}
