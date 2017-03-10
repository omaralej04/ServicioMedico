@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear Cita</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/citas') }}">
                            {{ csrf_field() }}
                            {{ method_field('POST') }}

                            <div class="form-group{{ $errors->has('fecha_cita') ? ' has-error' : '' }}">
                                <label for="fecha_cita" class="col-md-4 control-label">Fecha (DD/MM)</label>

                                <div class="col-md-6">
                                    <input id="fecha_cita" type="text" class="form-control" name="fecha_cita" value="{{ old('fecha_cita') }}" required autofocus>

                                    @if ($errors->has('fecha_cita'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('fecha_cita') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('hora') ? ' has-error' : '' }}">
                                <label for="hora" class="col-md-4 control-label">Hora (HH:MM AM-PM)</label>

                                <div class="col-md-6">
                                    <input id="hora" type="text" class="form-control" name="hora" value="{{ old('hora') }}" required autofocus>

                                    @if ($errors->has('hora'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('hora') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('observaciones') ? ' has-error' : '' }}">
                                <label for="observaciones" class="col-md-4 control-label">Observaciones</label>

                                <div class="col-md-6">
                                    <textarea id="observaciones" style="resize: none;" class="form-control" name="observaciones" required autofocus>
                                    </textarea>
                                    @if ($errors->has('observaciones'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('observaciones') }}</strong>
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

                            <div class="form-group{{ $errors->has('paciente_id') ? ' has-error' : '' }}">
                                <label for="paciente_id" class="col-md-4 control-label">Paciente</label>

                                <div class="col-md-6">
                                    <select name="paciente_id" id="paciente_id" class="form-control">
                                        <option value="">Seleccione</option>
                                        @foreach($pacientes as $paciente)
                                            <option value="{{$paciente->id}}">{{$paciente->nombre.' '.$paciente->apellido}}</option>
                                        @endforeach
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

                            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                <label for="status" class="col-md-4 control-label">Status</label>

                                <div class="col-md-6">
                                    <select name="status" id="status" class="form-control">
                                        <option value="">Seleccione</option>
                                        <option value="activa">Activa</option>
                                        <option value="inactiva">Inactiva</option>
                                        <option value="cancelada">Cancelada</option>
                                    </select>

                                    @if ($errors->has('status'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
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
