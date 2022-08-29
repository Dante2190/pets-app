<form action="{{ url('/usuario/'.$user->id) }}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    {{ method_field('PATCH') }}
    @include('usuario.form',['modo'=>'Editar']);
    </form>
