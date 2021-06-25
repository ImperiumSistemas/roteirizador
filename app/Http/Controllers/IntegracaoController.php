<?php

namespace App\Http\Controllers;

use App\Pedidos;
use App\Produtos;
use App\produtospedidos;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Clientes;
use App\Enderecos;
use App\Pessoas;
use App\Fisicas;
use App\Juridicas;

class IntegracaoController extends Controller
{
    public function index(Request $req)
    {
        return $req->pedidos;
    }

    public function pedido(Request $req)
    {
        //dd($req->input("codPedido"));
        $dados = $req->all();
        //dd($req->input('pedidos'));
        //dd($dados['pedidos']);

        $pedidos = $req->pedidos;

      foreach ($pedidos as $pedido){
            $pedido =(object)$pedido;
            $retornoCliente = $this->salvarCliente($pedido);
            //$produtos=$pedido->produtos;
            $retornoPedidos = $this->salvarPedido($pedido);
            }

        return $pedidos;
    }


    public function salvarCliente($pedido){
      $enderecos = Enderecos::all();
      $clientes = Clientes::all();
      $pessoas = Pessoas::all();

      $cpfcnpj = $pedido->cpfcnpj;
      $tamanhoCpfCnpj = strlen($pedido->cpfcnpj);
      $codCliente = $pedido->codCliente;
      $nomeCliente = $pedido->nome;
      $pais = $pedido->pais;
      $estado = $pedido->estado;
      $cidade = $pedido->cidade;
      $bairro = $pedido->bairro;
      $cep = $pedido->cep;
      $rua = $pedido->rua;
      $numero = $pedido->numero;

      if($tamanhoCpfCnpj == 14){
        $fisicas = Fisicas::all();
        $encontraCpf = false;

        foreach($fisicas as $fisica){
          if($fisica->cpf == $cpfcnpj){
            $encontraCpf = true;
          }
        }

        if($encontraCpf == false){

          Pessoas::create(['nome' => $nomeCliente]);
          $ultimoIdPessoa = Pessoas::all('id')->last();
          Fisicas::create(['cpf' => $cpfcnpj, 'PESSOAS_id' => $ultimoIdPessoa->id]);

          $clientes = Clientes::all();
          $encontraCliente = false;

          foreach($clientes as $cliente){
            if($cliente->codCliente == $codCliente){
              $encontraCliente = true;
            }
          }

          if($encontraCliente == false){
            Clientes::create(['codCliente' => $codCliente, 'PESSOA_id' => $ultimoIdPessoa->id]);
          }else{
            Clientes::where('codCliente', '=', $codCliente)->update(['PESSOA_id' => $ultimoIdPessoa->id]);

          }

          $enderecos = Enderecos::all();
          $encontraEndereco = false;

          foreach($enderecos as $endereco){
            if($endereco->cep == $cep){

                $encontraEndereco = true;
            }
          }

          if($encontraEndereco == false){
            Enderecos::create(['rua' => $rua, 'bairro' => $bairro, 'numero' => $numero, 'cidade' => $cidade, 'cep' => $cep,
                               'estado' => $estado, 'pais' => $pais, 'PESSOAS_id'  => $ultimoIdPessoa->id]);
          }
        }

        if($encontraCpf == true){
          $clientes = Clientes::all();
          $encontraCliente = false;
          $ultimoIdPessoa = Pessoas::all('id')->last();

          foreach($clientes as $cliente){
            if($cliente->codCliente == $codCliente){
              $encontraCliente = true;
            }
          }

          if($encontraCliente == false){
            Clientes::create(['codCliente' => $codCliente, 'PESSOA_id' => $ultimoIdPessoa->id]);
          }else{
            Clientes::where('codCliente', '=', $codCliente)->update(['PESSOA_id' => $ultimoIdPessoa->id]);

          }

          $enderecos = Enderecos::all();
          $encontraEndereco = false;

          foreach($enderecos as $endereco){
            if($endereco->cep == $cep){

                $encontraEndereco = true;
            }
          }

          if($encontraEndereco == false){
            Enderecos::create(['rua' => $rua, 'bairro' => $bairro, 'numero' => $numero, 'cidade' => $cidade, 'cep' => $cep,
                               'estado' => $estado, 'pais' => $pais, 'PESSOAS_id'  => $ultimoIdPessoa->id]);
          }
        }
      }
      // JURIDICAS
      else{
        $juridicas = Juridicas::all();
        $encontraCnpj = false;

        foreach($juridicas as $juridica){
          if($juridica->cnpj == $cpfcnpj){
            $encontraCnpj = true;
          }
        } //end foreach

        if($encontraCnpj == false){

          Pessoas::create(['nome' => $nomeCliente]);
          $ultimoIdPessoa = Pessoas::all('id')->last();
          Juridicas::create(['cnpj' => $cpfcnpj, 'PESSOAS_id' => $ultimoIdPessoa->id]);

          $clientes = Clientes::all();
          $encontraCliente = false;

          foreach($clientes as $cliente){
            if($cliente->codCliente == $codCliente){
              $encontraCliente = true;
            }
          }

          if($encontraCliente == false){
            Clientes::create(['codCliente' => $codCliente, 'PESSOA_id' => $ultimoIdPessoa->id]);
          }else{
            Clientes::where('codCliente', '=', $codCliente)->update(['PESSOA_id' => $ultimoIdPessoa->id]);

          }

          $enderecos = Enderecos::all();
          $encontraEndereco = false;

          foreach($enderecos as $endereco){
            if($endereco->cep == $cep){

                $encontraEndereco = true;
            }
          }


          if($encontraEndereco == false){
            Enderecos::create(['rua' => $rua, 'bairro' => $bairro, 'numero' => $numero, 'cidade' => $cidade, 'cep' => $cep,
                               'estado' => $estado, 'pais' => $pais, 'PESSOAS_id'  => $ultimoIdPessoa->id]);
          }
        }

        // CASO ENCONTRE O CNPJ
        if($encontraCnpj == true){
          $clientes = Clientes::all();
          $encontraCliente = false;
          $ultimoIdPessoa = Pessoas::all('id')->last();

          foreach($clientes as $cliente){
            if($cliente->codCliente == $codCliente){
              $encontraCliente = true;
            }
          }

          if($encontraCliente == false){
            Clientes::create(['codCliente' => $codCliente, 'PESSOA_id' => $ultimoIdPessoa->id]);
          }else{
            Clientes::where('codCliente', '=', $codCliente)->update(['PESSOA_id' => $ultimoIdPessoa->id]);

          }

          $enderecos = Enderecos::all();
          $encontraEndereco = false;

          foreach($enderecos as $endereco){
            if($endereco->cep == $cep){

                $encontraEndereco = true;
            }
          }

          if($encontraEndereco == false){
            Enderecos::create(['rua' => $rua, 'bairro' => $bairro, 'numero' => $numero, 'cidade' => $cidade, 'cep' => $cep,
                               'estado' => $estado, 'pais' => $pais, 'PESSOAS_id'  => $ultimoIdPessoa->id]);
          }
        } // end comparação CNPJ caso exista.

      } //end Else CNPJ

    } // end function salvar

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
