<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Database\Eloquent\Model;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
      DB::table('users')->insert([
        'id' => 1,
        'name' => 'admin',
        'email' => 'anderson@anderson.com',
        'password' => bcrypt("123"),
      ]);

      DB::table('users')->insert([
        'id' => 2,
        'name' => 'User',
        'email' => 'user@user.com',
        'password' => bcrypt("123"),
      ]);
    }
}
