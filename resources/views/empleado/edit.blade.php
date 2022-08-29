
<form action="{{ url('/empleado/'.$empleado->id) }}" method="post">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
{{ method_field('PATCH') }}
@include('empleado.form',['modo'=>'Editar']);
</form>
