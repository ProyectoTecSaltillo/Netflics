<?php

namespace Netflics\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Netflics\Models\Inventario;
use Netflics\Models\Pelicula;
use Netflics\Models\User;
use Netflics\Models\Venta;

class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventas = Venta::all();

        return view('ventas', compact('ventas'));
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

        return view('forms.ventasForm', compact('usuarios', 'peliculas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $venta = new Venta();

        $venta->user_id = $request->cliente;
        $venta->empleado_id = Auth::user()->id;
        $venta->inventario_id = $request->copia;

        $venta->user()->associate($request->cliente);
        $venta->empleado()->associate(Auth::user()->id);
        $venta->inventario()->associate($request->copia);

        $venta->save();

        $inventario = Inventario::find($request->copia);

        $inventario->estatus_id = Pelicula::VENDIDA;

        $inventario->save();

        return redirect('ventas')->with('success', 'Venta realizada con éxito');
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
    public function destroy($id)
    {
        //
    }
}
