<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Exception;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $body)
    {
        try {
            $nuevaPersona = new Clientes();
            if($body->referencias){
                $nuevaPersona ->referencias = $body->referencias;
            }
            if($body->historial_de_compras){
                $nuevaPersona ->historial_de_compras = $body->historial_de_compras;
            }
            if($body->Nivel_de_satisfacción){
                $nuevaPersona ->Nivel_de_satisfacción = $body->Nivel_de_satisfacción;
            }
            if($body->Comentarios_observaciones){
                $nuevaPersona ->Comentarios_observaciones = $body->Comentarios_observacionesx;
            }
        
            $nuevaPersona->save();
            return "El Cleinte fue agregado correctamente";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function show(Clientes $clientes)
    {
        $clientes = Clientes::all();
        
        return $clientes;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function edit(Clientes $clientes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clientes $id)
    {
        try {
            if(Clientes::find($id) != null){

                $edita = Clientes::find($id);
                if($request->referencias){
                    $edita ->referencias = $request->referencias;
                }
                if($request->historial_de_compras){
                    $edita ->historial_de_compras = $request->historial_de_compras;
                }
                if($request->Nivel_de_satisfacción){
                    $edita ->Nivel_de_satisfacción = $request->Nivel_de_satisfacción;
                }
                if($request->Comentarios_observaciones){
                    $edita ->Comentarios_observaciones = $request->Comentarios_observacionesx;
                }
                if($request->state){
                    if($request->state != 0 || $request->state != 1){
                        return "Recuerda que solo puede ser 0 o 1. Donde 0 es desactivado y 1 activado";
                    }else{
                        $edita ->state = $request->state;    
                    }
                }
            
                $edita->save();
            }

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clientes $clientes)
    {
        $borra = Clientes::find($clientes->id);
        $borra->state=0;

        $borra->save();
    }
}
