<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres', 60);
            $table->string('paterno', 30);
            $table->string('materno', 30);
            $table->integer('rol_id')->unsigned()->default(3);
            $table->integer('credencial_id')->unsigned()->nullable();
            $table->string('telefono', 10)->nullable();
            $table->string('direccion', 100)->nullable();
            $table->string('foto', 100)->nullable()->default('imagenes/perfil_usuarios/ninja.png');
            $table->string('email', 100)->unique();
            $table->string('password', 150);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            // $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
