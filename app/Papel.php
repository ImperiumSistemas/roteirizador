<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Papel extends Model
{
  protected $table = 'papeis';

  protected $fillable = [
    'nome', 'descricao'
  ];

  public function users(){
    return $this->belongsToMany(User::class);
  }

  public function permissoes(){
    return $this->belongsToMany(Permissao::class);
  }

  public function adicionaPermissao($permissao){
      
      if(is_string($permissao)){
        $permissao = Permissao::where('nome', '=', $permissao)->firstOrFail();
      }

      if($this->existePermissao($permissao)){

        return;
      }


      return $this->permissoes()->attach($permissao);
  }

  public function existePermissao($permissao){

    if(is_string((string)$permissao)){

      foreach($permissao as $p){

        $permissao = Permissao::where('nome', '=', $p->nome)->firstOrFail();
      }

      //return $this->permissoes()->attach($permissao);
      return (boolean) $this->permissoes()->find($permissao->id);
      //$permissao = Permissao::where('nome', '=', $permissao)->firstOrFail();
    }
  //
  }

  public function removePermissao($permissao){
    if(is_string($permissao)){
      $permissao = Permissao::where('nome', '=', $permissao)->firstOrFail();
    }

    return $this->permissoes()->detach($permissao);
  }


}
