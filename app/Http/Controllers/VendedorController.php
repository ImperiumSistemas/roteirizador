<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendedores;
use App\Pessoas;
use App\Fisicas;
use App\Juridicas;
use App\Enderecos;
use Illuminate\Support\Facades\DB;

class VendedorController extends Controller
{
    public function listaVendedor(){

      $vendedores = DB::table('vendedores')
                  ->join('pessoas', 'vendedores.PESSOAS_id', '=', 'pessoas.id')
                  ->join('enderecos', 'enderecos.PESSOAS_id', '=', 'pessoas.id')
                  ->select('vendedores.id as idVendedor','vendedores.codVendedor as codVendedor',
                           'vendedores.dataInativacao as dataInativacao', 'vendedores.ativoInativo as ativoInativo',
                           'pessoas.nome as nomeVendedor', 'pessoas.numero_telefone as telefoneVendedor')
                  ->get();

      return view('listagem.listagemVendedor', compact('vendedores'));

    }

    public function adicionarVendedorFisico(){

      return view('layout.adicionarVendedorFisico');
    }

    public function adicionarVendedorJuridico(){

      return view('layout.adicionarVendedorJuridico');
    }

    public function salvarVendedorFisico(Request $req){
      $dados = $req->all();

      $codVendedor = $dados['codVendedor'];//
      $nomeVendedor = $dados['nome'];//
      $celular = $dados['numero_telefone'];//
      $cpf = $dados['cpf'];//
      $rg = $dados['rg'];//
      $rua = $dados['rua'];
      $numero = $dados['numero'];
      $bairro = $dados['bairro'];
      $cidade = $dados['cidade'];
      $estado = $dados['estado'];
      $pais = $dados['pais'];
      $cep = $dados['cep'];

      Pessoas::create(['nome' => $nomeVendedor, 'numero_telefone' => $celular, 'ativoInativo' => 1]);
      $ultimoIdPessoa = Pessoas::all('id')->last();

      Fisicas::create(['cpf' => $cpf, 'rg' => $rg, 'PESSOAS_id' => $ultimoIdPessoa->id]);
      Enderecos::create(['rua' => $rua, 'bairro' => $bairro, 'numero' => $numero, 'cidade' => $cidade,
                         'cep' => $cep, 'estado' => $estado, 'pais' => $pais, 'PESSOAS_id' => $ultimoIdPessoa->id]);

      Vendedores::create(['codVendedor' => $codVendedor, 'fisicoJuridico' => 1, 'ativoInativo' => 1, 'PESSOAS_id' => $ultimoIdPessoa->id]);

      return redirect()->route('listagemVendedor');
    }

    public function salvarVendedorJuridico(Request $req){
      $dados = $req->all();

      $codVendedor = $dados['codVendedor'];//
      $nomeVendedor = $dados['nome'];//
      $celular = $dados['numero_telefone'];//
      $cnpj = $dados['cnpj'];//
      $razao_social = $dados['razao_social'];//
      $rua = $dados['rua'];
      $numero = $dados['numero'];
      $bairro = $dados['bairro'];
      $cidade = $dados['cidade'];
      $estado = $dados['estado'];
      $pais = $dados['pais'];
      $cep = $dados['cep'];

      Pessoas::create(['nome' => $nomeVendedor, 'numero_telefone' => $celular, 'ativoInativo' => 1]);
      $ultimoIdPessoa = Pessoas::all('id')->last();

      Juridicas::create(['cnpj' => $cnpj, 'razao_social' => $razao_social, 'PESSOAS_id' => $ultimoIdPessoa->id]);
      Enderecos::create(['rua' => $rua, 'bairro' => $bairro, 'numero' => $numero, 'cidade' => $cidade,
                         'cep' => $cep, 'estado' => $estado, 'pais' => $pais, 'PESSOAS_id' => $ultimoIdPessoa->id]);

      Vendedores::create(['codVendedor' => $codVendedor, 'fisicoJuridico' => 2, 'ativoInativo' => 1, 'PESSOAS_id' => $ultimoIdPessoa->id]);

      return redirect()->route('listagemVendedor');
    }

    public function editar($id){
      $vendedores = Vendedores::find($id);

      if($vendedores->fisicoJuridico == 1){
        $vendedor = DB::table('vendedores')
                    ->join('pessoas', 'vendedores.PESSOAS_id', '=', 'pessoas.id')
                    ->join('enderecos', 'enderecos.PESSOAS_id', '=', 'pessoas.id')
                    ->join('fisicas', 'fisicas.PESSOAS_id', '=', 'pessoas.id')
                    ->select('vendedores.id as idVendedor','vendedores.codVendedor as codVendedor',
                             'vendedores.fisicoJuridico as fisicoJuridico',
                             'vendedores.dataInativacao as dataInativacao', 'vendedores.ativoInativo as ativoInativo',
                             'pessoas.nome as nomeVendedor', 'pessoas.numero_telefone as telefoneVendedor',
                             'fisicas.cpf as cpf', 'fisicas.rg as rg',
                             'enderecos.rua as rua', 'enderecos.numero as numero', 'enderecos.bairro as bairro',
                             'enderecos.cidade as cidade', 'enderecos.estado as estado', 'enderecos.pais as pais',
                             'enderecos.cep as cep')
                    ->first();
      }

      if($vendedores->fisicoJuridico == 2){
        $vendedor = DB::table('vendedores')
                    ->join('pessoas', 'vendedores.PESSOAS_id', '=', 'pessoas.id')
                    ->join('enderecos', 'enderecos.PESSOAS_id', '=', 'pessoas.id')
                    ->join('juridicas', 'juridicas.PESSOAS_id', '=', 'pessoas.id')
                    ->select('vendedores.id as idVendedor','vendedores.codVendedor as codVendedor',
                             'vendedores.dataInativacao as dataInativacao', 'vendedores.ativoInativo as ativoInativo',
                             'vendedores.fisicoJuridico as fisicoJuridico',
                             'pessoas.nome as nomeVendedor', 'pessoas.numero_telefone as telefoneVendedor',
                             'juridicas.cnpj as cnpj', 'juridicas.razao_social as razao_social',
                             'enderecos.rua as rua', 'enderecos.numero as numero', 'enderecos.bairro as bairro',
                             'enderecos.cidade as cidade', 'enderecos.estado as estado', 'enderecos.pais as pais',
                             'enderecos.cep as cep')
                    ->first();
      }

      return view('layout.editarVendedor', compact('vendedor'));
    }
}
