<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresas;

class EmpresaController extends Controller
{
    //
    public function listaEmpresa(){

      $empresas = Empresas::all();

      return view('listagem/listagemEmpresa', compact('empresas'));

    }

    public function adicionar(){

      return view('layout/adicionarEmpresa');

    }

    public function salvar(Request $req){
      $dados = $req->all();

      Empresas::create($dados);

      return redirect()->route('listagem.empresa');
    }

    public function editar($id){

      $empresa = Empresas::find($id);

      return view('layout.editarEmpresa', compact('empresa'));
    }


    public function atualizar(Request $req, $id){

      $dados = $req->all();

      Empresas::find($id)->update($dados);

      return redirect()->route('listagem.empresa');

    }

    public function excluir($id){
      Empresas::find($id)->delete();

      return redirect()->route('listagem.empresa');
    }

}
