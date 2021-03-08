<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estados;
use Carbon\Carbon;

class EstadoController extends Controller
{
    //

    public function listaEstado(){

      $estados = Estados::all();

      return view('listagem.listaEstado', compact('estados'));

    }

    public function adicionar(){

      return view('layout.adicionarEstado');

    }

    public function salvar(Request $req){

      $dados = $req->all();

      Estados::create($dados);
      $ultimoId = Estados::all('id')->last();

      Estados::where('id', '=', $ultimoId->id)->update(['ativoInativo' => 1]);
      return redirect()->route('listagem.estado');

    }

    public function editar($id){

      $estado = Estados::find($id);
      return view('layout.editarEstado', compact('estado'));

    }

    public function atualizar(Request $req, $id){

      $dados = $req->all();

      Estados::find($id)->update($dados);

      return redirect()->route('listagem.estado');
    }

    public function delete($id){

      Estados::find($id)->delete();

      return redirect()->route('listagem.estado');

    }

    public function ativar($id){
      Estados::where('id', '=', $id)->update(['ativoInativo' => 1, 'dataInativacao' => '']);
      return redirect()->route('listagem.estado');
    }

    public function desativar($id){
      $data = Carbon::now();
      Estados::where('id', '=', $id)->update(['ativoInativo' => 0, 'dataInativacao' => $data]);
      return redirect()->route('listagem.estado');
    }
}
