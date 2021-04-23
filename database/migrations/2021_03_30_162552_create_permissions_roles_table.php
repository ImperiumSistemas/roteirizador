<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
       Schema::create('permission_roles', function(Blueprint $table){
            $table->increments('id');
            $table->timestamps();

            $table->bigInteger('permission_id')->unsigned();
            $table->foreign('permission_id')
                ->references('id')
                ->on('permissions')->onDelete('cascade');

            $table->bigInteger('role_id')->unsigned();
            $table->foreign('role_id')
                ->references('id')
                ->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('permission_roles');
    }
}
