<form action="{{ url('/configuracion/'.$configuracion->id) }}" method="post">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
{{ method_field('PATCH') }}
@include('configuracion.form',['modo'=>'Editar']);
</form>