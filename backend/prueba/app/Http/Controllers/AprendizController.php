<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\aprendiz;

class AprendizController extends Controller
{
    public function post(Request $request){
        $aprendi = new aprendiz;
        $aprendi->nombre = $request->nombre;
        $aprendi->apellido = $request->apellido;
        $aprendi->documento = $request->documento;
        $aprendi->telefono = $request->telefono;
        $aprendi->email = $request->email;
        $aprendi->save();
    }
    public function get(){
            $todos = aprendiz::where('estado', '1')->get();
            return $todos;
    }
    public function delete($id){
        $aprendi = aprendiz::find($id);
        $aprendi->delete();
    }
}
