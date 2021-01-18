<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Pessoas;

class PessoasController extends Controller
{
    //

    public function listaPessoas(){

      $pessoas = Pessoas::all();

      return view('listagem.listaPessoas', compact('pessoas'));

    }

    public function adicionar(){

      return view('layout.adicionarPessoa');

    }
}
