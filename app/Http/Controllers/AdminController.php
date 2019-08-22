<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function admin()
    {
        $usuarios = User::where('type','<>','admin')->paginate(5);;

        return view('admin.showUsers', compact('usuarios'))->
        with('i',(request()->input('page',1)-1)*5);
    }
}
