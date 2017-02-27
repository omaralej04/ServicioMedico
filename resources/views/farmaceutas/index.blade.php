@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Farmaceuta</div>

                    <div class="panel-body">
                        Listado de Farmaceutas

                        <a href="{{ url('/farmaceutas/create') }}" class="btn btn-success">
                            <i class="fa fa-user"></i> Nuevo Usuario
                        </a>
                        <table class="table table-bordered text-center">
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Cedula</th>
                                <th>Sexo</th>
                                <th width="10%" colspan="2">Acciones</th>
                            </tr>
                            @foreach($farmaceutas as $farmaceuta)
                                <tr>
                                    <td>{{ $farmaceuta->nombre }}</td>
                                    <td>{{ $farmaceuta->apellido }}</td>
                                    <td> {{ $farmaceuta->cedula }}</td>
                                    <td>@if($farmaceuta->sexo=="Hombre")
                                            <i class="fa fa-male fa-2x" aria-hidden="true"></i>
                                        @else
                                            <i class="fa fa-female fa-2x" aria-hidden="true"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('farmaceutas/'.$farmaceuta->id.'/edit') }}" class="btn btn-primary">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger"
                                                data-action="{{ url('/farmaceutas/'.$farmaceuta->id) }}"
                                                data-name="{{ $farmaceuta->nombre . " " . $farmaceuta->apellido . " C.I.: " . $farmaceuta->cedula  }}"
                                                data-toggle="modal" data-target="#confirm-delete">
                                            <i class="fa fa-trash fa-1x"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="7" class="text-center">
                                    {{ $farmaceutas->links() }}
                                </td>
                            </tr>
                        </table>
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
                          action="{{url('/farmaceutas/'.$farmaceuta->id)}}">
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