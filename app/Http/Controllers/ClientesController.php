<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clientes;
use App\Pessoas;
use App\pracas;
use App\Filiais;
use App\filiais_clientes;

class ClientesController extends Controller
{
    //
    public function listaCliente(){

      $clientes = Clientes::all();

      return view('listagem.listaCliente', compact('clientes'));

    }

    public function adicionar(){

      $pessoas = Pessoas::all();
      $pracas = pracas::all();
      $filiais = Filiais::all();

      return view('layout.adicionarCliente', compact('pessoas', 'pracas', 'filiais'));
    }

    public function salvar(Request $req){

      $idPessoa = $req->idPessoa;
      $idPraca = $req->idPraca;
      $dados = $req->all();


      Clientes::create(['PRACA_id' => $idPraca, 'PESSOA_id' => $idPessoa]);

      $idCliente = Clientes::all()->last();

      foreach($dados['idFilial'] as $filial){

        filiais_clientes::create(['FILIAL_id' => (int)$filial, 'CLIENTE_id' => $idCliente->id]);

      }

      return redirect()->route('listagemCliente');

    }

    public function editar($id){

      $cliente = Clientes::find($id);
      $pracas = pracas::all();
      $pessoas = Pessoas::all();
      $filiais = Filiais::all();

      return view('layout.editarCliente', compact('cliente', 'pracas', 'pessoas', 'filiais'));

    }

    public function atualizar(Request $req, $id){


      $idPessoa = $req->idPessoa;
      $idPraca = $req->idPraca;

      Clientes::find($id)->update(['PRACA_id' => $idPraca, 'PESSOA_id' => $idPessoa]);

      return redirect()->route('listagemCliente');
    }


    public function excluir($id){


      filiais_clientes::where('CLIENTE_id', '=', $id)->delete();
      Clientes::find($id)->delete();

      return redirect()->route('listagemCliente');
    }
}
