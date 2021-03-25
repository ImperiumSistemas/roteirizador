<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pessoas;
use App\Clientes;
use App\Enderecos;
use App\Filiais;
use App\permissao_niveis_acessos;
use App\permissao_acessos;


class ConfirmaEndereco extends Controller
{
    //
    public function listaPermissao($nivelAcesso){
      
      $permissoes = permissao_niveis_acessos::where('idNivelAcesso', '=', $nivelAcesso)->get(); // Buscando tudo da tabela permissao_niveis_acessos onde o idNivelAcesso = ao Id que está sendo recebido pela função.
      $idPermissaoAcesso = permissao_acessos::where('descricao', '=', "CONFIRMAR ENDEREÇO")->first(); // Buscando na tabela a informação onde o nome da permissão for EMPRESAS.
      $situaçãoConfirmarEndereco = false; // iniciando a variavel como falsa, para inserir ela como verdadeira dentro do foreach caso a comparação seja verdade.

      foreach ($permissoes as $permissao) {
        if($permissao->idPermissao == $idPermissaoAcesso->id){
          $situaçãoConfirmarEndereco = true;
        }
      }

      if($situaçãoConfirmarEndereco == true){
        $listagens = Pessoas::join('clientes', 'clientes.PESSOA_id', '=', 'pessoas.id')
            ->select('pessoas.id as idPessoa', 'pessoas.nome as nomePessoa', 'clientes.id as idCliente')->paginate(10);

        return view('listagem.ConfirmaEndereco', compact('listagens'));

      }else{
        return redirect()->route('site');
      }
    }

    public function lista()
    {
        $listagens = Pessoas::join('clientes', 'clientes.PESSOA_id', '=', 'pessoas.id')
            ->select('pessoas.id as idPessoa', 'pessoas.nome as nomePessoa', 'clientes.id as idCliente')->paginate(10);
        return view('listagem.ConfirmaEndereco', compact('listagens'));
    }

    public function listaFiltros(Request $req)
    {
        $dados = $req->all();

        $listagens = Pessoas::join('clientes', 'clientes.PESSOA_id', '=', 'pessoas.id')
            ->join('enderecos', 'pessoas.id', '=', 'enderecos.Pessoas_id')
            ->where('enderecos.confirmado', '=', $dados['endConfirma'])
            ->select('pessoas.id as idPessoa', 'pessoas.nome as nomePessoa', 'clientes.id as idCliente')->paginate(10);


        return view('listagem.ConfirmaEndereco', compact('listagens'));
    }

    public function mostrarMapa($id)
    {

        /*$endereco = DB::table('pessoas')
        ->join('enderecos', 'enderecos.PESSOAS_id', '=', 'pessoas.id')
        ->select('enderecos.id as idEndereco', 'enderecos.latitude as latitude', 'enderecos.longitude as longitude',
        'enderecos.confirmado as confirmado', 'enderecos.rua as rua', 'enderecos.bairro as bairro',
        'enderecos.numero as numeros', 'enderecos.cidade as cidade','enderecos.estado as estado', 'enderecos.pais as pais',
        'pessoas.nome as nomePessoa', 'pessoas.id as idPessoa')
        ->where('pessoas.id', '=', $id)->first();
          dd($endereco);*/

        $endereco = Enderecos::where('PESSOAS_id', '=', $id)->first();
        $pessoa = Pessoas::find($id);
        //dd($endereco);
        return view('listagem.mostrarMapa', compact('endereco', 'pessoa'));

    }

    public function confirmaEndereco(Request $req, $id)
    {
        $dados = $req->all();
        $latitude = $dados['lat'];
        $longitude = $dados['lng'];

        //$dadosBanco = Enderecos::where('PESSOAS_id', '=', $id)->get();

        $dadosBanco = Enderecos::where('PESSOAS_id', '=', $id)->first();
        //$informacaoBanco = Enderecos::find($dadosBanco->id);

        //$latitudeBanco = $dadosBanco->latitude;
        //  $longitudeBanco = $informacaoBanco->longitude;

        Enderecos::find($dadosBanco->id)->update(['latitude' => $latitude, 'longitude' => $longitude]);

        return redirect()->route('listagem.confirmaEndereco');


    }


    public function mostrarMapaFilial($id)
    {

        /*$endereco = DB::table('pessoas')
        ->join('enderecos', 'enderecos.PESSOAS_id', '=', 'pessoas.id')
        ->select('enderecos.id as idEndereco', 'enderecos.latitude as latitude', 'enderecos.longitude as longitude',
        'enderecos.confirmado as confirmado', 'enderecos.rua as rua', 'enderecos.bairro as bairro',
        'enderecos.numero as numeros', 'enderecos.cidade as cidade','enderecos.estado as estado', 'enderecos.pais as pais',
        'pessoas.nome as nomePessoa', 'pessoas.id as idPessoa')
        ->where('pessoas.id', '=', $id)->first();
          dd($endereco);*/

        $filial = Filiais::where('id', '=', $id)->first();
        //$pessoa = Pessoas::find($id);


        //dd($filial);
        return view('layout.mapaFilial', compact('filial'));

    }


    public function confirmaEnderecoFIlial(Request $req, $id)
    {
        $dados = $req->all();
        $latitude = $dados['lat'];
        $longitude = $dados['lng'];

        //$dadosBanco = Enderecos::where('PESSOAS_id', '=', $id)->get();

        $dadosBanco = Filiais::where('id', '=', $id)->first();
        //$informacaoBanco = Enderecos::find($dadosBanco->id);

        //$latitudeBanco = $dadosBanco->latitude;
        //$longitudeBanco = $dadosBanco->longitude;

        Filiais::find($dadosBanco->id)->update(['latitude' => $latitude, 'longitude' => $longitude]);

        return redirect()->route('listagem.filiais');


    }

}
