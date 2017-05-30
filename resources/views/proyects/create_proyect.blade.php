@extends('layouts.system')
<head>
    <meta charset="utf-8" />
    <title>Honduras Startup - Emprendimiento Tradicional</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="blurBg-false" style="background-color:#EBEBEB">



<!--Los nombre de los campos no llevan corchete ni llaves -->

<div id="app" class="row" >
    <form class="formoid-solid-red" action="{{route('saveProject')}}" style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:980px;min-width:150px" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
        <div class="title"><h2>Honduras Startup - Mi Proyecto</h2></div>
        <div class="row">{{csrf_field()}}
            <div class="col-sm-12 col-md-12" title="Número de Identidad Lider">
                <label class="title">
                    Codigo del Proyecto
                </label>
                <div class="input-group ">
                    <span class="input-group-addon"><i class="fa fa-bell"></i></span>
                    <input class="form-control" type="text" readonly  name="code" value="{{$code}}" required="required" placeholder="Codigo del Proyecto" />
                    <input class="form-control" type="hidden"   name="token" value="{{$token}}"  />
                </div>
            </div>
            <div class="col-sm-6 col-md-6" title="Número de Identidad Lider">
                <label class="title">
                    Nombre del Proyecto
                </label>
                <div class="input-group ">
                    <span class="input-group-addon"><i class="fa fa-bell"></i></span>
                    <input class="form-control" type="text"  name="name" required="required" placeholder="Nombre del Proyecto" />
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <label class="title">
                    Presupuesto
                </label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                    <input placeholder="20000.00" type="number" class="form-control"  name="budget" required="required"/>
                </div>
            </div>
            <div class="col-sm-12 col-md-12">
                <label class="title">
                    Descripcion
                </label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <textarea rows="4" cols="100%" name="description"></textarea>
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <label class="title">
                    Sector
                </label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-bed"></i></span>
                    <input placeholder="Sector del Proyecto" type="text" class="form-control"  name="sector" required="required"/>
                </div>
            </div>



            <div class="col-sm-6 col-md-6">
                <label class="title">Ha Recibido Ayuda?</label>
                <div class="input-group">
                    <span class="input-group-addon"> <i class="fa fa-comment"></i></span>
                    <select name="has_received_help" class="form-control">
                        <option value="">Seleccione una Opcion</option>
                        <option value="yes">Si</option>
                        <option value="no">No</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-12 col-md-12">
                <label class="element-radio" title="Género">Que tipo de ayuda ha Recibido</label>
                <div class="input-group">
                    <span class="input-group-addon"> <i class="fa fa-codepen"></i></span>
                    <textarea rows="5" cols="100%" name="who_has_received_help"> </textarea>
                </div>
            </div>
            <div class="col-sm-12 col-md-12">
                <label class="element-radio" title="Género">Porque La Ayuda</label>
                <div class="input-group">
                    <span class="input-group-addon"> <i class="fa fa-codepen"></i></span>
                    <textarea rows="5" cols="100%" name="whohelp"> </textarea>
                </div>
            </div>

            <div class="col-sm-6 col-md-6">
                <div class="element-select" title="Departamento">
                    <label class="title"><span class="required">De Cuanto necesitan la Ayuda</span></label>
                    <div class="input-group">
                        <span class="input-group-addon"> <i class="fa fa-heart"></i></span>
                        <input type="number" name="helpcount" class="form-control" placeholder="15000.00">
                    </div>
                </div>
            </div>


            <div class="col-sm-12 col-md-12">
                <div class="element-select" title="Observaciones">
                    <label class="title"><span class="required">Observaciones</span></label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                        <textarea rows="5" cols="100%" name="observation"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="element-select" title="Observaciones">
                    <label class="title"><span class="required">Observaciones</span></label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                        <input type="file" name="budgetfile"  class="form-control">
                    </div>
                </div>
            </div>
            <div style="margin: 5px" class="text-center row col-sm-12 col-md-12">
                <div class="text-center ">
                    <input  style="max-height:  50px; max-width: 260px "  class="btn btn-success" type="submit"  value="Siguiente Paso" />
                </div>
            </div>
        </div>
     <p class="frmd">Validación Formulario Hondurastartup MiPyme Form</p>
    </form>
</div>
           <!-- Finaliza Formulario-->


<!--Los nombre de los campos no llevan corchete ni llaves -->

                <!-- Finaliza Formulario-->

            </div>
</body>
</html>
