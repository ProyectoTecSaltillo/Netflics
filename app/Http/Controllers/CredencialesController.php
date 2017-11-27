<?php

namespace Netflics\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Netflics\Models\Credencial;

class CredencialesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $credenciales = Credencial::all();

        return view('credenciales', compact('credenciales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $credencial = Credencial::find($id);

        Credencial::agregarSuscripcion($request->cantidad, $request->unidad, $credencial->user);

        return back()->with('success', 'Suscripción renovada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $credencial = Credencial::find($id);

        $credencial->fin_vigencia = Carbon::now();

        $credencial->update();

        return back()->with('success', 'Suscripción terminada');
    }
}
