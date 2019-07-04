<?php

namespace App\Http\Controllers;

use App\Viaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViajeController extends Controller
{
    public function index()
    {
        $vehiculos=DB::select('SELECT placa FROM vehiculos WHERE id_estud=?',[auth()->user()->id]);
            //DB::table('vehiculos')->select('placa')->where('cedula',auth()->user()->cedula);
        return view('viajes/register')->with('vehiculos',$vehiculos);
    }

    public function store(Request $request)
    {

        $message=([
            'required'=>'verifique que todos los campos hayan sido diligenciados correctamente'
        ]);
        $request->validate([
            'hora_de_salida' => 'required|date',
            'punto_de_encuentro' => 'required|string',
            'puestos_disponibles' => 'required|integer',
            'origen'  => 'required|string',
            'destino' => 'required|string',
            'vehiculo' => 'required|string',
        ],$message);

        $vehiculo_seleccionado=DB::select('SELECT id FROM vehiculos WHERE placa=?',[$request->vehiculo]);
        $request['id_vehiculo'] = $vehiculo_seleccionado[0]->id;
        $request['id_estudiante'] = auth()->user()->id;
        Viaje::Create($request->all());

        return redirect() -> route('viajes.register')
            -> with('success','Viaje publicado');
    }
}
