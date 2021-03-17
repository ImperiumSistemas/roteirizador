<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Niveis_acessos;
use App\Permissao_acessos;

class NiveisAcessoController extends Controller
{
    //
    public function listaniveisAcesso(){
      $niveisAcesso = Niveis_acessos::all();

      return view('listagem.niveisAcesso', compact('niveisAcesso'));
    }

    public function adicionar(){
      return view('layout.adicionarNivelAcesso');
    }

    public function salvar(Request $req){
      $dados = $req->all();

      Niveis_acessos::create($dados);

      return redirect()->route('listagem.niveisAcessos');
    }

    public function editar($id){

      $nivelAcesso = Niveis_acessos::find($id);

      return view('layout.editarNivelAcesso', compact('nivelAcesso'));
    }

    public function atualizar(Request $req, $id){

      $dados = $req->all();

      Niveis_acessos::find($id)->update($dados);

      return redirect()->route('listagem.niveisAcessos');
    }

    public function excluir($id){

      Niveis_acessos::find($id)->delete();

      return redirect()->route('listagem.niveisAcessos');
    }

    public function permissaoAcesso($id){
      $descricaoNivelAcesso = Niveis_acessos::find($id);
      //dd($descricaoNivelAcesso->descricao);
      $descricaoPermissao = Permissao_acessos::all();

      return view('layout.permissaoAcesso', compact('descricaoNivelAcesso', 'descricaoPermissao'));
    }

}
