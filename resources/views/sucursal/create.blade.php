<form action="{{ url('/sucursal') }}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @include('sucursal.form',['modo'=>'Crear']);
</form>