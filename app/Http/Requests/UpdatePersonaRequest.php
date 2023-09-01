<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePersonaRequest extends FormRequest
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
            'nombre' => 'string',
            'apellidos' => 'string',
            'telefono' => 'string',
            'sexo' => 'string',
            'fecha_nacimiento' => 'date',
            'documento_identificacion' => 'string',
            'direccion' => 'string',
            'codigo_postal' => 'string',
            'pais' => 'string',
            'state' => 'boolean|max:1',
        ];
    }
}
