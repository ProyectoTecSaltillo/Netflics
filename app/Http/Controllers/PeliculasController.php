<?php

namespace Netflics\Http\Controllers;

use Illuminate\Http\Request;
use Netflics\Http\Requests\PeliculaRequest;
use Netflics\Models\Categoria;
use Netflics\Models\Estatus;
use Netflics\Models\Genero;
use Netflics\Models\Inventario;
use Netflics\Models\Pelicula;

class PeliculasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peliculas = Pelicula::all();
        $categorias = Categoria::all();
        $generos = Genero::all();

        return view('peliculas', compact('peliculas', 'categorias', 'generos'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inventario()
    {
        $inventario = Inventario::all();
        
        return view('inventario', compact('inventario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();

        $generos = Genero::all();

        return view('forms.peliculasForm', compact('categorias', 'generos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PeliculaRequest $request)
    {
        $estatus = Estatus::find(Pelicula::DISPONIBLE);

        $pelicula = new Pelicula();

        $pelicula->fill($request->all());

        $pelicula->genero()->associate($request->genero_id);
        $pelicula->categoria()->associate($request->categoria_id);

        $pelicula->save();

        $pelicula->llenarInventario($request->copias, $pelicula->id);

        return redirect('peliculas')->with('success', 'Pelicula(s) agregada(s) al inventario');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PeliculaRequest $request, Pelicula $pelicula)
    {
        $pelicula->update($request->all());

        return back()->with('success', 'Película actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelicula $pelicula)
    {
        if ($pelicula->checarInventario($pelicula)) {
            
            $pelicula->delete();

            $pelicula->eliminarInventario($pelicula);

            $message = ['success' => 'Película(s) eliminada(s) del inventario'];
        } else {
            $message = ['warning' => 'No puedes eliminar la película porque tienes unidades rentadas'];
        }

        return back()->with($message);
    }

    /**
     * Regresa las copias de la película
     *
     * @param  int  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function obtenerCopias(Pelicula $pelicula)
    {
        $inventario = $pelicula->inventario->filter(function ($item, $key) {
            return $item->estatus_id == 1;
        });

        return $inventario->toArray();
    }

    /**
     * Borra una copia de una película
     *
     * @param  int  $inventario
     * @return \Illuminate\Http\Response
     */
    public function borrarInventario(Inventario $inventario)
    {
        $inventario->delete();

        return back()->with('success', 'Copia de película borrada');
    }
}
