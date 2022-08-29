<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cliente PDF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center">{{ $title }}</h1>
    <p>Fecha de reporte: {{ $date }}</p>


    <div class="card">
        <div class="card-body">
            @foreach ($mascotas as $mascota)
                <input type="hidden"
                    value="{{ $clientes = DB::table('clientes')->where('id', $mascota->id_cliente)->get() }}">
                @if (is_null($mascota->foto))
                    Sin Fotografia
                @else
                    <div class="form-group text-center mb-3">
                        <img src="{{ asset('storage') . '/' . $mascota->foto }}" alt="img" width="300">

                    </div>
                @endif
                @foreach ($clientes as $t)
                    <div class="form-group">
                        <label for="Nombre">Nombre del cliente: {{ isset($t->nombre) ? $t->nombre : '' }}</label>
                    </div>
                @endforeach

                <div class="form-group">
                    <label for="Nombre">Nombre Mascota: {{ isset($mascota->nombre) ? $mascota->nombre : '' }}</label>
                </div>
                <div class="form-group mb-4">
                    <label for="dui">Especie: {{ isset($mascota->especie) ? $mascota->especie : '' }}</label>
                </div>

                <hr>

                <br>
                <h4>Consultas de {{ $mascota->nombre }}</h4>

                <input type="hidden"
                    value="{{ $consultas = DB::table('consultas')->where('id_mascota', $mascota->id)->get() }}">
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
            @endforeach
        </div>

    </div>


</body>

</html>
