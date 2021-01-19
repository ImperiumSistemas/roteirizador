<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clientes;
use App\Pessoas;
use App\pracas;
use App\Filiais;

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

      $dados = $req->all();

    }
}
