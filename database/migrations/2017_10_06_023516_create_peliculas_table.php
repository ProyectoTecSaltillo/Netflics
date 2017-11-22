<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeliculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peliculas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo', 50);
            $table->float('precio_renta', 8, 2)->default(0);
            $table->float('precio_venta', 8, 2)->default(0);
            $table->integer('categoria_id')->unsigned();
            $table->integer('genero_id')->unsigned();
            $table->string('cover', 100)->nullable();
            $table->text('descripcion')->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            // $table->foreign('categoria_id')->references('id')->on('categorias');
            // $table->foreign('genero_id')->references('id')->on('generos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peliculas');
    }
}
