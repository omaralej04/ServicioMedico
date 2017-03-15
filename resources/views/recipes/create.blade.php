@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear Recipe</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST"
                              action="{{ url('/historia/'.$historia->id.'/recipe/') }}">
                            {{ csrf_field() }}
                            {{ method_field('POST') }}

                            <div class="form-group{{ $errors->has('paciente_id') ? ' has-error' : '' }}">
                                <label for="paciente_id" class="col-md-4 control-label">Paciente</label>

                                <div class="col-md-6">
                                    <select name="paciente_id" id="paciente_id" class="form-control" readonly="">
                                        <option value="">{{$historia->userpaciente->nombre.' '.$historia->userpaciente->apellido}}</option>
                                    </select>

                                    @if ($errors->has('paciente_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('paciente_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('consulta_id') ? ' has-error' : '' }}">
                                <label for="consulta_id" class="col-md-4 control-label">Consulta</label>

                                <div class="col-md-6">
                                    <select name="consulta_id" id="consulta_id" class="form-control" readonly="">
                                            <option value="{{$historia->id}}">{{$historia->cita->fecha_cita}}</option>
                                    </select>

                                    @if ($errors->has('consulta_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('consulta_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('stauts') ? ' has-error' : '' }}">
                                <label for="status" class="col-md-4 control-label">Status</label>

                                <div class="col-md-6">
                                    <select name="status" id="status" class="form-control">
                                        <option value="pendiente">Pendiente</option>
                                        <option value="entregado">Entregado</option>

                                    </select>

                                    @if ($errors->has('status'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('medicinas') ? ' has-error' : '' }}">
                                <label for="medicinas" class="col-md-4 control-label">Medicinas (Max. 3)</label>

                                <div class="col-md-6">
                                    @foreach($medicinas as $medicina)

                                        <input type="checkbox" name="medicinas[]" value="{{$medicina->id}}">{{$medicina->nombre}}&#8195;

                                        @endforeach
                                    @if ($errors->has('medicinas'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('medicinas') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                                <label for="descripcion" class="col-md-4 control-label">Descripcion</label>

                                <div class="col-md-6">
                                    <textarea id="descripcion" class="form-control" name="descripcion" required
                                              style="resize: none">

                                    </textarea>
                                    @if ($errors->has('descripcion'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('descripcion') }}</strong>
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
