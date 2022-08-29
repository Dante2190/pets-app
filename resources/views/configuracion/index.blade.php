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
        <a class="btn btn-primary" href="{{ url('configuracion/create') }}">Configuracion (%)</a>
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>(%) IVA</th>
                    <th>(%) Venta</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($configuracions as $config)
                    <tr>
                        <td>{{ $config->id }}</td>
                        <td>{{ $config->iva }}</td>
                        <td>{{ $config->venta }}</td>
                        <td>
                            <a class="btn btn-warning" href="{{ url('/configuracion/' . $config->id . '/edit') }}">
                                Editar
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
