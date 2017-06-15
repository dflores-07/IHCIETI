<?php

namespace App\Http\Controllers;

use App\Member;
use App\Project;
use Codedge\Fpdf\Facades\Fpdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

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



    public function pdfLeaderProject()
    {
        Fpdf::AddPage();
        Fpdf::SetFont('Courier', 'B', 18);
        Fpdf::Cell(0, 7, 'Honduras Startup',0,1,'C');
        Fpdf::SetFont('Courier', 'B', 14);
        Fpdf::Cell(0, 7, 'Lista de Proyectos y Lideres',0,1,'C');



        Fpdf::Ln(14);
        Fpdf::SetFont('Courier', 'B', 12);
        Fpdf::Cell(10, 7, '#',1,0,'C');
        Fpdf::Cell(25, 7, 'Cedula',1,0,'C');
        Fpdf::Cell(45, 7, 'Nombres',1,0,'C');
        Fpdf::Cell(30, 7, 'Apellido 1',1,0,'C');
        Fpdf::Cell(30, 7, 'Apellido 2',1,0,'C');
        Fpdf::Cell(25, 7, 'Celular',1,0,'C');
        Fpdf::Cell(25, 7, 'Telefono',1,1,'C');
        Fpdf::Cell(0, 7, 'Direccion',1,1,'C');

        $projects = Project::wherehas('membersLeader',function ($q){
            $q->where('type','leader');
        })->with('membersLeader')->get();
        $i=0;
        foreach ($projects As $project):
            $i++;
            Fpdf::SetFont('Courier', 'I', 12);
            Fpdf::Cell(10, 7, $i,1,0,'C');
            Fpdf::Cell(25, 7, $project->membersLeader[0]->idnumber,1,0,'C');
            Fpdf::Cell(45, 7,ucwords(utf8_decode(substr($project->membersLeader[0]->fname,0,45))),1,0,'L');
            Fpdf::Cell(30, 7, ucwords(utf8_decode(substr($project->membersLeader[0]->flname,0,45))),1,0,'L');
            Fpdf::Cell(30, 7, ucwords(utf8_decode(substr($project->membersLeader[0]->slname,0,45))),1,0,'L');
            Fpdf::Cell(25, 7, ((($project->membersLeader[0]->cellphone))),1,0,'L');
            Fpdf::Cell(25, 7, ((($project->membersLeader[0]->phone))),1,1,'L');
            Fpdf::Cell(0, 7, strtolower(utf8_decode(substr($project->membersLeader[0]->address,0,45))),1,1,'L');
           // Fpdf::Cell(20, 7, 'L. '.number_format($project->budget,2),1,1,'C');
          //  Fpdf::Cell(80, 7, ucwords(strtolower(utf8_decode($project->members_leader[0]->fname))),1,1,'L');

        endforeach;
        Fpdf::Output();
        exit;
    }

    public function excelLeaderProject()
    {
        $data = [
            'Identidad del Lider',
            'Nombres Lider',
            '1 Apellido Lider',
            '2 Apellido Lider',
            'Celular Lider',
            'Teléfono Fijo Lider',
            'Email Lider',
            'Genero',
            'Dirección',
            'Identidad del miembro',
            'Nombres miembro',
            '1 Apellido Miembro',
            '2 Apellido Miembro',
            'Celular Miembro',
            'Teléfono Fijo miembro',
            'Email Miembro',
            'Genero',
            'Dirección',
            'Codigo del Proyecto',
            'Nombre del Proyecto',
            'Sector del proyecto',
            'Descripción de Proyecto',
            'Monto Presupuesto',
            'Ha recibido ayuda',
            'Tipo de ayuda',
            'Quien le ayudo',
            'Monto de Ayuda',
            'Como utilizo la ayuda',
            'Negocio Familiar'
        ];
        $projects = Project::with('members')->get();
        foreach ($projects As $project):

          $encabezado =  [
              '',
              'Nombres Lider',
              '1 Apellido Lider',
              '2 Apellido Lider',
              'Celular Lider',
              'Teléfono Fijo Lider',
              'Email Lider',
              'Genero',
              'Dirección',
              'Identidad del miembro',
              'Nombres miembro',
              '1 Apellido Miembro',
              '2 Apellido Miembro',
              'Celular Miembro',
              'Teléfono Fijo miembro',
              'Email Miembro',
              'Genero',
              'Dirección',
              $project->code,
              $project->name,
              $project->sector,
              '',
              $project->budget,
              $project->has_received_help,
              $project->who_help,
              $project->whohelp,
              $project->helpcount,
              '',
              $project->type_project];
        endforeach;
          $data[]= $encabezado;


        Excel::create('Lista de Proyectos y Lideres', function($excel) use($data) {

            // Set the title
            $excel->setTitle('Lista de Proyectos y Lideres');

            // Chain the setters
            $excel->setCreator('Maatwebsite')
                ->setCompany('Maatwebsite');

            // Call them separately
            $excel->setDescription('A demonstration to change the file properties');

            $excel->sheet('Lista Projectos', function($sheet) use($data) {

                $sheet->setOrientation('landscape');
                $sheet->cells('A1:I1', function($cells) {

                    $cells->setBackground('#91bbe3');

                });
                $sheet->cells('J1:R1', function($cells) {

                    $cells->setBackground('#eaae7d');

                });
                $sheet->cells('S1:AC1', function($cells) {

                    $cells->setBackground('#69ae71');

                });
                $sheet->fromArray($data);


            });

        })->export('xls');
    }
}
