<?php

namespace App\Http\Controllers;

use App\Produtos;
use App\produtospedidos;
use Illuminate\Http\Request;
use App\Pedidos;
use App\Clientes;
use App\pracas;
use App\Filais;
use App\Pessoas;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PedidosController extends Controller
{
    //
    public function listaCliente()
    {

        $pedidos = DB::table('pedidos')
            ->join('clientes', 'clientes.id', '=', 'pedidos.codCliente')
            ->join('pracas', 'pracas.codPraca', '=', 'pedidos.codPraca')
            ->join('filiais', 'filiais.codFilial', '=', 'pedidos.codFilial')
            ->join('pessoas', 'clientes.PESSOA_id', '=', 'pessoas.id')
            ->select('clientes.codCliente as codCliente', 'pracas.codPraca as codPraca',
                'filiais.codFilial as codFilial', 'filiais.descricao as nomeFilial',
                'pedidos.codPedido as codPedido', 'pedidos.nomePedido as nomePedido',
                'pedidos.ativoInativo as ativoInativo', 'pedidos.dataInativacao as dataInativacao', 'pedidos.id as idPedido')->get();

        return view('listagem.controlePedido', compact('pedidos'));
    }

    public function adicionar()
    {

        Pedidos::all();
        return view('layout.adicionarPedido');
    }

    public function salvar(Request $req)
    {
        $dados = $req->all();

        Pedidos::create($dados);
        $ultimoId = Pedidos::all()->last();
        Pedidos::where('id', '=', $ultimoId->id)->update(['ativoInativo' => 1]);

        return redirect()->route('listagem.pedidos');
    }

    public function editar($id)
    {
        $pedido = Pedidos::find($id);

        return view('layout.editarPedido', compact('pedido'));
    }

    public function atualizar(Request $req, $id)
    {
        $dados = $req->all();

        Pedidos::find($id)->update($dados);

        return redirect()->route('listagem.pedidos');
    }

    public function excluir($id)
    {
        Pedidos::find($id)->delete();

        return redirect()->route('listagem.pedidos');
    }

    public function ativarPedido($id)
    {
        Pedidos::where('id', '=', $id)->update(['ativoInativo' => 1, 'dataInativacao' => '']);
        return redirect()->route('listagem.pedidos');
    }

    public function desativarPedido($id)
    {
        $data = Carbon::now();
        Pedidos::where('id', '=', $id)->update(['ativoInativo' => 0, 'dataInativacao' => $data]);
        return redirect()->route('listagem.pedidos');
    }


}
