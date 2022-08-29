@extends('layouts.app')

@section('content')
    <div class="container">


        @if (Session::has('mensaje'))
            {{ Session::get('mensaje') }}
        @endif
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
                <h3>Nueva Mascota</h3>
                <hr>
                <form action="{{ url('/mascota') }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="Nombre">Nombre</label>
                        <input type="text" autocomplete="off" placeholder="Escriba el nombre de la mascota" class="form-control"
                            id="nombre" name="nombre" required><br>
                    </div>
                    <div class="form-group">
                        <label for="especie">Especie</label>
                        <input type="text" autocomplete="off" placeholder="Escriba la especie a la que pertenece"
                            class="form-control" id="especie" name="especie" required><br>
                    </div>
                    <div class="form-group">
                        <label for="sexo">Sexo</label>
                        <select class="form-select" name="sexo" id="sexo">
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="raza">Raza</label>
                        <input type="text" autocomplete="off" placeholder="Escriba la raza de la mascota" class="form-control"
                            id="raza" name="raza" required><br>
                    </div>
                    <div class="form-group">
                        <label for="color">Color</label>
                        <input type="text" autocomplete="off" placeholder="Escriba el color de la mascota" class="form-control"
                            id="color" name="color" required><br>
                    </div>
                    <div class="form-group">
                        <label for="nacimiento">Fecha Nacimiento</label>
                        <input type="date" autocomplete="off" class="form-control" id="nacimiento" name="nacimiento"
                            required><br>
                    </div>
                    <div class="form-group">
                        <label for="razgos">Razgos</label>
                        <input type="text" autocomplete="off" placeholder="Escriba los razgos fisicos" class="form-control"
                            id="razgos" name="Razgos" required><br>
                    </div>
                    <div class="form-group">
                        <input type="hidden" autocomplete="off" class="form-control" id="id_cliente" name="id_cliente"
                            value="{{ $id }}" required>
                    </div>
                    <div class="form-group">
                        <label for="foto" class="form-label">Foto</label>
                        <input class="form-control" type="file" accept="image/png,image/jpeg" name="foto" id="foto"><br>
                    </div>
                    <input class="btn btn-success" type="submit" value="Guardar Datos">
                    <a class="btn btn-primary" href="{{ url('cliente/') }}">Regresar</a>
                </form>
            </div>
        </div>

    @endsection
