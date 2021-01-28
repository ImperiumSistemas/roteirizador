<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\rotas;
use App\regioes;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class RotaController extends Controller
{
    //

    public function listaRota(){

      $rotas = DB::table('rotas')
      ->join('regioes', 'rotas.REGIAO_id', '=', 'regioes.id')
      ->select('rotas.id as id','rotas.numeroPedagio as numeroPedagio', 'rotas.gastoPedagio as gastoPedagio', 'rotas.descricaoRota as descricaoRota',
        'rotas.ativoInativo as ativoInativo', 'rotas.dataInativacao as dataInativacao', 'regioes.nomeRegiao as nomeRegiao')
      ->get();

      //$rotas = rotas::all();

      return view('listagem.listagemRota', compact('rotas'));

    }

    public function adicionar(){

      $regioes = regioes::all();

      return view('layout/adicionarRota', compact('regioes'));

    }

    public function salvar(Request $req){
      $dados = $req->all();

      rotas::create($dados);


      return redirect()->route('listagem.rota');
    }


    public function editar($id){

      //$rota = rotas::find($id);
      $regioes = regioes::all();

      $rota = DB::table('rotas')->where('id', '=', $id)->get();
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

      rotas::where('id', '=', $id)->update(['ativoInativo' => 1, 'dataInativacao' => '']);

      return redirect()->route('listagem.rota');
    }

    public function desativar($id){
      $data = Carbon::now();

      rotas::where('id', '=', $id)->update(['ativoInativo' => 0, 'dataInativacao' => $data]);

      return redirect()->route('listagem.rota');
    }
}
