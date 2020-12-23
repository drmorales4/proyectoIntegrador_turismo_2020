@extends('layout/layout')

@section('content')
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
                    <img class="d-block w-100" src="" alt="Second slide" width="100%" height="800px">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="" alt="Third slide" width="100%" height="800px">
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

    <section class="graficasHome">
        <h2>TARIFA PROMEDIO</h2>
        <div class="porHabitacion">
            <h3>Por Habitación</h3>
            <div>
                <img src="{{ asset('images/1.png') }}">
                <img src="{{ asset('images/2.png') }}">
                <img src="{{ asset('images/3.png') }}">
            </div>
        </div>
        <div class="porPersona">
            <h3>Por Persona</h3>
            <div>
                <img src="{{ asset('images/4.png') }}">
                <img src="{{ asset('images/5.png') }}">
                <img src="{{ asset('images/6.png') }}">
            </div>
        </div>
    </section>

    <section class="graficasHome2">
        <h2>DISPONIBILIDAD</h2>
        <div>
            <img src="{{ asset('images/7.png') }}">
            <img src="{{ asset('images/8.png') }}">
            <img src="{{ asset('images/9.png') }}">
        </div>
    </section>

    <section class="graficasHome2">
        <h2>REVPAR</h2>
        <div>
            <img src="{{ asset('images/10.png') }}">
            <img src="{{ asset('images/11.png') }}">
            <img src="{{ asset('images/12.png') }}">
        </div>
    </section>

@endsection