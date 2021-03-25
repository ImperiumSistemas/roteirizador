<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\regioes;
use App\permissao_niveis_acessos;
use App\permissao_acessos;
use Carbon\Carbon;

class RegiaoController extends Controller
{

    public function listaRegiaoPermissao($nivelAcesso){

      $permissoes = permissao_niveis_acessos::where('idNivelAcesso', '=', $nivelAcesso)->get(); // Buscando tudo da tabela permissao_niveis_acessos onde o idNivelAcesso = ao Id que está sendo recebido pela função.
      $idPermissaoAcesso = permissao_acessos::where('descricao', '=', "REGIAO")->first(); // Buscando na tabela a informação onde o nome da permissão for EMPRESAS.
      $situaçãoRegiao = false; // iniciando a variavel como falsa, para inserir ela como verdadeira dentro do foreach caso a comparação seja verdade.

      foreach ($permissoes as $permissao) {
        if($permissao->idPermissao == $idPermissaoAcesso->id){
          $situaçãoRegiao = true;
        }
      }

      if($situaçãoRegiao == true){

        $listagemRegiaos = regioes::all();

        return view('listagem.listagemRegiao', compact('listagemRegiaos'));

      }else{
        return redirect()->route('site');
      }
    }

    public function listaRegiao(){


      $listagemRegiaos = regioes::all();

      return view('listagem.listagemRegiao', compact('listagemRegiaos'));
    }



    public function adicionar(){

      return view('layout.adicionarRegiao');
    }


    public function salvar(Request $req){

        $dados = $req->all();

        regioes::create($dados);
        $ultimoId = regioes::all('id')->last();

        regioes::where('id', '=', $ultimoId->id)->update(['ativoInativo' => 1]);
        return redirect()->route('listagem.regiao');

    }


    public function editar($id){
      $regiao = regioes::find($id);

      return view('layout.editarRegiao', compact('regiao'));
    }

    public function atualizar(Request $req, $id){

      $dados = $req->all();

      regioes::find($id)->update($dados);

      return redirect()->route('listagem.regiao');
    }

    public function deletar($id){

      regioes::find($id)->delete();

      return redirect()->route('listagem.regiao');

    }

    public function ativar($id){

      $date = Carbon::now();

      regioes::where('id', '=', $id)->update(['ativoInativo' => 1, 'dataAtivacao' => $date, 'dataInativacao' => '']);
      return redirect()->route('listagem.regiao');

    }

    public function desativar($id){

      $date = Carbon::now();

      regioes::where('id', '=', $id)->update(['ativoInativo' => 0, 'dataInativacao' => $date, 'dataAtivacao' => '']);
      return redirect()->route('listagem.regiao');
    }


}
