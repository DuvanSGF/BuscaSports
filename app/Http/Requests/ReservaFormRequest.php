<?php

namespace webDeportes\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservaFormRequest extends FormRequest
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
            'estado'=>'max:15',
            'dia_reserva'=>'required',
            'equipo1_reserva'=>'required|max:20',
            'equipo2_reserva'=>'required|max:20',
            'descripcion_reserva'=>'max:255'
        ];
    }
}
