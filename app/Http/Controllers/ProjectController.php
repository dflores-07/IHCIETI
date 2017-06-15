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
       
     if(!empty($file)) {
        //lo guardamos en el sistema con el nombre del proyecto que pertenece
        \Storage::disk('local')->put($request->get('name'),  \File::get($file));
        //recibimos todos los campos
        
        //cambiamos el campo budgetfile con la extencion del archivo que subieron
        $datos['budgetfile']= $file->getClientOriginalExtension();
       }
       
       $datos = $request->all();
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
            $m->to($project->members()->where('type','leader')->first()->email, $project->members()->where('type','leader')->first()->nameComplete())->subject("Registro de Proyecto");

        });
        return redirect()->route('fin', $project);
    }


    /*******************************************************
     * @Author     : Anwar Sarmiento Ramos
     * @Email      : asarmiento@sistemasamigables.com
     * @Create     : 2017-06-15
     * @Update     : 0000-00-00
     ********************************************************
     * @Description: Este reporte solo mostramos los lideres
     *  que completaron el formulario en el sistema en un pdf
     *
     *
     * @Pasos      :
     *
     *
     *
     ********************************************************/
    public function pdfLeader()
    {
        Fpdf::AddPage();
        Fpdf::SetFont('Courier', 'B', 18);
        Fpdf::Cell(0, 7, 'Honduras Startup',0,1,'C');
        Fpdf::SetFont('Courier', 'B', 14);
        Fpdf::Cell(0, 7, 'Lista de Lideres',0,1,'C');



        Fpdf::Ln(14);
        Fpdf::SetFont('Courier', 'B', 12);
        Fpdf::Cell(10, 7, '#',1,0,'C');
        Fpdf::Cell(40, 7, 'Cedula',1,0,'C');
        Fpdf::Cell(36, 7, 'Nombres',1,0,'C');
        Fpdf::Cell(27, 7, 'Apellido 1',1,0,'C');
        Fpdf::Cell(27, 7, 'Apellido 2',1,0,'C');
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
            Fpdf::Cell(40, 7, $project->membersLeader[0]->idnumber,1,0,'C');
            Fpdf::Cell(36, 7,ucwords(utf8_decode(substr($project->membersLeader[0]->fname,0,45))),1,0,'L');
            Fpdf::Cell(27, 7, ucwords(utf8_decode(substr($project->membersLeader[0]->flname,0,45))),1,0,'L');
            Fpdf::Cell(27, 7, ucwords(utf8_decode(substr($project->membersLeader[0]->slname,0,45))),1,0,'L');
            Fpdf::Cell(25, 7, ((($project->membersLeader[0]->cellphone))),1,0,'L');
            Fpdf::Cell(25, 7, ((($project->membersLeader[0]->phone))),1,1,'L');
            Fpdf::Cell(0, 7, strtolower(utf8_decode(substr($project->membersLeader[0]->address,0,45))),1,1,'L');
           // Fpdf::Cell(20, 7, 'L. '.number_format($project->budget,2),1,1,'C');
          //  Fpdf::Cell(80, 7, ucwords(strtolower(utf8_decode($project->members_leader[0]->fname))),1,1,'L');

        endforeach;
        Fpdf::Output();
        exit;
    }

    /*******************************************************
     * @Author     : Anwar Sarmiento Ramos
     * @Email      : asarmiento@sistemasamigables.com
     * @Create     : 2017-06-15
     * @Update     : 0000-00-00
     ********************************************************
     * @Description: Generamos un reporte en excel para
     * mostrar todos los miembros junto con sus projectos
     *
     *
     * @Pasos      :
     *
     *
     *
     ********************************************************/
    public function excelLeaderProject()
    {
        $encabezado = [
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

        $data =[];
        array_push($data,$encabezado);

        $projects = Project::with('members')->get();
        foreach ($projects As $project):

        //datos del proyecto

            foreach ($project->members As $key => $member):


                //datos de los miembros
                if($key == 0)continue;

                $row = [
                    $project->members[0]->idnumber,
                    $project->members[0]->fname,
                    $project->members[0]->flname,
                    $project->members[0]->slname,
                    $project->members[0]->cellphone,
                    $project->members[0]->phone,
                    $project->members[0]->email,
                    $project->members[0]->gender,
                    $project->members[0]->address,
                    $member->idnumber,
                    $member->fname,
                    $member->flname,
                    $member->slname,
                    $member->cellphone,
                    $member->phone,
                    $member->email,
                    $member->gender,
                    $member->address,
                    $project->code,
                    $project->name,
                    $project->sector,
                    '',
                    $project->budget,
                    $project->who_has_received_help,
                    $project->who_help,
                    '',
                    $project->whocount,
                    $project->whohelp,
                    $project->type_project
                ];




                    array_push($data,$row);
            endforeach;
        endforeach;


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
                $bordeCount = 'A2:AC'.count($data);
                $sheet->setBorder('A1:AC1', 'thick');
                $sheet->setBorder($bordeCount, 'thin');

                $sheet->cells('A1:AC1', function($cells) {

                    // Set font family
                    $cells->setFontFamily('Calibri');
                    // Set font size
                    $cells->setFontSize(16);

                    $cells->setFontWeight('bold');


                });
                $sheet->cells('A1:I1', function($cells) {

                    $cells->setBackground('#91bbe3');


                });
                $sheet->cells('J1:R1', function($cells) {

                    $cells->setBackground('#eaae7d');

                });
                $sheet->cells('S1:AC1', function($cells) {

                    $cells->setBackground('#69ae71');

                });
                $sheet->fromArray($data, null, 'A1', false, false);


            });

        })->export('xls');
    }

    /*******************************************************
     * @Author     : Anwar Sarmiento Ramos
     * @Email      : asarmiento@sistemasamigables.com
     * @Create     : ${DATE}
     * @Update     : 0000-00-00
     ********************************************************
     * @Description: Todos los miembros sin registro de project
     *
     *
     *
     * @Pasos      :
     *
     *
     *
     ********************************************************/
    public function pdfAllMembersNot()
    {
        Fpdf::AddPage();
        Fpdf::SetFont('Courier', 'B', 18);
        Fpdf::Cell(0, 7, 'Honduras Startup',0,1,'C');
        Fpdf::SetFont('Courier', 'B', 14);
        Fpdf::Cell(0, 7, 'Lista de Personas sin Terminar el Registro',0,1,'C');



        Fpdf::Ln(14);
        Fpdf::SetFont('Courier', 'B', 12);
        Fpdf::Cell(10, 7, '#',1,0,'C');
        Fpdf::Cell(40, 7, 'Cedula',1,0,'C');
        Fpdf::Cell(36, 7, 'Nombres',1,0,'C');
        Fpdf::Cell(27, 7, 'Apellido 1',1,0,'C');
        Fpdf::Cell(27, 7, 'Apellido 2',1,0,'C');
        Fpdf::Cell(25, 7, 'Celular',1,0,'C');
        Fpdf::Cell(25, 7, 'Telefono',1,1,'C');
        Fpdf::Cell(0, 7, 'Direccion',1,1,'C');

        $members = Member::where('project_id',null)->get();
        $i=0;
        foreach ($members As $member):
            $i++;
            Fpdf::SetFont('Courier', 'I', 12);
            Fpdf::Cell(10, 7, $i,1,0,'C');
            Fpdf::Cell(40, 7, $member->idnumber,1,0,'C');
            Fpdf::Cell(36, 7,ucwords(utf8_decode(substr($member->fname,0,45))),1,0,'L');
            Fpdf::Cell(27, 7, ucwords(utf8_decode(substr($member->flname,0,45))),1,0,'L');
            Fpdf::Cell(27, 7, ucwords(utf8_decode(substr($member->slname,0,45))),1,0,'L');
            Fpdf::Cell(25, 7, ((($member->cellphone))),1,0,'L');
            Fpdf::Cell(25, 7, ((($member->phone))),1,1,'L');
            Fpdf::Cell(0, 7, strtolower(utf8_decode(substr($member->address,0,45))),1,1,'L');
            // Fpdf::Cell(20, 7, 'L. '.number_format($project->budget,2),1,1,'C');
            //  Fpdf::Cell(80, 7, ucwords(strtolower(utf8_decode($project->members_leader[0]->fname))),1,1,'L');

        endforeach;
        Fpdf::Output();
        exit;
    }

    public function pdfLeaderProject()
    {
        Fpdf::AddPage();
        Fpdf::SetFont('Courier', 'B', 18);
        Fpdf::Cell(0, 7, 'Honduras Startup',0,1,'C');
        Fpdf::SetFont('Courier', 'B', 14);
        Fpdf::Cell(0, 7, 'Lista de Lideres',0,1,'C');



        Fpdf::Ln(14);
        Fpdf::SetFont('Courier', 'B', 12);
        Fpdf::Cell(10, 7, '#',1,0,'C');
        Fpdf::Cell(40, 7, 'Cedula',1,0,'C');
        Fpdf::Cell(36, 7, 'Nombres',1,0,'C');
        Fpdf::Cell(27, 7, 'Apellido 1',1,0,'C');
        Fpdf::Cell(27, 7, 'Apellido 2',1,0,'C');
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
            Fpdf::Cell(40, 7, $project->membersLeader[0]->idnumber,1,0,'C');
            Fpdf::Cell(36, 7,ucwords(utf8_decode(substr($project->membersLeader[0]->fname,0,45))),1,0,'L');
            Fpdf::Cell(27, 7, ucwords(utf8_decode(substr($project->membersLeader[0]->flname,0,45))),1,0,'L');
            Fpdf::Cell(27, 7, ucwords(utf8_decode(substr($project->membersLeader[0]->slname,0,45))),1,0,'L');
            Fpdf::Cell(25, 7, ((($project->membersLeader[0]->cellphone))),1,0,'L');
            Fpdf::Cell(25, 7, ((($project->membersLeader[0]->phone))),1,1,'L');
            Fpdf::Cell(0, 7, strtolower(utf8_decode(substr($project->membersLeader[0]->address,0,45))),1,1,'L');
            // Fpdf::Cell(20, 7, 'L. '.number_format($project->budget,2),1,1,'C');
            //  Fpdf::Cell(80, 7, ucwords(strtolower(utf8_decode($project->members_leader[0]->fname))),1,1,'L');

        endforeach;
        Fpdf::Output();
        exit;
    }
}
