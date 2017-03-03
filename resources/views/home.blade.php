@extends('layouts.app')

@section('content')

    <div class="col-md-9 col-md-offset-1">

        @foreach($users as $user)
            <div class="col-md-7 col-md-offset-3">
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

        <div class="col-sm-4">
            <div class="card text-center">
                <div class="card-block">
                    <h3 class="card-title">Usuarios</h3>
                    <h6>
                        Ir al area que muestra todos los Usuarios con el rol "Paciente".
                        <span class="text-muted">Con su ID, Cedula, Nombre y Sexo</span>
                    </h6>
                </div>
                <div class="card-footer">
                    <a href="{{ url('users') }}"
                       class="btn btn-primary">
                        <i class="fa fa-angle-double-right"></i>&#8195;Ir
                    </a>
                </div>
            </div>
        </div>

            <div class="col-sm-4">
                <div class="card text-center">
                    <div class="card-block">
                        <h3 class="card-title">Medicos</h3>
                        <h6>
                            Ir al area que muestra todos los Usuarios con el rol "Medico".
                            <span class="text-muted">Con su ID, Cedula, Nombre y Sexo</span>
                        </h6>
                    </div>
                    <div class="card-footer">
                        <a href="{{ url('medicos') }}"
                           class="btn btn-primary">
                            <i class="fa fa-angle-double-right"></i>&#8195;Ir
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
            <div class="card text-center">
                <div class="card-block">
                    <h3 class="card-title">Farmaceutas</h3>
                    <h6>
                        Ir al area que muestra todos los Usuarios con el rol "Farmaceuta".
                        <span class="text-muted">Con su ID, Cedula, Nombre y Sexo</span>
                    </h6>
                </div>
                <div class="card-footer">
                    <a href="{{ url('farmaceutas') }}"
                       class="btn btn-primary">
                        <i class="fa fa-angle-double-right"></i>&#8195;Ir
                    </a>
                </div>
            </div>
        </div>

            <div class="col-sm-4">
                <div class="card text-center">
                    <div class="card-block">
                        <h3 class="card-title">Secretarias</h3>
                        <h6>
                            Ir al area que muestra todos los Usuarios con el rol "Secretaria".
                            <span class="text-muted">Con su ID, Cedula, Nombre y Sexo</span>
                        </h6>
                    </div>
                    <div class="card-footer">
                        <a href="{{ url('secretaria') }}"
                           class="btn btn-primary">
                            <i class="fa fa-angle-double-right"></i>&#8195;Ir
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card text-center">
                    <div class="card-block">
                        <h3 class="card-title">Medicinas</h3>
                        <h6>
                            Ir al area que muestra todos las Medicinas en el sistema.
                            <span class="text-muted">Con su Nombre</span>
                        </h6>
                    </div>
                    <div class="card-footer">
                        <a href="{{ url('medicinas') }}"
                           class="btn btn-primary">
                            <i class="fa fa-angle-double-right"></i>&#8195;Ir
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card text-center" style="border-color: #ff9397;">
                    <div class="card-block" >
                        <h3 class="card-title">Roles</h3>
                        <h6>
                            Ir al area que muestra todos los Roles de Usuarios en el sistema.
                            <span class="text-muted">Solo Administracion...</span>
                        </h6>
                    </div>
                    <div class="card-footer">
                        <a href="{{ url('roles') }}"
                           class="btn btn-danger">
                            <i class="fa fa-angle-double-right"></i>&#8195;Ir
                        </a>
                    </div>
                </div>
            </div>

    </div>

@endsection
