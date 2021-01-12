<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Motoristas;
use App\Filiais;
use App\FiliaisMotoristas;


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
          $idMotorista = (int)$dados['id'];

          Motoristas::create($dados);

          foreach ($dados['idFilial'] as $filial) {

            FiliaisMotoristas::create(['FILIAL_id' => (int)$filial, 'MOTORISTA_id' => $idMotorista]);

          }


          return redirect()->route('listagem.motorista');
        }


        public function deletarMotorista($id){

            Motoristas::find($id)->delete();
            return redirect()->route('listagem.motorista');

        }
}
