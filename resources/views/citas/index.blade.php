@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">Citas</div>
                    <br>
                    <div class="col-md-12">
                        <a href="{{ url('/home') }}" class="btn btn-danger btn-block">
                            <i class="fa  fa-arrow-left"></i> Regresar
                            </a>
                        @if(Auth::user()->roles[0]->hasPermissionTo('CreateCitas') or Auth::user()->can('CreateCitas'))
                        <a href="{{ url('/citas/create') }}" class="btn btn-success btn-block">
                            <i class="fa fa-calendar-plus-o"></i> Nueva Cita
                        </a>
                        @else
                        <a href="{{ url('/citas/create') }}" class="btn btn-success btn-block disabled" disabled="true">
                            <i class="fa fa-calendar-plus-o"></i> Nueva Cita
                        </a>
                        @endif
                        <a href="{{ url('/citas/inactivas') }}" class="btn btn-inverse btn-block">
                            <i class="fa fa-calendar-minus-o"></i> Citas Inactivas
                        </a>
                        <br>
                    </div>
                    <div class="panel-body">
                    @foreach($citas as $cita)
                            <div class="col-sm-4">
                                <div class="card text-center">
                                    <div class="card-header">
                                        I.D. #{{$cita->id}}
                                    </div>
                                    <div class="card-block">
                                        <h5 class="card-title">
                                            {{$cita->userpaciente->nombre.' '.$cita->userpaciente->apellido}}
                                        </h5>
                                        <h6>Medico: {{$cita->usermedico->nombre.' '.$cita->usermedico->apellido}}
                                            <br>
                                            {{$cita->especialidad->nombre}}
                                        </h6>
                                        <h6>
                                            Fecha: {{$cita->fecha_cita.' '.$cita->hora}}
                                        </h6>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-sm-6">
                                            @if(Auth::user()->roles[0]->hasPermissionTo('UpdateCitas') or Auth::user()->can('UpdateCitas'))
                                                <a href="{{ url('citas/'.$cita->id.'/edit') }}"
                                                   class="btn btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                @else
                                                    <a href="{{ url('citas/'.$cita->id.'/edit') }}"
                                                       class="btn btn-primary disabled" disabled="">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                @endif
                                            </div>
                                            <div class="col-sm-6">
                                            @if(Auth::user()->roles[0]->hasPermissionTo('DeleteCitas') or Auth::user()->can('DeleteCitas'))
                                                <form method="POST" action="/citas/{{ $cita->id }}">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="_method" value="DELETE"/>
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fa fa-close"></i>
                                                    </button>
                                                </form>
                                                @else
                                                    <form method="POST" action="/citas/{{ $cita->id }}">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="hidden" name="_method" value="DELETE"/>
                                                        <button type="submit" class="btn btn-danger disabled" disabled>
                                                            <i class="fa fa-close"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection