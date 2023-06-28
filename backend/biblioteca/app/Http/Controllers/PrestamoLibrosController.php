<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Prestamolibro;
use App\Models\DetallePrestamoLibros;
use Carbon\Carbon;

class PrestamoLibrosController extends Controller
{
    public function post(Request $request){
        try{
            $mytime= Carbon::now('America/Lima');
            DB::beginTransaction();
            $libro = new PrestamoLibro;
            $libro -> fechaPrestamo = $mytime;
            $libro -> aprendizId = $request-> aprendizId;
            $libro->save();
            $data = $request -> data;
            foreach($data as $ep=>$det){
                $detalle = new DetallePrestamoLIbros;
                $detalle -> prestamo_id = $libro->id;
                $detalle -> libro_id = $det['prestamoLibros'];
                $detalle->save();
            }
            DB::commit();
        }
        catch(Exeption $error){
           echo($error);
        }
    }

    public function get(){
        $prestamo = PrestamoLibro::join('aprendices','aprendizId', '=', 'aprendices.id')
        ->select('prestamo_libros.id','aprendices.nombre','prestamo_libros.fechaPrestamo')
        ->get();
        return $prestamo;
    }

    public function getDocument($id){
        $presta = PrestamoLibro::join('aprendices','aprendizId', '=', 'aprendices.id')
        ->select('prestamo_libros.id','aprendices.nombre','prestamo_libros.fechaPrestamo')
        ->where('aprendizId','=',$id)->get();
        return $presta;
    }
}
