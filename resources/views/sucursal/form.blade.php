@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="card">
            <div class="card-body">
                <h3>{{ $modo }} Sucursal</h3>
                <hr>
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
                <div class="form-group">
                    <label for="Nombre">Nombre</label>
                    <input type="text" placeholder="Escriba un nombre para la sucursal" autocomplete="off" class="form-control"
                        id="nombre" value="{{ isset($sucursal->nombre) ? $sucursal->nombre : '' }}" name="nombre" required><br>
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <input type="text" placeholder="Escriba la direccion de la sucursal" autocomplete="off" class="form-control"
                        id="direccion" value="{{ isset($sucursal->direccion) ? $sucursal->direccion : '' }}" name="direccion"
                        required><br>
                </div>
                <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input type="text" placeholder="Escriba el numero de telefono de la sucursal" autocomplete="off"
                        class="phone form-control" id="telefono" value="{{ isset($sucursal->telefono) ? $sucursal->telefono : '' }}"
                        name="telefono" required><br>
                </div>
                
                <input class="btn btn-success" type="submit" value="{{ $modo }} Datos">
                <a class="btn btn-primary" href="{{ url('sucursal/') }}"><i class="fa fa-angle-double-left" style="font-size:24px"></i> Regresar</a>
            </div>
        </div>
    </div>
@endsection
