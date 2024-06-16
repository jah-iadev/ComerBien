@include ('partials.header')
<body class=" border-top-wide border-primary d-flex flex-column">
<div class="page page-center">
    <div class="container mt-3">
        <div class="row">
            @forelse ($restauranteUltimos4 as $restaurante)
                <!-- Caja -->
                <div class="col-md-3">
                    <div class="card">
                        <img src="{{ $fotos4[$restaurante->id] }}" alt="Foto del restaurante">
                        <div class="card-body">
                            <p class="card-text">
                                <a href="{{ route('page', ['id' => $restaurante->id]) }}">{{ $restaurante->nombre }}</a>
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <p>No hay restaurantes disponibles</p>
            @endforelse
        </div>
    </div>
    <div class="container mt-3">
        <div class="row">
            <main class="col-md-6 ml-sm-auto col-lg-6 px-md-4">
                <div class="card">
                        <img src="{{ $foto5 }}" class="card-img-top" alt="Foto 5">
                        <div class="card-body">
                            <p class="card-text">
                                <a href="{{ route('page', ['id' => $restaurante5->id]) }}">{{ $restaurante5->nombre }}</a>
                            </p>
                        </div>
                </div>
            </main>
            <nav class="col-md-6 col-lg-6 d-md-block bg-light sidebar">
                <div class="position-sticky"> 
                    <h2>LOS MEJORES DE MURCIA</h2>
                    <ul class="list-group">
                        @forelse ($Restaurantes as $restaurante)
                        <li class="list-group-item"><h3><a href="{{ route('page', ['id' => $restaurante->id]) }}">{{ $restaurante->nombre }}</a></h3></li>
                        @empty
                            <p>No hay restaurantes disponibles</p>
                        @endforelse
                    </ul>
                </div>
            </nav>
        </div>
    </div>
@include ('partials.footer')
@yield('tablar_js')
</div>
</html>