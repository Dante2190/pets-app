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
                <h3>Nueva Vacuna</h3>
                <hr>
                <form action="{{ url('/vacuna') }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="fecha_vacuna">Fecha de Vacuna</label>
                        <input type="date" autocomplete="off" class="form-control" id="fecha_vacuna" name="fecha_vacuna"
                            required><br>
                    </div>
                    <div class="form-group">
                        <label for="peso">Peso (Lb)</label>
                        <input type="number" autocomplete="off" placeholder="Escriba el peso de la mascota (Libras)"
                            class="form-control" id="peso" name="peso" required><br>
                    </div>
                    <div class="form-group">
                        <label for="vacuna">Vacuna</label>
                        <select class="form-select" name="vacuna" id="vacuna">
                            @foreach ($productos as $prod)
                                <option value="{{ $prod->nombre }}">{{ $prod->nombre }}</option>
                            @endforeach
                        </select><br>
                    </div>
                    <div class="form-group">
                        <label for="proxima_vacuna">Proxima Vacuna</label>
                        <input type="date" autocomplete="off" class="form-control" id="proxima_vacuna" name="proxima_vacuna"
                            required><br>
                    </div>
                    <div class="form-group">
                        <input type="hidden" autocomplete="off" class="form-control" id="id_mascota" name="id_mascota"
                            value="{{ $id }}" required>
                    </div>
                    <input class="btn btn-success" type="submit" value="Guardar Datos">
                    <!--id cliente del debe ser aqui no de la mascota-->
                    <input type="hidden"
                        value="{{ $datos = DB::table('mascotas')->where('mascotas.id', $id)->select('mascotas.id_cliente')->get() }}">
                    @foreach ($datos as $x)
                        <a class="btn btn-primary" href="{{ url('mascota/' . $x->id_cliente) }}">Regresar</a>
                    @endforeach
                </form>
            </div>
        </div>


    @endsection
