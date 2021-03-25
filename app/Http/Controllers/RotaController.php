<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\rotas;
use App\regioes;
use App\permissao_niveis_acessos;
use App\permissao_acessos;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class RotaController extends Controller
{
    //
    public function listaRotaPermissao($nivelAcesso){
      $permissoes = permissao_niveis_acessos::where('idNivelAcesso', '=', $nivelAcesso)->get(); // Buscando tudo da tabela permissao_niveis_acessos onde o idNivelAcesso = ao Id que está sendo recebido pela função.
      $idPermissaoAcesso = permissao_acessos::where('descricao', '=', "ROTA")->first(); // Buscando na tabela a informação onde o nome da permissão for EMPRESAS.
      $situaçãoRota = false; // iniciando a variavel como falsa, para inserir ela como verdadeira dentro do foreach caso a comparação seja verdade.

      foreach ($permissoes as $permissao) {
        if($permissao->idPermissao == $idPermissaoAcesso->id){
          $situaçãoRota = true;
        }
      }

      if($situaçãoRota == true){

        $rotas = DB::table('rotas')
        ->join('regioes', 'rotas.REGIAO_id', '=', 'regioes.id')
        ->select('rotas.id', 'rotas.numeroPedagio as numeroPedagio', 'rotas.gastoPedagio as gastoPedagio', 'rotas.descricaoRota as descricaoRota',
          'rotas.ativoInativo as ativoInativo', 'rotas.dataInativacao as dataInativacao', 'regioes.nomeRegiao as nomeRegiao')
        ->get();

        return view('listagem.listagemRota', compact('rotas'));

      }else{
        return redirect()->route('site');
      }
    }

    public function listaRota(){

      $rotas = DB::table('rotas')
      ->join('regioes', 'rotas.REGIAO_id', '=', 'regioes.id')
      ->select('rotas.id', 'rotas.numeroPedagio as numeroPedagio', 'rotas.gastoPedagio as gastoPedagio', 'rotas.descricaoRota as descricaoRota',
        'rotas.ativoInativo as ativoInativo', 'rotas.dataInativacao as dataInativacao', 'regioes.nomeRegiao as nomeRegiao')
      ->get();

      //$rotas = rotas::all();

      return view('listagem.listagemRota', compact('rotas'));

    /*  $obj = new stdClass;
      $obj->cd = $cd;
      $obj->vehicle = $veiculo;
      $obj->deliveries = $pedidos;

      $json = json_encode($obj) */

    }

    public function adicionar(){

      $regioes = regioes::all();

      return view('layout/adicionarRota', compact('regioes'));

    }

    public function salvar(Request $req){
      $dados = $req->all();

      rotas::create($dados);
      $ultimoId = rotas::all('id')->last();

      rotas::where('id', '=', $ultimoId->id)->update(['ativoInativo' => 1]);

      return redirect()->route('listagem.rota');
    }


    public function editar($id){

      //$rota = rotas::find($id);
      $regioes = regioes::all();

      $rota = rotas::find((int)$id);

      //$rota = DB::table('rotas')->where('id', '=', $id)->get();
      //->join('regioes', 'rotas.REGIAO_id', '=', 'regioes.id')
      //->select('rotas.id as id','rotas.numeroPedagio as numeroPedagio', 'rotas.gastoPedagio as gastoPedagio', 'rotas.descricaoRota as descricaoRota',
      //  'rotas.ativoInativo as ativoInativo', 'rotas.dataInativacao as dataInativacao', 'regioes.nomeRegiao as nomeRegiao')
      //->get();

      return view('layout/editarRota', compact('rota', 'regioes'));
    }

    public function atualizar(Request $req, $id){

      $dados = $req->all();

      rotas::find($id)->update($dados);

      return redirect()->route('listagem.rota');

    }

    public function excluir($id){

      rotas::find($id)->delete();

      return redirect()->route('listagem.rota');

    }

    public function ativar($id){

      $data = Carbon::now();

      rotas::where('id', '=', (int)$id)->update(['ativoInativo' => 1, 'dataInativacao' => '']);

      return redirect()->route('listagem.rota');
    }

    public function desativar($id){
      //dd((int)$id);
      $data = Carbon::now();

      rotas::where('id', '=', (int)$id)->update(['ativoInativo' => 0, 'dataInativacao' => $data]);

      return redirect()->route('listagem.rota');
    }
}
