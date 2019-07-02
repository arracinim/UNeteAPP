<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViajeController extends Controller
{
    public function index()
    {
        $vehiculos=null;
        return view('viajes/register',$vehiculos);
    }
}
