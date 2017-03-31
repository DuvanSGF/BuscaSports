<?php

namespace webDeportes\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CanchaFormRequest extends FormRequest
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
            'id_tipocancha'=>'max:5',
            'id_barrio'=>'max:5',
            'iluminacion_cancha'=>'required|max:20',
            'direccion_cancha'=>'required|max:45',
            'capacidad_cancha'=>'required|max:3',
            'privacidad_cancha'=>'required|max:20',
            'imagen_cancha'=>'required|max:45'
        ];
    }
}
