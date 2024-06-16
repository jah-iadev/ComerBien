@include ('partials.header')

    <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 img-container">
                    <img src="/{{ $foto->foto }}"><!-- La imagen se establece como fondo para cubrir toda la columna -->
                </div>
                <div class="col-md-6 d-flex flex-column justify-content-center">
                    <div class="p-5">
                        <h1>{{$restaurante->nombre}}</h1>
                        <h2>{{$restaurante->informacion}}</h2>
                        <p>{{$restaurante->direccion}}</p>
                        <p>{{$restaurante->telefono}}</p>
                        <p><a href="{{$restaurante->web}}">WEB</a></p>
                        <!-- Puedes añadir más información según sea necesario -->
                    </div>
                </div>
            </div>
    </div>
        <div class="container">
            <div class="row">
                <h2 class="text-yellow text-center">
                    PLATOS PRINCIPALES
                </h2>
            </div>
            <div class="row">
                @forelse ($platos as $plato)
                    <!-- Caja -->
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                @isset ($fotos_Plato[$plato->id])
                                    <img src="/{{ $fotos_Plato[$plato->id] }}">
                                @else
                                    <img src="/assets/FotosPlatos/mini-pancakes with berries on a plate and cutlery.png">
                                @endisset
                                    <h3 class="card-text">
                                    {{ $plato->nombre }}
                                </h3>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No hay platos disponibles</p>
                @endforelse
            </div>
        </div>
        @auth
        <div class="container">
        <form action="{{ route('comentario.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="content">Añadir Comentario</label>
                <textarea class="form-control" id="comentario" name="comentario" rows="3" required></textarea>
                <input type="hidden" name="usuario_id" value="{{ Auth::id() }}">
                <input type="hidden" name="restaurante_id" value="{{ $restaurante->id }}">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>

        <h2 class="mt-5">Todos los Comentarios</h2>
        <ul class="list-group">
            @foreach ($comentarios as $comentario)
                <li class="list-group-item">
                    {{ $comentario->comentario }}
                    <br>
                    <small>Publicado el {{ $comentario->created_at->format('d/m/Y H:i') }}</small>
                    por el Usuario Id: {{ $comentario->usuario_id }}
                </li>
            @endforeach
        @endauth
        </ul>
        </div>
@include ('partials.footer')
@yield('tablar_js')
</html>