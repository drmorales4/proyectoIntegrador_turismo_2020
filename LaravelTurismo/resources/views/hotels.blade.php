@extends('layout/layout')

@section('content')
<section class="tituloHoteles">
    <div>
        <img src="{{ asset('images/sliderHoteles.jpg') }}" alt="Responsive image" width="100%" height="800px">
    </div>
    <h2>Hoteles</h2>
</section>

    
    <section class="infoHoteles">
        <div>
            <article>
                <img src="{{ asset('images/minSonesta.png') }}">
                <h3>Sonesta</h3>
                <p>Este hotel refinado, situado en la ciudadela Zamora, se encuentra a 9 minutos a pie de la iglesia La Catedral y a 3 km del centro de la ciudad.</p>
                <p>Las habitaciones son tradicionales y están equipadas con televisión de pantalla plana y Wi-Fi gratis. Las suites cuentan además con zona de estar y bañera de hidromasaje; las suites superiores disponen de muebles elegantes.</p>
            </article>
            <article>
                <img src="{{ asset('images/minGrandVictoria.png') }}">
                <h3>Gran Victoria</h3>
                <p>Este hotel elegante de la época colonial se encuentra a 2 minutos a pie del Museo del Banco Central, a 2 km del Museo de la Cultura Lojana y a 15 km de los límites del amplio Parque Nacional Podocarpus.</p>
                <p>Las habitaciones son elegantes y se abren a un patio central. Están equipadas con muebles de madera cálidos y televisión de pantalla plana, minibar y Wi-Fi gratis. Las suites cuentan además con zona de descanso con sofá y algunas disponen de baño con bañera de hidromasaje.</p>
            </article>
            <article>
                <img src="{{ asset('images/minZamorano.png') }}">
                <h3>Zamorano Real Hotel</h3>
                <p>Este hotel moderno y elegante se encuentra a 5 minutos a pie de la catedral de Loja, de elaborado tallado, y a 1 km de la antigua puerta de la ciudad.</p>
                <p>Las habitaciones son modernas y discretas. Están equipadas con televisión de pantalla plana, Wi-Fi gratis y servicio de habitaciones. Las habitaciones superiores disponen de balcón y bañera de hidromasaje; las suites cuentan con cocina básica.</p>
            </article>
        </div>
        <div>
            <article>
                <img src="{{ asset('images/minPodocarpus.png') }}">
                <h3>Hotel Podocarpus</h3>
                <p>Este hotel sin pretensiones se encuentra en un barrio con cafeterías y restaurantes, a 2 minutos a pie del parque Simón Bolívar, a 5 de la catedral de Loja y a 8 del Museo de la Música.</p>
                <p>Las habitaciones, decoradas con un estilo desenfadado, disponen de Wi‑Fi gratis, televisión por cable y baño.</p>
            </article>
            <article>
                <img src="{{ asset('images/minRomar.png') }}">
                <h3>Romar Royal Hotel</h3>
                <p>​Este hotel sencillo, ubicado en una zona comercial repleta de tiendas y restaurantes, se encuentra a 2 km de la autopista E50, a 2 minutos a pie de Central Park y a 10 minutos a pie de la Puerta de la Ciudad, que cuenta con un museo, una cafetería y la ciudad. puntos de vista.</p>
                <p>Las habitaciones tranquilas cuentan con acceso a Wi-Fi, TV de pantalla plana y caja fuerte, además de frigobar y utensilios para preparar té y café. Las suites incluyen salas de estar y cocinas básicas.</p>
            </article>
            <article>
                <img src="{{ asset('images/minLibertador.png') }}">
                <h3>Hotel Libertador</h3>
                <p>Este hotel tranquilo se encuentra en una calle céntrica y apacible, a 5 minutos a pie de una parada de autobús, a 3 minutos a pie del Museo del Banco Central y a 4 km del Parque Colinar Pucará.</p>
                <p>Las habitaciones son discretas y tienen una decoración acogedora. Cuentan con Wi-Fi gratis y televisión. Algunas tienen capacidad para 3 personas y zona de descanso, mientras que las suites disponen de zona de estar independiente y decoración elegante.</p>
            </article>
        </div>

</section>
    

@endsection
