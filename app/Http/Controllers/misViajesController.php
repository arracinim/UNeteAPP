<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\viajeReservado;
use App\Viaje;

class misViajesController extends Controller
{

    public function view(){

        $id = auth()->user()->id;
        $viajesReservados = viajeReservado::where('id_reserva', $id)->get();
        $viajesOfertados = Viaje::where('id_estudiante', $id)->get();

        return view('viajes/misViajes')-> with('viajesReservados',$viajesReservados)
            ->with('viajesOfertados',$viajesOfertados);
    }

    public function deleteOfer($id){

        DB::delete("DELETE FROM viajereservado WHERE id_oferta=?",[$id]);

        $viaje = Viaje::find($id);
        $viaje->delete();
        return redirect()->route('viajes.misviajes')
            ->with('success','VIAJE ELIMINADO EXITOSAMENTE');

    }

    public function deleteReserve($id){

        $ViajeReser = viajeReservado::find($id );

        $viaje = Viaje::find($ViajeReser->id_viaje);
        $viaje['puestos_disponibles'] = $viaje['puestos_disponibles'] + 1;
        $viaje->save();

        $ViajeReser->delete();
        return redirect()->route('viajes.misviajes')
            ->with('success','RESERVA CANCELADA EXITOSAMENTE');

    }


}
