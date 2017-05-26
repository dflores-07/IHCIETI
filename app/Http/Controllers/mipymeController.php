<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class mipymeController extends Controller
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

     public function create()
    {
        return view('create_mipymes');
    }


    public function store()
    {
        $datos = Input::all('type', 'lidnumber', 'fname', 'sname', 'birthdate','genre', 'province', 'city', 'school', 'Email', 'phone', 'cellphone', 'address');

     //aqui va los datos del lider
        $member = new Member();

        $member->type = $member['type']; // 'aqui va el dato que guardaras ejemplo'
        $member->save();
//aqui lo datos del otro participante
        $member = new Member('type', 'lidnumber', 'fname', 'sname', 'birthdate','genre', 'province', 'city', 'school', 'Email', 'phone', 'cellphone', 'address');

        $member->type = $member['type']; // 'aqui va el dato que guardaras ejemplo'
        $member->save();
    }

}
