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
                <h3>Cambio de contraseña</h3>
                <br>
                <form action="{{ route('changePasswordPost') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    {{ method_field('POST') }}
                    <div class="form-group">
                        <label for="current-password">Ingrese Contraseña Actual</label>
                        <input class="form-control" placeholder="********" type="password" name="current-password"
                            id="current-password" size="20" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="new-password">Nueva Contraseña</label>
                        <input class="form-control" placeholder="********" type="password" name="new-password" id="new-password"
                            size="20" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="repeat-password">Repite Contraseña</label>
                        <input class="form-control" placeholder="********" type="password" name="repeat-password"
                            id="repeat-password" size="20" required>
                    </div>
                    <br>
                    <input class="btn btn-success" type="submit" value="Guardar">
                </form>
            </div>
        </div>

    </div>
@endsection
