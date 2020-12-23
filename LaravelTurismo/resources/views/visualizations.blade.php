@extends('layout/layout')

@section('content')
<section class="tituloVisualizaciones">
    <div>
        <img src="{{ asset('images/graficos2.jpg') }}" alt="Responsive image" width="100%" height="800px">
    </div>
    <h2>Visualizaciones - Historial</h2>
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
