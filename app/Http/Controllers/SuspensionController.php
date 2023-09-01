<?php

namespace App\Http\Controllers;

use App\Models\Suspension;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class SuspensionController extends Controller
{
    public function index()
    {
        $suspensiones = Suspension::all();
        $listaFiltrada = array();

        foreach ($suspensiones as $s) {
            $vehiculos = $s->vehiculos;
            if ($s->estado == true) {
                $listaFiltrada[] = $s;
            }
        }
        return $listaFiltrada;
    }
    public function create(Request $post)
    {

        $validator = validator($post->all(), [
            'tipo' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            $nuevaSuspension = new Suspension();
            $nuevaSuspension->tipo = $post->tipo;
            $nuevaSuspension->estado = true;

            $nuevaSuspension->save();

            return "El registro se creo correctamente";
        } catch (QueryException $e) {
            return "Bad Request";
        }
    }

    public function show($id)
    {
        try {
            $suspension = Suspension::findOrFail($id);
            $vehiculos = $suspension->vehiculos;
            return $suspension;
        } catch (QueryException $e) {
            return "Bad Request";
        } catch (ModelNotFoundException $e){
            return response()->json(['error'=> "la marca $id no existe"]);
        }
    }

    public function update(Request $body, $id)
    {
        $validator = validator($body->all(), [
            'tipo' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            $suspension = Suspension::findOrFail($id);

            if (isset($suspension)) {
                $suspension->tipo = $body->tipo;

                $suspension->save();
                return "El registro $id se actualizo correctamente";
            } else {
                return "Bad Request";
            }
        } catch (QueryException $e) {
            return "Bad Request";
        } catch (ModelNotFoundException $e){
            return response()->json(['error'=> "la marca $id no existe"]);
        }
    }

    public function destroy($id)
    {
        try {
            $suspension = Suspension::find($id);

            if (isset($suspension)) {
                $suspension->estado = false;
                $suspension->save();
                return "El registro se elimino correctamente";
            } else {
                return "El registro no existe";
            }
        } catch (QueryException $e) {
            return "Bad request";
        }
    }

}
