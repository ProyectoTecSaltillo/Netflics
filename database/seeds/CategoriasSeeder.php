<?php

use Illuminate\Database\Seeder;
use Netflics\Models\Categoria;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = [
        	[
        		'nombre' => 'AA',
        		'descripcion' => 'Comprensible para niños menores de 7 años'
        	],
        	[
        		'nombre' => 'A',
        		'descripcion' => 'Para todo público'
        	],
        	[
        		'nombre' => 'B',
        		'descripcion' => 'Para adolescentes de 12 años en adelante'
        	],
        	[
        		'nombre' => 'B 15',
        		'descripcion' => 'No recomendada para menores de 15 años'
        	],
        	[
        		'nombre' => 'C',
        		'descripcion' => 'Para adultos de 18 años en adelante'
        	],
        	[
        		'nombre' => 'D',
        		'descripcion' => 'Películas para adultos'
        	]
        ];

        foreach ($categorias as $item) {
            $categoria = new Categoria();
            $categoria->nombre = $item['nombre'];
            $categoria->descripcion = $item['descripcion'];
            $categoria->save();
        }
    }
}