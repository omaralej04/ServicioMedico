@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear Usuario</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/medicos') }}">
                            {{ csrf_field() }}
                            {{ method_field('POST') }}

                            <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                                <label for="nombre" class="col-md-4 control-label">Nombre</label>

                                <div class="col-md-6">
                                    <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" required autofocus>

                                    @if ($errors->has('nombre'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
                                <label for="apellido" class="col-md-4 control-label">Apellido</label>

                                <div class="col-md-6">
                                    <input id="apellido" type="text" class="form-control" name="apellido" value="{{ old('apellido') }}" required>

                                    @if ($errors->has('apellido'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('apellido') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('cedula') ? ' has-error' : '' }}">
                                <label for="cedula" class="col-md-4 control-label">Cedula</label>

                                <div class="col-md-6">
                                    <input id="cedula" type="text" class="form-control" name="cedula" value="{{ old('cedula') }}" required>

                                    @if ($errors->has('cedula'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('cedula') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('fecha_nacimiento') ? ' has-error' : '' }}">
                                <label for="fecha_nacimiento" class="col-md-4 control-label">Fecha De Nacimiento</label>

                                <div class="col-md-6">
                                    <input id="fecha_nacimiento" type="date" class="form-control" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" required>

                                    @if ($errors->has('fecha_nacimiento'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('fecha_nacimiento') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('sexo') ? ' has-error' : '' }}">
                                <label for="sexo" class="col-md-4 control-label">Sexo</label>

                                <div class="col-md-6">
                                    <input id="sexo" type="radio" name="sexo" value="Hombre" checked>Hombre <br>
                                    <input id="sexo" type="radio" name="sexo" value="Mujer">Mujer

                                    @if ($errors->has('sexo'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('sexo') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                                <label for="direccion" class="col-md-4 control-label">Direccion</label>

                                <div class="col-md-6">
                                    <textarea id="direccion" class="form-control" name="direccion" required style="resize: none"></textarea>
                                    @if ($errors->has('direccion'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('direccion') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                                <label for="telefono" class="col-md-4 control-label">Telefono (Opcional)</label>

                                <div class="col-md-6">
                                    <input id="telefono" type="tel" class="form-control" name="telefono" value="{{ old('telefono') }}">

                                    @if ($errors->has('telefono'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('celular') ? ' has-error' : '' }}">
                                <label for="celular" class="col-md-4 control-label">Celular (Opcional)</label>

                                <div class="col-md-6">
                                    <input id="celular" type="tel" class="form-control" name="celular" value="{{ old('celular') }}">

                                    @if ($errors->has('celular'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('celular') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                                <label for="role" class="col-md-4 control-label">Role</label>

                                <div class="col-md-6">
                                    <select name="role" id="role" class="form-control">
                                        <option value="">Seleccione</option>
                                        @foreach($roles as $role)
                                            @if($role->name == 'Medico') <option value="{{$role->name}}">{{$role->name}}</option>@endif
                                        @endforeach
                                    </select>

                                    @if ($errors->has('role'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('especialidad_id') ? ' has-error' : '' }}">
                                <label for="especialidad_id" class="col-md-4 control-label">Especialidad</label>

                            <div class="col-md-6">
                                <select name="especialidad_id" id="especialidad_id" class="form-control">
                                    <option value="">Seleccione</option>
                                    @foreach($especialidades as $especialidad)
                                        <option value="{{$especialidad->id}}">{{$especialidad->nombre}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('especialidad_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('especialidad_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                                </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Contraseña</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Confirmar Contraseña</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Crear
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

