<?php

namespace Netflics\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ImageRequest extends FormRequest
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
            'foto' => 'image|max:1000|mimes:jpeg,jpg,png',
        ];
    }

    /**
     * The messages that the user will see if an error is released.
     */

    public function messages()
    {
        return [
            'foto.max'      => 'La imagen debe ser menor a :max kb',
            'foto.mime'         => 'La imagen debe estar en formato JPG, JPEG o PNG.',
          ];
    }
}
