<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Motoristas;
use App\Filiais;
use App\FiliaisMotoristas;
use App\filiais_motoristas;


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

           $motoristas = Motoristas::all();

      return view('listagem.listagemMotorista', compact('motoristas'));

    }

    public function adicionarMotorista(){

    /*  $filiais = Filiais::pluck('id', 'cnpj');
      return view('layout/adicionarMotorista', compact('filiais'));
    }*/


    //  $filiais = Filiais::all(['id', 'cnpj']);

      //$filiais = Filiais::pluck('id', 'cnpj');

      $filiais = Filiais::all();
      $motorista = Motoristas::all();

      return view('layout/adicionarMotorista', compact('motorista', 'filiais'));

      //return view('layout/adicionarMotorista', compact('filiais',$filiais));

    }

        public function salvarMotorista(Request $req){

          $dados = $req->all();

          //dd($dados['idFilial']);


          Motoristas::create($dados);

          $idMotorista = (int)$dados['id'];

          foreach ($dados['idFilial'] as $filial) {

            filiais_motoristas::create(['FILIAL_id' => (int)$filial, 'MOTORISTA_id' => $idMotorista]);

          }


          return redirect()->route('listagem.motorista');
        }


        public function editar($id){

          $motorista = Motoristas::find($id);
          $filiais = Filiais::all();

          return view('layout.editarMotorista', compact('motorista', 'filiais'));
        }

        public function atualizar(Request $req, $id){

          $dados = $req->all();

          Motoristas::find($id)->update($dados);

          return redirect()->route('listagem.motorista');
        }


        public function deletar($id){
            filiais_motoristas::where('MOTORISTA_id', '=', $id)->delete();
            Motoristas::find($id)->delete();
            return redirect()->route('listagem.motorista');

        }
}
