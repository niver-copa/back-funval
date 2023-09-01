<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sucursal;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
class SucursalController extends Controller
{
    public function index() {
        $sucursales = Sucursal::where('estado', 1)->get();
        return $sucursales;
    }
    public function show($id) {
        $sucursal = Sucursal::where('id', $id)->where('estado', true)->firstOrFail();
        if(!$sucursal) {        
            return response()->json(["error"=>"Sucursal con id: $id no existe o fue eliminada."]);
        }
        return $sucursal;
    }
    public function create(Request $request) {
        try {
            $validateData = $request->validate([
                'nombre' => 'required|string|max:255',
                'codigo' => 'required|numeric',
                'calle' => 'required|string|max:100',
                'localidad' => 'required|string',
                'ciudad' => 'required|string',
                'cod_postal' => 'required|numeric|min:5', // Cambiado a string basándonos en la discusión anterior
                'referencia' => 'required|string|min:2',
                'municipio' => 'required|string',
                'pais' => 'required|string',
                'num_exterior' => 'string|max:255',
                'num_interior' => 'string|max:255',
                'colonia' => 'string|max:255',
            ]);
    
            $validateData['estado'] = true;
            
            $sucursal = Sucursal::create($validateData);
            
            return $sucursal;
    
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        }
    }
    public function update(Request $request, $id) {
        try {
            $validateData = $request->validate([
                'nombre' => 'required|string|max:255',
                'codigo' => 'required|numeric',
                'calle' => 'required|string|max:100',
                'localidad' => 'required|string',
                'ciudad' => 'required|string',
                'cod_postal' => 'required|numeric|min:5',
                'referencia' => 'required|string|min:2',
                'municipio' => 'required|string',
                'pais' => 'required|string',
                'num_exterior' => 'string|max:255',
                'num_interior' => 'string|max:255',
                'colonia' => 'string|max:255',
            ]);
        }
        catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        }

        try {
            $sucursal = Sucursal::where('id', $id)->where('estado', true)->firstOrFail();
        } catch (ModelNotFoundException) {
            return response()->json(["error" => "Sucursal con id: $id no existe o fue eliminada."], 404);
        }

        $sucursal->fill($validateData);
        $sucursal->save();
        
        return $sucursal;
    }

    public function destroy($id) {
        try {
            $sucursal = Sucursal::where('id', $id)->where('estado', true)->firstOrFail();
            $sucursal->estado = false;
            $sucursal->save();
            return $sucursal;
        } catch (ModelNotFoundException) {
            return response()->json(["error" => "Sucursal con id: $id no existe o ya fue eliminada."], 404);
        }
    }

}
