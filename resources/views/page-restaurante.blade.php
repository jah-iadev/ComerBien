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
@include ('partials.footer')
@yield('tablar_js')
</html>