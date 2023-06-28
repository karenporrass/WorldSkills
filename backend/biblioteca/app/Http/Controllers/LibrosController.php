<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\libros;

class LibrosController extends Controller
{
    public function post(Request $request)
    {
        $libro = new libros;
        $libro -> nombre = $request->nombre;
        $libro -> editorial = $request->editorial;
        $libro -> isbn = $request->isbn;
        $libro->save();
    }
    public function put(Request $request, $id)
    {
        $libro = libros::find($id);
        $libro -> nombre = $request->nombre;
        $libro -> editorial = $request->editorial;
        $libro -> isbn = $request->isbn;
        $libro->save();
    }
    public function delete($id)
    {
        $libro = libros::find($id);
        $libro->delete();
    }

    public function get()
    {
        $libro = libros::all();
        return $libro;
    }
    public function getSelect($isbn)
    {
        $libro = libros::where('isbn','=', $isbn)-> get();
        return $libro;
    }


}
