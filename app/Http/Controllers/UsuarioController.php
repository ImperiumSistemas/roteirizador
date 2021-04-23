<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pessoas;
use App\User;
use App\Permissao;
use App\Papel;

class UsuarioController extends Controller
{
    //

    public function adicionar(){
      $pessoas = Pessoas::all();
      $usuarios = User::all();
      return view('layout.adicionarUsuario', compact('pessoas', 'usuarios'));
    }

    public function salvar(Request $req){
      $nome = $req->name;
      $senha = $req->password;
      $email = $req->email;

      User::create(['name' => $nome, 'email' => $email, 'password' => bcrypt($senha)]);
      return redirect()->back();
    }

    public function exibePapel($id){
      $usuario = User::find($id);
      $papeis = Papel::all();

      $permissaoPapel = DB::table('papel_user')
      ->join('users', 'papel_user.user_id', '=', 'users.id')
      ->join('papeis', 'papel_user.papel_id', '=', 'papeis.id')
      ->select('papeis.nome as nomePapel', 'papeis.id as idPapel', 'users.id as idUsuario')
      ->where('papel_user.user_id', '=', $id)->get();

      return view('layout.adicionaPapelUsuario', compact('usuario', 'papeis', 'permissaoPapel'));
    }

    public function adicionaPapel(Request $req, $id){
      $usuario = User::find($id);
      $dados = $req->all();
      $papel = Papel::find($dados['papel_id']);
      $usuario->adicionaPapel($papel);
      return redirect()->back();
      //dd($papel);
    }

    public function deletaPapel($id, $papel_id){
      
      $usuario = User::find($id);
      $papel = Papel::find($papel_id);
      $usuario->removePapel($papel);
      return redirect()->back();

    }
}
