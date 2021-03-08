<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bairros;
use App\Enderecos;

class BairroController extends Controller
{
    //

    public function listaBairro(){

      $bairros = Bairros::all();

      return view('listagem.listagemBairro', compact('bairros'));

    }

    public function adicionar(){

      return view('layout.adicionarBairro');

    }

    public function salvar(Request $req){

      $dados = $req->all();

      Bairros::create($dados);localhhos

      return redirect()->route('listagem.bairros');

    }

    public function editar($id){

      $bairro = Bairros::find($id);
      //dd($bairro);

      return view('layout.editarBairro', compact('bairro'));

    }

    public function atualizar(Request $req, $id){
      $dados = $req->all();

      Bairros::find($id)->update($dados);

      return redirect()->route('listagem.bairros');
    }

    public function excluir($id){

      Bairros::find($id)->delete();

      return redirect()->route('listagem.bairros');

    }
}
