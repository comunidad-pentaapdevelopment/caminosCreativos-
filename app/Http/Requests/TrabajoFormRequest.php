<?php

namespace Caminos\Http\Requests;

use Caminos\Http\Requests\Request;

class TrabajoFormRequest extends Request
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
        	'tipotrabajoId'=>'required',
            'DescripcionLarga'=>'required|max:50',
            'DescripcionCorta'=>'required|max:30',
            'Imagen'=>'mimes:jpeg,bmp,png,jpg,gif',
            'Audio'=>'mimes:mpga,wav',
            'Cliente'=>'required',
            'Fecha'=>'required' 
        ];
    }
}