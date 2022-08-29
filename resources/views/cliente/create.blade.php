<form action="{{ url('/cliente') }}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @include('cliente.form',['modo'=>'Crear']);
</form>