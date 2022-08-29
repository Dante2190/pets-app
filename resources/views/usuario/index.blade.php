@extends('layouts.app')
@section('content')
    <div class="container">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <h3>Modificar Correo Electronico</h3>
                <form action="{{ url('/usu/' . Auth::user()->id) }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label for="Name">Nombre</label>
                        <input type="text" class="form-control" id="Name" value="{{ Auth::user()->name }}"
                            name="Name" disabled="true" required><br>
                    </div>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="email" class="form-control" id="email" value="{{ Auth::user()->email }}"
                            name="email" required><br>
                    </div>
                    <div class="form-group">
                        <label for="Password">Ingrese su contraseña</label>
                        <input type="password" placeholder="********" class="form-control" id="password" name="password"
                            required><br>
                    </div>
                    <input class="btn btn-success" type="submit" value="Guardar Datos">
                </form>
            </div>
        </div>

    </div>
@endsection
