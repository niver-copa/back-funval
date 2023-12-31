<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function show()
    {

        $proveedors = Proveedor::where('state', 1)->get();
        foreach ($proveedors as $proveedor) {
            $proveedor->persona;
        }
        return $proveedors;
    }

    public function getById($id)
    {
        $proveedor = Proveedor::find($id);
        $proveedor->Persona;

        return $proveedor;
    }

    public function new(Request $datosPost)
    {
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

        $nuevo = new Proveedor();
        $persona_id = $nuevaPersona->id;
        $nuevo->persona_id = $persona_id;
        $nuevo->nombre_empresa = $datosPost->nombre_empresa;
        $nuevo->telefono_empresa = $datosPost->telefono_empresa;
        $nuevo->email_empresa = $datosPost->email_empresa;
        $nuevo->direccion_empresa = $datosPost->direccion_empresa;
        $nuevo->save();
        return  redirect("http://localhost:5175/registros");
    }

    public function update(Request $request, int $id)
    {
        $proveedor = Proveedor::find($id);
        if ($proveedor) {
            $proveedor->persona_id = $request->persona_id;
            $proveedor->nombre_empresa = $request->nombre_empresa;
            $proveedor->telefono_empresa = $request->telefono_empresa;
            $proveedor->email_empresa = $request->email_empresa;
            $proveedor->direccion_empresa = $request->direccion_empresa;
            $proveedor->save();

            return "Proveedor modificado !! ";
        } else {
            return response()->json([
                'message' => 'No records found'
            ], 200);
        }
    }

    public function delete(int $id)
    {
        $proveedor = Proveedor::find($id);
        if ($proveedor) {
            $proveedor->activo = 0;
            $proveedor->save();

            return "Proveedor borrado !! ";
        } else {
            return response()->json([
                'message' => 'No records found'
            ], 200);
        }
    }
}
