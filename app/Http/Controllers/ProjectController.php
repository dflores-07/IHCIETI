<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ProjectController extends Controller
{
    //

    public function create()
    {
        return view('proyects.create_proyect');
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

        return redirect()->route('fin', $project->id);
    }
}
