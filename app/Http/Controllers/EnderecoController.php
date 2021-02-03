<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enderecos;
use App\Pais;
use App\Cidades;
//use App\Bairros;
use App\Estados;
use App\Pessoas;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class EnderecoController extends Controller
{
    //

    public function listaEndereco(){

      //$enderecos = Enderecos::all();

      $enderecos = DB::table('enderecos')
      ->join('pais', 'enderecos.PAIS_id', '=', 'pais.id')
      ->join('estados', 'enderecos.ESTADO_id', '=', 'estados.id')
      ->join('cidades', 'enderecos.CIDADE_codCidade', '=', 'cidades.id')
      ->select('enderecos.id', 'enderecos.ativoInativo as ativoInativo', 'enderecos.dataInativacao as dataInativacao',
      'enderecos.bairro as bairro', 'enderecos.numero as numero', 'enderecos.rua as rua',
      'pais.pais as nomePais', 'estados.nomeEstado as nomeEstado', 'cidades.nomeCidade as nomeCidade')->get();

      return view('listagem.listaEndereco', compact('enderecos'));

    }

    public function adicionar(){

      $paises = Pais::all();
      $cidades = Cidades::all();
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
