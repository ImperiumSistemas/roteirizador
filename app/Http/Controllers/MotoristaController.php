<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Motoristas;
use App\Filiais;
use App\FiliaisMotoristas;
use App\filiais_motoristas;
use App\Pessoas;
use App\permissao_niveis_acessos;
use App\permissao_acessos;
use Carbon\Carbon;


class MotoristaController extends Controller
{
    //

    public function teste(){

      $motorista = Motoristas::all();
      return view('teste', compact('motorista'));
    }


    public function listaMotorista(){

      //$motoristas = Motoristas::all();
     /*$motoristas =  DB::table('motoristas')
           ->join('filiais_motoristas', 'motoristas.id', '=', 'filiais_motoristas.motorista_id')
           ->select('motoristas.*', 'filiais_motoristas.*')
           ->get();*/

          // $motoristas = Motoristas::all();

          $motoristas = DB::table('filiais_motoristas')
          ->join('motoristas', 'filiais_motoristas.MOTORISTA_id', '=', 'motoristas.id')
          ->join('filiais', 'filiais_motoristas.FILIAL_id', '=', 'filiais.id')
          ->join('pessoas', 'motoristas.PESSOAS_id', '=', 'pessoas.id')
          ->join('enderecos', 'enderecos.PESSOAS_id', '=', 'pessoas.id')
          ->select('motoristas.id as motoristaId', 'motoristas.ativoInativo as ativoInativo',
          'motoristas.dataInativacao as dataInativacao',  'motoristas.numero_cnh as numeroCnh',
          'motoristas.data_validade_cnh as dataValidadeCnh','filiais.descricao as descricao',
          'filiais.id as filialId',
          'pessoas.nome as nomePessoa', 'pessoas.numero_telefone as numeroTelefone',
          'enderecos.bairro as bairro','enderecos.numero as numeroEndereco', 'enderecos.rua as rua',
          'enderecos.cidade as cidade','enderecos.estado as estado', 'enderecos.pais as pais')->get();

          $pessoas = Pessoas::all();

      return view('listagem.listagemMotorista', compact('motoristas', 'pessoas'));

    }

    public function adicionarMotorista(){

    /*  $filiais = Filiais::pluck('id', 'cnpj');
      return view('layout/adicionarMotorista', compact('filiais'));
    }*/


    //  $filiais = Filiais::all(['id', 'cnpj']);

      //$filiais = Filiais::pluck('id', 'cnpj');

      $filiais = Filiais::all();
      $motorista = Motoristas::all();
      $pessoas = Pessoas::all();

      return view('layout/adicionarMotorista', compact('motorista', 'filiais', 'pessoas'));

      //return view('layout/adicionarMotorista', compact('filiais',$filiais));

    }

        public function salvarMotorista(Request $req){

          $dados = $req->all();

          //dd($dados['idFilial']);


          Motoristas::create($dados);
          //$ultimoId = Motoristas::all('id')->last();
          $idMotorista = $dados['id'];
          Motoristas::where('id', '=', $idMotorista)->update(['ativoInativo' => 1]);

          $idMotorista = (int)$dados['id'];

          foreach ($dados['idFilial'] as $filial) {

            filiais_motoristas::create(['FILIAL_id' => (int)$filial, 'MOTORISTA_id' => $idMotorista]);

          }


          return redirect()->route('listagem.motorista');
        }


        public function editar($id){

          $motorista = Motoristas::find($id);
          $filiais = Filiais::all();
          $pessoas = Pessoas::all();

          return view('layout.editarMotorista', compact('motorista', 'filiais', 'pessoas'));
        }

        public function atualizar(Request $req, $id){

          $dados = $req->all();

          Motoristas::find($id)->update($dados);
          filiais_motoristas::where('MOTORISTA_id', '=', $id)->delete();

          $idMotorista = (int)$dados['id'];

          foreach ($dados['idFilial'] as $filial) {

            filiais_motoristas::create(['FILIAL_id' => (int)$filial, 'MOTORISTA_id' => $idMotorista]);

          }

          return redirect()->route('listagem.motorista');
        }


        public function deletar($id){
            filiais_motoristas::where('MOTORISTA_id', '=', $id)->delete();
            Motoristas::where('id', '=', $id)->delete();
            return redirect()->route('listagem.motorista');

        }

        public function ativar($id){

          Motoristas::where('id', '=', $id)->update(['ativoInativo' => 1, 'dataInativacao' => '']);
          return redirect()->route('listagem.motorista');
        }

        public function desativar($id){
          $data = Carbon::now();
          Motoristas::where('id', '=', $id)->update(['ativoInativo' => 0, 'dataInativacao' => $data]);
          return redirect()->route('listagem.motorista');
        }
}
