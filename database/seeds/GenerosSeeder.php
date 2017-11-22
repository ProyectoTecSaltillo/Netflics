<?php

use Illuminate\Database\Seeder;
use Netflics\Models\Genero;

class GenerosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $generos = [
        	'Drama',
			'Comedia',
			'Acción',
			'Ciencia Ficción',
			'Fantasía',
			'Terror',
			'Romance',
			'Musical',
			'Familiar',
			'Suspenso',
			'Documental',
			'Animación'
        ];

        foreach ($generos as $item) {
            $genero = new Genero();
            $genero->nombre = $item;
            $genero->save();
        }
    }
}
