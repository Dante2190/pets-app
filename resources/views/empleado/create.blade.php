<form action="{{ url('/empleado') }}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @include('empleado.form',['modo'=>'Crear']);
</form>