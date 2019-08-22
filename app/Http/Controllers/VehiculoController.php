<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Vehiculo;
use phpDocumentor\Reflection\Types\Integer;


class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehiculos = Vehiculo::where('id_estud','=',auth()->user()->id)->paginate(5);

        return view('vehiculos.index', compact('vehiculos'))->
        with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehiculos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message=([
        'placa.unique' => 'Este vehiculo ya ha sido registrado',
        'required'=>'verifique que todos los campos hayan sido diligenciados correctamente'
    ]);
        $request->validate([
            'placa' => ['regex:/(^([A-Z]{3}-\d{3})$)|(^([A-Z]{3}-\d{2}[A-Z]{1})$)/','required','unique:vehiculos','string','max:7'],
            'color' => 'required|string',
            'marca' => ['regex:/^(chevrolet)$|^(hyundai)$|^(ferrari)$|^(porsche)$|^(audi)$/i','required','string'],
            'tipo'  => ['regex:/^(moto)$|^(carro)$/i','required','string'],
            'puestos' => 'integer|min:1',
        ],$message);

        $request['id_estud'] = auth()->user()->id;
        Vehiculo::Create($request->all());

        return redirect() -> route('vehiculos.index')
            -> with('success','Vehiculo registrado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  Vehiculo $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $vehiculo = Vehiculo::find($id);
        //Se agregaria condición para ver si trajo o no datos
        return view ('vehiculos.show', compact('vehiculo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Vehiculo $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $vehiculo = Vehiculo::find($id);
        return view('vehiculos.edit',compact('vehiculo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'color' => 'required|string',
            'marca' => ['regex:/^(chevrolet)$|^(hyundai)$|^(ferrari)$|^(porsche)$|^(audi)$/i','required','string'],
            'tipo'  => ['regex:/^(moto)$|^(carro)$/i','required','string'],
            'puestos' => 'integer|min:1'
        ]);

        $vehiculo = Vehiculo::find($id);
        $request['placa'] = $vehiculo -> placa;
        $vehiculo->update($request->all());

        return redirect() -> route('vehiculos.index')
            -> with('success','Vehiculo actualizado exitosamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehiculo $vehiculo)
    {

        $vehiculo->delete();

        return redirect()->route('vehiculos.index')
            ->with('succes','vehiculo eliminado satisfactoriamente');
    }

}
