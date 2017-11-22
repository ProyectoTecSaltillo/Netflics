<?php

namespace Netflics\Http\Controllers;

use Illuminate\Http\Request;
use Netflics\Http\Requests\GeneroRequest;
use Netflics\Models\Genero;

class GenerosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $generos = Genero::all()->sortBy('created_at');

        $icons = [
            'md-polymer',
            'md-home',
            'md-favorite',
            'md-account-balance',
            'md-accessibility',
            'md-terrain',
            'md-layers',
            'md-flight',
            'md-hotel',
            'md-wb-sunny',
            'md-directions',
            'md-wb-cloudy',
            'md-wb-cloudy',
        ];
        
        return view('generos', compact('generos', 'icons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forms.generosForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GeneroRequest $request)
    {
        $genero = new Genero();

        $genero->nombre = $request->nombre;

        $genero->save();

        return redirect('generos')->with('success', 'Género creado');
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
    public function update(GeneroRequest $request, Genero $genero)
    {
        $genero->nombre = $request->nombre;

        $genero->update();

        return back()->with('success', 'Género actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genero $genero)
    {
        $genero->delete();

        return back()->with('success', 'Género eliminado');
    }
}
