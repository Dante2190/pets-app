<form action="{{ url('/usuario') }}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @include('usuario.form',['modo'=>'Crear']);
</form>