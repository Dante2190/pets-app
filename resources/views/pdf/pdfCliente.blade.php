<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cliente PDF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center">{{ $title }}</h1>
    <p>Fecha de reporte: {{ $date }}</p>


    <div class="card" >
        <div class="card-body">
            @foreach ($clientes as $cliente)
            <hr>
            <div class="form-group">
                <label for="Nombre">Cliente: {{ isset($cliente->nombre) ? $cliente->nombre : '' }}</label>
            </div>
            <div class="form-group">
                <label for="dui">DUI: {{ isset($cliente->dui) ? $cliente->dui : '' }}</label>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección: {{ isset($cliente->direccion) ? $cliente->direccion : '' }}</label>
            </div>
            <div class="form-group">
                <label for="contacto">Numero de Contacto: {{ isset($cliente->contacto) ? $cliente->contacto : '' }}</label>
            </div>
            <div class="form-group">
                <label for="whatsapp">Whatsapp: {{ isset($cliente->whatsapp) ? $cliente->whatsapp : '' }}</label>
            </div>
            <div class="form-group">
                <label for="email">Correo Electronico: {{ isset($cliente->email) ? $cliente->email : '' }}</label>
            </div>



            <br>
            <h4>Mascotas del cliente {{ $cliente->nombre }}</h4>

            <input type="hidden"
                value="{{ $mascotas = DB::table('mascotas')->where('id_cliente', $cliente->id)->get() }}">
            <table class="table table-light table-responsive table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Nombre</th>
                        <th>Especie</th>
                        <th>Sexo</th>
                        <th>raza</th>
                        <th>Color</th>
                        <th>nacimiento</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mascotas as $mascota)
                        <tr>
                            <td>{{ $mascota->nombre }}</td>
                            <td>{{ $mascota->especie }}</td>
                            @if ($mascota->sexo == 'M')
                                <td>Masculino</td>
                            @else
                                <td>Femenino</td>
                            @endif
                            <td>{{ $mascota->raza }}</td>
                            <td>{{ $mascota->color }}</td>
                            <td>{{ $mascota->nacimiento }}</td>
                    @endforeach
                </tbody>

            </table>
        @endforeach
        </div>

</div>


</body>

</html>
