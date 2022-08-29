@extends('layouts.app')

@section('content')
<div class="container">

<h3>{{$modo}} Configuracion</h3>
@if(Session::has('mensaje'))
{{ Session::get('mensaje')}}
@endif
@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
<ul>
@foreach($errors->all() as $error)
<li>{{ $error}}</li>
@endforeach
</ul>
</div>
@endif
<div class="form-group">
<label for="Nombre">(%) IVA</label>
    <input type="number" max="100" min="1" autocomplete="off" class="form-control" id="iva" value="{{ isset($configuracion->iva)?$configuracion->iva:'' }}" name="iva"><br>
    </div>
    <div class="form-group">
<label for="Nombre">(%) Venta</label>
    <input type="number" max="100" min="1" autocomplete="off" class="form-control" id="venta" value="{{ isset($configuracion->venta)?$configuracion->venta:'' }}" name="venta"><br>
    </div>
    <input class="btn btn-success" type="submit" value="{{$modo}} Datos">
    <a class="btn btn-primary" href="{{ url('configuracion/') }}">Regresar</a>
</div>
@endsection