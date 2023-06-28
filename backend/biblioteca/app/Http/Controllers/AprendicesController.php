<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\aprendices;
class AprendicesController extends Controller
{
    public function post(Request $request)
{
    $aprendiz = new aprendices;
    $aprendiz->nombre = $request->nombre;
    $aprendiz->apellidos = $request->apellidos;
    $aprendiz->documento = $request->documento;
    $aprendiz->telefono = $request->telefono;
    $aprendiz->email = $request->email;
    $aprendiz->save();
}

public function put(Request $request, $id)
{
    $aprendiz = aprendices::find($id);
    $aprendiz->nombre = $request->nombre;
    $aprendiz->apellidos = $request->apellidos;
    $aprendiz->documento = $request->documento;
    $aprendiz->telefono = $request->telefono;
    $aprendiz->email = $request->email;
    $aprendiz->save();
}

public function delete($id)
{
    $aprendiz = aprendices::find($id);
    $aprendiz->delete();
}

public function get()
{
    $aprendiz = aprendices::all();
    return $aprendiz;
}

public function getSelect($documento){
    $aprendiz = aprendices::where('documento','=',$documento)->get();
    return $aprendiz;
}
}
