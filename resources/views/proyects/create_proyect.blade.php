@extends('layouts.system')
<head>
    <meta charset="utf-8" />
    <title>Honduras Startup - Emprendimiento Tradicional</title><style type="text/css">


        body {
            font-size: 16px;
            background: #fff;
            font-family: "Roboto";
        }



        .formulario h2 {
            font-size: 16px;
            color: #001F3F;
            margin-bottom: 20px;
            margin-left: 20px;
        }

        .formulario > div {
            padding: 20px 0;
        }

        .formulario .radio label,
        .formulario .checkbox label {
            display: inline-block;
            cursor: pointer;
            color: #FF4136;
            position: relative;
            padding: 5px 15px 5px 51px;
            font-size: 1em;
            border-radius: 5px;
            -webkit-transition: all 0.3s ease;
            -o-transition: all 0.3s ease;
            transition: all 0.3s ease; }
        .formulario .radio label:hover,
        .formulario .checkbox label:hover {
            background: rgba(255, 65, 54, 0.1); }
        .formulario .radio label:before,
        .formulario .checkbox label:before {
            content: "";
            display: inline-block;
            width: 17px;
            height: 17px;
            position: absolute;
            left: 15px;
            border-radius: 50%;
            background: none;
            border: 3px solid #FF4136; }
        .formulario input[type="radio"] {
            display: none; }
        .formulario input[type="radio"]:checked + label:before {
            display: none; }
        .formulario input[type="radio"]:checked + label {
            padding: 5px 15px;
            background: #FF4136;
            border-radius: 2px;
            color: #fff; }
        .formulario .checkbox label:before {
            border-radius: 3px; }
        .formulario .checkbox input[type="checkbox"] {
            display: none; }
        .formulario .checkbox input[type="checkbox"]:checked + label:before {
            display: none; }
        .formulario .checkbox input[type="checkbox"]:checked + label {
            background: #FF4136;
            color: #fff;
            padding: 5px 15px; }

        .mostrar{
            display: block;
        }

        .ocultar{
            display: none;
        }
    </style>
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
            <div class="col-sm-6 col-md-6">
                <label class="title">
                    Descripcion
                </label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <textarea rows="4" cols="60" name="description"></textarea>
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="element-select" title="Observaciones">
                    <label class="title"><span class="required">Archivo de Presupuesto</span></label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                        <input type="file" name="budgetfile"  class="form-control">
                    </div>
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



            <div class="col-sm-3 col-md-3 formulario">
                <label>Ha recibido Ayuda?</label>
                <div class="radio">
                    <input type="radio" name="has_received_help"  id="si"  @if (old('has_received_help') == 'si') checked @endif />
                    <label for="si">Si</label>
                    <input type="radio" id="no" name="has_received_help"   @if (old('has_received_help') == 'no') checked @endif />
                    <label for="no">No</label>
                    @if ($errors->has('has_received_help'))
                        <span class="help-block  alert-danger">
                            <strong>{{ $errors->first('has_received_help') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div id="who_helpDiv" class="col-sm-3 col-md-3 formulario ocultar"  >
                <label>Que tipo de ayuda ha Recibido</label>
                <div class="radio">
                    <input type="radio" name="who_helpOther"  id="tecnica"  @if (old('who_helpOther') == 'tecnica') checked @endif />
                    <label for="tecnica">Tecnica</label>
                    <input type="radio" id="financiera" name="who_helpOther"   @if (old('who_helpOther') == 'financiera') checked @endif />
                    <label for="financiera">Financiera</label>
                    @if ($errors->has('who_helpOther'))
                        <span class="help-block  alert-danger">
                            <strong>{{ $errors->first('who_helpOther') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div id="whoHelpDiv" class="col-sm-3 col-md-3 formulario ocultar"  >
                <label>Quien le Ayudo?</label>
                <div class="radio">
                    <input type="radio" name="who_has_received_help"  id="BancaPrivada"  @if (old('who_has_received_help') == 'Banca Privada') checked @endif />
                    <label for="BancaPrivada">Banca Privada</label>
                    <input type="radio" id="gobierno" name="who_has_received_help"   @if (old('who_has_received_help') == 'Gobierno') checked @endif />
                    <label for="gobierno">Gobierno</label>
                    <input type="radio" id="ong" name="who_has_received_help"   @if (old('who_has_received_help') == 'ONG') checked @endif />
                    <label for="ong">ONG</label>
                    <input type="radio" id="otro" name="who_has_received_help"   @if (old('who_has_received_help') == 'Otro') checked @endif />
                    <label for="otro">Otro</label>
                    @if ($errors->has('who_has_received_help'))
                        <span class="help-block  alert-danger">
                            <strong>{{ $errors->first('who_has_received_help') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div id="helpcount" class="col-sm-6 col-md-6 ocultar ">
                <div class="element-select" title="Departamento">
                    <label class="title"><span class="required">Monto Recibido</span></label>
                    <div class="input-group">
                        <span class="input-group-addon"> <i class="fa fa-heart"></i></span>
                        <input type="number"    name="helpcount" class="form-control" placeholder="15000.00">
                    </div>
                </div>
            </div>

            <div id="whoUseHelp" class="col-sm-12 col-md-12 ocultar">
                <label class="element-radio" title="Género">Como Utilizo la Ayuda</label>
                <div class="input-group">
                    <span class="input-group-addon"> <i class="fa fa-codepen"></i></span>
                    <textarea rows="5" cols="100%" name="whohelp"> </textarea>
                </div>
            </div>



            <div class="col-sm-3 col-md-3 formulario">
                <label>Es un Negocio Familiar?</label>
                <div class="radio">
                    <input type="radio" name="type_project"  id="sis"  @if (old('type_project') == 'si') checked @endif />
                    <label for="sis">Si</label>
                    <input type="radio" id="not" name="type_project"   @if (old('type_project') == 'no') checked @endif />
                    <label for="not">No</label>
                    @if ($errors->has('type_project'))
                        <span class="help-block  alert-danger">
                            <strong>{{ $errors->first('type_project') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div style="margin: 5px" class="text-center row col-sm-12 col-md-12">
                <div class="text-center ">
                    <input  style="max-height:  50px; max-width: 260px "  class="btn btn-success" type="submit"  value="Siguiente Paso" />
                </div>
            </div>
        </div>
     <p class="frmd"> Hondurastartup MiPyme </p>
    </form>
</div>
           <!-- Finaliza Formulario-->


<!--Los nombre de los campos no llevan corchete ni llaves -->

                <!-- Finaliza Formulario-->

            </div>

<script src="http://mipymes.hondurastartup.com/mipymes/public/js/app.js"></script>
<script src="https://use.fontawesome.com/a9aa1689da.js"></script>
<script type="text/javascript">


    $(document).ready(function() {
        var server = "/";

        var ajaxForm = function (url, type, data, msg, school){
            var message;
            var path = server + url;
            if(msg){
                message = msg
            }else{
                if(type == 'post'){
                    message = 'Registrando Datos';
                }else{
                    message = 'Actualizando Registros';
                }
            }
            if(school){
                path = server + window.location.pathname.split('/')[1] + '/' + window.location.pathname.split('/')[2] + ('/') +url;
            }
            return $.ajax({
                url: path,
                type: type,
                data: {data: JSON.stringify(data)},
                datatype: 'json',
                beforeSend: function(){
                    loadingUI(message, 'img');
                },
                error:function(xhr, status, error){
                    $.unblockUI();
                    if(xhr.status == 401){
                        bootbox.alert("<p class='red'>No estas registrado en la aplicación.</p>", function(response){
                            location.reload();
                        });
                    }else{
                        bootbox.alert("<p class='red'>No se pueden grabar los datos.</p>");
                    }
                }
            });
        };

        var loadingUI = function (message, img){
            if(img){
                var msg = '<h2><img style="margin-right: 30px" src="' + server + 'images/spiffygif.gif" >' + message + '</h2>';
            }else{
                var msg = '<h2>' + message + '</h2>';
            }
            $.blockUI({ css: {
                border: 'none',
                padding: '15px',
                backgroundColor: '#000',
                '-webkit-border-radius': '10px',
                '-moz-border-radius': '10px',
                opacity: 0.5,
                color: '#fff'
            }, message: msg});
        };
        var box;
        var messageAjax = function(data, no_bootbox) {
            //console.log(data.errors);
            $.unblockUI();
            if(data.success){
                if(data.message.redirect)
                {
                    window.location.href = data.message.href;
                }else{
                    if(! no_bootbox )
                    {
                        bootbox.alert('<p class="success-ajax">'+data.message+'</p>', function(){
                            location.reload();
                        });
                    }
                }
            }
            else{
                messageErrorAjax(data);
            }
        };
        var messageErrorAjax = function(data){
            $.unblockUI();
            var errors = data.errors;
            var error  = "";
            if($.type(errors) === 'string'){
                error = data.errors;
            }else{
                for (var element in errors){
                    if(errors.hasOwnProperty(element)){
                        error += errors[element] + '<br>';
                    }
                }
            }
            bootbox.alert('<p class="error-ajax">'+error+'</p>');
        };
        $(function(){
            //setup Ajax
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var data = {};

            $("#si").click(function () {
                $("#who_helpDiv").removeClass('ocultar');
                $("#who_helpDiv").addClass('mostrar');

            });

        $("#no").click(function () {
            $("#who_helpDiv").removeClass('mostrar');
            $("#who_helpDiv").addClass('ocultar');
            $("#whoHelpDiv").addClass('ocultar');
        });


            $("#who_helpDiv").click(function () {
                $("#whoHelpDiv").removeClass('ocultar');
                $("#whoHelpDiv").addClass('mostrar');
            });

            $("#whoHelpDiv").click(function () {
                $("#whoUseHelp").removeClass('ocultar');
                $("#whoUseHelp").addClass('mostrar');
            });

            $("#financiera").click(function () {
                $("#helpcount").removeClass('ocultar');
                $("#helpcount").addClass('mostrar');
            });

            $("#tecnica").click(function () {
                $("#helpcount").removeClass('mostrar');
                $("#helpcount").addClass('ocultar');
            });



        });
    });

</script>
</body>
</html>
