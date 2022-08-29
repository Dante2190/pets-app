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
                <h3>{{ $modo }} Producto</h3>
                <hr>
                <div class="form-group">
                    <label for="Nombre">Nombre</label>
                    <input type="text" placeholder="Nombre del producto" autocomplete="off" class="form-control" id="nombre"
                        value="{{ isset($producto->nombre) ? $producto->nombre : '' }}" name="nombre" required><br>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <input type="text" placeholder="Caracteristicas del producto" autocomplete="off" class="form-control"
                        id="descripcion" value="{{ isset($producto->descripcion) ? $producto->descripcion : '' }}"
                        name="descripcion" required><br>
                </div>
                <div class="form-group">
                    <label for="stock">Unidades en stock</label>
                    <input type="number" placeholder="Unidades de producto" min="1" autocomplete="off" class="form-control"
                        id="stock" value="{{ isset($producto->stock) ? $producto->stock : '' }}" name="stock" required><br>
                </div>
                <div class="form-group">
                    <label for="precio">Precio ($)</label>
                    <input type="number" placeholder="Ingrese el precio de compra del producto ($)" step="0.01"
                        autocomplete="off" class="form-control" id="precio"
                        value="{{ isset($producto->precio) ? $producto->precio : '' }}" name="precio" required><br>
                </div>
                <div class="form-group">
                    <label for="vencimiento">Fecha de Vencimiento</label>
                    <input type="date" autocomplete="off" class="form-control" id="vencimiento"
                        value="{{ isset($producto->vencimiento) ? $producto->vencimiento : '' }}" name="vencimiento" required><br>
                </div>
                <div class="form-group">
                    <label for="tipo">Tipo de Producto</label>
                    <select class="form-select" name="tipo" id="tipo" required>
                        <option value="Desparacitador" @if (isset($producto) && $producto->tipo == 'Desparacitador') selected @endif>Desparacitador</option>
                        <option value="Vacuna" @if (isset($producto) && $producto->tipo == 'Vacuna') selected @endif>Vacuna</option>
                        <option value="Otro" @if (isset($producto) && $producto->tipo == 'Otro') selected @endif>Otro</option>
                    </select><br>
                </div>
                <div class="form-group">
                    <label for="id_sucursal">Sucursal</label>
                    <select class="form-select" name="id_sucursal" id="id_sucursal" required>
                        <option disabled="disabled">Seleccione una sucursal</option>
                        @foreach ($sucursals as $suc)
                            @if ($suc->id != 1)
                                <option value="{{ $suc->id }}" @if (isset($producto) && $producto->id_sucursal == $suc->id) selected @endif>
                                    {{ $suc->nombre }}</option>
                            @endif
                        @endforeach
                    </select><br>
                </div>
                <input class="btn btn-success" type="submit" value="{{ $modo }} Datos">
                <a class="btn btn-primary" href="{{ url('producto/') }}"><i class="fa fa-angle-double-left" style="font-size:24px"></i> Regresar</a>
            </div>
        </div>

    </div>
@endsection
