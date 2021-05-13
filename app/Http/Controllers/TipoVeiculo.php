<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tipo_veiculos;
use Carbon\Carbon;

class TipoVeiculo extends Controller
{
    public function listaTipoVeiculo(){

      $tipoVeiculo = tipo_veiculos::all();

      return view('listagem.tipoVeiculo', compact('tipoVeiculo'));
    }

    public function adicionar(){

      return view('layout.adicionarTipoVeiculo');
    }

    public function salvar(Request $req){
      $dados = $req->all();

      $descricao = $dados['descricao'];

      tipo_veiculos::create(['descricao' => $descricao, 'ativoInativo' => 1]);

      return redirect()->route('listagem.tipoVeiculo');
    }

    public function editar($id){
      $tipoVeiculo = tipo_veiculos::find($id);

      return view('layout.editarTipoVeiculo', compact('tipoVeiculo'));
    }

    public function atualizar(Request $req, $id){
      $dados = $req->all();

      tipo_veiculos::find($id)->update($dados);

      return redirect()->route('listagem.tipoVeiculo');
    }

    public function deletar($id){

      tipo_veiculos::find($id)->delete();

      return redirect()->route('listagem.tipoVeiculo');
    }

    public function desativar($id){
      $data = Carbon::now();

      tipo_veiculos::find($id)->update(['ativoInativo' => 0, 'dataInativacao' => $data]);
      return redirect()->route('listagem.tipoVeiculo');
    }

    public function ativar($id){
      tipo_veiculos::find($id)->update(['ativoInativo' => 1, 'dataInativacao' => '']);
      return redirect()->route('listagem.tipoVeiculo');
    }
}
