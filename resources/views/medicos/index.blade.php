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
                        <a href="{{ url('/medicos/create') }}" class="btn btn-success btn-block">
                            <i class="fa fa-user"></i> Nuevo Medico
                        </a>
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
                                        <h6>Sexo:
                                            @if($medico->sexo=="Hombre")
                                                <i class="fa fa-male fa-2x" aria-hidden="true"></i>
                                            @else
                                                <i class="fa fa-female fa-2x" aria-hidden="true"></i>
                                            @endif</h6>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <a href="{{ url('medicos/'.$medico->id.'/edit') }}"
                                                   class="btn btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </div>
                                            <div class="col-sm-4">
                                                <a href="{{ url('medicos/'.$medico->id.'/especialidades') }}" class="btn btn-inverse btn-success">
                                                    <i class="fa fa-stethoscope"></i>
                                                    </a>
                                            </div>
                                            <div class="col-sm-4">
                                                <form method="POST" action="/medicos/{{ $medico->id }}">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="_method" value="DELETE"/>
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fa fa-close"></i>
                                                    </button>
                                                </form>
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