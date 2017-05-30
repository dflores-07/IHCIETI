@extends('layouts.system')
<head>
    <meta charset="utf-8" />
    <title>Honduras Startup - Emprendimiento Tradicional</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="blurBg-false" style="background-color:#EBEBEB">



<!-- Formulario Sección Lider-->

<!--Los nombre de los campos no llevan corchete ni llaves -->

<div id="app" class="row" >
    <form class="formoid-solid-red" action="{{route('saveLeader')}}" style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:980px;min-width:150px" method="post">
        <div class="title"><h2>Honduras Startup - Miembros del Proyecto</h2></div>
        <div class="row">{{csrf_field()}}
            <div class="col-sm-4 col-md-4" title="Número de Identidad Lider">
                <label class="title">
                    Numero Cédula
                </label>
                <div class="input-group ">
                    <span class="input-group-addon"><i class="fa fa-bell"></i></span>
                    <input class="form-control" type="text" min="0" max="18" name="idnumber"  placeholder="Número de Identidad Lider" value="{{old('idnumber')}}"/>
                    <input class="form-control" type="hidden" name="token"   value="{{$token}}"/>
                    <input class="form-control" type="hidden" name="acount"   value="{{$acount}}"/>
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
                <div class="input-group">
                    <span class="input-group-addon"> <i class="fa fa-calendar"></i></span>
                    <input placeholder="Fecha de Nacimiento" type="date" class="form-control" size="14" value="{{old('birthdate')}}" name="birthdate" />
                    @if ($errors->has('birthdate'))
                        <span class="help-block  alert-danger">
                            <strong>{{ $errors->first('birthdate') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="col-sm-4 col-md-4">
                <label class="element-radio" title="Género">Género</label>
                <div class="input-group">
                    <span class="input-group-addon"> <i class="fa fa-venus-mars"></i></span>
                    <div class="column column2">
                        <label><input type="radio" name="genre" value="Masculino" @if (old('genre') == 'Masculino') checked @endif /><span>Masculino</span></label></div>
                    <span class="clearfix"></span>
                    <div class="column column2">
                        <label><input type="radio" name="genre" value="Femenino"  @if (old('genre') == 'Femenino') checked @endif /><span>Femenino</span></label></div>
                    @if ($errors->has('genre'))
                        <span class="help-block  alert-danger">
                            <strong>{{ $errors->first('genre') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="col-sm-4 col-md-4">
                <div class="element-select" title="Departamento">
                    <label class="title"><span class="required">Departamento</span></label>
                    <div class="input-group">
                        <span class="input-group-addon"> <i class="fa fa-globe"></i></span>

                        <span>
                            <select name="province" >
                                <option value="Islas de la Bahía"  @if (old('province') == 'Islas de la Bahía') selected="selected" @endif >Islas de la Bahía </option>
                                <option value="Cortés"   @if (old('province') == 'Cortés') selected="selected" @endif >Cortés </option>
                                <option value="Atlántida"  @if (old('province') == 'Atlántida') selected="selected" @endif >Atlántida </option>
                                <option value="Colón"  @if (old('province') == 'Colón') selected="selected" @endif >Colón </option>
                                <option value="Gracias a Dios"  @if (old('province') == 'Gracias a Dios') selected="selected" @endif >Gracias a Dios </option>
                                <option value="Copán"  @if (old('province') == 'Copán') selected="selected" @endif >Copán </option>
                                <option value="Santa Bárbara"  @if (old('province') == 'Santa Bárbara') selected="selected" @endif >Santa Bárbara </option>
                                <option value="Yoro"  @if (old('province') == 'Yoro') selected="selected" @endif >Yoro </option>
                                <option value="Olancho"  @if (old('province') == 'Olancho') selected="selected" @endif >Olancho </option>
                                <option value="Ocotepeque"  @if (old('province') == 'Ocotepeque') selected="selected" @endif >Ocotepeque </option>
                                <option value="Lempira"  @if (old('province') == 'Lempira') selected="selected" @endif >Lempira </option>
                                <option value="Intibucá"  @if (old('province') == 'Intibucá') selected="selected" @endif >Intibucá </option>
                                <option value="Comayagua"  @if (old('province') == 'Comayagua') selected="selected" @endif >Comayagua </option>
                                <option value="Francisco Morazán"  @if (old('province') == 'Francisco Morazán') selected="selected" @endif >Francisco Morazán </option>
                                <option value="El Paraíso"  @if (old('province') == 'El Paraíso') selected="selected" @endif >El Paraíso </option>
                                <option value="La Paz"  @if (old('province') == 'La Paz') selected="selected" @endif >La Paz </option>
                                <option value="Valle Choluteca"  @if (old('province') == 'Valle Choluteca') selected="selected" @endif >Valle Choluteca</option>
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
                        <select name="city" >
                            <option value="option 1">option 1</option>
                            <option value="option 2">option 2</option>
                            <option value="option 3">option 3</option>
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
                        <select name="school"  >
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


            <div style="margin: 5px" class="text-center row col-sm-12 col-md-12">
                <div class="text-center ">
                    <input  class="btn btn-success" type="submit"  value="Siguiente Paso" />
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
<script src="{{mix("js/app.js")}}"></script>
<script src="https://use.fontawesome.com/a9aa1689da.js"></script>
</body>
</html>
