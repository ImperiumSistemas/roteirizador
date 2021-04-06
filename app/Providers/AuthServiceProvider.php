<?php

namespace App\Providers;

use App\Models\Post;
use App\Policies\PostPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Permissao;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
      //App\Post::class => App\Policies\PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */

     public function boot(){

       $this->registerPolicies();

       foreach($this->listaPermissoes() as $permissao){
          Gate::define($permissao->nome, function($user) use($permissao){
            return $user->temPapelDestes($permissao->papeis) || $user->isAdmin();
          });
        }

     }

     public function listaPermissoes(){
      return Permissao::with('papeis')->get();
    }

}
