@extends('layout/layout')

@section('content')
<section class="tituloTurismo">
    <div>
        <img src="{{ asset('images/turismoWallpaper.jpg') }}" alt="Responsive image" width="100%" height="800px">
    </div>
    <h2>Lugares Turisticos</h2>
</section>


<section class="infoLugaresTuristicos">
    <div class="card-group">
        <div class="card">
            <img src="{{ asset('images/parqueNacionalPodocarpus.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
            <h5 class="card-title">Parque Nacional Podocarpus</h5>
            <p class="card-text">El Parque Nacional Podocarpus es un parque nacional ubicado en las provincias de Loja y Zamora Chinchipe, en el sur oriente del Ecuador. Fue instaurado el 15 de diciembre de 1982. El Parque es una zona de megadiversidad y una zona de alto grado de endemismo debido a su ubicación entre sistemas biológicos diversos.​Se extiende sobre 146.280 hectáreas o 1.468,8 km².​ En las dos estribaciones de la Cordillera Oriental de Los Andes hasta las cuencas de los ríos Nangaritza, Numbala y Loyola. Cerca del 85 % del parque está en la provincia de Zamora Chinchipe y cerca del 15 % en la provincia de Loja. El parque nacional se estableció con el fin de proteger al bosque más grande de romerillos en el país, compuesto por tres especies del género Podocarpus, la única conífera nativa del Ecuador. Dentro del parque se ha desarrollado un medio biológico único, representando especialmente por la avifauna única en el área. El parque nacional Podocarpus alberga un complejo de más de 100 lagunas, una de las más conocidas son las Lagunas del Compadre. También hay cascadas, cañones y varias clases de mamíferos y plantas.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
        <div class="card">
            <img src="{{ asset('images/parqueJipiro.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
            <h5 class="card-title">Parque Recreacional Jipiro</h5>
            <p class="card-text">La Unidad Parque Recreacional Jipiro que en idioma palta significa, lugar de descanso, constituye una de las principales atracciones de Loja. Es considerado como único en el país debido a su composición. Una de sus características principales son los nueve Troncos etno-culturales representados con réplicas de las más destacadas expresiones arquitectónicas y culturales de la humanidad. En el Parque Jipiro se puede observar como la creatividad humana aprovechando la flora, fauna y la arquitectura de diversas civilizaciones, para ofrecer un acogedor parque náutico con laguna, cisnes, patos, escenario para eventos, botes, bares, restaurantes, canchas y espacios para camping.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
        <div class="card">
            <img src="{{ asset('images/puertaEntradaCuidad.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
            <h5 class="card-title">Puerta de Entrada a la ciudad</h5>
            <p class="card-text">Es la Puerta de Entrada a la ciudad, es un monumento arquitectónico, uno de los mayores atractivos de la ciudad de Loja. En su interior alberga un museo. Es la Puerta de Entrada a la ciudad, representa parte del Escudo de Loja, en el que se divisa un castillo medieval, por el cual se accede al centro de la ciudad. Construida en los años 1998–1999. Se dice que es una réplica del escudo de Loja. La entrada propiamente dicha, está conformada por el Puente Bolívar que pasa sobre el río Malacatos, un castillo y las esculturas de Don Quijote y su fiel compañero, Sancho.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>
</section>

<section class="infoLugaresTuristicos">
    <div class="card-group">
        <div class="card">
            <img src="{{ asset('images/plazaCultura.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
            <h5 class="card-title">Plaza de la Cultura</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
        <div class="card">
            <img src="{{ asset('images/parqueCentral.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
            <h5 class="card-title">Parque Central</h5>
            <p class="card-text">Es un parque donde se puede disfrutar de abundante vegetación, diferentes bancos para que los ecuatorianos y turistas puedan sentarse a descansar y es también un lugar para disfrutar durante el día y la noche. Dentro del parque merece la pena destacar un monumento en la zona del centro, recordando la figura del Dr. Bernardo Valdivieso de los Héroes, que ayudó mucho a la educación de Loja y a la libertad religiosa, además de fundar la Universidad Nacional de Loja en 1859, un monumento muy antiguo hecho en bronce. Este monumento en la plaza o Parque Central es uno de los iconos de la ciudad, un lugar ideal para fotografiarse y llevarse un recuerdo.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
        <div class="card">
            <img src="{{ asset('images/parqueLinealTebaida.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
            <h5 class="card-title">Parque Lineal La Tebaida</h5>
            <p class="card-text">El parque lineal La Tebaida se encuentra ubicado al sur de la ciudad de Loja, fue creado entre año de 1998 y 1999 en la administracion del Dr. José Bolívar Castillo, lleva el nombre de lineal ya que cuenta con varias áreas, como: senderos, canchas deportivas, juegos infantiles, kioskos donde se vende confitería, muro de escala, área para ejercitarse, espacios verdes para realizar actividades de fin de semana. Mide aproximadamente 3.5 km desde el puente del Centro Comercial "Supermaxi" hasta el puente de la Universidad Nacional de Loja, con una extensión de 6.4 hectáreas, brindando recreación a los turistas nacionales y extranjeros.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>
</section>


@endsection
