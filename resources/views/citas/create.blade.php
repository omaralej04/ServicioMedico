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

                            {{--$table->integer('user_id')->unsigned();--}}
                            {{--$table->foreign('user_id')->references('id')->on('users');--}}
                            {{--$table->integer('especialidad_id')->unsigned();--}}
                            {{--$table->foreign('especialidad_id')->references('id')->on('especialidads');--}}
                            {{--$table->date('fecha_cita');--}}
                            {{--$table->string('hora');--}}
                            {{--$table->text('observaciones');--}}

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

                            <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                                <label for="user_id" class="col-md-4 control-label">Usuario</label>

                                <div class="col-md-6">
                                    <select name="user_id" id="user_id" class="form-control">
                                        <option value="">Seleccione</option>
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->nombre.' '.$user->apellido}}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('user_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('user_id') }}</strong>
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
