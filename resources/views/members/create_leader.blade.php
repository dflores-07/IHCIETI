@extends('layouts.system')

<head>
    <meta charset="utf-8" />
    <title>Honduras Startup - Emprendimiento Tradicional</title>
   <style type="text/css">


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
    </style>
</head>
<body class="blurBg-false" style="background-color:#EBEBEB">



<!-- Formulario Sección Lider-->

<!--Los nombre de los campos no llevan corchete ni llaves -->

<div id="app" class="row wrap" >
    <form class="formoid-solid-red" action="{{route('saveLeader')}}" style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:980px;min-width:150px" method="post">
        <div class="title"><h2>Honduras Startup - Lider del Proyecto</h2></div>
        <div class="row">{{csrf_field()}}
            <div class="col-sm-4 col-md-4" title="Número de Identidad Lider">
                <label class="title">
                    Numero Cédula
                </label>
                <div class="input-group ">
                    <span class="input-group-addon"><i class="fa fa-bell"></i></span>
                    <input class="form-control" type="text" id="idnumber" min="0" max="18" name="idnumber"  placeholder="Número de Identidad Lider" value="{{old('idnumber')}}"/>
                    @if ($errors->has('idnumber'))
                        <span class="help-block  alert-danger">
                            <strong>{{ $errors->first('idnumber') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-sm-4 col-md-4">
                <label class="title">
                    Primer Nombre
                </label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input placeholder="Primer Nombre Lider" class="form-control" type="text" value="{{old('fname')}}" size="8" name="fname" />
                    @if ($errors->has('fname'))
                        <span class="help-block  alert-danger">
                            <strong>{{ $errors->first('fname') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-sm-4 col-md-4">
                <label class="title">
                    Primer Apellido
                </label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-bed"></i></span>
                    <input placeholder="Segundo Nombre Lider" type="text" class="form-control" size="14" value="{{old('flname')}}" name="flname" />
                    @if ($errors->has('flname'))
                        <span class="help-block  alert-danger">
                            <strong>{{ $errors->first('flname') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-sm-4 col-md-4">
                <label class="title">
                    Segundo Apellido
                </label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                    <input placeholder="Segundo Apellido Lider" type="text" class="form-control" size="14" value="{{old('slname')}}" name="slname" />
                    @if ($errors->has('slname'))
                        <span class="help-block  alert-danger">
                            <strong>{{ $errors->first('slname') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


            <div class="col-sm-4 col-md-4">
                <label class="title">Fecha de Nacimiento</label>
                <div class="form-group">
                    <div class='input-group date' id='birthdate'>
                        <input type='text' class="form-control" name="birthdate" />
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    </div>
                    @if ($errors->has('birthdate'))
                        <span class="help-block  alert-danger">
                            <strong>{{ $errors->first('birthdate') }}</strong>
                        </span>
                    @endif
                </div>

            </div>

            <div class="col-sm-4 col-md-4 formulario">
                <div class="radio">
                    <input type="radio" name="gender"  id="hombre"  @if (old('gender') == 'Masculino') checked @endif />
                    <label for="hombre">Hombre</label>
                    <input type="radio" id="mujer" name="gender"   @if (old('gender') == 'Femenino') checked @endif />
                    <label for="mujer">Mujer</label>
                    @if ($errors->has('gender'))
                        <span class="help-block  alert-danger">
                            <strong>{{ $errors->first('gender') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="col-sm-4 col-md-4">
                <div class="element-select" title="Departamento">
                    <label class="title" for="province"><span class="required">Departamento</span></label>
                    <div class="input-group">
                        <span class="input-group-addon"> <i class="fa fa-globe"></i></span>

                        <span>
                            <select id="province" name="province"  class="form-control">
                                <option value=""   >Seleccione Un Departamento</option>

                            @foreach($departaments AS $departament)
                                <option value="{{$departament->id}}"  @if (old('province') == $departament->id) selected="selected" @endif >{{$departament->name}}</option>
                                @endforeach
                              </select>
                        </span>
                        @if ($errors->has('province'))
                            <span class="help-block  alert-danger">
                            <strong>{{ $errors->first('province') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-4">
                <div class="element-select" title="Municipios">
                    <label class="title"><span class="required">Municipios</span></label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                        <select name="city"  id="city" class="form-control" >
                        </select>
                        </span>
                        @if ($errors->has('city'))
                            <span class="help-block  alert-danger">
                            <strong>{{ $errors->first('city') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-sm-4 col-md-4">
                <div class="element-select" title="Grado de Escolaridad">
                    <label class="title">Grado de Escolaridad</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
                        <select name="school"  class="form-control" >
                            <option value="Secundaria" @if (old('school') == 'Secundaria') selected="selected" @endif>Secundaria</option>
                            <option value="Universitaria" @if (old('school') == 'Universitaria') selected="selected" @endif>Universitaria</option>
                            <option value="Postgrado" @if (old('school') == 'Postgrado') selected="selected" @endif>Postgrado</option>
                            <option value="Doctorado" @if (old('school') == 'Doctorado') selected="selected" @endif>Doctorado</option>
                            <option value="Otro" @if (old('school') == 'Otro') selected="selected" @endif>Otro</option>
                        </select>
                        @if ($errors->has('school'))
                            <span class="help-block  alert-danger">
                            <strong>{{ $errors->first('school') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-sm-4 col-md-4">
                <label class="title">Correo Electrónico</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                    <input placeholder="Correo Electrónico Lider" class="form-control" type="email" value="{{old('email')}}" name="email" />
                    @if ($errors->has('email'))
                        <span class="help-block  alert-danger">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


            <div class="col-sm-4 col-md-4">
                <label class="title">Teléfono Fijo</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                    <input placeholder="Teléfono Fijo Lider" class="form-control" type="teléfono"  value="{{old('phone')}}" name="phone" />
                    @if ($errors->has('phone'))
                        <span class="help-block  alert-danger">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


            <div class="col-sm-4 col-md-4">
                <label class="title">Teléfono Celular</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                    <input placeholder="Teléfono Celular Lider" class="form-control" type="Celular" value="{{old('cellphone')}}" name="cellphone"  />
                    @if ($errors->has('cellphone'))
                        <span class="help-block  alert-danger">
                            <strong>{{ $errors->first('cellphone') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


            <div class="col-sm-12 col-md-12">
                <label class="title">Dirección Exacta</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                    <input placeholder="Dirección Exacta Lider" class="form-control" type="address"  value="{{old('address')}}" name="address"  />
                    @if ($errors->has('address'))
                        <span class="help-block  alert-danger">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="col-sm-6 col-md-6">
                <div class="element-select" title="Total Integrantes">
                    <label class="title"><span class="required">Total de Integrantes</span></label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
                        <select name="acount"  class="form-control" >
                            <option value="">Uno</option>
                            <option value="1">Dos</option>
                            <option value="2">Tres</option>
                            <option value="3">Cuatro</option>
                        </select>
                        @if ($errors->has('acount'))
                            <span class="help-block  alert-danger">
                            <strong>{{ $errors->first('acount') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            <div style="margin: 5px" class=" row col-sm-12 col-md-12">
                <div class="text-center ">
                    <input style="max-height:  50px; max-width: 260px " class="btn btn-success with-3d-shadow" type="submit"  value="Siguiente Paso"  />
                </div>
            </div>
        </div>
     <p class="text-center">Hondurastartup MiPyme</p>
    </form>
</div>


            </div>
            <script src="{{mix("mipymes/public/js/app.js")}}"></script>
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

         $("#province").change(function () {
           //  var departament = $("#province").val();
             url = 'municipios' ;
             data.departament = $('#province').val();

             ajaxForm(url,'post',data)
                 .done( function (data) {
                     $.unblockUI();
                     $('#select2-city-container').text("");
                     $('#city').empty();

                     $.each(data, function(index, name) {
                         $('#city').append("<option value="+ index +">" + name + "</option>");
                     });

                     $("#city option:first").attr('selected','selected');
                     $('#select2-city-container').text($("#city option:first").val());
                 });
         });
             $('#birthdate').datepicker({
                 endDate: '31-05-1999'
             });


        });
        });

</script>
</body>
</html>
