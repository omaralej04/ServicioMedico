@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">Recipe</div>
                    <br>
                    <div class="col-md-12">
                        <a href="{{ url('/users') }}" class="btn btn-danger btn-block">
                            <i class="fa  fa-arrow-left"></i> Regresar
                        </a>
                        <a href="{{url('/historia/'.$historia->id.'/createrecp')}}" class="btn btn-success btn-block">
                            <i class="fa fa-id-badge"></i> Generar Recipe
                        </a>
                        <br>
                    </div>
                    <div class="panel-body">
                        @foreach($recipes as $recipe)
                            <p>{{$recipe}}</p>
                            {{--<div class="col-md-8 col-md-offset-2">--}}
                                {{--<div class="card text-center">--}}
                                    {{--<div class="card-header">--}}
                                        {{--I.D. #{{$recipe->id}}--}}
                                    {{--</div>--}}
                                    {{--<div class="card-block">--}}
                                        {{--<table class="table table-bordered">--}}
                                            {{--<tr>--}}
                                                {{--<th colspan="2">--}}
                                                    {{--<h6 class="card-title text-center">Consulta:</h6>--}}
                                                {{--</th>--}}
                                            {{--</tr>--}}
                                            {{--<tr>--}}
                                                {{--<td>--}}
                                                    {{--<p class="card-text">Con: {{$recipe->especialidad->nombre}}</p>--}}
                                                {{--</td>--}}
                                                {{--<td>--}}
                                                    {{--<p class="card-text">Informe: {{$historia->informe}}</p>--}}
                                                {{--</td>--}}
                                            {{--</tr>--}}
                                            {{--<tr>--}}
                                                {{--<td>--}}
                                                    {{--<p class="card-text">--}}
                                                        {{--Medico: {{$historia->usermedico->nombre.' '.$historia->usermedico->apellido}}</p>--}}
                                                {{--</td>--}}
                                                {{--<td>--}}
                                                    {{--<p class="card-text">Receta: {{$historia->receta}}</p>--}}
                                                {{--</td>--}}
                                            {{--</tr>--}}
                                            {{--<tr>--}}
                                                {{--<td>--}}
                                                    {{--<p class="card-text">--}}
                                                    {{--Cita: {{$historia->cita->fecha_cita.' '.$historia->cita->hora}}</p>--}}
                                                {{--</td>--}}
                                                {{--<td>--}}
                                                    {{--<p class="card-text">{{$historia->observaciones}}</p>--}}
                                                {{--</td>--}}
                                            {{--</tr>--}}
                                        {{--</table>--}}
                                    {{--</div>--}}
                                    {{--<div class="card-footer text-muted">--}}
                                        {{--<div class="row">--}}
                                            {{--<div class="col-sm-6">--}}
                                            {{--@if(Auth::user()->roles[0]->hasPermissionTo('DeleteHistorias') or Auth::user()->can('DeleteHistorias'))--}}
                                            {{--<form method="POST" action="/historia/{{$historia->id}}">--}}
                                                {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                                                {{--<input type="hidden" name="_method" value="DELETE"/>--}}
                                                {{--<button type="submit" class="btn btn-danger">--}}
                                                    {{--<i class="fa fa-close"></i>--}}
                                                {{--</button>--}}
                                                    {{--</form>--}}
                                        {{--@else--}}
                                                {{--<form method="POST" action="/historia/{{$historia->id}}">--}}
                                                    {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                                                    {{--<input type="hidden" name="_method" value="DELETE"/>--}}
                                                    {{--<button type="submit" class="btn btn-danger" disabled>--}}
                                                        {{--<i class="fa fa-close"></i>--}}
                                                    {{--</button>--}}
                                                {{--</form>--}}
                                            {{--@endif--}}
                                                {{--</div>--}}
                                            {{--<div class="col-sm-6">--}}
                                                {{--<div class="col-sm-4">--}}
                                                    {{--<a href="{{ url('historia/'.$historia->id.'/recipe') }}" class="btn btn-inverse btn-success">--}}
                                                        {{--<i class="fa fa-book"></i>--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<br>--}}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
@endsection