<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cidades;
use Carbon\Carbon;

class CidadesController extends Controller
{
    //

    public function listaCidade(){

      $cidade = cidades::all();

      return view('listagem.listagemCidade', compact('cidade'));
    }

    public function adicionar(){

      return view('layout.adicionarCidade');
    }

    public function salvar(Request $req){

      $dados = $req->all();

      cidades::create($dados);

      return redirect()->route('listagem.cidade');
    }


    public function editar($id){

      $cidade = cidades::find($id);

      return view('layout.editarCidade', compact('cidade'));
    }

    public function atualizar(Request $req, $id){

      $dados = $req->all();

      cidades::find($id)->update($dados);

      return redirect()->route('listagem.cidade');

    }

    public function excluir($id){

      cidades::find($id)->delete();

      return redirect()->route('listagem.cidade');
    }

    public function ativar($id){
      cidades::where('id', '=', $id)->update(['ativoInativo' => 1, 'dataInativacao' => '']);
      return redirect()->route('listagem.cidade');
    }

    public function desativar($id){
      $data = Carbon::now();
      cidades::where('id', '=', $id)->update(['ativoInativo' => 0, 'dataInativacao' => $data]);
      return redirect()->route('listagem.cidade');
    }
}
