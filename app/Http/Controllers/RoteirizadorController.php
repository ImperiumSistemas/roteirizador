<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Veiculos;
use App\Motoristas;

class RoteirizadorController extends Controller
{
    public function index(){

      return view('layout.site');
    }

  
}
