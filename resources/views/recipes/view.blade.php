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
                        <br>
                    </div>
                    <div class="panel-body">
                        <div class="col-sm-4">
                            <div class="card text-center">
                                <div class="card-header">
                                Status: {{$historia->recipe[0]->status}}
                                </div>
                                <div class="card-block">
                                    <h5 class="card-title">
                                        {{$historia->userpaciente->nombre.' '.$historia->userpaciente->apellido}}
                                    </h5>
                                    <h6>Medico: {{$historia->usermedico->nombre.' '.$historia->usermedico->apellido}}
                                        <br>
                                        Medicinas: @foreach($medicinas as $medicina)
                                                       {{dd($medicina)}}
                                                       @endforeach
                                        <br>
                                        Descripcion:
                                        <br>
                                        {{$historia->recipe[0]->descripcion}}
                                    </h6>
                                    <h6>

                                    </h6>
                                </div>
                                {{--<div class="card-footer">--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="col-sm-6">--}}
                                            {{--@if(Auth::user()->roles[0]->hasPermissionTo('UpdateCitas') or Auth::user()->can('UpdateCitas'))--}}
                                                {{--<a href="{{ url('citas/'.$cita->id.'/edit') }}"--}}
                                                   {{--class="btn btn-primary">--}}
                                                    {{--<i class="fa fa-edit"></i>--}}
                                                {{--</a>--}}
                                            {{--@else--}}
                                                {{--<a href="{{ url('citas/'.$cita->id.'/edit') }}"--}}
                                                   {{--class="btn btn-primary disabled" disabled="">--}}
                                                    {{--<i class="fa fa-edit"></i>--}}
                                                {{--</a>--}}
                                            {{--@endif--}}
                                        {{--</div>--}}
                                        {{--<div class="col-sm-6">--}}
                                            {{--@if(Auth::user()->roles[0]->hasPermissionTo('DeleteCitas') or Auth::user()->can('DeleteCitas'))--}}
                                                {{--<form method="POST" action="/citas/{{ $cita->id }}">--}}
                                                    {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                                                    {{--<input type="hidden" name="_method" value="DELETE"/>--}}
                                                    {{--<button type="submit" class="btn btn-danger">--}}
                                                        {{--<i class="fa fa-close"></i>--}}
                                                    {{--</button>--}}
                                                {{--</form>--}}
                                            {{--@else--}}
                                                {{--<form method="POST" action="/citas/{{ $cita->id }}">--}}
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
                            </div>
                        </div>
                            <br>
                    </div>
                </div>
            </div>
        </div>
@endsection