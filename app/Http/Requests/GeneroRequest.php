<?php

namespace Netflics\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class GeneroRequest extends FormRequest
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
            'nombre' => '',
        ];
    }

    /**
     * The messages that the user will see if an error is released.
     */

    public function messages()
    {
        return [
            'nombre' => '',
          ];
    }
}
