<?php

namespace App\Http\Controllers;

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
        return Vendedor::where('state', '=', 1)->get();
    }

    public function getById($id)
    {
        if (Vendedor::find($id) == null) {
            return "No existe un vendedor con el id N° " . $id;
        }
        if (Vendedor::find($id)->state == 0) {
            return "El Vendedor N° " . $id . " esta desactivado.";
        }
        return Vendedor::find($id);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'persona_id' => ['required', 'string'],
        ]);

        $nuevoVendedor = new Vendedor();
        $nuevoVendedor->persona_id = $request->persona_id;
        $nuevoVendedor->state = 1;
        $nuevoVendedor->save();
        return "Vendedor Registrado Correctamente.";
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
