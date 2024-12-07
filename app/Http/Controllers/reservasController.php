<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class reservasController extends Controller
{
    public function index(){
        if (!session()->has('user')) {
            return redirect()->route('inicio')->with('error', 'Debe iniciar sesión para acceder a esta página.');
        }
    
        return view("dashboard");
    }
}
