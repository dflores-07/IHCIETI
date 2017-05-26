<?php

namespace App\Http\Controllers;

use App\Member;
use App\Project;
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

     public function createLeader($id,$acount)
    {
        $project = Project::find($id);
        return view('members.create_leader',compact('project','acount'));
    }


    public function store()
    {
        $datos = Input::all();

     //aqui va los datos del lider
        $member = new Member();
        //Comprobamos que venimos del formulario de miembros
        if(key_exists('members',$datos)):
                $member->type = 'members';
        // aqui vamos rebajando la cantidad de miembros para saber si debe repetir la vista de miembros
            $datos['acount'] = $datos['acount'] -1;
        else:
                $member->type = 'leader';
        endif;
        $member->project_id = $datos['project_id'];
        $member->idnumber = $datos['idnumber'];
        $member->fname = $datos['fname'];
        $member->flname = $datos['flname'];
        $member->slname = $datos['slname'];
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

        if($datos['acount']=='' || $datos['acount']<=0):
            return redirect()->route('fin',$member->project_id);
        else:
            // regresamos a la vista de nuevo miembros si se debe agregar mas
            return redirect()->route('createMembers',[$member->project_id,$datos['acount']]);
        endif;
    }

    public function createMembers($id,$acount)
    {
        $project = Project::find($id);
        return view('members.create_members', compact('project', 'acount'));
    }

        public function fin($id)
    {
        $project = Project::find($id);
        return view('proyects.finish',compact('project'));
    }

}
