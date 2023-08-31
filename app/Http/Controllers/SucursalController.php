<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sucursal;
class SucursalController extends Controller
{
    public function index() {
        $sucursales = Sucursal::where('estado', 1)->get();
        return $sucursales;
    }
    public function getByID($id) {
        $sucursal = Sucursal::where('id', $id)->where('status', 1)->first();
        if(!$sucursal) {        
            return response()->json(["error"=>"Course not existent or deleted. Verify the sucursal's id."]);
        }
        return $sucursal;
    }
    /* public function create(Request $request) {
        $course = new Sucursal();
        $course->name = $request->name;
        $course->description = $request->description;
        $course->status = 1;
        $course->save();
        
        return $course;
    }
    public function update(Request $request, Sucursal $course) {
        if($request->status == 0) {
            return response()->json(['error'=>'Course not found or deleted. Please, choose another one.']);
        } 
        
        $course->name = $request->name;
        $course->description = $request->description;
        $course->save();
        
        return $course;
    }

    public function delete(Sucursal $course) {
        $course->status = 0;
        $course->save();
        return $course;
    } */

}
