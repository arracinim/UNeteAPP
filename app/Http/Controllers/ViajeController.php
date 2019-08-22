<?php

namespace App\Http\Controllers;

use App\Viaje;
use Carbon\Carbon;
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
            'required'=>'verifique que todos los campos hayan sido diligenciados correctamente',
            'min'=>'No puede crear viajes con menos de 1 puesto',
            'max'=>'No puede crear viajes con mas de los puestos disponibles en su vehiculo'
        ]);


        $vehiculo_seleccionado=DB::select('SELECT id, puestos FROM vehiculos WHERE placa=?',[$request->vehiculo]);
        $request['id_vehiculo'] = $vehiculo_seleccionado[0]->id;
        $request['id_estudiante'] = auth()->user()->id;

        $request->validate([
            'hora_de_salida' => 'required|date|after:'.Carbon::now('America/Bogota')->addHour(),
            'punto_de_encuentro' => 'required|string',
            'puestos_disponibles' => 'required|integer|min:1|max:'.$vehiculo_seleccionado[0]->puestos,
            'origen'  => ['regex:/^(minas)$|^(volador)$|^(ingeominas)$|^(mecanica)$|^(audi)$/i','required','string'],
            'destino' => ['regex:/^(minas)$|^(volador)$|^(ingeominas)$|^(mecanica)$|^(audi)$/i','required','string'],
            'vehiculo' => 'required|string',
        ],$message);


        Viaje::Create($request->all());

        return redirect() -> route('viajes.register')
            -> with('success','Viaje publicado');
    }
    public static function reservarPuesto(int $id)
    {
        $viaje = Viaje::find($id);
        $viaje['puestos_disponibles'] = $viaje['puestos_disponibles']-1 ;
        $viaje->save();



    }
}
