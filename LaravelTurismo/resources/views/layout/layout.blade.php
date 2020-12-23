<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turismo</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

</head>
<body>

    <header class="cabeceraPrincipal">
        <div>
            <img src="{{ asset('images/logo.png') }}">
            <h1>OBSERVATORIO DE TURISMO UTPL</h1>
        </div>
        <nav>
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/home.svg') }}">
                <p>INICIO</p>
            </a>
            <a href="{{ route('hotels') }}">
                <img src="{{ asset('images/hotel.svg') }}">
                <p>HOTELES</p>
            </a>
            <a href="{{ route('visualizations') }}">
                <img src="">
                <p>HISTORIAL</p>
            </a>
            <a href="{{ route('tourism') }}">
                <img src="{{ asset('images/mountain.svg') }}">
                <p>LUGARES TURISTICOS</p>
            </a>
            <a href="{{ route('login') }}">
                <img src="{{ asset('images/sign-in.svg') }}">
                <p>INGRESAR</p>
            </a>
        </nav>
    </header>

    <div>
        @yield('content')
    </div>
    
    <footer>
        <h3>Pie de pagina</h3>
    </footer>

</body>
</html>