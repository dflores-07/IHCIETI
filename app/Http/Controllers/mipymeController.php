<?php

namespace App\Http\Controllers;

use App\Member;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
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

     public function createLeader()
    {
        return view('members.create_leader');
    }


    public function store(Request $request)
    {
        $datos = Input::all();
        //aqui va los datos del lider
        $member = new Member();
        //Comprobamos que venimos del formulario de miembros
        if(!key_exists('token',$datos)):
            $datos['token']   = Crypt::encryptString($datos['idnumber']);
        endif;
        $datos['type']='leader';
        if($member->isValid($datos)):
            $member->fill($datos);
            $member->save();

            if($datos['acount']>0):
                // regresamos a la vista de nuevo miembros si se debe agregar mas
                $datos['acount']=$datos['acount'] -1;
                if($datos['acount'] <= 0):
                $datos['acount'] = 0;
                endif;
                return redirect()->route('createMembers',[$member->token,$datos['acount']]);
            else:
                return redirect()->route('createProject',$member->token);
            endif;
        endif;
        return redirect()->to($this->getRedirectUrl())->withInput($request->all())
            ->withErrors($member->errors, $this->errorBag());
    }

    public function createMembers($token,$acount)
    {
        return view('members.create_members', compact( 'acount','token'));
    }

        public function fin($id)
    {
        $project = Project::find($id);
        return view('proyects.finish',compact('project'));
    }

}
