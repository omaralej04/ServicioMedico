@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">Medicos</div>
                    <br>
                    <div class="col-md-12">
                        <a href="{{ url('/home') }}" class="btn btn-danger btn-block">
                            <i class="fa  fa-arrow-left"></i> Regresar
                            </a>
                        @if(Auth::user()->roles[0]->hasPermissionTo('CreateMedicos') or Auth::user()->can('CreateMedicos'))
                        <a href="{{ url('/medicos/create') }}" class="btn btn-success btn-block">
                            <i class="fa fa-user"></i> Nuevo Medico
                        </a>
                        @else
                            <a href="{{ url('/medicos/create') }}" class="btn btn-success btn-block disabled" disabled="">
                                <i class="fa fa-user"></i> Nuevo Medico
                            </a>
                    @endif
                        <br>
                        <div class="col-lg-6 col-lg-offset-6">
                            <form action="{{ url('/medicos') }}" method="get">
                                <div class="input-group">
                                    <input type="text" name="buscar" id="buscar" class="form-control" placeholder="Buscar por Cedula..." value="{{ @$buscar }}">
                                    <span class="input-group-btn">
                    <button class="btn btn-group-sm" type="submit"><i class="fa fa-search"></i></button>
                </span>
                                </div>
                            </form>
                        </div>
                        <br>
                        <br>
                    </div>

                    <div class="panel-body">
                        @foreach($medicos as $medico)
                            <div class="col-sm-4">
                                <div class="card text-center">
                                    <div class="card-header">
                                        I.D. #{{$medico->id}}
                                    </div>
                                    <div class="card-block">
                                        <h5 class="card-title">{{$medico->nombre.' '.$medico->apellido}}</h5>
                                        <h6>
                                            Cedula: {{$medico->cedula}}
                                        </h6>
                                        <h6>
                                            {{$medico->especialidad->nombre}}
                                        </h6>
                                        <h6>Sexo:
                                            @if($medico->sexo=="Hombre")
                                                <i class="fa fa-male fa-2x" aria-hidden="true"></i>
                                            @else
                                                <i class="fa fa-female fa-2x" aria-hidden="true"></i>
                                            @endif</h6>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                @if(Auth::user()->roles[0]->hasPermissionTo('UpdateMedicos') or Auth::user()->can('UpdateMedicos'))
                                                <a href="{{ url('medicos/'.$medico->id.'/edit') }}"
                                                   class="btn btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                @else
                                                    <a href="{{ url('medicos/'.$medico->id.'/edit') }}"
                                                       class="btn btn-primary disabled" disabled="">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                @endif
                                            </div>
                                            <div class="col-sm-6">
                                                @if(Auth::user()->roles[0]->hasPermissionTo('DeleteMedicos') or Auth::user()->can('DeleteMedicos'))
                                                <form method="POST" action="/medicos/{{ $medico->id }}">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="_method" value="DELETE"/>
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fa fa-close"></i>
                                                    </button>
                                                </form>
                                                    @else
                                                    <form method="POST" action="/medicos/{{ $medico->id }}">
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
                            <div class="col-sm-6">
                                <p class="text-center">
                                    {{ $medicos->appends(['buscar'=>$buscar])->links() }}
                                </p>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection