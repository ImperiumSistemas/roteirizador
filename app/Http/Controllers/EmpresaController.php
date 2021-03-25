<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresas;
use Carbon\Carbon;
use App\permissao_niveis_acessos;
use App\permissao_acessos;

class EmpresaController extends Controller
{
    //
    public function listaPermissao($nivelAcesso){

      $permissoes = permissao_niveis_acessos::where('idNivelAcesso', '=', $nivelAcesso)->get(); // Buscando tudo da tabela permissao_niveis_acessos onde o idNivelAcesso = ao Id que está sendo recebido pela função.
      $idPermissaoAcesso = permissao_acessos::where('descricao', '=', "EMPRESAS")->first(); // Buscando na tabela a informação onde o nome da permissão for EMPRESAS.
      $situaçãoEmpresa = false; // iniciando a variavel como falsa, para inserir ela como verdadeira dentro do foreach caso a comparação seja verdade.

      foreach ($permissoes as $permissao) {
        if($permissao->idPermissao == $idPermissaoAcesso->id){
          $situaçãoEmpresa = true;
        }
      }

      if($situaçãoEmpresa == true){
        $empresas = Empresas::all();
        return view('listagem/listagemEmpresa', compact('empresas'));
      }else{
        return redirect()->route('site');
      }

    }

    public function listaEmpresa(){
      $empresas = Empresas::all();
      return view('listagem/listagemEmpresa', compact('empresas'));
    }

    public function adicionar(){

      return view('layout/adicionarEmpresa');

    }

    public function salvar(Request $req){
      $dados = $req->all();

      Empresas::create($dados);
      $ultimoId = Empresas::all('id')->last();

      Empresas::where('id', '=', $ultimoId->id)->update(['ativoInativo' => 1]);
      return redirect()->route('listagem.empresa');
    }

    public function editar($id){

      $empresa = Empresas::find($id);

      return view('layout.editarEmpresa', compact('empresa'));
    }


    public function atualizar(Request $req, $id){
      
      $dados = $req->all();

      Empresas::find($id)->update($dados);

      return redirect()->route('listagem.empresa');

    }

    public function excluir($id){
      Empresas::find($id)->delete();

      return redirect()->route('listagem.empresa');
    }

    public function ativar($id){
      Empresas::where('id', '=', $id)->update(['ativoInativo' => 1, 'dataInativacao' => '']);
      return redirect()->route('listagem.empresa');
    }

    public function desativar($id){
      $data = Carbon::now();
      Empresas::where('id', '=', $id)->update(['ativoInativo' => 0, 'dataInativacao' => $data]);
      return redirect()->route('listagem.empresa');
    }

}
