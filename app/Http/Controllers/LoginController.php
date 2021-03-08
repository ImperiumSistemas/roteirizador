<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      return view('home');
  }


    /*public function index(){
      return view('login.index');
    }

    public function entrar(Request $req){

      $dados = $req->all();

      if(Auth::attempt(['email' => $dados['email'], 'password' => $dados['senha']])){
        return redirect()->route('site');
      }
      return redirect()->route('login.index');
    }

    public function sair(){
      Auth::logout();
      return redirect()->route('login.index');
    }*/
}
