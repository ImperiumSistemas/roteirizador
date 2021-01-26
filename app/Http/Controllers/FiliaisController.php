<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Filiais;
use App\Empresas;
use Carbon\Carbon;

class FiliaisController extends Controller
{
    //

    public function listaFiliais(){

      $filiais = Filiais::all();

      return view('listagem.listagemFiliais', compact('filiais'));

    }

    public function adicionar(){

      $empresas = Empresas::all();


      return view('layout.adicionarFilial', compact('empresas'));
    }


    public function salvar(Request $req){

        $dados = $req->all();

        Filiais::create($dados);

        return redirect()->route('listagem.filiais');

    }

    public function editar($id){

      $filiais = Filiais::find($id);
      $idEmpresa = $filiais->EMPRESA_id;

      $empresas = Empresas::all();

      return view('layout.editarFilial', compact('filiais', 'empresas'));
    }

    public function atualizar(Request $req, $id){

      $dados = $req->all();

      Filiais::find($id)->update($dados);


      return redirect()->route('listagem.filiais');

    }

    public function delete($id){

      Filiais::find($id)->delete();

      return redirect()->route('listagem.filiais');
    }

    public function ativar($id){
      Filiais::where('id', '=', $id)->update(['ativoInativo' => 1, 'dataInativacao' => '']);
      return redirect()->route('listagem.filiais');
    }

    public function desativar($id){
      $data = Carbon::now();
      Filiais::where('id', '=', $id)->update(['ativoInativo' => 0, 'dataInativacao' => $data]);
      return redirect()->route('listagem.filiais');
    }


}
