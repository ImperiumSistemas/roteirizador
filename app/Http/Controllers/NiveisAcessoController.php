<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Niveis_acessos;
use App\Permissao_acessos;
use App\permissao_niveis_acessos;

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

    public function salvarPermissao(Request $req, $id){
      $idNivelAcesso = $id;
      $dados = $req->all();

      $buscandoIdBanco = permissao_niveis_acessos::all();

        if($buscandoIdBanco != ''){

          foreach($buscandoIdBanco as $id){

            if($id->idNivelAcesso == $idNivelAcesso){
              permissao_niveis_acessos::where('idNivelAcesso', '=', $idNivelAcesso)->delete();

              foreach($dados['idPermissao'] as $idPermissao){
                  permissao_niveis_acessos::create(['idNivelAcesso' => $idNivelAcesso, 'idPermissao' => $idPermissao]);
                } // Fim Foreach
                return redirect()->route('listagem.niveisAcessos');
            } // Fim IF

            else{
              foreach($dados['idPermissao'] as $idPermissao){
                  permissao_niveis_acessos::create(['idNivelAcesso' => $idNivelAcesso, 'idPermissao' => $idPermissao]);
                } // Fim foreach
                return redirect()->route('listagem.niveisAcessos');
            }
          } // Fim Foreach

        } // Fim If comparação $buscandoIdBanco != ''


        // Caso não entre no If, vai executar o foreach abaixo, entendendo que ainda não tem nada na tabela.
        foreach($dados['idPermissao'] as $idPermissao){
            permissao_niveis_acessos::create(['idNivelAcesso' => $idNivelAcesso, 'idPermissao' => $idPermissao]);
          } // Fim foreach
          return redirect()->route('listagem.niveisAcessos');

    } // Fim função salvarPermissao

}
