<?php

namespace Caminos\Http\Requests;

use Caminos\Http\Requests\Request;

class PublicidadFormRequest extends Request
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
            //
            'Descripcion'=>'required|max:50',
            'Imagen'=>'required|mimes:jpeg,bpm,png,jpg'
        ];
    }
}
