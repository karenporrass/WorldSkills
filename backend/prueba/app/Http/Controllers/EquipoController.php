<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\equipo;

class EquipoController extends Controller
{
    public function post(Request $request){
        $equipo = new equipo;
        $equipo->codigo = $request->codigo;
        $equipo->marca = $request->marca;
        $equipo->serial = $request->serial;
        $equipo->descripcion = $request->descripcion;
        $equipo->save();

    }


    public function get(){
            $todos = equipo::all();
            return $todos;
    }

    public function delete($id){
        $equipo = equipo::find($id);
        $equipo->delete();
    }
}
