<?php

namespace Netflics\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Netflics\Models\Inventario;
use Netflics\Models\Pelicula;
use Netflics\Models\Renta;
use Netflics\Models\User;

class RentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rentas = Renta::all();

        return view('rentas', compact('rentas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = User::all();

        $peliculas = Pelicula::all();

        return view('forms.rentasForm', compact('usuarios', 'peliculas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $renta = new Renta();

        $renta->user_id = $request->cliente;
        $renta->empleado_id = Auth::user()->id;
        $renta->inventario_id = $request->copia;

        $renta->user()->associate($request->cliente);
        $renta->empleado()->associate(Auth::user()->id);
        $renta->inventario()->associate($request->copia);

        $renta->save();

        $inventario = Inventario::find($request->copia);

        $inventario->estatus_id = Pelicula::RENTADA;

        $inventario->save();

        return redirect('rentas')->with('success', 'Renta realizada con éxito');
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Renta $renta)
    {
        $inventario = Inventario::find($renta->inventario->id);

        $inventario->estatus_id = Pelicula::DISPONIBLE;

        $inventario->save();

        $renta->entregado = true;

        $renta->save();

        return back()->with('success', 'Renta entregada con éxito');
    }
}
