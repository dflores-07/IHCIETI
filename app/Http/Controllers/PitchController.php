<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PitchController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function __construct()
    {
       
       /** $this->middleware('auth');*/
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
        return redirect('/cerrar-sesion');
    }

     public function Registro_Pitch()
    {
        return view('Registro_Pitch');
    }


}
