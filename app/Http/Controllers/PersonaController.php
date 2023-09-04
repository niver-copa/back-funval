<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePersonaRequest;
use App\Http\Requests\UpdatePersonaRequest;
use Illuminate\Http\Request;
use App\Models\Persona;

class PersonaController extends Controller
{
    public function index()
    {
        return Persona::all();
    }

    public function store(StorePersonaRequest $request)
    {
        $nuevaPersona = new Persona();

        $nuevaPersona->nombre = $request->nombre;
        $nuevaPersona->apellidos = $request->apellidos;
        $nuevaPersona->telefono = $request->telefono;
        $nuevaPersona->sexo = $request->sexo;
        $nuevaPersona->fecha_nacimiento = $request->fecha_nacimiento;
        $nuevaPersona->documento_identificacion = $request->documento_identificacion;
        $nuevaPersona->direccion = $request->direccion;
        $nuevaPersona->codigo_postal = $request->codigo_postal;
        $nuevaPersona->pais = $request->pais;
        $nuevaPersona->state = $request->state;

        $nuevaPersona->save();

        return "Nueva persona guardada";
    }

    public function show($id)
    {
        return Persona::find($id);
    }

    public function update(UpdatePersonaRequest $request, $id)
    {
        $personaActializar = Persona::find($id);

        $personaActializar->nombre = $request->nombre;
        $personaActializar->apellidos = $request->apellidos;
        $personaActializar->telefono = $request->telefono;
        $personaActializar->sexo = $request->sexo;
        $personaActializar->fecha_nacimiento = $request->fecha_nacimiento;
        $personaActializar->documento_identificacion = $request->documento_identificacion;
        $personaActializar->direccion = $request->direccion;
        $personaActializar->codigo_postal = $request->codigo_postal;
        $personaActializar->pais = $request->pais;
        $personaActializar->state = $request->state;

        $personaActializar->save();

        return "La persona con ID: $id fue actualizada";
    }

    public function destroy($id)
    {
        $personaEliminar = Persona::find($id);
        $personaEliminar->state = 0;
        $personaEliminar->save();

        return "La persona con ID: $id fue eliminada";
    }
}
