<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;
use App\Veiculos;
use App\Motoristas;
use App\permissao_niveis_acessos;

class RoteirizadorController extends Controller
{
    public function index(){


      if ( Gate::allows('Administrador')) {

              $EMPRESA = 1;
              $FILIAIS = 1;
              $VEICULOS = 1;
              $MOTORISTAS = 1;
              $CLIENTES = 1;
              $PESSOAS = 1;
              $CONFIRMA_ENDERECO = 1;
              $NIVEIS_ACESSOS = 1;
              $PRODUTOS = 1;
              $PRACA = 1;
              $ROTA = 1;
              $REGIAO = 1;
              $PEDIDOS = 1;
              $CADASTRO_USUARIO = 1;
              $MONTAR_CARGA = 1;
              

            return view('layout.site', compact('EMPRESA', 'FILIAIS', 'VEICULOS', 'MOTORISTAS', 'CLIENTES', 'PESSOAS',
                                               'CONFIRMA_ENDERECO', 'NIVEIS_ACESSOS', 'PRODUTOS', 'PRACA', 'ROTA',
                                               'REGIAO', 'PEDIDOS', 'CADASTRO_USUARIO', 'MONTAR_CARGA'));

      }

      if ( Gate::allows('Usuario')) {
            $permissoes = permissao_niveis_acessos::where('idNivelAcesso', '=', 2)->get();

            $EMPRESA = null;
            $FILIAIS = null;
            $VEICULOS = null;
            $MOTORISTAS = null;
            $CLIENTES = null;
            $PESSOAS = null;
            $CONFIRMA_ENDERECO = null;
            $NIVEIS_ACESSOS = null;
            $PRODUTOS = null;
            $PRACA = null;
            $ROTA = null;
            $REGIAO = null;
            $PEDIDOS = null;
            $CADASTRO_USUARIO = null;
            $MONTAR_CARGA = null;

            foreach($permissoes as $permissao){
              if($permissao->idPermissao == 1){
                $EMPRESA = 1;
              }
              if($permissao->idPermissao == 2){
                $FILIAIS = 1;
              }
              if($permissao->idPermissao == 3){
                $VEICULOS = 1;
              }
              if($permissao->idPermissao == 4){
                $MOTORISTAS = 1;
              }
              if($permissao->idPermissao == 5){
                $CLIENTES = 1;
              }
              if($permissao->idPermissao == 6){
                $PESSOAS = 1;
              }
              if($permissao->idPermissao == 7){
                $CONFIRMA_ENDERECO = 1;
              }
              if($permissao->idPermissao == 8){
                $NIVEIS_ACESSOS = 1;
              }
              if($permissao->idPermissao == 9){
                $PRODUTOS = 1;
              }
              if($permissao->idPermissao == 10){
                $PRACA = 1;
              }
              if($permissao->idPermissao == 11){
                $ROTA = 1;
              }
              if($permissao->idPermissao == 12){
                $REGIAO = 1;
              }
              if($permissao->idPermissao == 13){
                $PEDIDOS = 1;
              }
              if($permissao->idPermissao == 15){
                $CADASTRO_USUARIO = 1;
              }
              if($permissao->idPermissao == 16){
                $MONTAR_CARGA = 1;
              }
            }

            return view('layout.site', compact('EMPRESA', 'FILIAIS', 'VEICULOS', 'MOTORISTAS', 'CLIENTES', 'PESSOAS',
                                               'CONFIRMA_ENDERECO', 'NIVEIS_ACESSOS', 'PRODUTOS', 'PRACA', 'ROTA',
                                               'REGIAO', 'PEDIDOS', 'CADASTRO_USUARIO', 'MONTAR_CARGA'));
      }


    }


}
