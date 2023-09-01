<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePersonaRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'telefono' => 'required|string',
            'sexo' => 'required|string',
            'fecha_nacimiento' => 'required|date',
            'documento_identificacion' => 'required|string',
            'direccion' => 'required|string',
            'codigo_postal' => 'required|string',
            'pais' => 'required|string',
            'state' => 'required|boolean',
        ];
    }
}
