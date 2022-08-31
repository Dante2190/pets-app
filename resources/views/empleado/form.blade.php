@extends('layouts.app')

@section('content')
    <div class="container">


        @if (Session::has('mensaje'))
            {{ Session::get('mensaje') }}
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        @endif
        <div class="card">

            <div class="card-body">
                <h3>{{ $modo }} Empleado</h3>
                <hr>
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" autocomplete="off" placeholder="Escriba los nombres del empleado"
                        class="form-control" id="nombre" value="{{ isset($empleado->nombre) ? $empleado->nombre : '' }}"
                        name="nombre" required><br>
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input type="text" autocomplete="off" placeholder="Escriba los apellidos del empleado"
                        class="form-control" id="apellido"
                        value="{{ isset($empleado->apellido) ? $empleado->apellido : '' }}" name="apellido" required><br>
                </div>
                <div class="form-group">
                    <label for="dui">DUI</label>
                    <input type="text" autocomplete="off" placeholder="00000000-0" class="form-control" id="dui"
                        value="{{ isset($empleado->dui) ? $empleado->dui : '' }}" name="dui" required><br>
                </div>
                <div class="form-group">
                    <label for="celular">Numero de Contacto</label>
                    <input type="text" autocomplete="off" placeholder="0000-0000" class="form-control" id="celular"
                        value="{{ isset($empleado->celular) ? $empleado->celular : '' }}" name="celular" required><br>
                </div>
                <div class="form-group">
                    <label for="cargo">Cargo</label>
                    <select class="form-select" name="cargo" id="cargo">
                        <option disabled="disabled">Seleccione un cargo</option>
                        <option value="secretaria">Secretaria</option>
                        <option value="auxiliar">Auxiliar</option>
                        <option value="veterinaria">Veterinaria</option>
                    </select><br>
                </div>
                <div class="form-group">
                    <label for="id_sucursal">Sucursal</label>
                    <select class="form-select" name="id_sucursal" id="id_sucursal">
                        <option disabled="disabled">Seleccione una sucursal</option>
                        @foreach ($sucursals as $suc)
                            @if ($suc->id != 1)
                                <option value="{{ $suc->id }}" @if (isset($empleado) && $empleado->id_sucursal == $suc->id) selected @endif>
                                    {{ $suc->nombre }}</option>
                            @endif
                        @endforeach
                    </select><br>
                </div>
                <input class="btn btn-success" type="submit" value="{{ $modo }} Datos">
                <a class="btn btn-primary" href="{{ url('empleado/') }}"><i class="fa fa-angle-double-left"
                        style="font-size:24px"></i> Regresar</a>
            </div>
        </div>

    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script type="text/javascript">
    $("#celular, #celular").mask("0000-0000");
    $("#dui, #dui").mask("00000000-0");
</script>
