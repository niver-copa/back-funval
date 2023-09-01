<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sucursal;
use Illuminate\Validation\ValidationException;
class SucursalController extends Controller
{
    public function index() {
        $sucursales = Sucursal::where('estado', 1)->get();
        return $sucursales;
    }
    public function show($id) {
        $sucursal = Sucursal::where('id', $id)->where('estado', true)->first();
        if(!$sucursal) {        
            return response()->json(["error"=>"Sucursal not existent or deleted. Verify the sucursal's id."]);
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
                'cod_postal' => 'required|numeric|min:5',
                'referencia' => 'required|string|min:2',
                'municipio' => 'required|string',
                'pais' => 'required|string',
            ]);
            
            $sucursal = new Sucursal();
            $sucursal->nombre = $validateData['nombre'];
            $sucursal->codigo = $validateData['codigo'];
            $sucursal->calle = $validateData['calle'];
            $sucursal->num_exterior = $validateData['num_exterior'];
            $sucursal->num_interior = $validateData['num_interior'];
            $sucursal->localidad = $validateData['localidad'];
            $sucursal->colonia = $validateData['colonia'];
            $sucursal->ciudad = $validateData['ciudad'];
            $sucursal->cod_postal = $validateData['cod_postal'];
            $sucursal->referencia = $validateData['referencia'];
            $sucursal->municipio = $validateData['municipio'];
            $sucursal->pais = $validateData['pais'];
            $sucursal->estado = true;
            $sucursal->save();
            
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
            ]);
        }
        catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        }

        $sucursal = Sucursal::where('id', $id)->where('estado', true)->first();

        $sucursal->nombre = $validateData['nombre'];
        $sucursal->codigo = $validateData['codigo'];
        $sucursal->calle = $validateData['calle'];
        $sucursal->num_exterior = $validateData['num_exterior'];
        $sucursal->num_interior = $validateData['num_interior'];
        $sucursal->localidad = $validateData['localidad'];
        $sucursal->colonia = $validateData['colonia'];
        $sucursal->ciudad = $validateData['ciudad'];
        $sucursal->cod_postal = $validateData['cod_postal'];
        $sucursal->referencia = $validateData['referencia'];
        $sucursal->municipio = $validateData['municipio'];
        $sucursal->pais = $validateData['pais'];
        $sucursal->save();
        
        return $sucursal;
    }

    public function destroy(Sucursal $sucursal) {
        $sucursal->status = false;
        $sucursal->save();
        return $sucursal;
    }

}
