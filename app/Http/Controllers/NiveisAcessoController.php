<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Papel;
use App\Permissao;
use App\papeisPermissoes;
use App\papel_permissao;

class NiveisAcessoController extends Controller
{
    //


    public function listaniveisAcesso(){
      $papeis = Papel::all();

      return view('listagem.niveisAcesso', compact('papeis'));
    }

    public function adicionar(){
      return view('layout.adicionarNivelAcesso');
    }

    public function salvar(Request $req){
      $dados = $req->all();

      Papel::create($dados);

      return redirect()->route('listagem.niveisAcessos');
    }

    public function editar($id){

      $papel = Papel::find($id);

      return view('layout.editarNivelAcesso', compact('papel'));
    }

    public function atualizar(Request $req, $id){

      $dados = $req->all();

      Papel::find($id)->update($dados);

      return redirect()->route('listagem.niveisAcessos');
    }

    public function excluir($id){

      Papel::find($id)->delete();

      return redirect()->route('listagem.niveisAcessos');
    }

    public function permissaoAcesso($id){
      $papel = Papel::find($id);
      $permissoes = Permissao::all();
      //$teste = papeisPermissoes::all();
      //dd($teste);
      $permissoesPapel = DB::table('papeis_permissoes')
      ->join('permissoes', 'papeis_permissoes.permissao_id', '=', 'permissoes.id')
      ->select('permissoes.nome as nome')
      ->where('papel_id', '=', $id)->get();


      return view('layout.permissaoAcesso', compact('papel', 'permissoes', 'permissoesPapel'));
    }

    public function salvarPermissao(Request $req, $id){

      $idPapel = $id;
      $dados = $req->all();

    //  $buscandoIdBanco = papeisPermissoes::all();
      $buscandoIdBanco = papeisPermissoes::all();
      //dd($buscandoIdBanco);
        if($buscandoIdBanco != ''){

          foreach($buscandoIdBanco as $papelId){

            if($papelId->papel_id == (int)$idPapel){

              papeisPermissoes::where('papel_id', '=', $idPapel)->delete();

              foreach($dados['idPermissao'] as $idPermissao){
                  papeisPermissoes::create(['papel_id' => $idPapel, 'permissao_id' => $idPermissao]);
                } // Fim Foreach
                return redirect()->route('listagem.niveisAcessos');
            } // Fim IF

          /*  else{
              foreach($dados['idPermissao'] as $idPermissao){
                  permissao_niveis_acessos::create(['idNivelAcesso' => $idNivelAcesso, 'idPermissao' => $idPermissao]);
                } // Fim foreach
                return redirect()->route('listagem.niveisAcessos');
            }*/
          } // Fim Foreach

        } // Fim If comparação $buscandoIdBanco != ''


        // Caso não entre no If, vai executar o foreach abaixo, entendendo que ainda não tem nada na tabela.

        foreach($dados['idPermissao'] as $idPermissao){

            papeisPermissoes::create(['papel_id' => $idPapel, 'permissao_id' => $idPermissao]);
          } // Fim foreach
          return redirect()->route('listagem.niveisAcessos');

    } // Fim função salvarPermissao

}
