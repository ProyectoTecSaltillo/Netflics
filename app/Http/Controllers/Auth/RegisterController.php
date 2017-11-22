<?php

namespace Netflics\Http\Controllers\Auth;

use Netflics\Models\User;
use Netflics\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombres' => 'required|string|max:60',
            'paterno' => 'required|string|max:60',
            'materno' => 'required|string|max:60',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \Netflics\User
     */
    protected function create(array $data)
    {
        return User::create([
            'nombres' => $data['nombres'],
            'paterno' => $data['paterno'],
            'materno' => $data['materno'],
            'email' => $data['email'],
            'foto' => "imagenes/perfil_usuarios/ninja.png",
            'password' => bcrypt($data['password']),
        ]);
    }
}
