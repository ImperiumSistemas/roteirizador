<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enderecos;
use App\Pais;
use App\Cidades;
use App\Bairros;

class EnderecoController extends Controller
{
    //

    public function listaEndereco(){

      $enderecos = Enderecos::all();


      return view('listagem.listaEndereco', compact('enderecos'));

    }

    public function adicionar(){

      return view('layout.adicionarEndereco');
    }

    public function salvar(Request $req){

        $nomeCidade = $req->nomeCidade;
        $nomeBairro = $req->nomeBairro;
        $numero = $req->numero;
        $nomePais = $req->pais;

        Cidades::create(['nomeCidade' => $nomeCidade]);
        Bairros::create(['nomeBairro' => $nomeBairro]);
        Pais::create(['pais' => $nomePais]);

        $idCidade = Cidades::all('id')->last();
        $idBairro = Bairros::all('id')->last();
        $idPais = Pais::all('id')->last();

        Enderecos::create(['numero' => $numero, 'BAIRRO_cod_bairro' => "$idBairro->id", 'PAIS_id' => "$idPais->id", 'CIDADE_codCidade' => "$idCidade->id"]);

        return redirect()->route('listagem.endereco');
    }

    public function editar($id){

        $endereco = Enderecos::find($id);
        $bairro = Bairros::find($endereco->BAIRRO_cod_bairro);
        $cidade = Cidades::find($endereco->CIDADE_codCidade);
        $pais = Pais::find($endereco->PAIS_id);

        return view('layout.editarEndereco', compact('endereco', 'bairro', 'cidade', 'pais'));

    }


    public function atualizar(Request $req, $id){

      $dados = $req->all();

      $idCidade = Enderecos::find($id);
      $idBairro = Enderecos::find($id);
      $idPais = Enderecos::find($id);

      Enderecos::find($id)->update($dados);
      Cidades::find($idCidade->CIDADE_codCidade)->update($dados);
      Bairros::find($idBairro->BAIRRO_cod_bairro)->update($dados);
      Pais::find($idPais->PAIS_id)->update($dados);

      return redirect()->route('listagem.endereco');

    }

    public function excluir(){
      
    }


}
