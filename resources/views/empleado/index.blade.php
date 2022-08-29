@extends('layouts.app')

@section('content')
    <div class="container">
        @if (Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ Session::get('mensaje') }}

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif



        <div class="card">
            <div class="card-body">
            <div class="row">
                    <div class="col-md-4">
                <a class="btn btn-success mb-1" href="{{ url('empleado/create') }}">Nuevo Empleado <i class="fa fa-user-plus" style="font-size:24px"></i></a>
                <div class="col-md-8">
                    <h1>Empleados</h1>
                </div>
            </div>
        </div>
                <hr>
                <table class="table table-light table-responsive table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Cargo</th>
                            <th>DUI</th>
                            <th>Celular</th>
                            <th>Sucursal</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($empleados as $empleado)
                            <tr>
                                @if ($empleado->id != 1)
                                    <td>{{ $empleado->nombre }}</td>
                                    <td>{{ $empleado->apellido }}</td>
                                    <td>{{ $empleado->cargo }}</td>
                                    <td>{{ $empleado->dui }}</td>
                                    <td>{{ $empleado->celular }}</td>
                                    <input type="hidden"
                                        value="{{ $sucursals = DB::table('sucursals')->select('sucursals.id', 'sucursals.nombre')->get() }}">
                                    <td>
                                        @foreach ($sucursals as $var)
                                            @if ($var->id == $empleado->id_sucursal)
                                                {{ $var->nombre }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        <a class="btn btn-warning"
                                            href="{{ url('/empleado/' . $empleado->id . '/edit') }}">Editar 
                                            <i class="fa fa-edit" style="font-size:24px"></i>
                                        </a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
