<?php

namespace App\Http\Controllers;

use App\User;
use DB;
use Illuminate\Http\Request;

class ModificarPerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit()
    {
        $user = User::find(auth()->user()->id);
        return view('users.editPerfil',compact('user'));
    }

    public function update(Request $request)
    {
        $message=([
            'required'=>'verifique que todos los campos hayan sido diligenciados correctamente'
        ]);

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'cedula' => 'required|integer|min:0',
            'password'  => 'required|string|min:8',
        ],$message);

        $user = User::find(auth()->user()->id);
        $user->update($request->all());

        return redirect() -> route('home')
            -> with('success','Perfil actualizado exitosamente');
    }

    public function AdminEdit(int $id)
    {
        $usuario = User::find($id);
        return view('admin.editUsers',compact('usuario'));
    }

    public function AdminUpdate(Request $request, int $id)
    {
        $message=([
            'required'=>'verifique que todos los campos hayan sido diligenciados correctamente'
        ]);

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'cedula' => 'required|integer|min:0',
            'password'  => 'required|string|min:8',
        ],$message);

        $user = User::find($id);
        $user->update($request->all());

        return redirect() -> route('admin.showUsers')
            -> with('success','Perfil actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete("DELETE FROM viajeReservado WHERE id_oferta=?",[$id]);
        DB::delete('DELETE FROM viajes WHERE id_estudiante=?',[$id]);
        DB::delete('DELETE FROM vehiculos WHERE id_estud=?',[$id]);
        DB::delete('DELETE FROM users WHERE id=?',[$id]);

        return redirect() -> route('admin.showUsers')
            -> with('success','Usuario eliminado satisfactoriamente');
    }
}
