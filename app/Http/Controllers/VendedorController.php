<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Vendedor;
use Exception;
use Illuminate\Http\Request;

class VendedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendedors = Vendedor::where('state', 1)->get();
        foreach($vendedors as $vendedor){
            $vendedor->persona;
        }
        return $vendedors; 
    }

    public function getById($id)
    {
        if (Vendedor::find($id) == null) {
            return "No existe un vendedor con el id N° " . $id;
        }
        if (Vendedor::find($id)->state == 0) {
            return "El Vendedor N° " . $id . " esta desactivado.";
        }
        $vendedor = Vendedor::find($id);
        $vendedor->Persona;

        return $vendedor;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $datosPost)
    {
        /* $datosPost->validate([
            'persona_id' => ['required', 'string'],
        ]); */

        $nuevaPersona = new Persona();

        $nuevaPersona->nombre = $datosPost->nombre;
        $nuevaPersona->apellidos = $datosPost->apellidos;
        $nuevaPersona->telefono = $datosPost->telefono;
        $nuevaPersona->sexo = $datosPost->sexo;
        $nuevaPersona->fecha_nacimiento = $datosPost->fecha_nacimiento;
        $nuevaPersona->documento_identificacion = $datosPost->documento_identificacion;
        $nuevaPersona->direccion = $datosPost->direccion;
        $nuevaPersona->codigo_postal = $datosPost->codigo_postal;
        $nuevaPersona->pais = $datosPost->pais;
        $nuevaPersona->state = "1";

        $nuevaPersona->save();
            
        $nuevo = new Vendedor();
        $persona_id = $nuevaPersona->id;
        $nuevo->persona_id=$persona_id;        
        $nuevo->nombre_empresa = $datosPost->nombre_empresa;
        $nuevo->telefono_empresa = $datosPost->telefono_empresa;
        $nuevo->direccion_empresa = $datosPost->direccion_empresa;
        $nuevo->save();

        return "El Vendedor se registro exitosamente";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vendedor  $vendedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'persona_id' => ['required', 'string'],
            'state' => ['required', 'string', 'max:1'],
        ]);

        if (Vendedor::find($id) != null) {
            $actualizarVendedor = Vendedor::find($id);

            $actualizarVendedor->persona_id = $request->persona_id;
            $actualizarVendedor->nombre_empresa = $request->nombre_empresa;
            $actualizarVendedor->telefono_empresa = $request->telefono_empresa;
            $actualizarVendedor->direccion_empresa = $request->direccion_empresa;

            if ($request->state == 1 || $request->state == 0) {
                $actualizarVendedor->state = $request->state;
            } else {
                return "'state' solo acepta los valores 0 o 1.\n 'state' sin modificaciones.\n";
            }


            $actualizarVendedor->save();
            return "Registro " . $id . " se ha actualizado.";
        } else {
            return "No existe un registro con ese id.";
        }
    }

    /**
     * Remove the specified resource from storage ..
     *
     * @param  \App\Models\Vendedor  $vendedor
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $num = $id;
        $borrarVendedor = Vendedor::find($id);
        if ($borrarVendedor == null) {
            return "No existe el Vendedor N° " . $num . ".";
        }
        $borrarVendedor->state = 0;
        $borrarVendedor->save();
        return "El Vendedor N° " . $num . " ha sido eliminado.";
    }
}
