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
            <button type="button" class="btn btn-info mb-1" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Recordatorio <i class="fa fa-send-o" style="font-size:24px"></i></button>
                                    @include('email.email')
                                    <hr>

                <table class="table table-light table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Nombre</th>
                            <th>Especie</th>
                            <th>Sexo</th>
                            <th>Raza</th>
                            <th>Color</th>
                            <th>F. Nacimiento</th>
                            <th>Razgos</th>
                            <th>Foto</th>
                            <th>Vacunas</th>
                            <th>Desparacitación</th>
                            <th>Consulta</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mascotas as $m)
                            <tr>
                                <td>{{ $m->nombre }}</td>
                                <td>{{ $m->especie }}</td>
                                @if ($m->sexo == 'M')
                                    <td>Masculino</td>
                                @else
                                    <td>Femenino</td>
                                @endif
                                <td>{{ $m->raza }}</td>
                                <td>{{ $m->color }}</td>
                                <td>{{ $m->nacimiento }}</td>
                                <td>{{ $m->razgos }}</td>
                                @if (is_null($m->foto))
                                    <td>
                                        Sin Fotografia
                                    </td>
                                @else
                                    <td>
                                        <img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $m->foto }}"
                                            width="100" alt="">
                                    </td>
                                @endif
                                <td>
                                    <a class="btn btn-success" href="{{ url('/nueva_vacuna/' . $m->id) }}">Nueva
                                    <i class="fa fa-ambulance" style="font-size:24px"></i>
                                    </a>
                                    <a class="btn btn-info" href="{{ url('/vacuna/' . $m->id) }}">Ver
                                    <i class="fa fa-medkit" style="font-size:24px"></i>
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-success" href="{{ url('/nueva_desparacitacion/' . $m->id) }}">
                                    Nueva <i class="fa fa-address-book" style="font-size:24px"></i>
                                    </a>
                                    <a class="btn btn-info" href="{{ url('/desparacitacion/' . $m->id) }}">
                                    Ver <i class="fa fa-address-book-o" style="font-size:24px"></i>
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-success" href="{{ url('/nueva_consulta/' . $m->id) }}">
                                    Nueva <i class="fa fa-calendar-plus-o" style="font-size:24px"></i>
                                    </a>
                                    <a class="btn btn-info" href="{{ url('/consulta/' . $m->id) }}">
                                    Ver <i class="fa fa-calendar" style="font-size:24px"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a class="btn btn-primary" href="{{ url('cliente/') }}"><i class="fa fa-angle-double-left" style="font-size:24px"></i> Regresar</a>
            </div>
        </div>

    </div>
@endsection
