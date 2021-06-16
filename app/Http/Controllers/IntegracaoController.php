<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class IntegracaoController extends Controller
{
    public function index(Request $req)
    {
        return $req->pedidos;
    }

    public function pedido(Request $req)
    {
        $pedidos = $req->pedidos;
        foreach ($pedidos as $pedido){
            $pedido =(object)$pedido;
            $produtos=$pedido->produtos;
            foreach ($produtos as $produto){
                $produto = (object)$produto;
                //dd($produto);
            }

        }


        return $pedidos;
    }

}

