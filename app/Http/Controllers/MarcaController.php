<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function index()
    {
        $marcas = Marca::where('status', 1)->get();

        $listaFiltrada = $marcas->filter(function ($marca) {
            $marca->load('modelos');
            return $marca->modelos->isNotEmpty();
        })->values();
       
        return $listaFiltrada;
    }


    public function create(Request $post)
    {

        $validator = validator($post->all(), [
            'nombre' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            $nuevaMarca = new Marca();
            $nuevaMarca->nombre = $post->nombre;

            $nuevaMarca->save();

            return "El registro se creo correctamente";
        }
        catch (QueryException $e) {
            $errormsj = $e->getMessage();
        
            if (strpos($errormsj, 'Duplicate entry') !== false) {
                preg_match("/Duplicate entry '(.*?)' for key '(.*?)'/", $errormsj, $matches);
                $duplicateValue = $matches[1] ?? '';
                $duplicateKey = $matches[2] ?? '';
        
                return response()->json(['error' => "No se puede realizar la acción, el valor '$duplicateValue' ya está duplicado en el campo '$duplicateKey'"], 422);
            }
            return response()->json(['error' => 'Error en la acción realizada: ' . $errormsj], 500);
        } catch (Exception $e) {
            return "Bad Request";
        }
    }


    public function show($id)
    {
        try {
            $marca = Marca::findOrFail($id);
            $modelos = $marca->modelos;
            return $marca;
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

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            $marca = Marca::findOrFail($id);

            if (isset($marca)) {
                $marca->nombre = $body->nombre;

                $marca->save();
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
            $marca = Marca::find($id);

            if (isset($marca)) {
                $marca->status = false;
                $marca->save();
                return "El registro se elimino correctamente";
            } else {
                return "El registro no existe";
            }
        } catch (QueryException $e) {
            return "Bad request";
        }
    }
}
