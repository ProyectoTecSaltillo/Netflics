<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pelicula_id')->unsigned();
            $table->integer('estatus_id')->unsigned()->default(1); // Default disponible
            //$table->enum('estatus', ['vendida', 'rentada', 'disponible'])->default('disponible');
            $table->timestamps();
            $table->softDeletes();

            // $table->foreign('pelicula_id')->references('id')->on('peliculas');
            // $table->foreign('estatus_id')->references('id')->on('estatus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventarios');
    }
}
