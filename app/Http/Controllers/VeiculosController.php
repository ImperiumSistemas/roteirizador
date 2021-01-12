<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Veiculos;
use App\Filiais;
use App\FiliaisVeiculos;

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

      $veiculo = Veiculos::all();

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

       FiliaisVeiculos::create(['FILIAL_id' => (int)$filial, 'VEICULO_id' => $idVeiculo]);
      }


      return redirect()->route('listagem.veiculo');

    }

    public function editar($id){

      $veiculo = Veiculos::find($id);
      $filiais = Filiais::all();
      return view('layout.editarVeiculo', compact('veiculo', 'filiais'));
    }

    public function atualizar(Request $req, $id){

      $dados = $req->all();

      Veiculos::find($id)->update($dados);

      return redirect()->route('listagem.veiculo');

    }

}
