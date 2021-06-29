<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produtos;
use App\produtospedidos;
use App\Pedidos;
use Carbon\Carbon;

class ProdutosController extends Controller
{
    //

    public function listaProdutos()
    {

        $produtos = Produtos::all();

        return view('listagem.listagemProdutos', compact('produtos'));
    }

    public function adicionar()
    {
        return view('layout.adicionarProduto');
    }

    public function salvar(Request $req)
    {
        $codProduto = $req->codProduto;
        $descricao = $req->descricao;
        $cubagem = $req->cubagem;
        $peso = $req->peso;
        $codPedido = $req->codPedido;

        $idPedido = Pedidos::where('codPedido', '=', $codPedido)->first();

        Produtos::create(['codProduto' => $codProduto, 'descricao' => $descricao, 'cubagem' => $cubagem, 'peso' => $peso, 'ativoInativo' => 1]);
        $ultimoId = Produtos::all('id')->last();

        produtos_pedidos::create(['idPedido' => $idPedido->id, 'idProduto' => $ultimoId->id]);

        return redirect()->route('listagem.produtos');

    }

    public function editar($id)
    {
        $produto = Produtos::find($id);
        $idProdutoPedidos = produtos_pedidos::where('idProduto', '=', $produto->id)->first(); // encontrando o ID de pedido através do ID de produto. Que está ligado a tabela produtos_pedidos.
        $pedido = Pedidos::find($idProdutoPedidos->idPedido);

        return view('layout/editarProduto', compact('produto', 'pedido'));
    }

    public function atualizar(Request $req, $id)
    {
        $codProduto = $req->codProduto;
        $descricao = $req->descricao;
        $cubagem = $req->cubagem;
        $peso = $req->peso;
        $codPedido = $req->codPedido;

        Produtos::find($id)->update(['codProduto' => $codProduto, 'descricao' => $descricao, 'cubagem' => $cubagem, 'peso' => $peso]);

        $idProdutoPedidos = produtos_pedidos::where('idProduto', '=', $id)->first();

        Pedidos::find($idProdutoPedidos->idPedido)->update(['codPedido' => $codPedido]);

        return redirect()->route('listagem.produtos');

    }

    public function excluir($id)
    {

        $idProdutoPedidos = produtos_pedidos::where('idProduto', '=', $id)->first(); // encontrando o id produto dentro da tabela produtosPedidos para excluir a linha posteriormente.
        produtos_pedidos::find($idProdutoPedidos->id)->delete();
        Produtos::find($id)->delete();

        return redirect()->route('listagem.produtos');
    }

    public function ativar($id)
    {

        Produtos::where('id', '=', $id)->update(['ativoInativo' => 1, 'dataInativacao' => '']);
        return redirect()->route('listagem.produtos');
    }

    public function desativar($id)
    {
        $dataInativacao = Carbon::now();
        Produtos::where('id', '=', $id)->update(['ativoInativo' => 0, 'dataInativacao' => $dataInativacao]);
        return redirect()->route('listagem.produtos');
    }


    public function listarProdutosPedido(Request $req)
    {
       $pedidoInterno = Pedidos::where('codPedido','=',$req->codPedido)->first();
       //dd($pedidoInterno->id);
       $produtos = produtospedidos::where('codPedido','=',$pedidoInterno->id)
           ->join('produtos', 'produtos.codProduto', '=', 'produtospedidos.codProduto')
           ->get();

        return view('listagem/listaProdutosPedido', compact('produtos'));

    }
}
