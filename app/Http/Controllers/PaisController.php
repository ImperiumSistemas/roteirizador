<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pais;

class PaisController extends Controller
{
    //

    public function listaPais(){

      $paises = Pais::all();

      return view('listagem.listagemPais', compact('paises'));
    }

    public function adicionar(){

      return view('layout.adicionarPais');

    }

    public function salvar(Request $req){

      $dados = $req->all();

      Pais::create($dados);

      return redirect()->route('listagem.pais');
    }

    public function editar($id){

    $pais = Pais::find($id);

    return view('layout.editarPais', compact('pais'));

    }

    public function atualizar(Request $req, $id){

      $dados = $req->all();

      Pais::find($id)->update($dados);

      return redirect()->route('listagem.pais');
    }

    public function excluir($id){

      Pais::find($id)->delete();

      return redirect()->route('listagem.pais');

    }
}
