@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">Usuarios</div>
                    <br>
                    <div class="col-md-12">
                        <a href="{{ url('/home') }}" class="btn btn-danger btn-block">
                            <i class="fa  fa-arrow-left"></i> Regresar
                            </a>
                        @if(Auth::user()->roles[0]->hasPermissionTo('CreateUsers') or Auth::user()->can('CreateUsers'))
                        <a href="{{ url('/users/create') }}" class="btn btn-success btn-block">
                            <i class="fa fa-user"></i> Nuevo Usuario
                        </a>
                        @else
                        <a href="{{ url('/users/create') }}" class="btn btn-success btn-block disabled" disabled="true">
                            <i class="fa fa-user"></i> Nuevo Usuario
                        </a>
                        @endif
                        <br>
                        <div class="col-lg-6 col-lg-offset-6">
                            <form action="{{ url('/users') }}" method="get">
                                <div class="input-group">
                                    <input type="text" name="buscar" id="buscar" class="form-control" placeholder="Buscar por Cedula..."
                                           value="{{ @$buscar }}">
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
                    @foreach($users as $user)
                            <div class="col-sm-4">
                                <div class="card text-center">
                                    <div class="card-header">
                                        I.D. #{{$user->id}}
                                    </div>
                                    <div class="card-block">
                                        <h5 class="card-title">{{$user->nombre.' '.$user->apellido}}</h5>
                                        <h6>
                                            Cedula: {{$user->cedula}}
                                        </h6>
                                        <h6>Sexo:
                                            @if($user->sexo=="Hombre")
                                                <i class="fa fa-male fa-2x" aria-hidden="true"></i>
                                            @else
                                                <i class="fa fa-female fa-2x" aria-hidden="true"></i>
                                            @endif</h6>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-sm-4">
                                            @if(Auth::user()->roles[0]->hasPermissionTo('UpdateUsers') or Auth::user()->can('UpdateUsers'))
                                                <a href="{{ url('users/'.$user->id.'/edit') }}"
                                                   class="btn btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                @else
                                                    <a href="{{ url('users/'.$user->id.'/edit') }}"
                                                       class="btn btn-primary disabled" disabled="">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                @endif
                                            </div>
                                            <div class="col-sm-4">
                                                <a href="{{ url('users/'.$user->id.'/historias') }}" class="btn btn-inverse btn-success">
                                                    <i class="fa fa-stethoscope"></i>
                                                </a>
                                            </div>
                                            <div class="col-sm-4">
                                            @if(Auth::user()->roles[0]->hasPermissionTo('DeleteUsers') or Auth::user()->can('DeleteUsers'))
                                                <form method="POST" action="/users/{{ $user->id }}">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="_method" value="DELETE"/>
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fa fa-close"></i>
                                                    </button>
                                                </form>
                                                @else
                                                    <form method="POST" action="/users/{{ $user->id }}">
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
                               {{ $users->appends(['buscar'=>$buscar])->links() }}
                           </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection