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
                <h2>Historial de vacunación</h2>
                <hr>
                <table class="table table-light table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Ultima Vacuna</th>
                            <th>Peso (Lb)</th>
                            <th>Vacuna</th>
                            <th>Proxima Vacuna</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vacunas as $v)
                            <tr>
                                <td>{{ $v->fecha_vacuna }}</td>
                                <td>{{ $v->peso }}</td>
                                <td>{{ $v->vacuna }}</td>
                                <td>{{ $v->proxima_vacuna }}</td>
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
            </div>
        </div>

    </div>
@endsection
