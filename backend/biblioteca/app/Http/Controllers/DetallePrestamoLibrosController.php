<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetallePrestamoLibros;
use Carbon\Carbon;

class DetallePrestamoLibrosController extends Controller
{
    public function get($id){
        $detalles = DetallePrestamoLibros::join('libros','libro_id', '=', 'libros.id')
        ->select('detalle_prestamo_libros.id','libros.nombre','libros.editorial','detalle_prestamo_libros.fechaDevolucion')
        ->where('prestamo_id','=',$id)->get();
        return $detalles;
    }
    
    public function put($id)
    {
        $data = Carbon::now('America/lima');
        $equipo = DetallePrestamoLibros::find($id);
        $equipo->fechaDevolucion = $data;
        $equipo->save();
    }  


}
