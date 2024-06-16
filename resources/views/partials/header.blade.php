<!doctype html>
<html lang="{{ Config::get('app.locale') }}">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- CSS/JS files -->
    @if(config('tablar','vite'))
    @vite('resources/js/app.js')
    @endif
    {{-- Custom Stylesheets (post Tablar) --}}
    @yield('tablar_css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .full-screen-header {
            background-color: blanchedalmond;
            background-size: cover;
            height: 100vh;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .overlay {
            background: rgba(0, 0, 0, 0.1); /* Fondo oscuro semi-transparente */
            padding: 50px;
        }
    </style>
</head>
<header class="full-screen-header">
    <img src="/assets/FotosRestaurantes/large-black-beef-burger-with-french-fries-in-restaurant-2023-11-27-05-16-24-utc.jpeg"></img>
    <div class="overlay">
        <a href="/"><img src="/assets/comer-bien.png"></img></a>
        <h1>COMER BIEN EN MURCIA</h1>
        <p>Tú web de los mejores restaurantes de la Región de Murcia</p>
    </div>
</header>