<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('empleado_id')->unsigned();
            $table->integer('inventario_id')->unsigned();
            $table->boolean('entregado')->default(false);
            // $table->integer('estatus_id')->unsigned()->default(3); // Default rentado
            //$table->enum('estatus', ['entregado', 'devuelto'])->default('entregado');
            $table->timestamps();
            $table->softDeletes();

            // $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('inventario_id')->references('id')->on('inventarios');
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
        Schema::dropIfExists('rentas');
    }
}
