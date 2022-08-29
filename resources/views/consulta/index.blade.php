@extends('layouts.app')

@section('content')
    <div class="container">
        @if (Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ Session::get('mensaje') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <h2>Historial de consultas</h2>
                <hr>
                <table class="table table-light table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Ultima Cita</th>
                            <th>Motivo</th>
                            <th>Examenes</th>
                            <th>Tratamiento</th>
                            <th>Proxima Cita</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($consultas as $t)
                            <tr>
                                <td>{{ $t->fecha_cita }}</td>
                                <td>{{ $t->motivo }}</td>
                                <td>{{ $t->examenes }}</td>
                                <td>{{ $t->tratamiento }}</td>
                                <td>{{ $t->proxima_cita }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <input type="hidden" autocomplete="off" class="form-control" id="id_mascota" name="id_mascota"
                    value="{{ $id }}" required>
                <input type="hidden"
                    value="{{ $datos = DB::table('mascotas')->where('mascotas.id', $id)->select('mascotas.id_cliente')->get() }}">
                @foreach ($datos as $x)
                    <a class="btn btn-primary" href="{{ url('mascota/' . $x->id_cliente) }}"><i class="fa fa-angle-double-left" style="font-size:24px"></i> Regresar</a>
                @endforeach
                <a class="btn btn-info" href="{{ url('/reporteM/' . $id) }}">
                Reporte <i class="fa fa-file-pdf-o" style="font-size:24px"></i>                    
                </a>
            </div>
        </div>

    </div>
@endsection
