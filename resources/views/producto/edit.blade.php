<form action="{{ url('/producto/'.$producto->id) }}" method="post">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
{{ method_field('PATCH') }}
@include('producto.form',['modo'=>'Editar']);
</form>