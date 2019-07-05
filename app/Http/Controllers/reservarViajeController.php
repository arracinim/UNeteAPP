<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\viajeReservado;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class reservarViajeController extends Controller
{
    //Extraigo todos los viajes de la base de datos y los muestro
    public function index()
    {
        $viajes = DB::select('SELECT * FROM viajes');
        return view('viajes/reserve')->with('viajes',$viajes);
    }

    //guardar el viaje en la base de datos

    public function store(Request $request, $id){

        $viajeSeleccionado = DB::select('SELECT * FROM viajes WHERE id=?',[$id]);
        $request['id_reserva'] = auth::user()->id;  //ID DE LA PERSONA QUE RESERVA
        $request['id_oferta'] = $viajeSeleccionado[0] -> id_estudiante; //ID DE LA PERSONA QUE OFERTA EL VIAJE
        $request['hora_de_salida'] = $viajeSeleccionado[0] -> hora_de_salida;
        $request['origen'] = $viajeSeleccionado[0] -> origen;
        $request['destino'] = $viajeSeleccionado[0] -> destino;
        $request['punto_de_encuentro'] = $viajeSeleccionado[0] -> punto_de_encuentro;
        $request['id_vehiculo'] = $viajeSeleccionado[0] -> id_vehiculo;

        ViajeController::reservarPuesto($id);
        viajeReservado::Create($request->all());

        return redirect() -> route('viajes.reserve')
            -> with('success','Viaje reservado exitosamente');
    }

}