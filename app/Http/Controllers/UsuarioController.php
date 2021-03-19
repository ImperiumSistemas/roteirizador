<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pessoas;
use App\niveis_acessos;
use App\User;

class UsuarioController extends Controller
{
    //

    public function adicionar(){
      $pessoas = Pessoas::all();
      $nivelAcessos = niveis_acessos::all();
      return view('layout.adicionarUsuario', compact('pessoas', 'nivelAcessos'));
    }

    public function salvar(Request $req){
      $nome = $req->name;
      $senha = $req->password;
      $email = $req->email;
      $idNivelAcesso = $req->idNivelAcesso;

      User::create(['name' => $nome, 'email' => $email, 'password' => bcrypt($senha), 'idNivelAcesso' => $idNivelAcesso]);
      return redirect()->route('site');
    }
}
