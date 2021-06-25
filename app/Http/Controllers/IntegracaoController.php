<?php

namespace App\Http\Controllers;

use App\Pedidos;
use App\Produtos;
use App\produtospedidos;
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
        //dd($pedidos);
        foreach ($pedidos as $pedido) {
            $pedido = (object)$pedido;

            $retornoPedidos = $this->salvarPedido($pedido);

            $produtos = $pedido->produtos;
            foreach ($produtos as $produto) {
                $produto = (object)$produto;
                //dd($produto);
            }

        }


        return $pedidos;
    }

    public function salvarPedido($pedido)
    {

        if (Pedidos::where('codPedido', '=', $pedido->codPedido)->count() == 0) {
            Pedidos::create([
                'codPedido' => $pedido->codPedido,
                'codCliente' => $pedido->codCliente,
                'valorPedido' => $pedido->valorPedido,
                'codFilial' => $pedido->codFilialPedido,
                'codPraca' => $pedido->codPraca,
                'dataPedido' => $pedido->dataPedido,
                'podeFormarCarga' => 'S',
                'statusPedido' => 'A',
                'filialFatura' => $pedido->codFilialFatura
            ]);
        }


        $ultimoPedido = Pedidos::all()->last();
        $produtos = $pedido->produtos;
        foreach ($produtos as $produto) {
            $produto = (object)$produto;

            if (Produtos::where('codProduto', '=', $produto->codProduto)->count() == 0) {
                Produtos::create([
                    'codProduto' => $produto->codProduto,
                    'descricao' => $produto->descricao
                ]);
            }

            if (produtospedidos::where('codProduto', '=', $produto->codProduto)->where('codPedido', '=', $ultimoPedido->id)->count() == 0){
                produtospedidos::create([
                    'codProduto' => $produto->codProduto,
                    'codPedido' => $ultimoPedido->id,
                    'qtde' => $produto->qtd
                ]);
            }


        }

        return true;

    }

}

