<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enderecos;
use App\Pais;
use App\Cidades;
use App\Bairros;
use App\Estados;
use App\Pessoas;
use Carbon\Carbon;

class EnderecoController extends Controller
{
    //

    public function listaEndereco(){

      $enderecos = Enderecos::all();


      return view('listagem.listaEndereco', compact('enderecos'));

    }

    public function adicionar(){

      $paises = Pais::all();
      $cidades = Cidades::all();
      $bairro = Bairros::all();
      $estados = Estados::all();
      $pessoas = Pessoas::all();

      return view('layout.adicionarEndereco', compact('paises', 'cidades', 'bairro', 'estados', 'pessoas'));
    }

    public function salvar(Request $req){

        $dados = $req->all();

        Enderecos::create($dados);

        return redirect()->route('listagem.endereco');
    }

    public function editar($id){

        $endereco = Enderecos::find($id);
        $estados = Estados::find($endereco->ESTADO_id)->all();
        $paises = Pais::find($endereco->PAIS_id)->all();
        $cidades = Cidades::find($endereco->CIDADE_codCidade)->all();
        $pessoas = Pessoas::find($endereco->PESSOAS_id)->all();

        return view('layout.editarEndereco', compact('endereco', 'estados', 'paises', 'cidades', 'pessoas'));

    }


    public function atualizar(Request $req, $id){

      $dados = $req->all();

      Enderecos::find($id)->update($dados);

      return redirect()->route('listagem.endereco');

    }

    public function excluir($id){

      Enderecos::find($id)->delete();

      return redirect()->route('listagem.endereco');
    }

    public function ativar($id){
      Enderecos::where('id', '=', $id)->update(['ativoInativo' => 1, 'dataInativacao' => '']);
      return redirect()->route('listagem.endereco');
    }

    public function desativar($id){
      $data = Carbon::now();
      Enderecos::where('id', '=', $id)->update(['ativoInativo' => 0, 'dataInativacao' => $data]);
      return redirect()->route('listagem.endereco');
    }


}
