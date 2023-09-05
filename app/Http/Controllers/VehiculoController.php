<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehiculo = vehiculo::where('status', 1)->get();
        $vehiculo->load('modelo.marca');
        $vehiculo->load('combustible');
        $vehiculo->load('delantera_suspension');
        $vehiculo->load('trasera_suspension');
        $vehiculo->load('sucursal');
        return $vehiculo;
    }

    
    public function show($id)
    {

        $validator = validator(['id' => $id], [
            'id' => 'required|numeric'
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            $vehiculo = vehiculo::findOrFail($id);
            $vehiculo->load('modelo.marca');
            $vehiculo->load('combustible');
            $vehiculo->load('delantera_suspension');
            $vehiculo->load('trasera_suspension');
            $vehiculo->load('sucursal');

            return $vehiculo;
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'El vehiculo ' . $id . ' no existe no fue encontrado'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error en la acción realizada'], 500);
        }

    }

    
    public function create(Request $request)
    {

       
        try {

            $validator = validator($request->all(), [
                'modelo_id'=> 'required|exists:modelos,id',
                'combustible_id'=> 'required|numeric',
                'potencia'=> 'required|numeric',
                'torque_maximo'=> 'required|numeric',
                'precio'=> 'required|numeric',
                'ubicacion'=> 'required',
                'cilindros'=> 'required',
                'matricula'=> 'required',
                'diametro_carrera'=> 'required',
                'cilindraje'=>'required',
                'compresion'=> 'required|numeric',
                'alimentacion'=> 'required',
                'caja_id'=> 'required|exists:cajas,id',
                'velocidades'=> 'required',
                'traccion'=> 'required',
                'delantera_suspension_id'=> 'required|exists:suspensiones,id',
                'trasera_suspension_id'=> 'required|exists:suspensiones,id',
                'frenos_delanteros'=> 'required',
                'color'=> 'required',
                'anio'=> 'required|numeric',
                'descripcion'=> 'required',
                'sucursal_id'=> 'required|exists:sucursales,id',
            ]);
    
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            
            vehiculo::create($request->all());
           
            return response()->json(['msj' => 'Vehiculo creado correctamente'], 200);
        
        } catch (QueryException $e) {
            $errormsj = $e->getMessage();
        
            if (strpos($errormsj, 'Duplicate entry') !== false) {
                preg_match("/Duplicate entry '(.*?)' for key '(.*?)'/", $errormsj, $matches);
                $duplicateValue = $matches[1] ?? '';
                $duplicateKey = $matches[2] ?? '';
        
                return response()->json(['error' => "No se puede realizar la acción, el valor '$duplicateValue' ya está duplicado en el campo '$duplicateKey'"], 422);
            }
            return response()->json(['error' => 'Error en la acción realizada: ' . $errormsj], 500);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'No se pudo registrar el vehiculo'.$e->getMessage()], 404);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error en la accion realizada' . $e->getMessage()], 500);
        }
    }

    public function update($id,Request $request)
    {
        
        try {
            $validator = validator($request->all(), [
                'modelo_id'=> 'required|exists:modelos,id',
                'combustible_id'=> 'required|numeric',
                'potencia'=> 'required|numeric',
                'torque_maximo'=> 'required|numeric',
                'precio'=> 'required|numeric',
                'ubicacion'=> 'required',
                'matricula'=> 'required',
                'cilindros'=> 'required',
                'diametro_carrera'=> 'required',
                'cilindraje'=>'required',
                'compresion'=> 'required|numeric',
                'alimentacion'=> 'required',
                'caja_id'=> 'required|exists:cajas,id',
                'velocidades'=> 'required',
                'traccion'=> 'required',
                'delantera_suspension_id'=> 'required|exists:suspensiones,id',
                'trasera_suspension_id'=> 'required|exists:suspensiones,id',
                'frenos_delanteros'=> 'required',
                'color'=> 'required',
                'anio'=> 'required|numeric',
                'sucursal_id'=> 'required|exists:sucursales,id',
                'status' => 'required'
            ]);
    
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $vehiculo = vehiculo::findOrFail($id);
            $vehiculo->update($request->all());
            $vehiculo->status = $request->status;
            $vehiculo->save();

           

            return response()->json(['msj' => 'vehiculo actualizado correctamente'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'El vehiculo ' . $id . ' no existe no fue encontrado'], 404);
        } catch (QueryException  $e) {
            $errormsj = $e->getMessage();

            if (strpos($errormsj, 'Duplicate entry') !== false) {
                preg_match("/Duplicate entry '(.*?)' for key/", $errormsj, $matches);
                $duplicateValue = $matches[1] ?? 'Tienes un valor que';

                return response()->json(['error' => 'Error: ' . $duplicateValue . ' ya esta en uso'], 422);
            }

            return response()->json(['error' => 'Error en la acción realizada'.$errormsj], 500);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error en la acción realizada'], 500);
        }
    }

    public function destroy($id)
    {
        $validator = validator(['id' => $id], [
            'id' => 'required|numeric'
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            $vehiculo = vehiculo::findOrFail($id);
            if ($vehiculo->status) {
                $vehiculo->status = 0;
                $vehiculo->save();
                return response()->json(['msj' => 'Vehiculo eliminado correctamente'], 200);
            }
            return response()->json(['msj' => 'Este Vehiculo ya ha sido eliminado'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'El Vehiculo ' . $id . ' no existe no fue encontrado'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error en la acción realizada'], 500);
        }
    }
}
