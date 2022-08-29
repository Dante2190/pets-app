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
                    <h3>Nueva Consulta</h3>
                    <hr>
                    <form action="{{ url('/consulta') }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label for="fecha_cita">Última Cita</label>
                            <input type="datetime-local" autocomplete="off" class="form-control" id="fecha_cita" name="fecha_cita"
                                required><br>
                        </div>
                        <div class="form-group">
                            <label for="motivo">Motivo</label>
                            <textarea autocomplete="off" placeholder="Motivo de la consulta" class="form-control"
                                id="motivo" name="motivo" required></textarea><br>
                        </div>
                        <div class="form-group">
                            <label for="examenes">Examenes</label>
                            <textarea autocomplete="off" placeholder="Examenes realizados al paciente" class="form-control"
                                id="examenes" name="examenes" required></textarea><br>
                        </div>
                        <div class="form-group">
                            <label for="tratamiento">Tratamiento</label>
                            <textarea autocomplete="off" placeholder="Nombre del tratamiento" class="form-control"
                                id="tratamiento" name="tratamiento" required></textarea><br>
                        </div>
                        <div class="form-group">
                            <label for="proxima_cita">Proxima Cita</label>
                            <input type="datetime-local" autocomplete="off" class="form-control" id="proxima_cita" name="proxima_cita"
                                required><br>
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
