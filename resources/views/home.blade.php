@extends('layouts.app')

@section('content')
    <div class="container">
        @if (Session::has('mensaje'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('mensaje') }}
        </div>
    @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border border-dark">
                    <div class="card-body">
                        <div class="card-header">
                            @if (Auth::user()->id == 1)
                                <div class="card-header"><a class="btn btn-primary" href="{{ url('usuario/create') }}">Nuevo
                                        Usuario</a></div>
                                <input type="hidden"
                                    value="{{ $datos = DB::table('users')->join('empleados', 'empleados.id', '=', 'users.id_empleado')->select('users.id', 'users.name', 'users.email', 'empleados.cargo')->get() }}">
                                <table class="table table-light table-bordered ">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Usuario</th>
                                            <th>Correo</th>
                                            <th>Cargo</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($datos as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->cargo }}</td>
                                                @if ($user->id != 1)
                                                    <td><a class="btn btn-warning"
                                                            href="{{ url('/usuario/' . $user->id . '/edit') }}">
                                                            Editar
                                                        </a></td>
                                                @endif
                                        @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            @else
                                Bienvenido
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <br>

    @include('includes.notify')
@endsection
