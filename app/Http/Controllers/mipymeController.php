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

        $member->type = $member['type'];
        $member->lidnumber = $member['lidnumber'];
        $member->fname = $member['fname'];
        $member->sname = $member['sname'];
        $member->birthdate = $member['birthdate'];
        $member->genre = $member['genre'];
        $member->province = $member['province'];
        $member->city = $member['city'];
        $member->school = $member['school'];
        $member->Email = $member['Email'];
        $member->phone = $member['phone'];
        $member->cellphone = $member['cellphone'];
        $member->address = $member['address'];

         // 'aqui va el dato que guardaras ejemplo'
        $member->save();
//aqui lo datos del otro participante
        $member = new Member();

        $member->type = $member['type']; // 'aqui va el dato que guardaras ejemplo'
        $member->type = $member['type'];
        $member->lidnumber = $member['lidnumber'];
        $member->fname = $member['fname'];
        $member->sname = $member['sname'];
        $member->birthdate = $member['birthdate'];
        $member->genre = $member['genre'];
        $member->province = $member['province'];
        $member->city = $member['city'];
        $member->school = $member['school'];
        $member->Email = $member['Email'];
        $member->phone = $member['phone'];
        $member->cellphone = $member['cellphone'];
        $member->address = $member['address'];
        $member->save();
    }

}
