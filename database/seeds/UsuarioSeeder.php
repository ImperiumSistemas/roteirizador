<?php

use Illuminate\Database\Seeder;
use App\User;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $dados = [
        'name' => "imperium",
        'email' => "imperium@imperium.com",
        'password' => bcrypt("123"),

      ];

      if(User::where('email', '=', $dados['email'])->count()){
          $usuario = User::where('email', '=', $dados['email'])->first();
          $usuario->update($dados);
          echo "Usuaurio Alterado";
      }else{
        User::create($dados);
        echo "Usuario Criado";
      }

    }
}
