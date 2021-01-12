<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\rotas;
use App\regioes;

class RotaController extends Controller
{
    //

    public function listaRota(){

      $rotas = rotas::all();

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

      $rota = rotas::find($id);
      $regioes = regioes::all();

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
}
