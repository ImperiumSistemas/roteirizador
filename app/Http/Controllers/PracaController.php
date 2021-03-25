<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pracas;
use App\rotas;
use App\permissao_niveis_acessos;
use App\permissao_acessos;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PracaController extends Controller
{
    //

    public function listaPracaPermissao($nivelAcesso){

      $permissoes = permissao_niveis_acessos::where('idNivelAcesso', '=', $nivelAcesso)->get(); // Buscando tudo da tabela permissao_niveis_acessos onde o idNivelAcesso = ao Id que está sendo recebido pela função.
      $idPermissaoAcesso = permissao_acessos::where('descricao', '=', "PRAÇA")->first(); // Buscando na tabela a informação onde o nome da permissão for EMPRESAS.
      $situaçãoPraca = false; // iniciando a variavel como falsa, para inserir ela como verdadeira dentro do foreach caso a comparação seja verdade.

      foreach ($permissoes as $permissao) {
        if($permissao->idPermissao == $idPermissaoAcesso->id){
          $situaçãoPraca = true;
        }
      }

      if($situaçãoPraca == true){
        $pracas = DB::table('pracas')
        ->join('rotas', 'pracas.ROTA_id', '=', 'rotas.id')
        ->select('pracas.id', 'pracas.praca as nomePraca',
        'pracas.dataInativacao as dataInativacao', 'pracas.ativoInativo as ativoInativo', 'rotas.descricaoRota as nomeRota')->get();

        return view('listagem/listagemPraca', compact('pracas'));

      }else{
        return redirect()->route('site');
      }
    }

    public function listaPraca(){

      //$pracas = pracas::all();
      $pracas = DB::table('pracas')
      ->join('rotas', 'pracas.ROTA_id', '=', 'rotas.id')
      ->select('pracas.id', 'pracas.praca as nomePraca',
      'pracas.dataInativacao as dataInativacao', 'pracas.ativoInativo as ativoInativo', 'rotas.descricaoRota as nomeRota')->get();
      return view('listagem/listagemPraca', compact('pracas'));

    }


    public function adicionar(){

      $rotas = rotas::all();

      return view('layout/adicionarPraca', compact('rotas'));

    }


    public function salvar(Request $req){

      $dados = $req->all();

      pracas::create($dados);
      $ultimoId = pracas::all('id')->last();

      pracas::where('id', '=', $ultimoId->id)->update(['ativoInativo' => 1]);

      return redirect()->route('listagem.praca');

    }

    public function editar($id){

      $praca = pracas::find($id);
      $rotas = rotas::all();

      return view('layout.editarPraca', compact('praca', 'rotas'));
    }

    public function atualizar(Request $req, $id){

      $dados = $req->all();

      pracas::find($id)->update($dados);

      return redirect()->route('listagem.praca');

    }

    public function excluir($id){

      pracas::find($id)->delete();

      return redirect()->route('listagem.praca');

    }

    public function ativar($id){

      pracas::where('id', '=', $id)->update(['ativoInativo' => 1, 'dataInativacao' => '']);
      return redirect()->route('listagem.praca');
    }

    public function desativar($id){

      $data = Carbon::now();

      pracas::where('id', '=', $id)->update(['ativoInativo' => 0, 'dataInativacao' => $data]);
      return redirect()->route('listagem.praca');
    }

}
