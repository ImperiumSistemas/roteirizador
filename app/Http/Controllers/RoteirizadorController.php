<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;
use App\Veiculos;
use App\Motoristas;

use App\permissao_niveis_acessos;

use App\pedidos;


class RoteirizadorController extends Controller
{
    public function index(){


      return view('layout.site');


      }

  
}
