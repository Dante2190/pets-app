<form action="{{ url('/configuracion') }}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @include('configuracion.form',['modo'=>'Crear']);
</form>