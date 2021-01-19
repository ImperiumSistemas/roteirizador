<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Pessoas;
use \App\Fisicas;
use \App\Juridicas;

class PessoasController extends Controller
{
    //

    public function listaPessoas(){

      $pessoas = Pessoas::all();

      return view('listagem.listaPessoas', compact('pessoas'));

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

      Fisicas::create(['cpf' => $cpf, 'rg' => $rg]);

      $ultimoId = Fisicas::all('id')->last(); // Pegando sempre o último ID cadastrado na hora do cadastro para poder vincular com a tabela pessoa.

      Pessoas::create(['nome' => $nome, 'numero_telefone' => $telefone, 'idFisica' => $ultimoId->id]);

      return redirect()->route('listagem.pessoas');

    }

    public function salvarPessoaJuridica(Request $req){

      $nome = $req->nome;
      $telefone = $req->numero_telefone;
      $cnpj = $req->cnpj;
      $razaoSocial = $req->razao_social;

      Juridicas::create(['cnpj' => $cnpj, 'razao_social' => $razaoSocial]);

      $ultimoId = Juridicas::all('id')->last(); // Pegando sempre o último ID cadastrado na hora do cadastro para poder vincular com a tabela pessoa (chave estrangeira)

      Pessoas::create(['nome' => $nome, 'numero_telefone' => $telefone, 'idJuridica' => $ultimoId->id]);

      return redirect()->route('listagem.pessoas');
    }

    public function editar($id){

      $pessoa = Pessoas::find($id);

      if(isset($pessoa->idFisica)){

        $fisica = Fisicas::find($pessoa->idFisica);

        return view('layout.editarPessoaFisica', compact('pessoa', 'fisica'));

      }

      if(isset($pessoa->idJuridica)){

        $juridica = Juridicas::find($pessoa->idJuridica);

        return view('layout.editarPessoaJuridica', compact('pessoa', 'juridica'));
      }
    }

    public function atualizar(Request $req, $id){

      $nome = $req->nome;
      $telefone = $req->numero_telefone;

      $idPessoa = Pessoas::find($id);

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

    }

    public function excluir($id){

      $idPessoa = Pessoas::find($id);

      if(isset($idPessoa->idFisica)){

        Pessoas::find($id)->delete();
        Fisicas::find($idPessoa->idFisica)->delete();

        return redirect()->route('listagem.pessoas');
      }

      if(isset($idPessoa->idJuridica)){
        Pessoas::find($id)->delete();
        Juridicas::find($idPessoa->idJuridica)->delete();

        return redirect()->route('listagem.pessoas');
      }
    }

}
