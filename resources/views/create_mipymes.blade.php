<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Robots-Drones Challenge</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="blurBg-false" style="background-color:#EBEBEB">



<!-- Formulario Sección Lider-->
<link rel="stylesheet" href="{{mix("css/app.css")}}" type="text/css" />
<link rel="stylesheet" href="/css/styleheader.css" type="text/css" />
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

<div id="app" class="row" >
    <form class="formoid-solid-red" style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:980px;min-width:150px" method="post"><div class="title"><h2>Robots-Drones Challenge</h2></div>
        <div class="row">
            <div class="col-sm-4 col-md-4" title="Número de Identidad Lider">
                <label class="title">
                    Numero Cedula
                </label>
                <div class="input-group ">
                    <span class="input-group-addon"><i class="fa fa-bell"></i></span>
                    <input class="form-control" type="text" min="0" max="18" name="number" required="required" placeholder="Número de Identidad Lider" value=""/>
                </div>
            </div>
            <div class="col-sm-4 col-md-4">
                <label class="title">
                    Primer Nombre
                </label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input placeholder="Primer Nombre Lider" class="form-control" type="text" size="8" name="name[first]" required="required"/>
                </div>
            </div>
            <div class="col-sm-4 col-md-4">
                <label class="title">Segundo Nombre</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-bed"></i></span>
                    <input placeholder="Segundo Nombre Lider" type="text" class="form-control" size="14" name="name[last]" required="required"/>
                </div>
            </div>
            <div class="col-sm-4 col-md-4">
                <label class="title">Segundo Apellido</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                    <input placeholder="Segundo Apellido Lider" type="text" class="form-control" size="14" name="nameLast" required="required"/>
                </div>
            </div>


            <div class="col-sm-4 col-md-4">
                <label class="title">Fecha de Nacimiento</label>
                <div class="input-group">
                    <span class="input-group-addon"> <i class="fa fa-calendar"></i></span>
                    <input placeholder="Fecha de Nacimiento" type="date" class="form-control" size="14" name="birthdate" required="required"/>
                </div>
            </div>

            <div class="col-sm-4 col-md-4">
                <label class="element-radio" title="Género">Género</label>
                <div class="input-group">
                    <span class="input-group-addon"> <i class="fa fa-venus-mars"></i></span>
                    <div class="column column2">
                        <label><input type="radio" name="radio" value="Masculino" required="required"/><span>Masculino</span></label></div>
                    <span class="clearfix"></span>
                    <div class="column column2">
                        <label><input type="radio" name="radio" value="Femenino" required="required"/><span>Femenino</span></label></div>
                    <span class="clearfix"></span>
                    <input placeholder="Género" type="radio" name="radio" class="form-control" size="14" name="birthdate" required="required"/>
                </div>
            </div>

            <div class="col-sm-4 col-md-4">
                <div class="element-select" title="Departamento">
                    <label class="title"><span class="required">Departamento</span></label>
                    <div class="input-group">
                        <span class="input-group-addon"> <i class="fa fa-globe"></i></span>

                        <span><select name="select" required="required">
                          <option value="Islas de la Bahía ">Islas de la Bahía </option>
                            <option value="Cortés ">Cortés </option>
                            <option value="Atlántida ">Atlántida </option>
                            <option value="Colón ">Colón </option>
                            <option value="Gracias a Dios ">Gracias a Dios </option>
                            <option value="Copán ">Copán </option>
                            <option value="Santa Bárbara ">Santa Bárbara </option>
                            <option value="Yoro ">Yoro </option>
                            <option value="Olancho ">Olancho </option>
                            <option value="Ocotepeque ">Ocotepeque </option>
                            <option value="Lempira ">Lempira </option>
                            <option value="Intibucá ">Intibucá </option>
                            <option value="Comayagua ">Comayagua </option>
                            <option value="Francisco Morazán ">Francisco Morazán </option>
                            <option value="El Paraíso ">El Paraíso </option>
                            <option value="La Paz ">La Paz </option>
                            <option value="Valle Choluteca">Valle Choluteca</option></select>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-4">
                <div class="element-select" title="Municipios">
                    <label class="title"><span class="required">Municipios</span></label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                        <select name="select" required="required">
                            <option value="option 1">option 1</option>
                            <option value="option 2">option 2</option>
                            <option value="option 3">option 3</option>
                        </select>
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 col-md-4">
                <div class="element-select" title="Grado de Escolaridad">
                    <label class="title">Grado de Escolaridad</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
                        <select name="select2" required="required" >
                            <option value="Secundaria">Secundaria</option>
                            <option value="Universitaria">Universitaria</option>
                            <option value="Postgrado">Postgrado</option>
                            <option value="Doctorado">Doctorado</option>
                            <option value="Otro">Otro</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 col-md-4">
                <label class="title">Correo Electrónico</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                    <input placeholder="Correo Electrónico Lider" class="form-control" type="email" name="email" required="required"/>
                </div>
            </div>


            <div class="col-sm-4 col-md-4">
                <label class="title">Teléfono Fijo</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                    <input placeholder="Teléfono Fijo Lider" class="form-control" type="teléfono" name="phone" required="required"/>
                </div>
            </div>


            <div class="col-sm-4 col-md-4">
                <label class="title">Teléfono Celular</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                    <input placeholder="Teléfono Celular Lider" class="form-control" type="Celular" name="cellphone" required="required" />
                </div>
            </div>


            <div class="col-sm-12 col-md-12">
                <label class="title">Dirección Exacta</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                    <input placeholder="Dirección Exacta Lider" class="form-control" type="address" name="address" required="required" />
                </div>
            </div>

            <div class="submit"><input type="submit" value="Enviar"/></div></form><p class="frmd"><a href="">Validación Formulario</a> Hondurastartup MiPyme Form</p>
    <!-- Finaliza Formulario-->

    <!-- Formulario Sección Integrantes-->
    <link rel="stylesheet" href="{{mix("css/app.css")}}" type="text/css" />
    <link rel="stylesheet" href="/css/styleheader.css" type="text/css" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    <div id="app" class="row" >
        <form class="formoid-solid-red" style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:980px;min-width:150px" method="post"><div class="title"><h2>Honduras Startup - MiPymes</h2></div>
            <div class="row">
                <div class="col-sm-4 col-md-4" title="Número de Identidad Lider">
                    <label class="title">
                        Numero Cedula
                    </label>
                    <div class="input-group ">
                        <span class="input-group-addon"><i class="fa fa-bell"></i></span>
                        <input class="form-control" type="text" min="0" max="18" name="number" required="required" placeholder="Número de Identidad Lider" value=""/>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4">
                    <label class="title">
                        Primer Nombre
                    </label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input placeholder="Primer Nombre Lider" class="form-control" type="text" size="8" name="name[first]" required="required"/>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4">
                    <label class="title">Segundo Nombre</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-bed"></i></span>
                        <input placeholder="Segundo Nombre Lider" type="text" class="form-control" size="14" name="name[last]" required="required"/>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4">
                    <label class="title">Segundo Apellido</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                        <input placeholder="Segundo Apellido Lider" type="text" class="form-control" size="14" name="nameLast" required="required"/>
                    </div>
                </div>


                <div class="col-sm-4 col-md-4">
                    <label class="title">Fecha de Nacimiento</label>
                    <div class="input-group">
                        <span class="input-group-addon"> <i class="fa fa-calendar"></i></span>
                        <input placeholder="Fecha de Nacimiento" type="date" class="form-control" size="14" name="birthdate" required="required"/>
                    </div>
                </div>

                <div class="col-sm-4 col-md-4">
                    <label class="element-radio" title="Género">Género</label>
                    <div class="input-group">
                        <span class="input-group-addon"> <i class="fa fa-venus-mars"></i></span>
                        <div class="column column2">
                            <label><input type="radio" name="radio" value="Masculino" required="required"/><span>Masculino</span></label></div>
                        <span class="clearfix"></span>
                        <div class="column column2">
                            <label><input type="radio" name="radio" value="Femenino" required="required"/><span>Femenino</span></label></div>
                        <span class="clearfix"></span>
                        <input placeholder="Género" type="radio" name="radio" class="form-control" size="14" name="birthdate" required="required"/>
                    </div>
                </div>

                <div class="col-sm-4 col-md-4">
                    <div class="element-select" title="Departamento">
                        <label class="title"><span class="required">Departamento</span></label>
                        <div class="input-group">
                            <span class="input-group-addon"> <i class="fa fa-globe"></i></span>

                            <span><select name="select" required="required">
                          <option value="Islas de la Bahía ">Islas de la Bahía </option>
                            <option value="Cortés ">Cortés </option>
                            <option value="Atlántida ">Atlántida </option>
                            <option value="Colón ">Colón </option>
                            <option value="Gracias a Dios ">Gracias a Dios </option>
                            <option value="Copán ">Copán </option>
                            <option value="Santa Bárbara ">Santa Bárbara </option>
                            <option value="Yoro ">Yoro </option>
                            <option value="Olancho ">Olancho </option>
                            <option value="Ocotepeque ">Ocotepeque </option>
                            <option value="Lempira ">Lempira </option>
                            <option value="Intibucá ">Intibucá </option>
                            <option value="Comayagua ">Comayagua </option>
                            <option value="Francisco Morazán ">Francisco Morazán </option>
                            <option value="El Paraíso ">El Paraíso </option>
                            <option value="La Paz ">La Paz </option>
                            <option value="Valle Choluteca">Valle Choluteca</option></select>
                        </span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4">
                    <div class="element-select" title="Municipios">
                        <label class="title"><span class="required">Municipios</span></label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                            <select name="select" required="required">
                                <option value="option 1">option 1</option>
                                <option value="option 2">option 2</option>
                                <option value="option 3">option 3</option>
                            </select>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 col-md-4">
                    <div class="element-select" title="Grado de Escolaridad">
                        <label class="title">Grado de Escolaridad</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
                            <select name="select2" required="required" >
                                <option value="Secundaria">Secundaria</option>
                                <option value="Universitaria">Universitaria</option>
                                <option value="Postgrado">Postgrado</option>
                                <option value="Doctorado">Doctorado</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 col-md-4">
                    <label class="title">Correo Electrónico</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                        <input placeholder="Correo Electrónico Lider" class="form-control" type="email" name="email" required="required"/>
                    </div>
                </div>


                <div class="col-sm-4 col-md-4">
                    <label class="title">Teléfono Fijo</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                        <input placeholder="Teléfono Fijo Lider" class="form-control" type="teléfono" name="phone" required="required"/>
                    </div>
                </div>


                <div class="col-sm-4 col-md-4">
                    <label class="title">Teléfono Celular</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                        <input placeholder="Teléfono Celular Lider" class="form-control" type="Celular" name="cellphone" required="required" />
                    </div>
                </div>


                <div class="col-sm-12 col-md-12">
                    <label class="title">Dirección Exacta</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                        <input placeholder="Dirección Exacta Lider" class="form-control" type="address" name="address" required="required" />
                    </div>
                </div>

                <!-- Finaliza Formulario-->

            </div>
            <script src="{{mix("js/app.js")}}"></script>
            <script src="https://use.fontawesome.com/a9aa1689da.js"></script>
</body>
</html>
