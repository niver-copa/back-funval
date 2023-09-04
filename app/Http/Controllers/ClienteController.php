<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Persona;
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

            $nuevaPersona = new Persona();

            $nuevaPersona->nombre = $body->nombre;
            $nuevaPersona->apellidos = $body->apellidos;
            $nuevaPersona->telefono = $body->telefono;
            $nuevaPersona->sexo = $body->sexo;
            $nuevaPersona->fecha_nacimiento = $body->fecha_nacimiento;
            $nuevaPersona->documento_identificacion = $body->documento_identificacion;
            $nuevaPersona->direccion = $body->direccion;
            $nuevaPersona->codigo_postal = $body->codigo_postal;
            $nuevaPersona->pais = $body->pais;
            $nuevaPersona->state = $body->state;
    
            $nuevaPersona->save();
            
            $nuevaCliente = new Cliente();

            $persona_id = $nuevaPersona->id;
            $nuevaCliente->persona_id=$persona_id;
            
            
            if($body->referencias){
                if(is_string($body->referencias)){
                    $nuevaCliente ->referencias = $body->referencias;
                    
                }else{
                    return "Las referencias deben ser una cadena de texto";
                }
                
            }
            if($body->historial_de_compras){
                if(is_string($body->historial_de_compras)){
                    $nuevaCliente ->historial_de_compras = $body->historial_de_compras;
                    
                }else{
                    return "El Historial de compras debe ser una cadena de texto";
                }
            }
            if($body->nivel_de_satisfaccion){
                if(is_string($body->nivel_de_satisfaccion)){
                    $nuevaCliente ->nivel_de_satisfaccion = $body->nivel_de_satisfaccion;
                    
                }else{
                    return "El Nivel de satisfacción debe ser una cadena de texto";
                }
                
            }
            if($body->comentarios_observaciones){
                if(is_string($body->comentarios_observaciones)){
                    $nuevaCliente ->comentarios_observaciones = $body->comentarios_observaciones;
                    
                }else{
                    return "Comentarios u observaciones debe ser una cadena de texto";
                }
                
            }
            $nuevaCliente->save();
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
