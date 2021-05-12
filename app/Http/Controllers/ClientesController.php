<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clientes;
use App\Pessoas;
use App\Fisicas;
use App\Juridicas;
use App\Enderecos;
use App\pracas;
use App\Filiais;
use App\filiais_clientes;
use App\permissao_niveis_acessos;
use App\permissao_acessos;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ClientesController extends Controller
{
    //

    public function listaCliente(){

      //$clientes = Clientes::all();
      $clientes = DB::table('clientes')
      ->join('pessoas', 'clientes.PESSOA_id', '=', 'pessoas.id')
      ->join('pracas', 'clientes.PRACA_id', '=', 'pracas.id')
      ->join('enderecos', 'enderecos.PESSOAS_id', '=', 'pessoas.id')
      ->select('clientes.id', 'clientes.ativoInativo as ativoInativo', 'clientes.dataInativacao as dataInativacao',
       'pessoas.nome as nomePessoa','pessoas.numero_telefone as numero', 'pracas.praca as nomePraca', 'enderecos.rua as rua',
       'enderecos.bairro as bairro','enderecos.numero as numeroEndereco', 'enderecos.rua as rua', 'enderecos.cidade as cidade',
       'enderecos.estado as estado', 'enderecos.cep as cep', 'enderecos.pais as pais')->get();

      return view('listagem.listaCliente', compact('clientes'));

    }

    public function adicionarClienteFisico(){

      $pracas = pracas::all();
      $filiais = Filiais::all();

      return view('layout.adicionarClienteFisico', compact('pracas', 'filiais'));
    }

    public function adicionarClienteJuridico(){
      $pracas = pracas::all();
      $filiais = Filiais::all();

      return view('layout.adicionarClienteJuridico', compact('pracas', 'filiais'));
    }

    public function salvarClienteFisico(Request $req){

      $dados = $req->all();

      $codCliente = $dados['codCliente'];
      $nomeCliente = $dados['nome'];
      $numeroTelefone = $dados['numero_telefone'];
      $cpf = $dados['cpf'];
      $rg = $dados['rg'];
      $rua = $dados['rua'];
      $numero = $dados['numero'];
      $bairro = $dados['bairro'];
      $cidade = $dados['cidade'];
      $estado = $dados['estado'];
      $pais = $dados['pais'];
      $cep = $dados['cep'];
      $idFilial = $dados['idFilial'];
      $idPraca = $dados['idPraca'];


      Pessoas::create(['nome' => $nomeCliente, 'numero_telefone' => $numeroTelefone, 'ativoInativo' => 1]);
      $ultimoIdPessoa = Pessoas::all('id')->last(); // Pegando o Id da última pessoa cadastrada no banco de dados.

      Juridicas::create(['cpf' => $cpf, 'rg' => $rg, 'PESSOAS_id' => $ultimoIdPessoa->id]);

      Enderecos::create(['rua' => $rua, 'numero' => $numero, 'bairro' => $bairro, 'cep' => $cep, 'cidade' => $cidade, 'estado' => $estado, 'pais' => $pais,
                         'PESSOAS_id' => $ultimoIdPessoa->id, 'ativoInativo' => 1]);

      Clientes::create(['codCliente' => $codCliente, 'PRACA_id' => $idPraca, 'PESSOA_id' => $ultimoIdPessoa->id, 'ativoInativo' => 1]);
      $ultimoIdCliente = Clientes::all('id')->last();

      foreach($dados['idFilial'] as $filial){

        filiais_clientes::create(['FILIAL_id' => (int)$filial, 'CLIENTE_id' => $ultimoIdCliente->id]);

      }

      return redirect()->route('listagemCliente');

    }

    public function salvarClienteJuridico(Request $req){
      $dados = $req->all();

      $codCliente = $dados['codCliente'];
      $nomeCliente = $dados['nome'];
      $numeroTelefone = $dados['numero_telefone'];
      $cnpj = $dados['cnpj'];
      $razaoSocial = $dados['razao_social'];
      $rua = $dados['rua'];
      $numero = $dados['numero'];
      $bairro = $dados['bairro'];
      $cidade = $dados['cidade'];
      $estado = $dados['estado'];
      $pais = $dados['pais'];
      $cep = $dados['cep'];
      $idFilial = $dados['idFilial'];
      $idPraca = $dados['idPraca'];

      Pessoas::create(['nome' => $nomeCliente, 'numero_telefone' => $numeroTelefone, 'ativoInativo' => 1]);
      $ultimoIdPessoa = Pessoas::all('id')->last(); // Pegando o Id da última pessoa cadastrada no banco de dados.

      Juridicas::create(['cnpj' => $cnpj, 'razao_social' => $razaoSocial, 'PESSOAS_id' => $ultimoIdPessoa->id]);

      Enderecos::create(['rua' => $rua, 'numero' => $numero, 'bairro' => $bairro, 'cep' => $cep, 'cidade' => $cidade, 'estado' => $estado, 'pais' => $pais,
                         'PESSOAS_id' => $ultimoIdPessoa->id, 'ativoInativo' => 1]);

      Clientes::create(['codCliente' => $codCliente, 'PRACA_id' => $idPraca, 'PESSOA_id' => $ultimoIdPessoa->id, 'ativoInativo' => 1]);
      $ultimoIdCliente = Clientes::all('id')->last();

      foreach($dados['idFilial'] as $filial){

        filiais_clientes::create(['FILIAL_id' => (int)$filial, 'CLIENTE_id' => $ultimoIdCliente->id]);

      }

      return redirect()->route('listagemCliente');

    }

    public function editar($id){

      $cliente = Clientes::find($id);
      $pracas = pracas::all();
      $pessoas = Pessoas::all();
      $filiais = Filiais::all();

      return view('layout.editarCliente', compact('cliente', 'pracas', 'pessoas', 'filiais'));

    }

    public function atualizar(Request $req, $id){


      $idPessoa = $req->idPessoa;
      $idPraca = $req->idPraca;

      Clientes::find($id)->update(['PRACA_id' => $idPraca, 'PESSOA_id' => $idPessoa]);

      return redirect()->route('listagemCliente');
    }


    public function excluir($id){


      filiais_clientes::where('CLIENTE_id', '=', $id)->delete();
      Clientes::find($id)->delete();

      return redirect()->route('listagemCliente');
    }

    public function ativar($id){
      Clientes::where('id', '=', $id)->update(['ativoInativo' => 1, 'dataInativacao' => '']);
      return redirect()->route('listagemCliente');
    }

    public function desativar($id){
      $data = Carbon::now();
      Clientes::where('id', '=', $id)->update(['ativoInativo' => 0, 'dataInativacao' => $data]);
      return redirect()->route('listagemCliente');
    }
}
