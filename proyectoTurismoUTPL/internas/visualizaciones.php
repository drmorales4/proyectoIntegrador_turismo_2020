<?php
include_once '../database.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Visualizaciones</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/app.css">
    <!--<script type="text/javascript" src="../js/app.js"></script> -->
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
                    <a href="hoteles.html" id="enlace-hoteles" class="btn-header">Hoteles</a>
                    <a href="visualizaciones.php" id="enlace-visualizaciones" class="btn-header">Visualizaciones</a>
                    <a href="lugaresTuristicos.html" id="enlace-lugaresTuristicos" class="btn-header">Lugares
                        Turisticos</a>
                    <a href="../login.php" id="enlace-login" class="btn-header">Ingreso</a>
                </div>
                <div class="icono" id="open">
                    <span>&#9776;</span>
                </div>
            </div>
        </nav>

    </header>
    <center>
        <?php
        $sql = "SELECT DISTINCT(year(fecha)) as anio, (month(fecha)) as mes FROM registros ORDER BY 1 DESC,2 DESC";
        $result = mysqli_query($con, $sql);
        $result2 = mysqli_query($con, $sql);
        $result3 = mysqli_query($con, $sql);
        $ultAnio = mysqli_fetch_array($result2)[0];
        $ultMes = mysqli_fetch_array($result3)[1];
        //$cambioFecha = "$ultAnio-$ultMes";
        //echo $cambioFecha;
        ?>
        <form action="#"  method="POST" enctype="multipart/form-data">
            <select name="anio-mes">
                <?php
                while($row = mysqli_fetch_array($result)) 
                {
                    $rows[] = $row;
                    echo "<option>$row[0]-$row[1]</option>";
                }
                
                ?>
            </select>
            <input  type="submit" name="submit"  value="Cambiar"/>
        </form>
        
        <?php
        //echo $cambioFecha;
        if(isset($_POST['submit'])){
            $cambioFecha = $_POST['anio-mes'];
            //echo $cambioFecha;
            
            
        }
        $splitFecha = explode("-",$cambioFecha);
            echo "<br>";
        // echo $splitFecha[0];
        // echo $splitFecha[1];
        $consultaSQL = "SELECT * from registros where year(fecha) = $splitFecha[0] and month(fecha) = $splitFecha[1]";
        $result4 = mysqli_query($con, $consultaSQL);
        while($row = mysqli_fetch_array($result4)) 
                {
                    $rows[] = $row;
                    echo "$row[5]";
                }
        ?>
    </center>


    <section class="graficasHome">
        <h2>TARIFA PROMEDIO</h2>
        <div class="porHabitacion">
            <h3>Por Habitación</h3>
            <div>
                <img src="../images/1.png">
                <img src="../images/2.png">
                <img src="../images/3.png">
            </div>
        </div>
        <div class="porPersona">
            <h3>Por Persona</h3>
            <div>
                <img src="../images/4.png">
                <img src="../images/5.png">
                <img src="../images/6.png">
            </div>
        </div>
    </section>

    <section class="graficasHome2">
        <h2>DISPONIBILIDAD</h2>
        <div></div>
        <div>
            <img src="../images/7.png">
            <img src="../images/8.png">
            <img src="../images/9.png">
        </div>
        </div>
    </section>

    <section class="graficasHome2">
        <h2>REVPAR</h2>
        <div>
            <div>
                <img src="../images/10.png">
                <img src="../images/11.png">
                <img src="../images/12.png">
            </div>
        </div>
    </section>


    <footer>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <h6 class="text-muted lead">CONTACTO:</h6>
                    <h6 class="text-muted">
                        Carrera 8h No. 166-71 Local 2<br>
                        Santa Cruz de la Ronda.<br>
                        Teléfonos: 3115988953 – 3112641818.<br>
                    </h6>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="pull-right">
                        <h6 class="text-muted lead">ENCUENTRANOS EN LAS REDES</h6>
                        <div class="redes-footer">
                            <a href="https://www.facebook.com/"><img src="../images/facebook-2.png"></a>
                            <a href="https://twitter.com/"><img src="../images/twitter-2.png"></a>
                            <a href="https://www.youtube.com/"><img src="../images/youtube.svg"></a>
                        </div>
                    </div>
                    <div class="row">
                        <p class="text-muted small text-right">José Miguel, arte y belleza @2016.<br> Todos los derechos
                            reservados.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>