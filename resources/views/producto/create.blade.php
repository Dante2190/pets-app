<form action="{{ url('/producto') }}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @include('producto.form',['modo'=>'Crear']);
</form>