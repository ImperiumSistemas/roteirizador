<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Papel;
use App\User;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
           'id', 'name', 'email', 'password',
       ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function papeis(){
      return $this->belongsToMany(Papel::class);
    }

    public function isAdmin(){
      //return $this->id == 1;
      return $this->existePapel('Admin');
    }

    public function existePapel($papel)
   {
       if (is_string($papel)) {
           $papel = Papel::where('nome','=',$papel)->firstOrFail();
       }

       return (boolean) $this->papeis()->find($papel->id);
  }


  public function temPapelDestes($papeis){
     $usePapeis = $this->papeis;
     return $papeis->intersect($usePapeis)->count();
   }

}
