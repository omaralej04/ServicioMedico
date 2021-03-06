@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">Tus Citas</div>
                    <br>
                    <div class="col-md-12">
                        <a href="{{ url('/home') }}" class="btn btn-danger btn-block">
                            <i class="fa  fa-arrow-left"></i> Regresar
                        </a>
                        <a href="{{ url('/miscitas') }}" class="btn btn-inverse btn-block">
                            <i class="fa fa-calendar-minus-o"></i> Citas Activas
                        </a>
                        <br>
                    </div>
                    <div class="panel-body">
                        @foreach($citas as $cita)
                            <div class="col-sm-4">
                                <div class="card text-center">
                                    <div class="card-header">
                                        {{$cita->especialidad->nombre}}
                                    </div>
                                    <div class="card-block">
                                        <h5 class="card-title">Medico: {{$cita->usermedico->nombre.' '.$cita->usermedico->apellido}}
                                            <br></h5>
                                        <h6>
                                            Fecha: {{$cita->fecha_cita.' '.$cita->hora}}
                                        </h6>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                           <h5>{{$cita->status}}</h5>
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