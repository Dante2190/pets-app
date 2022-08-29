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
        <table class="table table-light table-responsive table-bordered articulo">

<thead class="thead-light ">
    <tr>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Tipo</th>
        <th>Stock</th>
        <th>Precio</th>
        <th>(IVA)</th>
        <th>(Venta)</th>
        <th>Vencimiento</th>
        <th>Sucursal</th>
    </tr>
</thead>
<tbody articulo>
    @foreach ($productos as $prod)
        <tr>
            <td>{{ $prod->nombre }}</td>
            <td>{{ $prod->descripcion }}</td>
            <td>{{ $prod->tipo }}</td>
            <td>{{ $prod->stock }}</td>
            <td>${{ $prod->precio }}</td>
            <td>${{ $prod->precio * 0.13 + $prod->precio }}</td>
            <td>${{ ($prod->precio * 0.13 + $prod->precio) * 0.38 + ($prod->precio * 0.13 + $prod->precio) }}</td>
            <td>{{ $prod->vencimiento }}</td>
            <td>
            <input type="hidden"
                value="{{ $sucursals = DB::table('sucursals')->select('sucursals.id', 'sucursals.nombre')->get() }}">
                @foreach ($sucursals as $var)
                    @if ($var->id == $prod->id_sucursal)
                        {{ $var->nombre }}
                    @endif
                @endforeach
            </td>
        </tr>
    @endforeach
</tbody>
            </table>
        </div>

</div>


</body>

</html>
