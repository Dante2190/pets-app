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
                <h3>Historial Desparacitación</h3>
                <hr>
                <table class="table table-light table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Ultima Desparacitación</th>
                            <th>Producto</th>
                            <th>Proxima Desparacitación</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($desparacitacions as $d)
                            <tr>
                                <td>{{ $d->fecha_desparacitacion }}</td>
                                <td>
                                    <input type="hidden"
                                        value="{{ $productos = DB::table('productos')->select('productos.id', 'productos.nombre')->get() }}">
                                    @foreach ($productos as $var)
                                        @if ($var->id == $d->id_producto)
                                            {{ $var->nombre }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{ $d->proxima_desparacitacion }}</td>
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
