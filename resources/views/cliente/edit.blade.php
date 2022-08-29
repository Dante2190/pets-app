<form action="{{ url('/cliente/'.$cliente->id) }}" method="post">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
{{ method_field('PATCH') }}
@include('cliente.form',['modo'=>'Editar']);
</form>