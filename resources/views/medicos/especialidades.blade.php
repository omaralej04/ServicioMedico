@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Medicos</div>

                    <div class="panel-body">
                        Medico y Especialidad

                        <table class="table table-bordered text-center">
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Cedula</th>
                                <th>Especialidad</th>
                                <th>Acciones</th>
                            </tr>
                            <tr>
                                <td>{{ $medico->nombre }}</td>
                                <td>{{ $medico->apellido }}</td>
                                <td>{{$medico->cedula}}</td>
                                <td>{{$medico->especialidad}}</td>
                                <td>
                                    <a href="{{ url('medicos/'.$medico->id.'/editespecialidad') }}" class="btn btn-success">
                                        <i class="fa fa-check-circle"></i>
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
