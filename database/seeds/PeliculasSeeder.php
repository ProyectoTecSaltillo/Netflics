<?php

use Illuminate\Database\Seeder;
use Netflics\Models\Pelicula;

class PeliculasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $peliculas = [
        	[
        		'titulo' => 'Coco',
        		'precio_renta' => '180.00',	
        		'precio_venta' => '250.00',
        		'categoria_id' => '2',
        		'genero_id' => '12',
        		'descripcion' => 'Miguel es un joven con el sueño de convertirse en leyenda de la música a pesar de la prohibición de su familia.'
        	],
        	[
        		'titulo' => 'Moises Y Los 10 Mandamientos',
        		'precio_renta' => '180.00',
        		'precio_venta' => '250.00',
        		'categoria_id' => '2',
        		'genero_id' => '1',
        		'descripcion' => 'sigue la saga de Moisés desde su nacimiento hasta cuando dirige y lleva a los hebreos a la libertad de la Tierra Prometida'

        	],
        	[
        		'titulo' => 'Cómo Cortar A Tu Patán',
        		'precio_renta' => '150.00',
        		'precio_venta' => '200.00',
        		'categoria_id' => '2',
        		'genero_id' => '2',
        		'descripcion' => 'Amanda, cuando descubre que su hermana está enamorada de un patán, emprende un plan que la llevará a enfrentarse a su más grande miedo… el amor.'
        	]
        ];

        foreach ($peliculas as $item) {
            $pelicula = new Pelicula();
            $pelicula->titulo = $item['titulo'];
            $pelicula->precio_renta = $item['precio_renta'];
            $pelicula->precio_venta = $item['precio_venta'];
            $pelicula->categoria_id = $item['categoria_id'];
            $pelicula->genero_id = $item['genero_id'];
            $pelicula->descripcion = $item['descripcion'];
            $pelicula->save();
        }
    }
}