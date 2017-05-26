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
        $datos = Input::all();

     //aqui va los datos del lider
        $member = new Member();

        $member->type = $datos['type'];
        $member->lidnumber = $datos['identification_card'];
        $member->fname = $datos['fname'];
        $member->sname = $datos['sname'];
        $member->birthdate = $datos['birthdate'];
        $member->genre = $datos['genre'];
        $member->province = $datos['province'];
        $member->city = $datos['city'];
        $member->school = $datos['school'];
        $member->Email = $datos['Email'];
        $member->phone = $datos['phone'];
        $member->cellphone = $datos['cellphone'];
        $member->address = $datos['address'];

         // 'aqui va el dato que guardaras ejemplo'
        $member->save();
//aqui lo datos del otro participante
        $member = new Member();

        $member->type = $datos['type']; // 'aqui va el dato que guardaras ejemplo'
        $member->lidnumber = $datos['identification_card'];
        $member->fname = $datos['fname'];
        $member->sname = $datos['sname'];
        $member->birthdate = $datos['birthdate'];
        $member->genre = $datos['genre'];
        $member->province = $datos['province'];
        $member->city = $datos['city'];
        $member->school = $datos['school'];
        $member->Email = $datos['Email'];
        $member->phone = $datos['phone'];
        $member->cellphone = $datos['cellphone'];
        $member->address = $datos['address'];
        $member->save();
    }

}
