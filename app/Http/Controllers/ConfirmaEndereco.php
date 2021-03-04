<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pessoas;
use App\Clientes;


class ConfirmaEndereco extends Controller
{
    //

    public function lista(){

      $listagens = DB::table('pessoas')
      ->join('clientes', 'clientes.PESSOA_id', '=', 'pessoas.id')
      ->select('pessoas.id as idPessoa', 'pessoas.nome as nomePessoa', 'clientes.id as idCliente')->get();

      return view('listagem.ConfirmaEndereco', compact('listagens'));

    }

    public function mostrarMapa(){

      return view('listagem.mostrarMapa');

    }
}
