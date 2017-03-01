@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Secretarias</div>

                    <div class="panel-body">
                        Listado de Secretarias

                        <a href="{{ url('/secretaria/create') }}" class="btn btn-success">
                            <i class="fa fa-user"></i> Nuevo Usuario
                        </a>
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
                                                <div class="col-sm-6">
                                                    <a href="{{ url('users/'.$user->id.'/edit') }}"
                                                       class="btn btn-primary">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </div>
                                                <div class="col-sm-6">
                                                    <form method="POST" action="/users/{{ $user->id }}">
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
    <div class="modal fade" id="confirm-delete" tabindex="-1"
         role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                </div>
                <div class="modal-body">
                    <p>¿Seguro que desea eliminar este
                        registro?</p>
                    <p class="nombre"></p>
                </div>
                <div class="modal-footer">
                    <form class="form-inline form-delete"
                          role="form"
                          method="POST"
                          action="{{url('/secretaria/'.$secretaria->id)}}">
                        {!! method_field('DELETE') !!}
                        {!! csrf_field() !!}
                        <button type="button"
                                class="btn btn-default"
                                data-dismiss="modal">Cancelar
                        </button>
                        <button id="delete-btn"
                                class="btn btn-danger"
                                title="Eliminar">Eliminar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection