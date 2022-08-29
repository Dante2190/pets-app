<form action="{{ url('/sucursal/'.$sucursal->id) }}" method="post">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
{{ method_field('PATCH') }}
@include('sucursal.form',['modo'=>'Editar']);
</form>