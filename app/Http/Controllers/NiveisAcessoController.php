<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Papel;
use App\Permissao;
use App\papelPermissao;
use App\papel_permissao;


class NiveisAcessoController extends Controller
{
    //


    public function listaniveisAcesso(){
      $papeis = Papel::all();
      //$teste = papel_permissao::all();
      //dd($teste);

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

    
    public function salvarPermissao(Request $req, $id){

      $idPapel = $id;
      $dados = $req->all();

    //  $buscandoIdBanco = papeisPermissoes::all();
      $buscandoIdBanco = papel_permissao::all();
      //dd($buscandoIdBanco);
        if($buscandoIdBanco != ''){

          foreach($buscandoIdBanco as $papelId){

            if($papelId->papel_id == (int)$idPapel){

              //papeisPermissoes::where('papel_id', '=', $idPapel)->delete();
              papel_permissao::where('papel_id', '=', $idPapel)->delete();

              foreach($dados['idPermissao'] as $idPermissao){
                  papel_permissao::create(['papel_id' => $idPapel, 'permissao_id' => $idPermissao]);
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

            papel_permissao::create(['papel_id' => $idPapel, 'permissao_id' => $idPermissao]);
          } // Fim foreach
          return redirect()->route('listagem.niveisAcessos');

    } // Fim função salvarPermissao

}
