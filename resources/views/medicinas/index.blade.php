@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">Medicinas</div>
                    <br>
                    <div class="col-md-12">
                        <a href="{{ url('/home') }}" class="btn btn-danger btn-block">
                            <i class="fa  fa-arrow-left"></i> Regresar
                            </a>
                        @if(Auth::user()->roles[0]->hasPermissionTo('CreateMedicinas') or Auth::user()->can('CreateMedicinas'))
                        <a href="{{ url('/medicinas/create') }}" class="btn btn-success btn-block">
                            <i class="fa fa-archive"></i> Nueva Medicina
                        </a>
                        @else
                            <a href="{{ url('/medicinas/create') }}" class="btn btn-success btn-block disabled" disabled="">
                                <i class="fa fa-archive"></i> Nueva Medicina
                            </a>
                        @endif
                        <br>
                        <div class="col-lg-6 col-lg-offset-6">
                            <form action="{{ url('/medicinas') }}" method="get">
                                <div class="input-group">
                                    <input type="text" name="buscar" id="buscar" class="form-control" placeholder="Buscar por Nombre..." value="{{ @$buscar }}">
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
                        @foreach($medicinas as $medicina)
                            <div class="col-sm-4">
                                <div class="card text-center">
                                    <div class="card-header">
                                        I.D. #{{$medicina->id}}
                                    </div>
                                    <div class="card-block">
                                        <h5 class="card-title">{{$medicina->nombre}}</h5>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-sm-6">
                                        @if(Auth::user()->roles[0]->hasPermissionTo('UpdateMedicinas') or Auth::user()->can('UpdateMedicinas'))
                                                    <a href="{{ url('medicinas/'.$medicina->id.'/edit') }}"
                                                       class="btn btn-primary">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                            @else
                                                    <a href="{{ url('medicinas/'.$medicina->id.'/edit') }}"
                                                       class="btn btn-primary disabled" disabled="">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                        @endif
                                            </div>
                                            <div class="col-sm-6">
                                            @if(Auth::user()->roles[0]->hasPermissionTo('DeleteMedicinas') or Auth::user()->can('DeleteMedicinas'))
                                                <form method="POST" action="/medicinas/{{ $medicina->id }}">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="_method" value="DELETE"/>
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fa fa-close"></i>
                                                    </button>
                                                </form>
                                                @else
                                                    <form method="POST" action="/medicinas/{{ $medicina->id }}">
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
                            <div class="col-sm-6">
                                <p class="text-center">
                                    {{ $medicinas->appends(['buscar'=>$buscar])->links() }}
                                </p>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection