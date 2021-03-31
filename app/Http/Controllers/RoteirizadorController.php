<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Veiculos;
use App\Motoristas;
use App\pedidos;

class RoteirizadorController extends Controller
{
    public function index(){


      return view('layout.site');
    }

  
}
