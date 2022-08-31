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
                <div class="row">
                    <div class="col-md-4"><a class="btn btn-success mb-1" href="{{ url('sucursal/create') }}">Nueva Sucursal <i class="fa fa-hospital-o" style="font-size:24px"></i></a></div>
                    <div class="col-md-8"><h1>Sucursales</h1></div>
                </div>

                <hr>
                <table class="table table-light table-responsive table-bordered table-bordered ">
                    <thead class="thead-light">
                        <tr>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Telefono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sucursals as $suc)
                            <tr>
                                @if ($suc->id != 1)
                                    <td>{{ $suc->nombre }}</td>
                                    <td>{{ $suc->direccion }}</td>
                                    <td>{{ $suc->telefono }}</td>
                                    <td>
                                        <a class="btn btn-warning" href="{{ url('/sucursal/' . $suc->id . '/edit') }}">Editar
                                        <i class="fa fa-edit" style="font-size:24px"></i>
                                        </a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </div>
@endsection
