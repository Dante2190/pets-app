<div class="container">
    <div class="card border border-dark">
        <div class="card-body ">
            <div class="row ro justify-content-center">

                <div class="col-4">
                    <h1 class="text-center fw-bold"> Citas programadas para este
                        dia<br>{{ $date = Carbon::now('America/El_Salvador')->toDateString() }}</h1><br>
                    <input type="hidden"
                        value="{{ $consultas = DB::table('consultas')->join('mascotas', 'mascotas.id', '=', 'consultas.id_mascota')->join('clientes', 'clientes.id', '=', 'mascotas.id_cliente')->select(
                                'consultas.motivo',
                                'consultas.proxima_cita',
                                'mascotas.nombre',
                                'clientes.nombre as cliente',
                                'clientes.id',
                            )->get() }}">
                    <br><br>
                    <div class="box text-center">
                        <div class="notifications">
                            <i class="fa fa-bell"></i>
                            <span class="num"><?php $count = 0; ?>
                                @foreach ($consultas as $con)
                                    @if ($date == date('Y-m-d', strtotime($con->proxima_cita)))
                                        <?php $count++; ?>
                                    @endif
                                @endforeach
                                {{ $count }}
                            </span>
                            <ul class="u-li">
                                @foreach ($consultas as $con)
                                    @if ($date == date('Y-m-d', strtotime($con->proxima_cita)))
                                        <li class="icon">
                                            <span class="icon"><i class="fa fa-user"></i></span>
                                            <span class="text">
                                                <a href="{{ url('/mascota/' . $con->id) }}">
                                                    Cliente: {{ $con->cliente }}<br>
                                                    Mascota: {{ $con->nombre }}<br>
                                                    Motivo: {{ $con->motivo }}<br>
                                                    <!--H:i:s-->
                                                    Hora: {{ date('g:i a', strtotime($con->proxima_cita)) }}<br>
                                                </a>
                                        </li>
                                    @endif
                                @endforeach
                                </span>
                            </ul>
                        </div>
                    </div>
                </div>

                <!--hasta aqui y despues las etiquetas style-->
            </div>

        </div>
    </div>
</div>


<style>


.box {
    position:absolute;
    top:50%;
    left:50%;
    margin-top: 80px;
    transform:translate(-50%,-80%);

}
.notifications {
    width:60px;
    height:60px;
    background:#fff;
    border-radius:30px;
    box-sizing:border-box;
    text-align:center;
    box-shadow:0 2px 5px rgba(0,0,0,.2);
}
.notifications:hover {
    width:300px;
    height:60px;
    text-align:left;
    padding:0 15px;
    background:#ff2c74;
    transform:translateY(-100%);
    border-bottom-left-radius:0;
    border-bottom-right-radius:0;
}
.notifications:hover .fa {
    color:#fff;
}
.notifications .fa {
    color:#160202;
    line-height:60px;
    font-size:20px;
}
.notifications .num {
    position:absolute;
    top:0;
    right:-5px;
    width:25px;
    height:25px;
    border-radius:50%;
    background:#ff2c74;
    color:#fff;
    line-height:25px;
    font-family:sans-serif;
    text-align:center;
}
.notifications:hover .num {
    position:relative;
    background:transparent;
    color:#fff;
    font-size:24px;
    top:-4px;
}
.notifications:hover .num:after {
    content:' Notificaciones';
}
.u-li {
    position:absolute;
    left:0;
    top:50px;
    margin:0;
    width:100%;
    background:#fff;
    box-shadow:0 5px 15px rgba(0,0,0,.5);
    padding:20px;
    box-sizing:border-box;
    border-bottom-left-radius:30px;
    border-bottom-right-radius:30px;
    display:none;
}
.notifications:hover ul {
    display:block;
}
.u-li li {
    list-style:none;
    border-bottom:1px solid rgba(0,0,0,.1);
    padding:8px 0;
    display:flex;
}
.u-li li:last-child {
    border-bottom:none;
}
.u-li li .icon {
    width:24px;
    height:24px;
    background:#ccc;
    border-radius:50%;
    text-align:center;
    line-height:24px;
    margin-right:15px;
}
.u-li li .icon .fa {
    color:rgb(14, 0, 0);
    font-size:16px;
    line-height:24px;
}
.u-li li .text {
    position:relative;
    font-family:sans-serif;
    top:3px;
    cursor:pointer;
}
.u-li li:hover .text {
    font-weight:bold;
    color:#ff2c74;
}


h2{ color:#fff;
    text-align:center;

}
</style>
