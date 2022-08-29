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
                <h3>{{ $modo }} Cliente</h3>
                <hr>
                <div class="form-group">
                    <label for="Nombre">Nombre</label>
                    <input type="text" autocomplete="off" class="form-control" placeholder="Escriba el nombre del cliente"
                        id="nombre" value="{{ isset($cliente->nombre) ? $cliente->nombre : '' }}" name="nombre"
                        required><br>
                </div>
                <div class="form-group">
                    <label for="dui">DUI</label>
                    <input type="text" autocomplete="off" placeholder="00000000-0" class="form-control" id="dui"
                        value="{{ isset($cliente->dui) ? $cliente->dui : '' }}" name="dui" required><br>
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <input type="text" autocomplete="off" placeholder="Escriba la direccion del cliente"
                        class="form-control" id="direccion" value="{{ isset($cliente->direccion) ? $cliente->direccion : '' }}"
                        name="direccion" required><br>
                </div>
                <div class="form-group">
                    <label for="contacto">Numero de Contacto</label>
                    <input type="text" placeholder="0000-0000" autocomplete="off" class="form-control" id="contacto"
                        value="{{ isset($cliente->contacto) ? $cliente->contacto : '' }}" name="contacto" requried><br>
                </div>
                <div class="form-group">
                    <label for="whatsapp">Whatsapp (Opcional)</label>
                    <input type="text" placeholder="0000-0000" autocomplete="off" class="form-control" id="contacto"
                        value="{{ isset($cliente->whatsapp) ? $cliente->whatsapp : '' }}" name="whatsapp"><br>
                </div>
                <div class="form-group">
                    <label for="email">Correo Electronico</label>
                    <input type="email" placeholder="ejemplo@dominio.com" autocomplete="off" class="form-control"
                        id="email" value="{{ isset($cliente->email) ? $cliente->email : '' }}" name="email" required><br>
                </div>
                <input class="btn btn-success" type="submit" value="{{ $modo }} Datos">
                <a class="btn btn-primary" href="{{ url('cliente/') }}"><i class="fa fa-angle-double-left" style="font-size:24px"></i> Regresar</a>
            </div>
        </div>
    </div>
@endsection
