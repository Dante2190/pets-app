@extends('layouts.app')

@section('content')
    <div class="container articulo">
        @if (Session::has('mensaje'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('mensaje') }}
            </div>
        @endif


        <div class="card articulo">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <a class="btn btn-success mb-1" href="{{ url('producto/create') }}">Nuevo Producto <i
                                class="fa fa-cart-plus" style="font-size:24px"></i></a>

                    </div>
                    <div class="col-md-8">
                        <h1>Productos</h1>
                    </div>
                </div>
                <hr>
                <form action="{{ route('producto.index') }}" method="get">
                    <div class="input-group mb-3">
                        <input type="text" name="productos" class="form-control" id="buscar"
                            value="{{ $productos }}" placeholder="Buscar producto por nombre o tipo">
                        <button class="btn btn-outline-primary" type="submit" id="b"><i class="fa fa-search-plus"
                                style="font-size:24px"></i></button>
                    </div>
                </form>
                <table class="table table-light table-responsive table-bordered articulo">

                    <thead class="thead-light ">
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Tipo</th>
                            <th>Stock</th>
                            <th>Precio</th>
                            <th>13% (IVA incluido)</th>
                            <th>38% (Venta)</th>
                            <th>F. Vencimiento</th>
                            <th>Sucursal</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody articulo>
                        @foreach ($datos as $prod)
                            <tr>
                                <td>{{ $prod->id }}</td>
                                <td>{{ $prod->nombre }}</td>
                                <td>{{ $prod->descripcion }}</td>
                                <td>{{ $prod->tipo }}</td>
                                <td>{{ $prod->stock }}</td>
                                <td>${{ $prod->precio }}</td>
                                <td>${{ $prod->precio * 0.13 + $prod->precio }}</td>
                                <td>${{ ($prod->precio * 0.13 + $prod->precio) * 0.38 + ($prod->precio * 0.13 + $prod->precio) }}
                                </td>
                                <td>{{ $prod->vencimiento }}</td>
                                <input type="hidden"
                                    value="{{ $sucursals = DB::table('sucursals')->select('sucursals.id', 'sucursals.nombre')->get() }}">
                                <td>
                                    @foreach ($sucursals as $var)
                                        @if ($var->id == $prod->id_sucursal)
                                            {{ $var->nombre }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    <a class="btn btn-warning" href="{{ url('/producto/' . $prod->id . '/edit') }}">
                                        Editar <i class="fa fa-edit" style="font-size:24px"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                {{ $datos->links() }}
                <a class="btn btn-primary mb-1" href="{{ url('downloadP-pdf') }}">Reporte <i class="fa fa-file-pdf-o"
                        style="font-size:24px"></i></a>
            </div>

        </div>


    </div>
@endsection
