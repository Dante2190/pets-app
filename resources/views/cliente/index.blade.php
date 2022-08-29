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
        <style>
            .filtro {
                display: none;
            }
        </style>
        <div class="card">
            <div class="card-body">
            <div class="row">
                    <div class="col-md-4">
                <a class="btn btn-success mb-1" href="{{ url('cliente/create') }}">Nuevo Cliente <i class="fa fa-user-plus" style="font-size:24px"></i></a>
                <div class="col-md-8"><h1>Clientes</h1></div>
            </div>
        </div>
                <hr>
                <form action="{{ route('cliente.index') }}" method="get">
                    <div class="input-group mb-3">
                        <input type="text" name="clientes" class="form-control" id="buscar"
                            value="{{ $clientes }}" placeholder="Buscar Cliente por nombre, direccion o algun otro campo">
                        <button class="btn btn-outline-primary" type="submit" id="b"><i class="fa fa-search-plus" style="font-size:24px"></i></button>
                    </div>
                    <hr>
                </form>
                <table class="table table-light table-responsive table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Nombre</th>
                            <th>DUI</th>
                            <th>Dirección</th>
                            <th>Contacto</th>
                            <th>Whatsapp</th>
                            <th>Correo</th>
                            <th>Acciones</th>
                            <th>Mascotas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datos as $cliente)
                            <tr>
                                <td>{{ $cliente->nombre }}</td>
                                <td>{{ $cliente->dui }}</td>
                                <td>{{ $cliente->direccion }}</td>
                                <td>{{ $cliente->contacto }}</td>
                                <td>{{ $cliente->whatsapp }}</td>
                                <td>{{ $cliente->email }}</td>
                                <td>
                                    <a class="btn btn-warning" href="{{ url('/cliente/' . $cliente->id . '/edit') }}">
                                    Editar <i class="fa fa-edit" style="font-size:24px"></i>
                                    </a>
                                    <a class="btn btn-info" href="{{ url('/reporte/' . $cliente->id) }}">
                                    Reporte <i class="fa fa-file-pdf-o" style="font-size:24px"></i>
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-success" href="{{ url('/nueva/' . $cliente->id) }}">
                                       Nueva <i class="fa fa-paw" style="font-size:24px"></i>
                                        
                                    </a>
                                    <a class="btn btn-info" href="{{ url('/mascota/' . $cliente->id) }}">
                                    Ver <i class="fa fa-paw" style="font-size:24px"></i>    
                                    </a>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                {{ $datos->links() }}
                <a class="btn btn-primary mb-1" href="{{ url('download-pdf') }}">Reporte <i class="fa fa-file-pdf-o" style="font-size:24px"></i></a>
            </div>
        </div>

    </div>
@endsection
