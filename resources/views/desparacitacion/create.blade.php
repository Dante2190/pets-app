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
                <h3>Nueva Desparacitación</h3>
                <hr>
                <form action="{{ url('/desparacitacion') }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="fecha_desparacitacion">Fecha de desparacitación</label>
                        <input type="date" autocomplete="off" class="form-control" id="fecha_desparacitacion"
                            name="fecha_desparacitacion" required><br>
                    </div>
                    <div class="form-group">
                        <label for="id_producto">Producto</label>
                        <select class="form-select" name="id_producto" id="id_producto">
                            @foreach ($productos as $prod)
                                <option value="{{ $prod->id }}">{{ $prod->nombre }}</option>
                            @endforeach
                        </select><br>
                    </div>
                    <div class="form-group">
                        <label for="proxima_desparacitacion">Proxima Desparacitación</label>
                        <input type="date" autocomplete="off" class="form-control" id="proxima_desparacitacion"
                            name="proxima_desparacitacion" required><br>
                    </div>
                    <div class="form-group">
                        <input type="hidden" autocomplete="off" class="form-control" id="id_mascota" name="id_mascota"
                            value="{{ $id }}" required>
                    </div>
                    <input class="btn btn-success" type="submit" value="Guardar Datos">
                    <input type="hidden"
                        value="{{ $datos = DB::table('mascotas')->where('mascotas.id', $id)->select('mascotas.id_cliente')->get() }}">
                    @foreach ($datos as $x)
                        <a class="btn btn-primary" href="{{ url('mascota/' . $x->id_cliente) }}">Regresar</a>
                    @endforeach
                </form>
            </div>
        </div>

    @endsection
