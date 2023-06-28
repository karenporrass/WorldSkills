<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\libro;

class LibroController extends Controller
{
    public function post(Request $request){
        $libros = new libro;
        $libros->nombre = $request->nombre;
        $libros->editorial = $request->editorial;
        $libros->isbn = $request->isbn;
        $libros->save();
    }
    public function get(){
            $todos = libro::all();
            return $todos;
    }
    public function delete($id){
        $libros = libro::find($id);
        $libros->delete();
    }
}
