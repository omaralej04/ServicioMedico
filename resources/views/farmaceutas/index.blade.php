@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">Farmaceutas</div>
                    <br>
                    <div class="col-md-12">
                        <a href="{{ url('/home') }}" class="btn btn-danger btn-block">
                            <i class="fa fa-arrow-left"></i> Regresar
                            </a>
                        @if(Auth::user()->roles[0]->hasPermissionTo('CreateFarmaceutas') or Auth::user()->can('CreateFarmaceutas'))
                            <a href="{{ url('/farmaceutas/create') }}" class="btn btn-success btn-block">
                                <i class="fa fa-user"></i> Nuevo Usuario
                            </a>
                        @else
                            <a href="{{ url('/farmaceutas/create') }}" class="btn btn-success btn-block disabled" disabled="">
                                <i class="fa fa-user"></i> Nuevo Usuario
                            </a>
                        @endif
                        @if($t)
                            <a href="{{ url('/recipes/all') }}" class="btn btn-success btn-block">
                                <i class="fa fa-id-badge"></i> Recipes Pendientes
                            </a>
                        @endif
                        <br>
                        <div class="col-lg-6 col-lg-offset-6">
                            <form action="{{ url('/farmaceutas') }}" method="get">
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
                        @foreach($farmaceutas as $farmaceuta)
                            <div class="col-sm-4">
                                <div class="card text-center">
                                    <div class="card-header">
                                        I.D. #{{$farmaceuta->id}}
                                    </div>
                                    <div class="card-block">
                                        <h5 class="card-title">{{$farmaceuta->nombre.' '.$farmaceuta->apellido}}</h5>
                                        <h6>
                                            Cedula: {{$farmaceuta->cedula}}
                                        </h6>
                                        <h6>Sexo:
                                            @if($farmaceuta->sexo=="Hombre")
                                                <i class="fa fa-male fa-2x" aria-hidden="true"></i>
                                            @else
                                                <i class="fa fa-female fa-2x" aria-hidden="true"></i>
                                            @endif</h6>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-sm-6">
                                        @if(Auth::user()->roles[0]->hasPermissionTo('UpdateFarmaceutas') or Auth::user()->can('UpdateFarmaceutas'))
                                                <a href="{{ url('farmaceutas/'.$farmaceuta->id.'/edit') }}"
                                                   class="btn btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            @else
                                                    <a href="{{ url('farmaceutas/'.$farmaceuta->id.'/edit') }}"
                                                       class="btn btn-primary disabled" disabled="">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                        @endif
                                            </div>
                                            <div class="col-sm-6">
                                        @if(Auth::user()->roles[0]->hasPermissionTo('DeleteFarmaceutas') or Auth::user()->can('DeleteFarmaceutas'))
                                                <form method="POST" action="/farmaceutas/{{ $farmaceuta->id }}">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="_method" value="DELETE"/>
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fa fa-close"></i>
                                                    </button>
                                                </form>
                                            @else
                                                    <form method="POST" action="/farmaceutas/{{ $farmaceuta->id }}">
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
                                    {{ $farmaceutas->appends(['buscar'=>$buscar])->links() }}
                                </p>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection