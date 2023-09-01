<?php

namespace App\Http\Controllers;

use App\Models\Modelo;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ModeloController extends Controller
{
    public function index()
    {
        $modelo = Modelo::where('status', 1)->get();
        $modelo->load('marca');
        return $modelo;
    }

    public function create(Request $post)
    {
        $validator = validator($post->all(), [
            'nombre' => 'required',
            'marca_id' => 'required|exists:marcas,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            $nuevoModelo = new Modelo();
            $nuevoModelo->nombre = $post->nombre;
            $nuevoModelo->marca_id = $post->marca_id;
       
            $nuevoModelo->save();

            return "El registro se creo correctamente";
        } catch (Exception $e) {
            return "Bad Request";
        }
    }

    public function show($id)
    {
        try {
            $modelo = Modelo::findOrFail($id);
            $modelo->marca;

            return $modelo;
        } catch (QueryException $e) {
            return "Bad Request";
        } catch (ModelNotFoundException $e){
            return response()->json(['error'=> "la marca $id no existe"]);
        }
    }

    public function update(Request $body, $id)
    {
        $validator = validator($body->all(), [
            'nombre' => 'required',
            'marca_id' => 'required|exists:marcas,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        try {
            $modelo = Modelo::findOrFail($id);
                $modelo->nombre = $body->nombre;
                $modelo->marca_id = $body->marca_id;

                $modelo->save();
                return "El registro $id se actualizo correctamente";
        } catch (QueryException $e) {
            return "Bad Request";
        } catch (ModelNotFoundException $e){
            return response()->json(['error'=> "la marca $id no existe"]);
        }
    }

    public function destroy($id)
    {
        try {
            $modelo = Modelo::find($id);

            if (isset($modelo)) {
                $modelo->estado = false;
                $modelo->save();
                return "El registro se elimino correctamente";
            } else {
                return "El registro no existe";
            }
        } catch (Exception $e) {
            return "Bad request";
        }
    }
}
