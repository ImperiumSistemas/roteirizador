<?php

namespace App\Providers;

use App\Models\Post;
use App\Policies\PostPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
      //  \App\Post::class => \App\Policies\PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */

     public function boot(){

       $this->registerPolicies();

       Gate::define('Administrador', function ($user) {
         return $user->idNivelAcesso == 1;
       });

       Gate::define('Usuario', function ($user) {
         return $user->idNivelAcesso == 2;
       });
     }

}
