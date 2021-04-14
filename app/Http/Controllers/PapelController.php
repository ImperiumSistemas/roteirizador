<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\papel;
use App\Permissao;

class PapelController extends Controller
{

  public function permissaoAcesso($id){
    $papel = Papel::find($id);
    $permissoes = Permissao::all();
    //$teste = papeisPermissoes::all();
    //dd($teste);
    $permissoesPapel = DB::table('papel_permissao')
    ->join('permissoes', 'papel_permissao.permissao_id', '=', 'permissoes.id')
    ->select('permissoes.nome as nome', 'permissoes.id as permissaoId')
    ->where('papel_id', '=', $id)->get();

    return view('layout.permissaoAcesso', compact('papel', 'permissoes', 'permissoesPapel'));
  }


  public function permissoesAdicionar(Request $req, $id){

    $papel = Papel::find($id);
    $dados = $req->all();
    $permissao = Permissao::find($dados['idPermissao']);
    $papel->adicionaPermissao($permissao);
    //dd("teste");
    return redirect()->back();
    //return redirect()->route('listagem.niveisAcessos');
  }

  public function permissoesDelete($id, $permissao_id){
    $papel = Papel::find($id);
    $permissao = Permissao::find($permissao_id);
    $papel->removePapel($permissao);

    return redirect()->back();
  }


}
