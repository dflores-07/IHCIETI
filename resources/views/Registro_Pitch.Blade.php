@extends('layouts.system')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('identification_card') ? ' has-error' : '' }}">
                            <label for="identification_card" class="col-md-4 control-label">Numero de Identidad</label>

                            <div class="col-md-6">
                                <input id="identification_card" type="text" class="form-control" name="identification_card" value="{{ old('identification_card') }}" required autofocus>

                                @if ($errors->has('identification_card'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('identification_card') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre Completo</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required >

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="project-name" class="col-md-4 control-label">Nombre Proyecto</label>

                            <div class="col-md-6">
                                <input id="project-name" type="text" class="form-control" name="project-name" value="{{ old('project-name') }}" required >

                                @if ($errors->has('project-name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('project-name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('project-description') ? ' has-error' : '' }}">
                            <label for="project-description" class="col-md-4 control-label">Descripción del Proyecto</label>

                            <div class="col-md-6">
                                <input id="project-description" type="text" class="form-control" name="project-description" value="{{ old('project-description') }}" required >

                                @if ($errors->has('project-description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('project-description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                     <div class="col-sm-4 col-md-4">
                        <div class="element-select" title="status-project">
                                <label class="title"><span class="required">Estado del Proyecto</span></label>
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


                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Teléfono</label>

                            <div class="col-md-6">
                                <input id="phone" type="number" class="form-control" prefix="00000000" maxlength="8" minlength="8" name="phone" value="{{ old('phone') }}" required>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Correo Electrónico</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label"></label>

                            <div class="col-md-6">
                                <input id="password" type="hidden" class="form-control" name="password" value="999999" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label"></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="hidden" class="form-control" name="password_confirmation"  value="999999" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection