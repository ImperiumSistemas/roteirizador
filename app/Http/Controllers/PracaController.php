<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pracas;
use App\rotas;

class PracaController extends Controller
{
    //

    public function listaPraca(){

      $pracas = pracas::all();

      return view('listagem/listagemPraca', compact('pracas'));

    }


    public function adicionar(){

      $rotas = rotas::all();

      return view('layout/adicionarPraca', compact('rotas'));

    }


    public function salvar(Request $req){

      $dados = $req->all();

      pracas::create($dados);

      return redirect()->route('listagem.praca');

    }


}
