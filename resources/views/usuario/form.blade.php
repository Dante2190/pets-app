@extends('layouts.app')

@section('content')
<div class="container">

<h3>{{$modo}} Usuario</h3>
@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
<ul>
@foreach($errors->all() as $error)
<li>{{ $error}}</li>
@endforeach
</ul>
</div>
@endif

<div class="card">
    <div class="card-body">
        <div class="form-group">
            <label for="name">Usuario</label>
                <input type="text" autocomplete="off" class="form-control" id="Name" value="{{ isset($user->name)?$user->name:'' }}" name="Name"><br>
                </div>
                <div class="form-group">
                    <label for="email">Correo</label>
                        <input type="email" autocomplete="off" class="form-control" id="email" value="{{ isset($user->email)?$user->email:'' }}" name="Email" required><br>
                        </div>
                        <div class="form-group">
                            <label for="id_empleado">Empleado</label>
                            <select class="form-select" name="id_empleado" id="id_empleado">
                                @foreach($empleados as $empleado)
                                @if($empleado->id!=1)
                                <option value="{{ $empleado->id }}">{{ $empleado->nombre }} {{ $empleado->apellido }}</option>
                                @endif
                                @endforeach
                              </select><br>
                        </div>
                <input class="btn btn-success" type="submit" value="{{$modo}} Datos">
                <a class="btn btn-primary" href="{{ url('home/') }}">Regresar</a>
            </div>
    </div>
</div>

@endsection
