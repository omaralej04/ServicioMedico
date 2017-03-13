@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">Historial de {{$user->nombre}}</div>
                    <br>
                    <div class="col-md-12">
                        <a href="{{ url('/users') }}" class="btn btn-danger btn-block">
                            <i class="fa  fa-arrow-left"></i> Regresar
                        </a>
                        {{--@if(Auth::user()->roles[0]->hasPermissionTo('CreateUsers') or Auth::user()->can('CreateUsers'))--}}
                        <a href="{{ url('/users/create') }}" class="btn btn-success btn-block">
                            <i class="fa fa-archive"></i> Nueva Entrada
                        </a>
                        {{--@else--}}
                        {{--<a href="{{ url('/users/create') }}" class="btn btn-success btn-block disabled" disabled="true">--}}
                        {{--<i class="fa fa-user"></i> Nuevo Usuario--}}
                        {{--</a>--}}
                        {{--@endif--}}
                        {{--<br>--}}
                    </div>

                    <div class="panel-body">

                        @foreach($historias as $historia)
                            <div class="col-md-8 col-md-offset-2">
                                <div class="card text-center">
                                    <div class="card-header">
                                        I.D. #{{$historia->id}}
                                    </div>
                                    <div class="card-block">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th colspan="2">
                                                    <h6 class="card-title text-center">Consulta:</h6>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="card-text">Con: {{$historia->especialidad->nombre}}</p>
                                                </td>
                                                <td>
                                                    <p class="card-text">Informe: {{$historia->informe}}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="card-text">
                                                        Medico: {{$historia->usermedico->nombre.' '.$historia->usermedico->apellido}}</p>
                                                </td>
                                                <td>
                                                    <p class="card-text">Receta: {{$historia->receta}}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="card-text">
                                                    Cita: {{$historia->cita->fecha_cita.' '.$historia->cita->hora}}</p>
                                                </td>
                                                <td>
                                                    <p class="card-text">{{$historia->observaciones}}</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="card-footer text-muted">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                    <a href="{{ url('users/'.$user->id.'/historias/'.$historia->id.'/edit') }}"
                                                       class="btn btn-primary">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                            </div>
                                            <div class="col-sm-6">
                                                    <form method="POST" action="/users/{{ $user->id }}/historias/{{$historia->id}}">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="hidden" name="_method" value="DELETE"/>
                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="fa fa-close"></i>
                                                        </button>
                                                    </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                    {{--@foreach($historias as $historia)--}}
                                    {{--<div class="col-sm-4">--}}
                                    {{--<div class="card text-center">--}}
                                    {{--<div class="card-header">--}}
                                    {{--I.D. #{{$historia->id}}--}}
                                    {{--</div>--}}
                                    {{--<div class="card-block">--}}
                                    {{--<h5 class="card-title">{{$historia->especialidad->nombre}}</h5>--}}
                                    {{--<h6>--}}
                                    {{--Medico: {{$historia->usermedico->nombre.' '.$historia->usermedico->apellido}}--}}
                                    {{--</h6>--}}
                                    {{--<h6>Cita: {{$historia->cita->fecha_cita.' '.$historia->cita->hora}}</h6>--}}
                                    {{--</div>--}}
                                    {{--<div class="card-footer">--}}
                                    {{--<div class="row">--}}
                                    {{--<div class="col-sm-6">--}}
                                    {{--@if(Auth::user()->roles[0]->hasPermissionTo('UpdateUsers') or Auth::user()->can('UpdateUsers'))--}}
                                    {{--<a href="{{ url('users/'.$user->id.'/edit') }}"--}}
                                    {{--class="btn btn-primary">--}}
                                    {{--<i class="fa fa-edit"></i>--}}
                                    {{--</a>--}}
                                    {{--@else--}}
                                    {{--<a href="{{ url('users/'.$user->id.'/edit') }}"--}}
                                    {{--class="btn btn-primary disabled" disabled="">--}}
                                    {{--<i class="fa fa-edit"></i>--}}
                                    {{--</a>--}}
                                    {{--@endif--}}
                                    {{--</div>--}}
                                    {{--<div class="col-sm-6">--}}
                                    {{--@if(Auth::user()->roles[0]->hasPermissionTo('DeleteUsers') or Auth::user()->can('DeleteUsers'))--}}
                                    {{--<form method="POST" action="/users/{{ $user->id }}">--}}
                                    {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                                    {{--<input type="hidden" name="_method" value="DELETE"/>--}}
                                    {{--<button type="submit" class="btn btn-danger">--}}
                                    {{--<i class="fa fa-close"></i>--}}
                                    {{--</button>--}}
                                    {{--</form>--}}
                                    {{--@else--}}
                                    {{--<form method="POST" action="/users/{{ $user->id }}">--}}
                                    {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                                    {{--<input type="hidden" name="_method" value="DELETE"/>--}}
                                    {{--<button type="submit" class="btn btn-danger disabled" disabled>--}}
                                    {{--<i class="fa fa-close"></i>--}}
                                    {{--</button>--}}
                                    {{--</form>--}}
                                    {{--@endif--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--@endforeach--}}
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
@endsection