<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;
use App\Veiculos;
use App\Motoristas;
use App\Cargas;

use App\permissao_niveis_acessos;

use App\Pedidos;


class RoteirizadorController extends Controller
{
    public function index(){

        $cargasAtivas = Cargas::where("status", "=", "criado")->get();
        $pedidosLiberados = Pedidos::where("podeFormarCarga","=","S")->get();
        $cargasAtivas = $cargasAtivas->count();
        $pedidosLiberados = $pedidosLiberados->count();
      return view('layout.site',compact("cargasAtivas","pedidosLiberados"));


      }

  
}
