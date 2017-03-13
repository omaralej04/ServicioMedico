@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Nueva Consulta</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/users/'.$user->id.'/historias') }}">
                            {{ csrf_field() }}
                            {{ method_field('POST') }}

                            <div class="form-group{{ $errors->has('paciente_id') ? ' has-error' : '' }}">
                                <label for="paciente_id" class="col-md-4 control-label">Paciente</label>

                                <div class="col-md-6">
                                    <select name="paciente_id" id="paciente_id" class="form-control">
                                        <option value="{{$user->id}}">{{$user->nombre.' '.$user->apellido}}</option>
                                    </select>

                                    @if ($errors->has('paciente_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('paciente_id') }}</strong>
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

                            <div class="form-group{{ $errors->has('medico_id') ? ' has-error' : '' }}">
                                <label for="medico_id" class="col-md-4 control-label">Medico</label>

                                <div class="col-md-6">
                                    <select name="medico_id" id="medico_id" class="form-control">
                                        <option value="">Seleccione</option>
                                        @foreach($medicos as $medico)
                                            <option value="{{$medico->id}}">{{$medico->nombre.' '.$medico->apellido}}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('medico_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('medico_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('cita_id') ? ' has-error' : '' }}">
                                <label for="cita_id" class="col-md-4 control-label">Cita</label>

                                <div class="col-md-6">
                                    <select name="cita_id" id="cita_id" class="form-control">
                                        <option value="">Seleccione</option>
                                        @foreach($citas as $cita)
                                            <option value="{{$cita->id}}">{{$cita->fecha_cita.' '.$cita->hora}}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('cita_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('cita_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('informe') ? ' has-error' : '' }}">
                                <label for="informe" class="col-md-4 control-label">Informe</label>

                                <div class="col-md-6">
                                    <textarea id="informe" class="form-control" name="informe" required style="resize: none">

                                    </textarea>
                                    @if ($errors->has('informe'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('informe') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('receta') ? ' has-error' : '' }}">
                                <label for="receta" class="col-md-4 control-label">Receta</label>

                                <div class="col-md-6">
                                    <textarea id="receta" class="form-control" name="receta" required style="resize: none">

                                    </textarea>
                                    @if ($errors->has('receta'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('receta') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('observaciones') ? ' has-error' : '' }}">
                                <label for="observaciones" class="col-md-4 control-label">Observaciones</label>

                                <div class="col-md-6">
                                    <textarea id="observaciones" class="form-control" name="observaciones" required style="resize: none">

                                    </textarea>
                                    @if ($errors->has('observaciones'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('observaciones') }}</strong>
                                    </span>
                                    @endif
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
