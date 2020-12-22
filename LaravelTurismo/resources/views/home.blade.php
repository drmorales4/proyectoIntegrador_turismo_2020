<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turismo</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
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
            <a href="{{ route('hoteles') }}">
                <img src="{{ asset('images/hotel.svg') }}">
                <p>HOTELES</p>
            </a>
            <a href="{{ route('visualizaciones') }}">
                <img src="">
                <p>HISTORIAL</p>
            </a>
            <a href="{{ route('lugares') }}">
                <img src="{{ asset('images/mountain.svg') }}">
                <p>LUGARES TURISTICOS</p>
            </a>
            <a href="{{ route('login') }}">
                <img src="{{ asset('images/sign-in.svg') }}">
                <p>INGRESAR</p>
            </a>
        </nav>
    </header>

    <section class="slider">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('images/parqueEolico.jpg') }}" alt="First slide" width="100%" height="800px">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('images/puertacuidad.jpg') }}" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="..." alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>

    <section class="tarifaPromedio">
        
    </section>

    <section class="disponibilidad">

    </section>

    <section class="revpar">

    </section>
    
    <footer>
        
    
    </footer>

</body>
</html>