<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illluminate\support\facades\DB;
use App\Models\PrestamoEquipo;
use App\Models\DetallePrestamoEquipo;
use Carbon\Carbon;

class PrestamoEquipoController extends Controller
{
    public function post( Request $request){
        try{
            $time = Carbon::now('America/lima');
            DB::beginTransaction();
            $prestamo = new PrestamoEquipo;
            $prestamo -> fechaPrestamo = $time;
            $prestamo -> aprendizId = $request -> aprendizId;
            $prestamo->save();
            $data = $request -> data;
            foreach($data as $pe=>$dell){
                $detalle =new DetallePrestamoEquipo;
                $detalle ->prestamoId = $prestamo->id;
                $detalle ->libroId = $dell['prestamoLibros'];
                $detalle->save();
            }
            DD::commit();
        }
        catch(Exeption $error){
            echo($error);
        }
    }

    public function getAll(){
        $prestamo = PrestamoEquipo::join('aprendiz', 'aprendizId','=', 'aprendiz.id')
        ->select('PrestamoEquipo.id', 'aprendiz.nombre', 'PrestamoEquipo.fechaPrestamo')
        ->get();
        return $prestamo;
    }

    public function getDoc($id){
        $prestamo = PrestamoEquipo::join('aprendiz', 'aprendizId','=', 'aprendiz.id')
        ->select('PrestamoEquipo.id', 'aprendiz.nombre', 'PrestamoEquipo.fechaPrestamo')
        ->where('aprendizId', '=', $id)
        ->get();
        return $prestamo;
    }
}
