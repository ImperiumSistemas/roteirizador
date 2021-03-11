<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pessoas;
use App\Clientes;
use App\Enderecos;


class ConfirmaEndereco extends Controller
{
    //

    public function lista(){

      $listagens = DB::table('pessoas')
      ->join('clientes', 'clientes.PESSOA_id', '=', 'pessoas.id')
      ->select('pessoas.id as idPessoa', 'pessoas.nome as nomePessoa', 'clientes.id as idCliente')->get();

      return view('listagem.ConfirmaEndereco', compact('listagens'));

    }

    public function mostrarMapa($id){

      /*$endereco = DB::table('pessoas')
      ->join('enderecos', 'enderecos.PESSOAS_id', '=', 'pessoas.id')
      ->select('enderecos.id as idEndereco', 'enderecos.latitude as latitude', 'enderecos.longitude as longitude',
      'enderecos.confirmado as confirmado', 'enderecos.rua as rua', 'enderecos.bairro as bairro',
      'enderecos.numero as numeros', 'enderecos.cidade as cidade','enderecos.estado as estado', 'enderecos.pais as pais',
      'pessoas.nome as nomePessoa', 'pessoas.id as idPessoa')
      ->where('pessoas.id', '=', $id)->first();
        dd($endereco);*/

      $endereco = Enderecos::where('PESSOAS_id', '=', $id)->first();
      $pessoa = Pessoas::find($id);
      //dd($endereco);
      return view('listagem.mostrarMapa', compact('endereco', 'pessoa'));

    }

    public function confirmaEndereco(Request $req, $id)
    {
        $dados = $req->all();
        $latitude = $dados['lat'];
        $longitude = $dados['lng'];
        
        //$dadosBanco = Enderecos::where('PESSOAS_id', '=', $id)->get();

        $dadosBanco = Enderecos::where('PESSOAS_id', '=', $id)->first();
        //$informacaoBanco = Enderecos::find($dadosBanco->id);

        //$latitudeBanco = $dadosBanco->latitude;
      //  $longitudeBanco = $informacaoBanco->longitude;

        Enderecos::find($dadosBanco->id)->update(['latitude' => $latitude, 'longitude' => $longitude]);

        return redirect()->route('listagem.confirmaEndereco');


    }
}
