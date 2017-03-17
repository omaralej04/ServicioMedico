@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">Recipes</div>
                    <br>
                    <div class="col-md-12">
                        <a href="{{ url('/farmaceutas') }}" class="btn btn-danger btn-block">
                            <i class="fa  fa-arrow-left"></i> Regresar
                        </a>
                        <a href="{{ url('/recipes/all') }}" class="btn btn-inverse btn-block">
                            <i class="fa fa-calendar-minus-o"></i> Recipes Activos
                        </a>
                        <br>
                    </div>
                    <div class="panel-body">
                        @foreach($recipes as $recipe)
                            <div class="col-sm-4">
                                <div class="card text-center">
                                    <div class="card-header">
                                        I.D. #{{$recipe->id}}
                                    </div>
                                    <div class="card-block">
                                        <h5 class="card-title">
                                            {{$recipe->historia->userpaciente->nombre.' '.$recipe->historia->userpaciente->apellido}}
                                        </h5>
                                        <h6>
                                            Medico: {{$recipe->historia->usermedico->nombre.' '.$recipe->historia->usermedico->apellido}}
                                            <br>
                                            {{$recipe->historia->usermedico->especialidad->nombre}}
                                        </h6>
                                        <h6>
                                            Medicinas: {{$recipe->medicina[0]->nombre}}
                                        </h6>
                                        <h6>Descripcion: {{$recipe->descripcion}}</h6>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <form method="POST" action="/recipes/{{ $recipe->id }}/res">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="_method" value="PATCH"/>
                                                    <button type="submit" class="btn btn-info">
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