@extends('layouts.app')

@section('content')

    <div class="col-md-9 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading text-center"><h3>User DashBoard</h3></div>
            <div class="panel-body">
                @foreach($users as $user)
                    <div class="col-md-8 col-md-offset-2">
                        <div class="card text-center">
                            <div class="card-header">
                                Bienvenido {{$user->nombre}}!
                            </div>
                            <div class="card-block">
                                <h3 class="card-title">Tus Datos</h3>
                                <p class="card-text">Nombre: {{$user->nombre . ' ' . $user->apellido}}</p>
                                <p class="card-text">Identificacion: {{$user->cedula}}</p>
                                <p class="card-text">E-Mail: {{$user->email}}</p>
                            </div>
                            <div class="card-footer text-muted">
                                Hora Actual: {{$time = \Carbon\Carbon::now()->toDateTimeString()}}&#8195;
                                Id: {{$user->id}}
                            </div>
                        </div>
                    </div>
                @endforeach

                @if(Auth::user()->hasRole('Paciente'))
                    <div class="col-sm-4" style="min-height: 250px;">
                        <div class="card text-center">
                            <div class="card-block">
                                <h3 class="card-title">Citas</h3>
                                <h6>
                                    Ir al area que muestra todos tus Citas con sus datos.
                                    <span class="text-muted">Y informacion de su Status actual.</span>
                                </h6>
                            </div>
                            <div class="card-footer">
                                <a href="{{ url('miscitas') }}"
                                   class="btn btn-primary">
                                    <i class="fa fa-angle-double-right"></i>&#8195;Ir
                                </a>
                            </div>
                        </div>
                    </div>

                        <div class="col-sm-4" style="min-height: 250px;">
                            <div class="card text-center">
                                <div class="card-block">
                                    <h3 class="card-title">Recipes</h3>
                                    <h6>
                                        Ir al area que muestra todos tus Recipes con sus datos.
                                        <span class="text-muted">Recetas y Observaciones</span>
                                    </h6>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ url('404') }}"
                                       class="btn btn-primary">
                                        <i class="fa fa-angle-double-right"></i>&#8195;Ir
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4" style="min-height: 250px;">
                            <div class="card text-center">
                                <div class="card-block">
                                    <h3 class="card-title">Entregas</h3>
                                    <h6>
                                        Ir al area que muestra tus Entregas pendientes.
                                        <span class="text-muted">De Medicinas con su status</span>
                                    </h6>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ url('404') }}"
                                       class="btn btn-primary">
                                        <i class="fa fa-angle-double-right"></i>&#8195;Ir
                                    </a>
                                </div>
                            </div>
                        </div>
                @else
                    <div class="col-sm-4" style="min-height: 250px;">
                        <div class="card text-center">
                            <div class="card-block">
                                <h3 class="card-title">Usuarios</h3>
                                <h6>
                                    Ir al area que muestra todos los Usuarios con el rol "Paciente".
                                    <span class="text-muted">Con su ID, Cedula, Nombre y Sexo</span>
                                </h6>
                            </div>
                            <div class="card-footer">
                                @if(Auth::user()->roles[0]->hasPermissionTo('ReadUsers') or Auth::user()->can('ReadUsers'))
                                    <a href="{{ url('users') }}"
                                       class="btn btn-primary">
                                        <i class="fa fa-angle-double-right"></i>&#8195;Ir
                                    </a>
                                @else
                                    <a href="{{ url('users') }}"
                                       class="btn btn-primary disabled" disabled="">
                                        <i class="fa fa-angle-double-right"></i>&#8195;Ir
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4" style="min-height: 250px;">
                        <div class="card text-center">
                            <div class="card-block">
                                <h3 class="card-title">Medicos</h3>
                                <h6>
                                    Ir al area que muestra todos los Usuarios con el rol "Medico".
                                    <span class="text-muted">Con su ID, Cedula, Nombre y Sexo</span>
                                </h6>
                            </div>
                            <div class="card-footer">
                                @if(Auth::user()->roles[0]->hasPermissionTo('ReadMedicos') or Auth::user()->can('ReadMedicos'))
                                    <a href="{{ url('medicos') }}"
                                       class="btn btn-primary">
                                        <i class="fa fa-angle-double-right"></i>&#8195;Ir
                                    </a>
                                @else
                                    <a href="{{ url('medicos') }}"
                                       class="btn btn-primary disabled" disabled="">
                                        <i class="fa fa-angle-double-right"></i>&#8195;Ir
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4" style="min-height: 250px;">
                        <div class="card text-center">
                            <div class="card-block">
                                <h3 class="card-title">Farmaceutas</h3>
                                <h6>
                                    Ir al area que muestra todos los Usuarios con el rol "Farmaceuta".
                                    <span class="text-muted">Con su ID, Cedula, Nombre y Sexo</span>
                                </h6>
                            </div>
                            <div class="card-footer">
                                @if(Auth::user()->roles[0]->hasPermissionTo('ReadFarmaceutas') or Auth::user()->can('ReadFarmaceutas'))
                                    <a href="{{ url('farmaceutas') }}"
                                       class="btn btn-primary">
                                        <i class="fa fa-angle-double-right"></i>&#8195;Ir
                                    </a>
                                @else
                                    <a href="{{ url('farmaceutas') }}"
                                       class="btn btn-primary disabled" disabled="">
                                        <i class="fa fa-angle-double-right"></i>&#8195;Ir
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4" style="min-height: 250px;">
                        <div class="card text-center">
                            <div class="card-block">
                                <h3 class="card-title">Secretarias</h3>
                                <h6>
                                    Ir al area que muestra todos los Usuarios con el rol "Secretaria".
                                    <span class="text-muted">Con su ID, Cedula, Nombre y Sexo</span>
                                </h6>
                            </div>
                            <div class="card-footer">
                                @if(Auth::user()->roles[0]->hasPermissionTo('ReadSecretarias') or Auth::user()->can('ReadSecretarias'))
                                    <a href="{{ url('secretaria') }}"
                                       class="btn btn-primary">
                                        <i class="fa fa-angle-double-right"></i>&#8195;Ir
                                    </a>
                                @else
                                    <a href="{{ url('secretaria') }}"
                                       class="btn btn-primary disabled" disabled="">
                                        <i class="fa fa-angle-double-right"></i>&#8195;Ir
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4" style="min-height: 250px;">
                        <div class="card text-center">
                            <div class="card-block">
                                <h3 class="card-title">Medicinas</h3>
                                <h6>
                                    Ir al area que muestra todos las Medicinas en el sistema.
                                    <span class="text-muted">Con su Nombre</span>
                                </h6>
                            </div>
                            <div class="card-footer">
                                @if(Auth::user()->roles[0]->hasPermissionTo('ReadMedicinas') or Auth::user()->can('ReadMedicinas'))
                                    <a href="{{ url('medicinas') }}"
                                       class="btn btn-primary">
                                        <i class="fa fa-angle-double-right"></i>&#8195;Ir
                                    </a>
                                @else
                                    <a href="{{ url('medicinas') }}"
                                       class="btn btn-primary disabled" disabled="">
                                        <i class="fa fa-angle-double-right"></i>&#8195;Ir
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4" style="min-height: 250px;">
                        <div class="card text-center">
                            <div class="card-block">
                                <h3 class="card-title">Citas</h3>
                                <h6>
                                    Ir al area que muestra todos las Citas del Sistema.
                                    <span class="text-muted">Con Sus Datos.</span>
                                </h6>
                            </div>
                            <div class="card-footer">
                                @if(Auth::user()->roles[0]->hasPermissionTo('ReadCitas') or Auth::user()->can('ReadCitas'))
                                <a href="{{ url('citas') }}"
                                class="btn btn-primary">
                                <i class="fa fa-angle-double-right"></i>&#8195;Ir
                                </a>
                                @else
                                <a href="{{ url('citas') }}"
                                   class="btn btn-primary disabled" disabled="">
                                    <i class="fa fa-angle-double-right"></i>&#8195;Ir
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4" style="min-height: 250px;">
                        <div class="card text-center" style="border-color: #ff9397;">
                            <div class="card-block">
                                <h3 class="card-title">Especialidades</h3>
                                <h6>
                                    Ir al area que muestra las Especialidades de Medicos.
                                    <span class="text-muted">Solo Administracion...</span>
                                </h6>
                            </div>
                            <div class="card-footer">
                                @if(Auth::user()->roles[0]->hasPermissionTo('ReadEspecialidades'))
                                    <a href="{{ url('especialidades') }}"
                                       class="btn btn-danger">
                                        <i class="fa fa-angle-double-right"></i>&#8195;Ir
                                    </a>
                                @else
                                    <a href="{{ url('especialidades') }}"
                                       class="btn btn-danger disabled" disabled="">
                                        <i class="fa fa-angle-double-right"></i>&#8195;Ir
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4" style="min-height: 250px;">
                        <div class="card text-center" style="border-color: #ff9397;">
                            <div class="card-block">
                                <h3 class="card-title">Roles</h3>
                                <h6>
                                    Ir al area que muestra todos los Roles de Usuarios en el sistema.
                                    <span class="text-muted">Solo Administracion...</span>
                                </h6>
                            </div>
                            <div class="card-footer">
                                @if(Auth::user()->roles[0]->hasPermissionTo('ReadRoles') or Auth::user()->can('ReadRoles'))
                                    <a href="{{ url('roles') }}"
                                       class="btn btn-danger">
                                        <i class="fa fa-angle-double-right"></i>&#8195;Ir
                                    </a>
                                @else
                                    <a href="{{ url('roles') }}"
                                       class="btn btn-danger disabled" disabled="">
                                        <i class="fa fa-angle-double-right"></i>&#8195;Ir
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4" style="min-height: 250px;">
                        <div class="card text-center" style="border-color: #ff9397;">
                            <div class="card-block">
                                <h3 class="card-title">Permisos</h3>
                                <h6>
                                    Ir al area que muestra todos los Permisos de Usuarios en el sistema.
                                    <span class="text-muted">Solo Administracion...</span>
                                </h6>
                            </div>
                            <div class="card-footer">
                                @if(Auth::user()->roles[0]->hasPermissionTo('ReadPermisos') or Auth::user()->can('ReadPermisos'))
                                    <a href="{{ url('permisos') }}"
                                       class="btn btn-danger">
                                        <i class="fa fa-angle-double-right"></i>&#8195;Ir
                                    </a>
                                @else
                                    <a href="{{ url('permisos') }}"
                                       class="btn btn-danger disabled" disabled="">
                                        <i class="fa fa-angle-double-right"></i>&#8195;Ir
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
