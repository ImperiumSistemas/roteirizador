<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rua;
use Carbon\Carbon;

class RuaController extends Controller
{
    //

    public function listaRua(){

      $ruas = Rua::all();

      return view('listagem.listaRua', compact('ruas'));

    }

    public function adicionar(){
      return view('layout.adicionarRua');
    }

    public function salvar(Request $req){

      $dados = $req->all();

      Rua::create($dados);

      return redirect()->route('listagem.rua');

    }

    public function editar($id){
      $rua = Rua::find($id);

      return view('layout.editarRua', compact('rua'));
    }

    public function atualizar(Request $req, $id){
      $dados = $req->all();

      Rua::find($id)->update($dados);

      return redirect()->route('listagem.rua');
    }

    public function excluir($id){
      Rua::find($id)->delete();

      return redirect()->route('listagem.rua');

    }

    public function ativar($id){
      Rua::where('id', '=', $id)->update(['ativoInativo' => 1, 'dataInativacao' => '']);
      return redirect()->route('listagem.rua');
    }

    public function desativar($id){
      $data = Carbon::now();
      Rua::where('id', '=', $id)->update(['ativoInativo' => 0, 'dataInativacao' => $data]);
      return redirect()->route('listagem.rua');
    }
}
