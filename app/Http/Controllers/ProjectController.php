<?php

namespace App\Http\Controllers;

use App\Member;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;

class ProjectController extends Controller
{
    //

    public function create($token)
    {
        $search =  Project::orderBy('id','DESC')->max('code');
        if(!$search):
            $code = 'A0001-17';
        else:
            $codes = explode('-',$search);
            $codes = explode('A',$codes[0]);
            if(Count($codes[1])==1):
                $code = 'A000'.($codes[1]+1).'-'.date("y");
            elseif(Count($codes[1])==2):
                $code = 'A00'.($codes[1]+1).'-'.date("y");
            elseif(Count($codes[1])==3):
                $code = 'A0'.($codes[1]+1).'-'.date("y");
            elseif(Count($codes[1])>=4):
                $code = 'A'.($codes[1]+1).'-'.date("y");
            endif;
        endif;
        return view('proyects.create_proyect',compact('token','code'));
    }

    public function store(Request $request)
    {
        //Capturamos el archivo enviado por el usaurio
        $file = $request->file('budgetfile');
        //lo guardamos en el sistema con el nombre del proyecto que pertenece
        \Storage::disk('local')->put($request->get('name'),  \File::get($file));
        //recibimos todos los campos
        $datos = $request->all();
        //cambiamos el campo budgetfile con la extencion del archivo que subieron
        $datos['budgetfile']= $file->getClientOriginalExtension();
        //mandamos a llamar el modelo
        $project = new Project();
        //verificamos todos los campos
        $project->fill($datos);
        // guardamos todos los datos
        $project->save();
        $members = Member::where('token',$request->get('token'))->update(['project_id'=>$project->id]);
        Mail::send("email/emailEvento", compact('project'), function($m) use($project)
        {
            $m->from('no-reply@hondurastartup.com','IHCIETI');

            //receptor
            $m->to($project->members()->where('type','leader')->first()->email, $project->members()->where('type','leader')->first()->nameComplete())->subject("Registro de Projecto");

        });
        return redirect()->route('fin', $project);
    }
}
