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
      $clientes = DB::table('filiais_clientes')
      ->join('clientes', 'filiais_clientes.CLIENTE_id', '=', 'clientes.id')
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

      $clientes = Clientes::find($id);
      if($clientes->fisicoJuridico == 1){
        $clientes = DB::table('clientes')
                    ->join('pessoas', 'clientes.PESSOA_id', '=', 'pessoas.id')
                    ->join('fisicas', 'fisicas.PESSOAS_id', '=', 'pessoas.id')
                    ->join('enderecos', 'enderecos.PESSOAS_id', '=', 'pessoas.id')
                    ->select('pessoas.nome as nomePessoa', 'pessoas.numero_telefone as numero',
                             'clientes.codCliente as codCliente', 'clientes.fisicoJuridico as fisicoJuridico',
                             'clientes.id as id', 'clientes.inscricaoEstadual as inscricaoEstadual',
                             'clientes.dataCadastro as dataCadastro',
                             'fisicas.cpf as cpf', 'fisicas.rg as rg',
                             'enderecos.rua as rua', 'enderecos.bairro as bairro', 'enderecos.numero as numeroEndereco',
                             'enderecos.cidade as cidade', 'enderecos.cep as cep', 'enderecos.estado as estado',
                             'enderecos.pais as pais')->where('clientes.id', '=', $id)->first();
        $pracas = pracas::all();
        $filiais = Filiais::all();

        return view('layout.editarCliente', compact('clientes', 'pracas', 'filiais'));
      }
      if($clientes->fisicoJuridico == 2){
        $clientes = DB::table('clientes')
                    ->join('pessoas', 'clientes.PESSOA_id', '=', 'pessoas.id')
                    ->join('juridicas', 'juridicas.PESSOAS_id', '=', 'pessoas.id')
                    ->join('enderecos', 'enderecos.PESSOAS_id', '=', 'pessoas.id')
                    ->select('pessoas.nome as nomePessoa', 'pessoas.numero_telefone as numero',
                             'clientes.codCliente as codCliente', 'clientes.fisicoJuridico as fisicoJuridico',
                             'clientes.id as id', 'clientes.inscricaoEstadual as inscricaoEstadual',
                             'clientes.dataCadastro as dataCadastro',
                             'juridicas.cnpj as cnpj', 'juridicas.razao_social as razao_social',
                             'enderecos.rua as rua', 'enderecos.bairro as bairro', 'enderecos.numero as numeroEndereco',
                             'enderecos.cidade as cidade', 'enderecos.cep as cep', 'enderecos.estado as estado',
                             'enderecos.pais as pais')->where('clientes.id', '=', $id)->first();
        $pracas = pracas::all();
        $filiais = Filiais::all();

        return view('layout.editarCliente', compact('clientes', 'pracas', 'filiais'));
      }




    }

    public function atualizar(Request $req, $id){

      $dados = $req->all();

      Clientes::find($id)->update($dados);
      filiais_clientes::where('CLIENTE_id', '=', $id)->delete();

      $idCliente = $id;

      foreach ($dados['idFilial'] as $filial) {

        filiais_clientes::create(['FILIAL_id' => (int)$filial, 'CLIENTE_id' => $idCliente]);

      }
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

    public function pesquisaClienteJuridico(Request $req){
      $cnpjFormularioPesquisa = $req->cnpj;

      $clientes = DB::table('clientes')
                  ->join('pessoas', 'clientes.PESSOA_id', '=', 'pessoas.id')
                  ->join('juridicas', 'juridicas.PESSOAS_id', '=', 'pessoas.id')
                  ->join('enderecos', 'enderecos.PESSOAS_id', '=', 'pessoas.id')
                  ->join('pracas', 'clientes.PRACA_id', '=', 'pracas.id')
                  ->select('pessoas.nome as nomeCliente', 'pessoas.numero_telefone as telefoneCliente',
                           'juridicas.cnpj as cnpj', 'juridicas.razao_social as razao_social')->get();

      foreach($clientes as $cliente){
        if($cnpjFormularioPesquisa == $cliente->cnpj){
          $clientes = DB::table('clientes')
                      ->join('pessoas', 'clientes.PESSOA_id', '=', 'pessoas.id')
                      ->join('juridicas', 'juridicas.PESSOAS_id', '=', 'pessoas.id')
                      ->join('enderecos', 'enderecos.PESSOAS_id', '=', 'pessoas.id')
                      ->select('pessoas.nome as nomePessoa', 'pessoas.numero_telefone as numero',
                               'clientes.codCliente as codCliente', 'clientes.fisicoJuridico as fisicoJuridico',
                               'clientes.id as id', 'clientes.inscricaoEstadual as inscricaoEstadual',
                               'clientes.dataCadastro as dataCadastro',
                               'juridicas.cnpj as cnpj', 'juridicas.razao_social as razao_social',
                               'enderecos.rua as rua', 'enderecos.bairro as bairro', 'enderecos.numero as numeroEndereco',
                               'enderecos.cidade as cidade', 'enderecos.cep as cep', 'enderecos.estado as estado',
                               'enderecos.pais as pais')->first();

          $filiais = Filiais::all();
          $pracas = pracas::all();

          return view('layout.editarCliente', compact('clientes', 'filiais', 'pracas'));
        }else{
          return redirect()->back();
        }
      }
          return redirect()->back();
    }

    public function pesquisaClienteFisico(Request $req){
      $cpfFormularioPesquisa = $req->cpf;

      $clientes = DB::table('clientes')
                  ->join('pessoas', 'clientes.PESSOA_id', '=', 'pessoas.id')
                  ->join('fisicas', 'fisicas.PESSOAS_id', '=', 'pessoas.id')
                  ->join('enderecos', 'enderecos.PESSOAS_id', '=', 'pessoas.id')
                  ->join('pracas', 'clientes.PRACA_id', '=', 'pracas.id')
                  ->select('pessoas.nome as nomeCliente', 'pessoas.numero_telefone as telefoneCliente',
                           'fisicas.cpf as cpfCliente', 'fisicas.rg as rgCliente')->get();

      foreach($clientes as $cliente){

        if($cpfFormularioPesquisa == $cliente->cpfCliente){
          $clientes = DB::table('clientes')
                      ->join('pessoas', 'clientes.PESSOA_id', '=', 'pessoas.id')
                      ->join('fisicas', 'fisicas.PESSOAS_id', '=', 'pessoas.id')
                      ->join('enderecos', 'enderecos.PESSOAS_id', '=', 'pessoas.id')
                      ->select('pessoas.nome as nomePessoa', 'pessoas.numero_telefone as numero',
                               'clientes.codCliente as codCliente', 'clientes.fisicoJuridico as fisicoJuridico',
                               'clientes.id as id', 'clientes.inscricaoEstadual as inscricaoEstadual',
                               'clientes.dataCadastro as dataCadastro',
                               'fisicas.cpf as cpf', 'fisicas.rg as rg',
                               'enderecos.rua as rua', 'enderecos.bairro as bairro', 'enderecos.numero as numeroEndereco',
                               'enderecos.cidade as cidade', 'enderecos.cep as cep', 'enderecos.estado as estado',
                               'enderecos.pais as pais')->first();
          $filiais = Filiais::all();
          $pracas = pracas::all();

          return view('layout.editarCliente', compact('clientes', 'filiais', 'pracas'));
        }else{
          return redirect()->back();
        }
      }
          return redirect()->back();
    }
}
