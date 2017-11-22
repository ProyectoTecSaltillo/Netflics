<?php

namespace Netflics\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombres' => 'required|string',
            'paterno' => 'required|string',
            'materno' => 'required|string',
            'email' => 'required|email|unique:users,email,'.Auth::user()->id,
            'telefono' => 'max:10',
            'direccion' => '',
            'foto' => 'image|max:1000',
        ];
    }

    /**
     * The messages that the user will see if an error is released.
     */

    public function messages()
    {
        return [
            'required'      => 'Este campo es requerido.',
            'foto.max'      => 'La imagen debe ser menor a :max kb',
            'email'         => 'El :attribute debe ser válido.',
            'email.unique'  => 'El :attribute ya está registrado',
            'image'         => 'La :attribute debe estar en formato JPG, JPEG o PNG.',
            'string'        => 'Debe contener solo texto',
            'telefono.max'      => 'Máximo 10 digitos',
          ];
    }
}
