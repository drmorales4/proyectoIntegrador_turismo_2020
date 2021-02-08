<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lugares Turisticos</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/estilos-lugaresTuristicos.css">
    <link rel="stylesheet" href="../css/app.css">
    <script type="text/javascript" src="../js/app.js"></script>
</head>

<body>
    
    <header>
        <nav id="nav" class="nav1">
            <div class="contenedor-nav">
                <div class="logo">
                    <img src="../images/logo.png">
                </div>
                <div class="enlaces" id="enlaces">
                    <a href="../index.html" id="enlace-inicio" class="btn-header">Inicio</a>
                    <a href="hoteles.php" id="enlace-hoteles" class="btn-header">Hoteles</a>
                    <a href="visualizaciones.php" id="enlace-visualizaciones" class="btn-header">Visualizaciones</a>
                    <a href="lugaresTuristicos.php" id="enlace-lugaresTuristicos" class="btn-header">Lugares Turisticos</a>
                    <a href="../login.php" id="enlace-login" class="btn-header">Ingresar</a>
                </div>
                <div class="icono" id="open">
                    <span>&#9776;</span>
                </div>
            </div>
        </nav>

    </header>
    <section class="infoLugaresTuristicos">
        <h2>Lugares Turisticos</h2>
    </section>
    <?php
        include_once '../database.php';
        $sqlLugar = "SELECT * FROM lugares";
        $resultLugar = mysqli_query($con, $sqlLugar);
        $contar = 0;
        $matrizLugar;
        $repTres = 1;
        $vecesDiv = 0;
        while($rowLugar = mysqli_fetch_array($resultLugar)) 
            {
                $matrizLugar[$contar] = $rowLugar;
                $contar++;
                $repTres++;
                if ($repTres == 3) {
                    $vecesDiv++;
                }
        }
        // hola
        $recorrer = 0;
        for ($i=0; $i <= $vecesDiv +1 ; $i++) {
            echo "<section class='infoLugaresTuristicos'>
            <div class='card-group'>";
            for ($j=0; $j <= 2 ; $j++) {
                if ($j == $contar) {
                    break;
                }
                echo "<div class='card'>
                <img src='lugaresImages/";
                echo $matrizLugar[$recorrer][4];
                echo "' class='card-img-top' alt='...'>
                        <div class='card-body'>
                        <h5 class='card-title'>";
                echo $matrizLugar[$recorrer][1];
                echo "</h5>
                        <p class='card-text'>";
                echo $matrizLugar[$recorrer][2];
                echo "</p>
                    </div>
                </div>";
                
                $recorrer++;
                if ($recorrer == $contar) {
                    break;
                }
            }
            echo "</div>
            </section>";
        }
        
        ?>
        <!--
    <section class="infoLugaresTuristicos">
        
        <div class="card-group">
            <div class="card">
                <img src="../images/parqueNacionalPodocarpus.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title">Parque Nacional Podocarpus</h5>
                <p class="card-text">El Parque Nacional Podocarpus es un parque nacional ubicado en las provincias de Loja y Zamora Chinchipe, en el sur oriente del Ecuador. Fue instaurado el 15 de diciembre de 1982. El Parque es una zona de megadiversidad y una zona de alto grado de endemismo debido a su ubicación entre sistemas biológicos diversos.​Se extiende sobre 146.280 hectáreas o 1.468,8 km².​ En las dos estribaciones de la Cordillera Oriental de Los Andes hasta las cuencas de los ríos Nangaritza, Numbala y Loyola. Cerca del 85 % del parque está en la provincia de Zamora Chinchipe y cerca del 15 % en la provincia de Loja. El parque nacional se estableció con el fin de proteger al bosque más grande de romerillos en el país, compuesto por tres especies del género Podocarpus, la única conífera nativa del Ecuador. Dentro del parque se ha desarrollado un medio biológico único, representando especialmente por la avifauna única en el área. El parque nacional Podocarpus alberga un complejo de más de 100 lagunas, una de las más conocidas son las Lagunas del Compadre. También hay cascadas, cañones y varias clases de mamíferos y plantas.</p>
                <p class="card-text"><small class="text-muted">...</small></p>
                </div>
            </div>
            <div class="card">
                <img src="../images/parqueJipiro.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title">Parque Recreacional Jipiro</h5>
                <p class="card-text">La Unidad Parque Recreacional Jipiro que en idioma palta significa, lugar de descanso, constituye una de las principales atracciones de Loja. Es considerado como único en el país debido a su composición. Una de sus características principales son los nueve Troncos etno-culturales representados con réplicas de las más destacadas expresiones arquitectónicas y culturales de la humanidad. En el Parque Jipiro se puede observar como la creatividad humana aprovechando la flora, fauna y la arquitectura de diversas civilizaciones, para ofrecer un acogedor parque náutico con laguna, cisnes, patos, escenario para eventos, botes, bares, restaurantes, canchas y espacios para camping.</p>
                <p class="card-text"><small class="text-muted">...</small></p>
                </div>
            </div>
            <div class="card">
                <img src="../images/puertaEntradaCuidad.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title">Puerta de Entrada a la ciudad</h5>
                <p class="card-text">Es la Puerta de Entrada a la ciudad, es un monumento arquitectónico, uno de los mayores atractivos de la ciudad de Loja. En su interior alberga un museo. Es la Puerta de Entrada a la ciudad, representa parte del Escudo de Loja, en el que se divisa un castillo medieval, por el cual se accede al centro de la ciudad. Construida en los años 1998–1999. Se dice que es una réplica del escudo de Loja. La entrada propiamente dicha, está conformada por el Puente Bolívar que pasa sobre el río Malacatos, un castillo y las esculturas de Don Quijote y su fiel compañero, Sancho.</p>
                <p class="card-text"><small class="text-muted">...</small></p>
                </div>
            </div>
        </div>
    </section>
    
    <section class="infoLugaresTuristicos">
        <div class="card-group">
            <div class="card">
                <img src="../images/plazaCultura.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title">Plaza de la Cultura</h5>
                <p class="card-text">En el marco del Primer Festival Internacional de Artes Vivas de Loja 2016, el gobierno ecuatoriano inauguraró en la ciudad de Loja el Teatro Benjamín Carrión una de las obras más destacadas en favor de la cultura ecuatoriana con capacidad para 900 espectadores. Este espacio no solo albergará eventos  de ópera, teatro, danza o ballet sino que además será escenario de uno de los pilares más fuerte de la actividad cultural de Loja: la música. El teatro también es la sede de la orquesta sinfónica de Loja.  Además, cuenta con tecnología de punta y con todos los requerimientos de un teatro de talla mundial, por lo que ha sido catalogado como el escenario cultural más grande y mejor equipado del Ecuador.</p>
                <p class="card-text"><small class="text-muted">...</small></p>
                </div>
            </div>
            <div class="card">
                <img src="../images/parqueCentral.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title">Parque Central</h5>
                <p class="card-text">Es un parque donde se puede disfrutar de abundante vegetación, diferentes bancos para que los ecuatorianos y turistas puedan sentarse a descansar y es también un lugar para disfrutar durante el día y la noche. Dentro del parque merece la pena destacar un monumento en la zona del centro, recordando la figura del Dr. Bernardo Valdivieso de los Héroes, que ayudó mucho a la educación de Loja y a la libertad religiosa, además de fundar la Universidad Nacional de Loja en 1859, un monumento muy antiguo hecho en bronce. Este monumento en la plaza o Parque Central es uno de los iconos de la ciudad, un lugar ideal para fotografiarse y llevarse un recuerdo.</p>
                <p class="card-text"><small class="text-muted">...</small></p>
                </div>
            </div>
            <div class="card">
                <img src="../images/parqueLinealTebaida.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title">Parque Lineal La Tebaida</h5>
                <p class="card-text">El parque lineal La Tebaida se encuentra ubicado al sur de la ciudad de Loja, fue creado entre año de 1998 y 1999 en la administracion del Dr. José Bolívar Castillo, lleva el nombre de lineal ya que cuenta con varias áreas, como: senderos, canchas deportivas, juegos infantiles, kioskos donde se vende confitería, muro de escala, área para ejercitarse, espacios verdes para realizar actividades de fin de semana. Mide aproximadamente 3.5 km desde el puente del Centro Comercial "Supermaxi" hasta el puente de la Universidad Nacional de Loja, con una extensión de 6.4 hectáreas, brindando recreación a los turistas nacionales y extranjeros.</p>
                <p class="card-text"><small class="text-muted">...</small></p>
                </div>
            </div>
        </div>
    </section>
    -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <h6 class="text-muted lead">UTPL todos los derechos reservados @Copyright</h6>
                    <h6 class="text-muted">
                        1800 88 75 88<br>
                        WhatsApp: 0999565400<br>
                        PBX: 07 370 1444<br>
                    </h6>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="pull-right">
                        <h6 class="text-muted lead">ENCUENTRANOS EN LAS REDES</h6>
                        <div class="redes-footer">
                            <a href="https://www.facebook.com/"><img src="../images/facebook.png" width="30px"></a>
                            <a href="https://twitter.com/"><img src="../images/twitter.png" width="30px"></a>
                            <a href="https://www.youtube.com/"><img src="../images/youtube.png" width="30px"></a>
                        </div>
                    </div>
                    <div class="row"> <p class="text-muted small text-right">Ubicacion: San Cayetano Alto - Loja<br> Todos los derechos reservados.</p></div>
                </div>
            </div>  
        </div>
      </footer>
</body>
</html>