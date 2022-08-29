<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo mensaje</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('send.email') }}" method="POST">
                    @csrf
                    <input type="hidden" autocomplete="off" class="form-control" id="id_cliente" name="id_cliente" value="{{ $id }}" required>
                    <input type="hidden" value="{{ $datos=DB::table('mascotas')
                    ->join('clientes', 'clientes.id', '=', 'mascotas.id_cliente')
                    ->where('clientes.id',$id)
                    ->select('clientes.email')
                    ->get();
                 }}">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Email:</label>
                        @foreach($datos as $cliente)
                        @if ($loop->first)
                        <input type="email" name="email" class="form-control" id="recipient-name" value="{{ $cliente->email }}" readonly="true" disabled="true" required>
                        @endif
                        @endforeach
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Mensaje:</label>
                        <textarea class="form-control" name="message" id="message-text" required></textarea>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
            </form>
        </div>
    </div>
</div>
</td>
