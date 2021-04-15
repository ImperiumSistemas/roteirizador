<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Pessoas;
use \App\Fisicas;
use \App\Juridicas;
use \App\Enderecos;
use \App\Clientes;
use \App\Motoristas;
use \App\permissao_niveis_acessos;
use \App\permissao_acessos;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PessoasController extends Controller
{
    //

    public function listaPessoas(){

      //$pessoas = Pessoas::all();
      $juridicaFisica = Pessoas::all();


      $pessoaFisica = DB::table('pessoas')
      ->join('fisicas', 'pessoas.id', '=', 'fisicas.PESSOAS_id')
      ->leftjoin('enderecos', 'pessoas.id', '=', 'enderecos.pessoas_id')
      ->select('pessoas.id', 'pessoas.ativoInativo as ativoInativo', 'pessoas.dataInativacao as dataInativacao',
       'pessoas.nome as nomePessoa', 'pessoas.numero_telefone as numeroTelefone',
       'fisicas.cpf as cpf', 'fisicas.rg as rg','enderecos.rua','enderecos.bairro',
       'enderecos.numero','enderecos.cidade','enderecos.estado',
       'enderecos.pais'
       )->get();

       $pessoaJuridica = DB::table('pessoas')
       ->join('juridicas', 'pessoas.id', '=', 'juridicas.PESSOAS_id')
       ->leftjoin('enderecos', 'pessoas.id', '=', 'enderecos.pessoas_id')
       ->select('pessoas.id', 'pessoas.ativoInativo as ativoInativo', 'pessoas.dataInativacao as dataInativacao',
       'pessoas.nome as nomePessoa', 'pessoas.numero_telefone as numeroTelefone',
       'juridicas.cnpj as cnpj', 'juridicas.razao_social as razaoSocial',
       'enderecos.rua','enderecos.bairro','enderecos.numero','enderecos.cidade','enderecos.estado',
       'enderecos.pais')->get();



      return view('listagem.listaPessoas', compact('pessoaFisica', 'pessoaJuridica', 'juridicaFisica'));

    }

    public function adicionar($id){

      if($id == 1){

      return view('layout.adicionarPessoaFisica');
      }

      if($id == 2){
        return view('layout.adicionarPessoaJuridica');
      }

    }



    public function salvarPessoaFisica(Request $req){

      $nome = $req->nome;
      $telefone = $req->numero_telefone;
      $cpf = $req->cpf;
      $rg = $req->rg;
      $rua = $req->rua;
      $bairro = $req->bairro;
      $numero = $req->numero;
      $cidade = $req->cidade;
      $estado = $req->estado;
      $pais = $req->pais;
      $cep = $req->cep;
      $salvarEm = $req->salvarEm;


      if($salvarEm == 2){

        Pessoas::create(['nome' => $nome, 'numero_telefone' => $telefone, 'ativoInativo' => 1]);
        $ultimoId = Pessoas::all('id')->last(); // Pegando sempre o último ID cadastrado na hora do cadastro para poder vincular com a tabela pessoa.

        Fisicas::create(['cpf' => $cpf, 'rg' => $rg, 'PESSOAS_id'=> $ultimoId->id]);
        $Pessoas_id = $ultimoId->id;

        Enderecos::create(['rua'=>$rua, 'numero'=>$numero, 'bairro'=>$bairro, 'cidade'=>$cidade,
        'estado'=>$estado, 'cep' => $cep, 'pais'=>$pais,'PESSOAS_id'=>$Pessoas_id, 'ativoInativo' => 1]);

        Clientes::create(['ativoInativo' => 1, 'PESSOA_id' => $ultimoId->id, 'PRACA_id' => 1]);

        return redirect()->route('listagem.pessoas');
      }

      if($salvarEm == 1){
        Pessoas::create(['nome' => $nome, 'numero_telefone' => $telefone, 'ativoInativo' => 1]);
        $ultimoId = Pessoas::all('id')->last(); // Pegando sempre o último ID cadastrado na hora do cadastro para poder vincular com a tabela pessoa.

        Fisicas::create(['cpf' => $cpf, 'rg' => $rg, 'PESSOAS_id'=> $ultimoId->id]);
        $Pessoas_id = $ultimoId->id;

        Enderecos::create(['rua'=>$rua, 'numero'=>$numero, 'bairro'=>$bairro, 'cidade'=>$cidade,
        'estado'=>$estado, 'cep' => $cep, 'pais'=>$pais,'PESSOAS_id'=>$Pessoas_id, 'ativoInativo' => 1]);

        Motoristas::create();
      }

      Pessoas::create(['nome' => $nome, 'numero_telefone' => $telefone, 'ativoInativo' => 1]);
      $ultimoId = Pessoas::all('id')->last(); // Pegando sempre o último ID cadastrado na hora do cadastro para poder vincular com a tabela pessoa.

      Fisicas::create(['cpf' => $cpf, 'rg' => $rg, 'PESSOAS_id'=> $ultimoId->id]);
      $Pessoas_id = $ultimoId->id;

      Enderecos::create(['rua'=>$rua, 'numero'=>$numero, 'bairro'=>$bairro, 'cidade'=>$cidade,
      'estado'=>$estado, 'cep' => $cep, 'pais'=>$pais,'PESSOAS_id'=>$Pessoas_id, 'ativoInativo' => 1]);
      return redirect()->route('listagem.pessoas');

    }

    public function salvarPessoaJuridica(Request $req){

      $nome = $req->nome;
      $telefone = $req->numero_telefone;
      $cnpj = $req->cnpj;
      $razaoSocial = $req->razao_social;
      $rua = $req->rua;
      $bairro = $req->bairro;
      $numero = $req->numero;
      $cidade = $req->cidade;
      $estado = $req->estado;
      $pais = $req->pais;
      $cep = $req->cep;
      $salvarEm = $req->salvarEm;

      if($salvarEm == 2){

        Pessoas::create(['nome' => $nome, 'numero_telefone' => $telefone, 'ativoInativo' => 1]);
        $ultimoId = Pessoas::all('id')->last(); // Pegando sempre o último ID cadastrado na hora do cadastro para poder vincular com a tabela pessoa (chave estrangeira)
        Juridicas::create(['cnpj' => $cnpj, 'razao_social' => $razaoSocial, 'PESSOAS_id' => $ultimoId->id ]);

        $Pessoas_id = $ultimoId->id;

        Enderecos::create(['rua'=>$rua, 'numero'=>$numero, 'bairro'=>$bairro, 'cidade'=>$cidade,
        'cep' => $cep, 'estado'=>$estado,'pais'=>$pais,'PESSOAS_id'=> $Pessoas_id, 'ativoInativo' => 1]);

        Clientes::create(['ativoInativo' => 1, 'PESSOA_id' => $ultimoId->id, 'PRACA_id' => 1]);

        return redirect()->route('listagem.pessoas');
      }

      Pessoas::create(['nome' => $nome, 'numero_telefone' => $telefone, 'ativoInativo' => 1]);
      $ultimoId = Pessoas::all('id')->last(); // Pegando sempre o último ID cadastrado na hora do cadastro para poder vincular com a tabela pessoa (chave estrangeira)
      Juridicas::create(['cnpj' => $cnpj, 'razao_social' => $razaoSocial, 'PESSOAS_id' => $ultimoId->id ]);

      $Pessoas_id = $ultimoId->id;

      Enderecos::create(['rua'=>$rua, 'numero'=>$numero, 'bairro'=>$bairro, 'cidade'=>$cidade,
      'cep' => $cep, 'estado'=>$estado,'pais'=>$pais,'PESSOAS_id'=> $Pessoas_id, 'ativoInativo' => 1]);

      return redirect()->route('listagem.pessoas');
    }

    public function editar($id){

    /*  $endereco = DB::table('pessoas')
      ->leftjoin('enderecos', 'pessoas.id', '=', 'enderecos.pessoas_id')
      ->where('PESSOAS_id', '=', $id)
      ->select('*'
       )->get();*/

      $pessoa = Pessoas::find($id);
      $endereco = Enderecos::where('PESSOAS_id', '=', $id)->first();
      $tipoPessoa = Fisicas::where('PESSOAS_id', '=', $id)->first();

      if(isset($tipoPessoa->id)){
        $fisica = Fisicas::where('PESSOAS_id', '=', $id)->first();
        return view('layout.editarPessoaFisica', compact('pessoa','fisica','endereco'));
      }else {
        $juridica = Juridicas::where('PESSOAS_id', '=', $id)->first();
          return view('layout.editarPessoaJuridica', compact('pessoa','juridica','endereco'));
        }



    }

    public function atualizar(Request $req, $id){

      $nome = $req->nome;
      $telefone = $req->numero_telefone;
      $cnpj = $req->cnpj;
      $razaoSocial = $req->razao_social;
      $rua = $req->rua;
      $bairro = $req->bairro;
      $numero = $req->numero;
      $cidade = $req->cidade;
      $estado = $req->estado;
      $pais = $req->pais;
      $cep = $req->cep;

      $tipoPessoa = Fisicas::where('PESSOAS_id', '=', $id)->first();
      $endereco = Enderecos::where('PESSOAS_id', '=', $id)->first();

      if(isset($tipoPessoa->id)){
        $cpf = $req->cpf;
        $rg = $req->rg;

        Pessoas::find($id)->update(['nome' => $nome, 'numero_telefone' => $telefone]);
        Fisicas::find($tipoPessoa->id)->update(['cpf' => $cpf, 'rg' => $rg]);
        Enderecos::find($endereco->id)->update(['rua' => $rua, 'bairro' => $bairro, 'numero' => $numero,
                    'cidade' => $cidade, 'cep' => $cep, 'estado' => $estado, 'pais' => $pais]);

        return redirect()->route('listagem.pessoas');

      }else {

        $cnpj = $req->cnpj;
        $razaoSocial = $req->razao_social;

        $tipoPessoa = Juridicas::where('PESSOAS_id', '=', $id)->first();
        $endereco = Enderecos::where('PESSOAS_id', '=', $id)->first();

        Pessoas::find($id)->update(['nome' => $nome, 'numero_telefone' => $telefone]);
        Juridicas::find($tipoPessoa->id)->update(['cnpj' => $cnpj, 'razao_social' => $razaoSocial]);
        Enderecos::find($endereco->id)->update(['rua' => $rua, 'bairro' => $bairro, 'numero' => $numero,
                    'cidade' => $cidade, 'cep' => $cep, 'estado' => $estado, 'pais' => $pais]);

        return redirect()->route('listagem.pessoas');

        }

      //$idPessoa = Pessoas::find($id);



      /*
      if(isset($idPessoa->idFisica)){ // Verificando se o ID (foreign) está preenchido.

        $cpf = $req->cpf;
        $rg = $req->rg;

        Pessoas::find($id)->update(['nome' => $nome, 'numero_telefone' => $telefone]);
        Fisicas::find($idPessoa->idFisica)->update(['cpf' => $cpf, 'rg' => $rg]);

        return redirect()->route('listagem.pessoas');
      }


      if(isset($idPessoa->idJuridica)){ // Verificando se o ID (foreign) está preenchido.

        $cnpj = $req->cnpj;
        $razaoSocial = $req->razao_social;

        Pessoas::find($id)->update(['nome' => $nome, 'numero_telefone' => $telefone]);
        Juridicas::find($idPessoa->idJuridica)->update(['cnpj' => $cnpj, 'razao_social' => $razaoSocial]);

        return redirect()->route('listagem.pessoas');

      }
      */
    }

    public function excluir($id){

      $idPessoa = Pessoas::find($id);
      $idFisica = null;
      $idFisica = Fisicas::where('PESSOAS_id', '=', $idPessoa->id);
      $idJuridica = Juridicas::where('PESSOAS_id', '=', $idPessoa->id);

      if(isset($idFisica)){
        dd("Fisica");
        Fisicas::where('PESSOAS_id', '=', $idPessoa->id)->delete();
        Pessoas::find($id)->delete();
      }

      if(isset($idJuridica)){
        dd('Juridica');
        Pessoas::find($id)->delete();
        Juridicas::find($idPessoa->idJuridica)->delete();
      }

       return redirect()->route('listagem.pessoas');

    }

    public function ativar($id){
      Pessoas::where('id', '=', $id)->update(['ativoInativo' => 1, 'dataInativacao' => '']);
      return redirect()->route('listagem.pessoas');
    }

    public function desativar($id){
      $data = Carbon::now();
      Pessoas::where('id', '=', $id)->update(['ativoInativo' => 0, 'dataInativacao' => $data]);
      return redirect()->route('listagem.pessoas');
    }

}
