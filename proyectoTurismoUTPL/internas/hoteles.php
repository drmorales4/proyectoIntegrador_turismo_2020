<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hoteles</title>

    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/estilos-hoteles.css">
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

    <section class="infoHoteles">
        <h2>Hoteles - Información</h2>
        <?php
        include_once '../database.php';
        $sqlHotel = "SELECT * FROM hoteles";
        $resultHotel = mysqli_query($con, $sqlHotel);
        $contar = 0;
        $matrizHotel;
        $repTres = 1;
        $vecesDiv = 0;
        while($rowHotel = mysqli_fetch_array($resultHotel)) 
            {
                $matrizHotel[$contar] = $rowHotel;
                $contar++;
                $repTres++;
                if ($repTres == 3) {
                    $vecesDiv++;
                }
        }
        // hola
        $recorrer = 0;
        $salir = 0;
        for ($i=0; $i <= $vecesDiv +1 ; $i++) {
            echo "<div>";

            for ($j=0; $j <= 2 ; $j++) {

                if ($j == $contar) {
                    break;
                }
                echo "<article><img src='../internas/hotelImages/";
                echo $matrizHotel[$recorrer][4];
                echo "'><h3>";
                echo $matrizHotel[$recorrer][1];
                echo "</h3>
                <p>";
                echo $matrizHotel[$recorrer][2];
                echo "</p>
            </article>";
            
               $recorrer++;
                if ($recorrer == $contar) {
                    $salir = 1;
                    break;
                }
                
            }
            echo "</div>";
            if ($salir == 1) {
                break;
            }
        }
        
        ?>

    </section>
        

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