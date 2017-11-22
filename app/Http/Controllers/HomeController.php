<?php

namespace Netflics\Http\Controllers;

use Illuminate\Http\Request;
use Netflics\Models\Pelicula;
use Netflics\Models\Renta;
use Netflics\Models\User;
use Netflics\Models\Venta;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total = [
            'usuarios' => User::all()->count(),
            'peliculas' => Pelicula::all()->count(),
            'rentas' => Renta::all()->count(),
            'ventas' => Venta::all()->count()
        ];

        return view('home', compact('total'));
    }

    /**
     * Show the specified view.
     *
     * @return \Illuminate\Http\Response
     */
    public function returnView($view)
    {
        return view($view);
    }
}
