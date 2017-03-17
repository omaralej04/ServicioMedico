@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">Especialidades</div>
                    <br>
                    <div class="col-md-12">
                        <a href="{{ url('/home') }}" class="btn btn-danger btn-block">
                            <i class="fa  fa-arrow-left"></i> Regresar
                            </a>
                        @if(Auth::user()->roles[0]->hasPermissionTo('CreateEspecialidades') or Auth::user()->can('CreateEspecialidades'))
                        <a href="{{ url('/especialidades/create') }}" class="btn btn-success btn-block">
                            <i class="fa fa-archive"></i> Nueva Especialidad
                        </a>
                        @else
                            <a href="{{ url('/especialidades/create') }}" class="btn btn-success btn-block disabled" disabled="">
                                <i class="fa fa-archive"></i> Nueva Especialidad
                            </a>
                    @endif
                        <br>
                    </div>

                    <div class="panel-body">
                        @foreach($especialidades as $especialidad)
                            <div class="col-sm-4">
                                <div class="card text-center">
                                    <div class="card-header">
                                        I.D. #{{$especialidad->id}}
                                    </div>
                                    <div class="card-block">
                                        <h5 class="card-title">{{$especialidad->nombre}}</h5>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-sm-6">
                                @if(Auth::user()->roles[0]->hasPermissionTo('UpdateEspecialidades') or Auth::user()->can('UpdateEspecialidades'))
                                                <a href="{{ url('especialidades/'.$especialidad->id.'/edit') }}"
                                                   class="btn btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            @else
                                                    <a href="{{ url('especialidades/'.$especialidad->id.'/edit') }}"
                                                       class="btn btn-primary disabled" disabled="">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                        @endif
                                            </div>
                                            <div class="col-sm-6">
                                @if(Auth::user()->roles[0]->hasPermissionTo('DeleteEspecialidades') or Auth::user()->can('DeleteEspecialidades'))
                                                <form method="POST" action="/especialidades/{{ $especialidad->id }}">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="_method" value="DELETE"/>
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fa fa-close"></i>
                                                    </button>
                                                </form>
                                        @else
                                                    <form method="POST" action="/especialidades/{{ $especialidad->id }}">
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
                                <br>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection