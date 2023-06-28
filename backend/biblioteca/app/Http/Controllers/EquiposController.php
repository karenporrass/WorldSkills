<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\equipos;
class EquiposController extends Controller
{
    public function post(Request $request)
    {
        $equipo = new equipos;
        $equipo->codigo = $request->codigo;
        $equipo->marca = $request->marca;
        $equipo->serial = $request->serial;
        $equipo->descripcion = $request->descripcion;
        $equipo->save();
    }    

    public function put(Request $request, $id)
    {
        $equipo = equipos::find($id);
        $equipo->codigo = $request->codigo;
        $equipo->marca = $request->marca;
        $equipo->serial = $request->serial;
        $equipo->descripcion = $request->descripcion;
        $equipo->save();
    }  
    
    public function delete($id)
    {
        $equipo = equipos::find($id);
        $equipo->delete();
    } 

    public function get()
    {
        $equipo = equipos::all();
        return $equipo;
    } 
}
