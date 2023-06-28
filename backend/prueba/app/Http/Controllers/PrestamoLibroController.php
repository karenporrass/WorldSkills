<?php

namespace App\Http\Controllers;
use Illluminate\support\facades\DB;
use Illuminate\Http\Request;
use App\Models\Prestamolibro;
use App\Models\DetallePrestamolibro;
use Carbon\Carbon;

class PrestamoLibroController extends Controller
{
    public function post( Request $request){

        try{
            $time = Carbon::now('America/lima');
            DB::beginTransaction();
            $prestamo = new PrestamoLibro;
            $prestamo -> fechaPrestamo = $time;
            $prestamo -> aprendizId = $request -> aprendizId;
            $prestamo->save();
            $data = $request -> data;
            foreach($data as $pe=>$dell){
                $detalle =new DetallePrestamoLibro;
                $detalle ->prestamoId = $prestamo->id;
                $detalle ->equipoId = $dell['prestamoLibros'];
                $detalle->save();
            }
            DD::commit();
        }
        catch(Exeption $error){
            echo($error);
        }
    }
    public function getAll(){
        $prestamo = PrestamoLibro::join('aprendiz', 'aprendizId','=', 'aprendiz.id')
        ->select('PrestamoLibro.id', 'aprendiz.nombre', 'PrestamoLibro.fechaPrestamo')
        ->get();
        return $prestamo;
    }

    public function getDoc($id){
        $prestamo = PrestamoLibro::join('aprendiz', 'aprendizId','=', 'aprendiz.id')
        ->select('PrestamoLibro.id', 'aprendiz.nombre', 'PrestamoLibro.fechaPrestamo')
        ->where('aprendizId', '=', $id)
        ->get();
        return $prestamo;
    }
}
