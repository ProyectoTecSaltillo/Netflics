<?php

namespace Netflics\Http\Controllers;

use Illuminate\Http\Request;
use Netflics\Http\Requests\ImageRequest;
use Netflics\Http\Requests\UserRequest;
use Netflics\Models\Credencial;
use Netflics\Models\Rol;
use Netflics\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all()->sortBy('created_at');
        
        return view('users', compact('users'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function perfil()
    {
        return view('perfil');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Rol::all();

        return view('forms.usuariosForm', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User();

        $user->fill($request->all());

        $user->password = bcrypt('secret');

        $user->rol()->associate($request->rol)->save();

        Credencial::agregarSuscripcion('1', 'mes', $user);

        return redirect('users')->with('success', 'Usuario creado');
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
    public function update(UserRequest $request, User $user)
    {
        $user->update($request->all());

        return back()->with('success', 'Perfil actualizado');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateImage(ImageRequest $request, User $user)
    {
        $file = $request->file('foto');
dd($file);
        $ext = $file->getClientOriginalExtension();

        Storage::disk('local')->put($file);

        $user->foto = 'imagenes/perfil_usuarios/usuario_' . $user->id . $ext;

        $user->update();

        return back()->with('success', 'Imagen actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        $credencial = $user->credencial;

        $credencial->delete();

        return back()->with('success', 'Usuario eliminado');
    }
}
