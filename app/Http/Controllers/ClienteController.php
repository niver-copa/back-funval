<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Exception;
use Illuminate\Http\Request;

class ClienteController extends Controller
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
            $nuevaPersona = new Cliente();
            
            if($body->referencias){
                if(is_string($body->referencias)){
                    $nuevaPersona ->referencias = $body->referencias;
                    return "Referencias actualizadas correctamente";
                }else{
                    return "Las referencias deben ser una cadena de texto";
                }
                
            }
            if($body->historial_de_compras){
                if(is_string($body->historial_de_compras)){
                    $nuevaPersona ->historial_de_compras = $body->historial_de_compras;
                    return "Historial de compras actualizadas correctamente";
                }else{
                    return "El Historial de compras debe ser una cadena de texto";
                }
            }
            if($body->Nivel_de_satisfacción){
                if(is_string($body->Nivel_de_satisfacción)){
                    $nuevaPersona ->Nivel_de_satisfacción = $body->Nivel_de_satisfacción;
                    return "Nivel de satisfacción actualizadas correctamente";
                }else{
                    return "El Nivel de satisfacción debe ser una cadena de texto";
                }
                
            }
            if($body->Comentarios_observaciones){
                $nuevaPersona ->Comentarios_observaciones = $body->Comentarios_observaciones;
            }
            if($body->Comentarios_observaciones){
                if(is_string($body->Comentarios_observaciones)){
                    $nuevaPersona ->Comentarios_observaciones = $body->Comentarios_observaciones;
                    return "Comentarios u observaciones actualizados correctamente";
                }else{
                    return "Comentarios u observaciones debe ser una cadena de texto";
                }
                
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
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $clientes)
    {
        $clientes = Cliente::all();
        
        return $clientes;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $clientes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $id)
    {
        try {
            if(Cliente::find($id) != null){

                $edita = Cliente::find($id);
                if($request->referencias){
                    if(is_string($request->Nivel_de_satisfacción)){
                        $edita ->referencias = $request->referencias;
                        return "Referencias actualizadas correctamente";
                    }else{
                        return "Las referencias deben ser una cadena de texto";
                    }
                    
                }
                if($request->historial_de_compras){
                    if(is_string($request->historial_de_compras)){
                        $edita ->historial_de_compras = $request->historial_de_compras;
                        return "Historial de compras actualizadas correctamente";
                    }else{
                        return "El Historial de compras debe ser una cadena de texto";
                    }
                }
                if($request->nivel_de_satisfacción){
                    if(is_string($request->nivel_de_satisfacción)){
                        $edita ->nivel_de_satisfacción = $request->nivel_de_satisfacción;
                        return "Nivel de satisfacción actualizadas correctamente";
                    }else{
                        return "El Nivel de satisfacción debe ser una cadena de texto";
                    }
                    
                }
                if($request->comentarios_observaciones){
                    if(is_string($request->comentarios_observaciones)){
                        $edita ->comentarios_observaciones = $request->comentarios_observaciones;
                        return "Comentarios u observaciones actualizados correctamente";
                    }else{
                        return "Comentarios u observaciones debe ser una cadena de texto";
                    }
                    
                }
                if($request->state){
                    if (strlen($request->referencias) == 1) {
                        if($request->state != 0 || $request->state != 1){
                            return "Recuerda que solo puede ser 0 o 1. Donde 0 es desactivado y 1 activado";
                        }else{
                            $edita ->state = $request->state;    
                        }
                    } else {
                        return  'El estado debe tener 1 carácter';
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
     * @param  \App\Models\Clientes  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $clientes)
    {
        $borra = Cliente::find($clientes->id);
        $borra->state=0;

        $borra->save();
    }
}
