@extends('layouts.app')

@section('content')
    <div class="container">

        <h3>{{ $modo }} Usuario</h3>
        @if (count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Usuario</label>
                    <input type="text" autocomplete="off" class="form-control" id="Name"
                        value="{{ isset($user->name) ? $user->name : '' }}" name="Name"><br>
                </div>
                <div class="form-group">
                    <label for="email">Correo</label>
                    <input type="email" autocomplete="off" class="form-control" id="email"
                        value="{{ isset($user->email) ? $user->email : '' }}" name="Email" required><br>
                </div>
                <div class="form-group">
                    <label for="id_empleado">Empleado</label>
                    <select class="form-select" name="id_empleado" id="id_empleado">
                        @foreach ($empleados as $empleado)
                            @if ($empleado->id != 1)
                                <option value="{{ $empleado->id }}">{{ $empleado->nombre }} {{ $empleado->apellido }}
                                </option>
                            @endif
                        @endforeach
                    </select><br>
                </div>
                <input class="btn btn-success" type="submit" value="{{ $modo }} Datos">
                <a class="btn btn-primary" href="{{ url('home/') }}">Regresar</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
        integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
    </script>
@endsection
