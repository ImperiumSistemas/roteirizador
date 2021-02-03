<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Veiculos;
use App\Filiais;
use App\filiais_veiculos;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class VeiculosController extends Controller
{
    //

    public function index(){

      return view('layout.site');
    }

    public function listaVeiculo(){

      //$model = new Veiculos();
      //var_dump($model->teste());
      //exit();

      //$veiculo = Veiculos::all();

      $veiculo = DB::table('filiais_veiculos')
      ->join('filiais', 'filiais_veiculos.FILIAL_id', '=', 'filiais.id')
      ->join('veiculos', 'filiais_veiculos.VEICULO_id', '=', 'veiculos.id')
      ->select('veiculos.id as veiculoId', 'veiculos.marca as marca', 'veiculos.ano as ano',
      'veiculos.modelo as modelo', 'veiculos.chassi as chassi',
      'veiculos.capacidade_cubagem as capacidadeCubagem', 'veiculos.renavan as renavan',
      'veiculos.ativoInativo as ativoInativo', 'veiculos.dataInativacao as dataInativacao',
      'filiais.descricao as descricao', 'filiais.id', 'filiais.pais as pais', 'filiais.cidade as cidade',
      'filiais.telefone as telefone', 'filiais.bairro as bairro', 'filiais.cep as cep', 'filiais.estado as estado')->get();

      return view('listagem.listagemVeiculo', compact('veiculo'));
    }

    public function adicionar(){

      $filiais = Filiais::all();
      $veiculos = Veiculos::all();

      return view('layout.adicionarVeiculo',compact('filiais','veiculos'));
    }

    public function salvar(Request $req){

      $dados = $req->all();

      Veiculos::create($dados);

      $idVeiculo = (int)$dados['id'];

      foreach($dados['idFilial'] as $filial){

       filiais_veiculos::create(['FILIAL_id' => (int)$filial, 'VEICULO_id' => $idVeiculo]);
      }


      return redirect()->route('listagem.veiculo');

    }

    public function editar($id){

      $veiculo = Veiculos::find($id);
      $filiais = Filiais::all();

      return view('layout.editarVeiculo', compact('veiculo', 'filiais'));
    }

    public function atualizarVeiculo(Request $req, $id){

      dd($req);

      $dados = $req->all();

      Veiculos::find($id)->update($dados);
      Filiais::where('ativoInativo', '=', 1)->update(['ativoInativo' => 1]);

      $idVeiculo = (int)$dados['id'];

      filiais_veiculos::where('VEICULO_id', '=', $id)->delete();


      return redirect()->route('listagem.veiculo');

    }

    public function deletar($id){

      filiais_veiculos::where('VEICULO_id', '=', $id)->delete();
      Veiculos::find($id)->delete();

      return redirect()->route('listagem.veiculo');

    }

    public function ativar($id){
      Veiculos::where('id', '=', $id)->update(['ativoInativo' => 1, 'dataInativacao' => '']);
      return redirect()->route('listagem.veiculo');
    }

    public function desativar($id){
      $data = Carbon::now();
      Veiculos::where('id', '=', $id)->update(['ativoInativo' => 0, 'dataInativacao' => $data]);
      return redirect()->route('listagem.veiculo');
    }

}
