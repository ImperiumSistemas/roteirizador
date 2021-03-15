<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clientes;
use App\Pessoas;
use App\pracas;
use App\Filiais;
use App\filiais_clientes;
use App\Enderecos;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ClientesController extends Controller
{
    //
    public function listaCliente(){

      //$clientes = Clientes::all();
      $clientes = DB::table('clientes')
      ->join('pessoas', 'clientes.PESSOA_id', '=', 'pessoas.id')
      ->join('pracas', 'clientes.PRACA_id', '=', 'pracas.id')
      ->join('enderecos', 'enderecos.PESSOAS_id', '=', 'pessoas.id')
      ->select('clientes.id', 'clientes.ativoInativo as ativoInativo', 'clientes.dataInativacao as dataInativacao',
       'pessoas.nome as nomePessoa','pessoas.numero_telefone as numero', 'pracas.praca as nomePraca', 'enderecos.rua as rua',
       'enderecos.bairro as bairro','enderecos.numero as numeroEndereco', 'enderecos.rua as rua', 'enderecos.cidade as cidade',
       'enderecos.estado as estado', 'enderecos.pais as pais')->get();

      return view('listagem.listaCliente', compact('clientes'));

    }

    public function adicionar(){

      $pessoas = Pessoas::all();
      $pracas = pracas::all();
      $filiais = Filiais::all();
      $enderecos = Enderecos::all();
      //$pais = Pais::all();
      //$estados = Estados::all();
      //$cidades = Cidades::all();
      //$bairros = Bairros::all();

      return view('layout.adicionarCliente', compact('pessoas', 'pracas', 'filiais', 'enderecos'));
    }

    public function salvar(Request $req){

      $idPessoa = $req->idPessoa;
      $idPraca = $req->idPraca;
      $dados = $req->all();


      Clientes::create(['PRACA_id' => $idPraca, 'PESSOA_id' => $idPessoa]);
      $ultimoId = Clientes::all('id')->last();

      Clientes::where('id', '=', $ultimoId->id)->update(['ativoInativo' => 1]);

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

    public function ativar($id){
      Clientes::where('id', '=', $id)->update(['ativoInativo' => 1, 'dataInativacao' => '']);
      return redirect()->route('listagemCliente');
    }

    public function desativar($id){
      $data = Carbon::now();
      Clientes::where('id', '=', $id)->update(['ativoInativo' => 0, 'dataInativacao' => $data]);
      return redirect()->route('listagemCliente');
    }
}
