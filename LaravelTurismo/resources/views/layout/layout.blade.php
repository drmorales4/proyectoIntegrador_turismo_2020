<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turismo</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script type="text/javascript" src="js/app.js"></script>
    
</head>
<body>

    <header class="cabeceraPrincipal">
        <div>
            <img src="{{ asset('images/logo.png') }}">
            <h1>TOURISM UTPL</h1>
        </div>
        <nav>
            <a href="{{ route('home') }}">
                <p>Inicio</p>
            </a>
            <a href="{{ route('hotels') }}">
                <p>Hoteles</p>
            </a>
            <a href="{{ route('visualizations') }}">
                <p>Visualizaciones</p>
            </a>
            <a href="{{ route('tourism') }}">
                <p>Lugares<br>Turisticos</p>
            </a>
            <a href="{{ route('login') }}">
                <p>Ingresar</p>
            </a>
        </nav>
    </header>

    <div>
        @yield('content')
    </div>
    
    <footer class="piePagina">
        <div class="copyright">
            <h4>@Copyright 2020. Universidad Técnica Particular de Loja</h4>
        </div>
        <div class="redesSociales">
            <a href="">
                <img src="{{ asset('images/facebook.svg') }}">
            </a>
            <a href="">
                <img src="{{ asset('images/instagram.svg') }}">
            </a>
            <a href="">
                <img src="{{ asset('images/twitter.svg') }}">
            </a>
            <a href="">
                <img src="{{ asset('images/youtube.svg') }}">
            </a>
        </div>
    </footer>

</body>
</html>