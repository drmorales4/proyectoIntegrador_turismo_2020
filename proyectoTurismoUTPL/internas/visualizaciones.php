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
    <link rel="stylesheet" href="../css/estilos-visualizaciones.css">
    <link rel="stylesheet" href="../css/app.css">
    
    <!--<script type="text/javascript" src="../js/app.js"></script> -->
    <!-- Hichcharts css -->
    <style type="text/css">
            .highcharts-figure, .highcharts-data-table table {
                width:100%; 
                max-width: 800px;
                margin: 1em ;
            }
            .highcharts-figure-big, .highcharts-data-table table {
                width:100%; 
                max-width: 1500px;
                margin: 1em;
            }

            #container {
                height: 450px;
            }

            .highcharts-data-table table {
                font-family: Verdana, sans-serif;
                border-collapse: collapse;
                border: 1px solid #EBEBEB;
                margin: 10px auto;
                text-align: center;
                width: 100%;
                max-width: 500px;
            }
            .highcharts-data-table caption {
                padding: 1em 0;
                font-size: 1.2em;
                color: #555;
            }
            .highcharts-data-table th {
                font-weight: 600;
                padding: 0.5em;
            }
            .highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
                padding: 0.5em;
            }
            .highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
                background: #f8f8f8;
            }
            .highcharts-data-table tr:hover {
                background: #f1f7ff;
            }

        </style>
        <script src="../highcharts/code/highcharts.js"></script>
        <script src="../highcharts/code/modules/exporting.js"></script>
        <script src="../highcharts/code/modules/export-data.js"></script>
        <script src="../highcharts/code/modules/accessibility.js"></script>
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
    <section class="graficasHome">
        <h2>VISUALIZACIONES POR CATEGORÍA</h2>
        <center>
            <H3>Seleccione los siguientes ajustes</H3>
        <?php
        $sqlForm3 = "SELECT DISTINCT(clasificacion) as clasificacion FROM registros";
        $resultForm3 = mysqli_query($con, $sqlForm3);
        $sqlForm = "SELECT DISTINCT(year(fecha)) as anio FROM registros ORDER BY 1 DESC";
        $resultForm = mysqli_query($con, $sqlForm);
        $sqlForm2 = "SELECT DISTINCT(year(fecha)) as anio, (month(fecha)) as mes FROM registros ORDER BY 1 DESC,2 DESC";
        $resultForm2 = mysqli_query($con, $sqlForm2);
        //valores por default
        $cambioClasifi = "Todos";
        $cambioFecha = "Todos-Todos";
        $splitFecha[0] = "Todos";
        $splitFecha[1] = "Todos";
        $cambioEstr1 = "5 Estrellas";
        $cambioEstr2 = "4 Estrellas";
        $cambioEstr3 = "3 Estrellas";


        ?>
        <form action="#"  method="POST" enctype="multipart/form-data">
            <div>Seleccione por clasificación
            <select name="clasificacion">
                <option>Todos</option>
                <?php
                while($rowForm3 = mysqli_fetch_array($resultForm3)) 
                {
                    $rowsForm3[] = $rowForm3;
                    echo "<option>$rowForm3[0]</option>";
                }
                
                ?>
            </select>
            </div>
            <div>Seleccione año y mes
            <select name="anio-mes">
                <option>Todos-Todos</option>
                <?php
                while($rowForm = mysqli_fetch_array($resultForm)) 
                {
                    $rowsForm[] = $rowForm;
                    echo "<option>$rowForm[0]-Todos</option>";
                }
                
                ?>
                <?php
                while($rowForm2 = mysqli_fetch_array($resultForm2)) 
                {
                    $rowsForm2[] = $rowForm2;
                    echo "<option>$rowForm2[0]-$rowForm2[1]</option>";
                }
                
                ?>
            </select>
            </div>
            <div>
                Seleccione las categorias
            <select name="estrella1">
                <option selected>5 Estrellas</option>
                <option>4 Estrellas</option>
                <option>3 Estrellas</option>
                <option>2 Estrellas</option>
                <option>1 Estrella</option>
            </select>

            <select name="estrella2">
                <option>5 Estrellas</option>
                <option selected>4 Estrellas</option>
                <option>3 Estrellas</option>
                <option>2 Estrellas</option>
                <option>1 Estrella</option>
            </select>

            <select name="estrella3">
                <option>5 Estrellas</option>
                <option>4 Estrellas</option>
                <option selected>3 Estrellas</option>
                <option>2 Estrellas</option>
                <option>1 Estrella</option>
            </select>
            </div>
            <input  type="submit" name="submit"  value="Cambiar"/>
        </form>
        
        <?php
        if(isset($_POST['submit'])){
            $cambioClasifi = $_POST['clasificacion'];
            $cambioFecha = $_POST['anio-mes'];
            $cambioEstr1 = $_POST['estrella1'];
            $cambioEstr2 = $_POST['estrella2'];
            $cambioEstr3 = $_POST['estrella3'];
            obtenerDatos($cambioFecha, $cambioClasifi);
        }

        function obtenerDatos($elemento){
            global $splitFecha;
            $splitFecha = explode("-",$elemento);
        }
        ?>
    </center>
        </div>
    </section>
    
    <section class="graficasHome">
        <h2>HUÉSPEDES</h2>
        <div class="porHabitacion">
            <div>
                <figure class="highcharts-figure">
                    <div id="pastel1"></div>
                    <p class="highcharts-description">
                        Huéspedes de hoteles con categoria <?php echo $cambioEstr1; ?>
                    </p>
                </figure>
                    <figure class="highcharts-figure">
                    <div id="pastel2"></div>
                    <p class="highcharts-description">
                        Huéspedes de hoteles con categoria <?php echo $cambioEstr2; ?>
                    </p>
                </figure>
                    <figure class="highcharts-figure">
                    <div id="pastel3"></div>
                    <p class="highcharts-description">
                        Huéspedes de hoteles con categoria <?php echo $cambioEstr3; ?>
                    </p>
                </figure>
            </div>
        </div>
    </section>

    <section class="graficasHome">
        <h2>TARIFA PROMEDIO</h2>
        <div class="porHabitacion">
            <h3>Por Habitación</h3>
            <?php
            echo $cambioClasifi;?>
            <div>
                <figure class="highcharts-figure">
                    <div>
                    <?php
                    if ($cambioClasifi == "Todos") {
                        if ($splitFecha[0] == "Todos") {
                            $consTarPro1 = "SELECT sum(ventas_netas)/sum(habitaciones) as porHabitacion FROM registros WHERE categoria = '$cambioEstr1'";
                        }elseif ($splitFecha[1] == "Todos") {
                            $consTarPro1 = "SELECT sum(ventas_netas)/sum(habitaciones) as porHabitacion FROM registros WHERE year(fecha) = $splitFecha[0]  AND categoria = '$cambioEstr1'";
                        }else{
                           $consTarPro1 = "SELECT sum(ventas_netas)/sum(habitaciones) as porHabitacion FROM registros WHERE year(fecha) = $splitFecha[0] and month(fecha) = $splitFecha[1] AND categoria = '$cambioEstr1'"; 
                        }
                    }else{
                        if ($splitFecha[0] == "Todos") {
                            $consTarPro1 = "SELECT sum(ventas_netas)/sum(habitaciones) as porHabitacion FROM registros WHERE categoria = '$cambioEstr1' AND clasificacion = '$cambioClasifi'";
                        }elseif ($splitFecha[1] == "Todos") {
                            $consTarPro1 = "SELECT sum(ventas_netas)/sum(habitaciones) as porHabitacion FROM registros WHERE year(fecha) = $splitFecha[0]  AND categoria = '$cambioEstr1'AND clasificacion = '$cambioClasifi'";
                        }else{
                           $consTarPro1 = "SELECT sum(ventas_netas)/sum(habitaciones) as porHabitacion FROM registros WHERE year(fecha) = $splitFecha[0] and month(fecha) = $splitFecha[1] AND categoria = '$cambioEstr1' AND clasificacion = '$cambioClasifi'"; 
                        }
                    }

                        $resultTarPro1 = mysqli_query($con,$consTarPro1);
                        $rowTarPro1 = mysqli_fetch_array($resultTarPro1);
                        $convTarPro1 =bcdiv($rowTarPro1[0], '1', 2); 
                        echo "$$convTarPro1";
                        ?>
                    </div>
                    <p class="highcharts-description">
                       Por Habitación de hoteles con categoria <?php echo $cambioEstr1; ?>
                    </p>
                </figure>
                    <figure class="highcharts-figure">
                    <div>
                    <?php
                    if ($cambioClasifi == "Todos") {
                        if ($splitFecha[0] == "Todos") {
                            $consTarPro2 = "SELECT sum(ventas_netas)/sum(habitaciones) as porHabitacion FROM registros WHERE categoria = '$cambioEstr2'";
                        }elseif ($splitFecha[1] == "Todos") {
                            $consTarPro2 = "SELECT sum(ventas_netas)/sum(habitaciones) as porHabitacion FROM registros WHERE year(fecha) = $splitFecha[0]  AND categoria = '$cambioEstr2'";
                        }else{
                           $consTarPro2 = "SELECT sum(ventas_netas)/sum(habitaciones) as porHabitacion FROM registros WHERE year(fecha) = $splitFecha[0] and month(fecha) = $splitFecha[1] AND categoria = '$cambioEstr2'"; 
                        }
                    }
                    else{
                        if ($splitFecha[0] == "Todos") {
                            $consTarPro2 = "SELECT sum(ventas_netas)/sum(habitaciones) as porHabitacion FROM registros WHERE categoria = '$cambioEstr2' AND clasificacion = '$cambioClasifi'";
                        }elseif ($splitFecha[1] == "Todos") {
                            $consTarPro2 = "SELECT sum(ventas_netas)/sum(habitaciones) as porHabitacion FROM registros WHERE year(fecha) = $splitFecha[0]  AND categoria = '$cambioEstr2' AND clasificacion = '$cambioClasifi'";
                        }else{
                           $consTarPro2 = "SELECT sum(ventas_netas)/sum(habitaciones) as porHabitacion FROM registros WHERE year(fecha) = $splitFecha[0] and month(fecha) = $splitFecha[1] AND categoria = '$cambioEstr2' AND clasificacion = '$cambioClasifi'"; 
                        }

                    }
                    
                        $resultTarPro2 = mysqli_query($con,$consTarPro2);
                        $rowTarPro2 = mysqli_fetch_array($resultTarPro2);
                        $convTarPro2 =bcdiv($rowTarPro2[0], '1', 2); 
                        echo "$$convTarPro2";
                        ?>
                    </div>
                    <p class="highcharts-description">
                        Por Habitación de hoteles con categoria <?php echo $cambioEstr2; ?>
                    </p>
                </figure>
                    <figure class="highcharts-figure">
                    <div>
                    <?php
                    if ($cambioClasifi == "Todos") {
                        if ($splitFecha[0] == "Todos") {
                            $consTarPro3 = "SELECT sum(ventas_netas)/sum(habitaciones) as porHabitacion FROM registros WHERE categoria = '$cambioEstr3'";
                        }elseif ($splitFecha[1] == "Todos") {
                            $consTarPro3 = "SELECT sum(ventas_netas)/sum(habitaciones) as porHabitacion FROM registros WHERE year(fecha) = $splitFecha[0]  AND categoria = '$cambioEstr3'";
                        }else{
                           $consTarPro3 = "SELECT sum(ventas_netas)/sum(habitaciones) as porHabitacion FROM registros WHERE year(fecha) = $splitFecha[0] and month(fecha) = $splitFecha[1] AND categoria = '$cambioEstr3'"; 
                        }
                    }else{
                        if ($splitFecha[0] == "Todos") {
                            $consTarPro3 = "SELECT sum(ventas_netas)/sum(habitaciones) as porHabitacion FROM registros WHERE categoria = '$cambioEstr3' AND clasificacion = '$cambioClasifi'";
                        }elseif ($splitFecha[1] == "Todos") {
                            $consTarPro3 = "SELECT sum(ventas_netas)/sum(habitaciones) as porHabitacion FROM registros WHERE year(fecha) = $splitFecha[0]  AND categoria = '$cambioEstr3' AND clasificacion = '$cambioClasifi'";
                        }else{
                           $consTarPro3 = "SELECT sum(ventas_netas)/sum(habitaciones) as porHabitacion FROM registros WHERE year(fecha) = $splitFecha[0] and month(fecha) = $splitFecha[1] AND categoria = '$cambioEstr3' AND clasificacion = '$cambioClasifi'"; 
                        }
                    }
                    
                        $resultTarPro3 = mysqli_query($con,$consTarPro3);
                        $rowTarPro3 = mysqli_fetch_array($resultTarPro3);
                        $convTarPro3 =bcdiv($rowTarPro3[0], '1', 2); 
                        echo "$$convTarPro3";
                        ?>
                    </div>
                    <p class="highcharts-description">
                        Por Habitación de hoteles con categoria <?php echo $cambioEstr3; ?>
                    </p>
                </figure>
            </div>
        </div>
        <div class="porHabitacion">
            <h3>Por Persona</h3>
            <div>
                <figure class="highcharts-figure">
                    <div>
                    <?php
                    if ($cambioClasifi == "Todos") {
                        if ($splitFecha[0] == "Todos") {
                            $consTarPro4 = "SELECT sum(ventas_netas)/sum(pernoctaciones) as porHabitacion FROM registros WHERE categoria = '$cambioEstr1'";
                        }elseif ($splitFecha[1] == "Todos") {
                            $consTarPro4 = "SELECT sum(ventas_netas)/sum(pernoctaciones) as porHabitacion FROM registros WHERE year(fecha) = $splitFecha[0]  AND categoria = '$cambioEstr1'";
                        }else{
                           $consTarPro4 = "SELECT sum(ventas_netas)/sum(pernoctaciones) as porHabitacion FROM registros WHERE year(fecha) = $splitFecha[0] and month(fecha) = $splitFecha[1] AND categoria = '$cambioEstr1'"; 
                        }
                    }else{
                        if ($splitFecha[0] == "Todos") {
                            $consTarPro4 = "SELECT sum(ventas_netas)/sum(pernoctaciones) as porHabitacion FROM registros WHERE categoria = '$cambioEstr1' AND clasificacion = '$cambioClasifi'";
                        }elseif ($splitFecha[1] == "Todos") {
                            $consTarPro4 = "SELECT sum(ventas_netas)/sum(pernoctaciones) as porHabitacion FROM registros WHERE year(fecha) = $splitFecha[0]  AND categoria = '$cambioEstr1' AND clasificacion = '$cambioClasifi'";
                        }else{
                           $consTarPro4 = "SELECT sum(ventas_netas)/sum(pernoctaciones) as porHabitacion FROM registros WHERE year(fecha) = $splitFecha[0] and month(fecha) = $splitFecha[1] AND categoria = '$cambioEstr1' AND clasificacion = '$cambioClasifi'"; 
                        }
                    }
                    
                        $resultTarPro4 = mysqli_query($con,$consTarPro4);
                        $rowTarPro4 = mysqli_fetch_array($resultTarPro4);
                        $convTarPro4 =bcdiv($rowTarPro4[0], '1', 2); 
                        echo "$$convTarPro4";
                        ?>
                    </div>
                    <p class="highcharts-description">
                        Por Persona de hoteles con categoria <?php echo $cambioEstr1; ?>
                    </p>
                </figure>
                    <figure class="highcharts-figure">
                    <div>
                    <?php
                    if ($cambioClasifi == "Todos") {
                        if ($splitFecha[0] == "Todos") {
                            $consTarPro5 = "SELECT sum(ventas_netas)/sum(pernoctaciones) as porHabitacion FROM registros WHERE categoria = '$cambioEstr2'";
                        }elseif ($splitFecha[1] == "Todos") {
                            $consTarPro5 = "SELECT sum(ventas_netas)/sum(pernoctaciones) as porHabitacion FROM registros WHERE year(fecha) = $splitFecha[0]  AND categoria = '$cambioEstr2'";
                        }else{
                           $consTarPro5 = "SELECT sum(ventas_netas)/sum(pernoctaciones) as porHabitacion FROM registros WHERE year(fecha) = $splitFecha[0] and month(fecha) = $splitFecha[1] AND categoria = '$cambioEstr2'"; 
                        }
                    }else{
                        if ($splitFecha[0] == "Todos") {
                            $consTarPro5 = "SELECT sum(ventas_netas)/sum(pernoctaciones) as porHabitacion FROM registros WHERE categoria = '$cambioEstr2' AND clasificacion = '$cambioClasifi'";
                        }elseif ($splitFecha[1] == "Todos") {
                            $consTarPro5 = "SELECT sum(ventas_netas)/sum(pernoctaciones) as porHabitacion FROM registros WHERE year(fecha) = $splitFecha[0]  AND categoria = '$cambioEstr2' AND clasificacion = '$cambioClasifi'";
                        }else{
                           $consTarPro5 = "SELECT sum(ventas_netas)/sum(pernoctaciones) as porHabitacion FROM registros WHERE year(fecha) = $splitFecha[0] and month(fecha) = $splitFecha[1] AND categoria = '$cambioEstr2' AND clasificacion = '$cambioClasifi'"; 
                        }
                    }
                    
                        $resultTarPro5 = mysqli_query($con,$consTarPro5);
                        $rowTarPro5 = mysqli_fetch_array($resultTarPro5);
                        $convTarPro5 =bcdiv($rowTarPro5[0], '1', 2); 
                        echo "$$convTarPro5";
                        ?>
                    </div>
                    <p class="highcharts-description">
                        Por Persona de hoteles con categoria <?php echo $cambioEstr2; ?>
                    </p>
                </figure>
                    <figure class="highcharts-figure">
                    <div>
                    <?php
                    if ($cambioClasifi == "Todos") {
                        if ($splitFecha[0] == "Todos") {
                            $consTarPro6 = "SELECT sum(ventas_netas)/sum(pernoctaciones) as porHabitacion FROM registros WHERE categoria = '$cambioEstr3'";
                        }elseif ($splitFecha[1] == "Todos") {
                            $consTarPro6 = "SELECT sum(ventas_netas)/sum(pernoctaciones) as porHabitacion FROM registros WHERE year(fecha) = $splitFecha[0]  AND categoria = '$cambioEstr3'";
                        }else{
                           $consTarPro6 = "SELECT sum(ventas_netas)/sum(pernoctaciones) as porHabitacion FROM registros WHERE year(fecha) = $splitFecha[0] and month(fecha) = $splitFecha[1] AND categoria = '$cambioEstr3'"; 
                        }
                    }else{
                        if ($splitFecha[0] == "Todos") {
                            $consTarPro6 = "SELECT sum(ventas_netas)/sum(pernoctaciones) as porHabitacion FROM registros WHERE categoria = '$cambioEstr3' AND clasificacion = '$cambioClasifi'";
                        }elseif ($splitFecha[1] == "Todos") {
                            $consTarPro6 = "SELECT sum(ventas_netas)/sum(pernoctaciones) as porHabitacion FROM registros WHERE year(fecha) = $splitFecha[0]  AND categoria = '$cambioEstr3' AND clasificacion = '$cambioClasifi'";
                        }else{
                           $consTarPro6 = "SELECT sum(ventas_netas)/sum(pernoctaciones) as porHabitacion FROM registros WHERE year(fecha) = $splitFecha[0] and month(fecha) = $splitFecha[1] AND categoria = '$cambioEstr3' AND clasificacion = '$cambioClasifi'"; 
                        }
                    }
                        $resultTarPro6 = mysqli_query($con,$consTarPro6);
                        $rowTarPro6 = mysqli_fetch_array($resultTarPro6);
                        $convTarPro6 =bcdiv($rowTarPro6[0], '1', 2); 
                        echo "$$convTarPro6";
                        ?>
                    </div>
                    <p class="highcharts-description">
                        Por Persona de hoteles con categoria <?php echo $cambioEstr3; ?>
                    </p>
                </figure>
            </div>
        </div>
    </section>

    <section class="graficasHome">
        <h2>OCUPACIÓN</h2>
        <div class="porHabitacion">
            <div>
                <figure class="highcharts-figure">
                    <div>
                        <?php
                        echo "12";
                        ?>
                    </div>
                    <p class="highcharts-description">
                        Ocupacion de hoteles con categoria <?php echo $cambioEstr1; ?>
                    </p>
                </figure>
                    <figure class="highcharts-figure">
                    <div>
                        <?php
                        echo "12";
                        ?>
                    </div>
                    <p class="highcharts-description">
                        Ocupacion de hoteles con categoria <?php echo $cambioEstr2; ?>
                    </p>
                </figure>
                    <figure class="highcharts-figure">
                    <div>
                        <?php
                        echo "12";
                        ?>
                    </div>
                    <p class="highcharts-description">
                        Ocupacion de hoteles con categoria <?php echo $cambioEstr3; ?>
                    </p>
                </figure>
            </div>

            <div>
                <figure class="highcharts-figure-big">
                    <div id="ocupacion"></div>
                    <p class="highcharts-description">
                        Vista general de todas las categorias
                    </p>
                </figure>
            </div>
        </div>
    </section>

    <section class="graficasHome">
        <h2>REVPAR</h2>
        <div class="porHabitacion">
            <div>
                <figure class="highcharts-figure">
                    <div id="pastel1"></div>
                    <p class="highcharts-description">
                        REVPAR de hoteles con categoria <?php echo $cambioEstr1; ?>
                    </p>
                </figure>
                    <figure class="highcharts-figure">
                    <div id="pastel2"></div>
                    <p class="highcharts-description">
                        REVPAR de hoteles con categoria <?php echo $cambioEstr2; ?>
                    </p>
                </figure>
                    <figure class="highcharts-figure">
                    <div id="pastel3"></div>
                    <p class="highcharts-description">
                        REVPAR de hoteles con categoria <?php echo $cambioEstr3; ?>
                    </p>
                </figure>
            </div>
        </div>
    </section>
    <section class="graficasHome">
        <h2>ESTADÍA PROMEDIO</h2>
        <div class="porHabitacion">
            <div>
                <figure class="highcharts-figure">
                    <div id="pastel1"></div>
                    <p class="highcharts-description">
                        Estadía promedio de hoteles con categoria <?php echo $cambioEstr1; ?>
                    </p>
                </figure>
                    <figure class="highcharts-figure">
                    <div id="pastel2"></div>
                    <p class="highcharts-description">
                        Estadía promedio de hoteles con categoria <?php echo $cambioEstr2; ?>
                    </p>
                </figure>
                    <figure class="highcharts-figure">
                    <div id="pastel3"></div>
                    <p class="highcharts-description">
                        Estadía promedio de hoteles con categoria <?php echo $cambioEstr3; ?>
                    </p>
                </figure>
            </div>
        </div>
    </section>
    <!-- Graficos-->
        <?php
        if ($cambioClasifi == "Todos") {
            if ($splitFecha[0] == "Todos") {
                $consPastel1 = "SELECT sum(nacionales) as nacionales, sum(extranjeros) as extranjeros from registros where  categoria = '$cambioEstr1'";
            }elseif ($splitFecha[1]== "Todos") {
                $consPastel1 = "SELECT sum(nacionales) as nacionales, sum(extranjeros) as extranjeros from registros where year(fecha) = $splitFecha[0]  AND categoria = '$cambioEstr1'";
            }else{
               $consPastel1 = "SELECT sum(nacionales) as nacionales, sum(extranjeros) as extranjeros from registros where year(fecha) = $splitFecha[0] and month(fecha) = $splitFecha[1] AND categoria = '$cambioEstr1'"; 
            }
        }else{
            if ($splitFecha[0] == "Todos") {
                $consPastel1 = "SELECT sum(nacionales) as nacionales, sum(extranjeros) as extranjeros from registros where  categoria = '$cambioEstr1' AND clasificacion = '$cambioClasifi'";
            }elseif ($splitFecha[1]== "Todos") {
                $consPastel1 = "SELECT sum(nacionales) as nacionales, sum(extranjeros) as extranjeros from registros where year(fecha) = $splitFecha[0]  AND categoria = '$cambioEstr1' AND clasificacion = '$cambioClasifi'";
            }else{
               $consPastel1 = "SELECT sum(nacionales) as nacionales, sum(extranjeros) as extranjeros from registros where year(fecha) = $splitFecha[0] and month(fecha) = $splitFecha[1] AND categoria = '$cambioEstr1' AND clasificacion = '$cambioClasifi'"; 
            }
        }
            $resultPastel1 = mysqli_query($con,$consPastel1);
            $rowPastel1 = mysqli_fetch_array($resultPastel1);
            $pastel1Suma = $rowPastel1['nacionales'] + $rowPastel1['extranjeros'];
            $pastel1Nac = bcdiv(($rowPastel1['nacionales']/$pastel1Suma)*100, '1', 2);
            $pastel1Ext = bcdiv(($rowPastel1['extranjeros']/$pastel1Suma)*100, '1', 2); 
        echo "
        <script type='text/javascript'>
            Highcharts.chart('pastel1', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: '$cambioEstr1'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                        }
                    }
                },
                series: [{
                    name: 'Brands',
                    colorByPoint: true,
                    data: [{
                        name: 'Nacionales',
                        y: $pastel1Nac
                    }, {
                        name: 'Extranjeros',
                        y: $pastel1Ext
                    }]
                }],
            credits: {
                enabled: false
            }

            });
            </script>
            ";?>
        <?php
        if ($cambioClasifi == "Todos") {
            if ($splitFecha[0] == "Todos") {
                $consPastel2 = "SELECT sum(nacionales) as nacionales, sum(extranjeros) as extranjeros from registros where  categoria = '$cambioEstr2'";
            }elseif ($splitFecha[1]== "Todos") {
                $consPastel2 = "SELECT sum(nacionales) as nacionales, sum(extranjeros) as extranjeros from registros where year(fecha) = $splitFecha[0] AND categoria = '$cambioEstr2'"; 
            }else{
               $consPastel2 = "SELECT sum(nacionales) as nacionales, sum(extranjeros) as extranjeros from registros where year(fecha) = $splitFecha[0] and month(fecha) = $splitFecha[1] AND categoria = '$cambioEstr2'"; 
            }
        }
        else{
            if ($splitFecha[0] == "Todos") {
                $consPastel2 = "SELECT sum(nacionales) as nacionales, sum(extranjeros) as extranjeros from registros where  categoria = '$cambioEstr2' AND clasificacion = '$cambioClasifi'";
            }elseif ($splitFecha[1]== "Todos") {
                $consPastel2 = "SELECT sum(nacionales) as nacionales, sum(extranjeros) as extranjeros from registros where year(fecha) = $splitFecha[0] AND categoria = '$cambioEstr2' AND clasificacion = '$cambioClasifi'"; 
            }else{
               $consPastel2 = "SELECT sum(nacionales) as nacionales, sum(extranjeros) as extranjeros from registros where year(fecha) = $splitFecha[0] and month(fecha) = $splitFecha[1] AND categoria = '$cambioEstr2' AND clasificacion = '$cambioClasifi'"; 
            }
        }
            $resultPastel2 = mysqli_query($con,$consPastel2);
            $rowPastel2 = mysqli_fetch_array($resultPastel2);
            $pastel2Suma = $rowPastel2['nacionales'] + $rowPastel2['extranjeros'];
            $pastel2Nac = bcdiv(($rowPastel2['nacionales']/$pastel2Suma)*100, '1', 2);
            $pastel2Ext = bcdiv(($rowPastel2['extranjeros']/$pastel2Suma)*100, '1', 2); 
        echo "
        <script type='text/javascript'>
            Highcharts.chart('pastel2', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: '$cambioEstr2'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                        }
                    }
                },
                series: [{
                    name: 'Brands',
                    colorByPoint: true,
                    data: [{
                        name: 'Nacionales',
                        y: $pastel2Nac
                    }, {
                        name: 'Extranjeros',
                        y: $pastel2Ext
                    }]
                }],
            credits: {
                enabled: false
            }
            });
            </script>
            "
            ;?>
            <?php
        if ($cambioClasifi == "Todos") {
            if ($splitFecha[0] == "Todos") {
                $consPastel3 = "SELECT sum(nacionales) as nacionales, sum(extranjeros) as extranjeros from registros where  categoria = '$cambioEstr3'";
            }elseif ($splitFecha[1]== "Todos") {
                $consPastel3 = "SELECT sum(nacionales) as nacionales, sum(extranjeros) as extranjeros from registros where year(fecha) = $splitFecha[0] AND categoria = '$cambioEstr3'"; 
            }else{
               $consPastel3 = "SELECT sum(nacionales) as nacionales, sum(extranjeros) as extranjeros from registros where year(fecha) = $splitFecha[0] and month(fecha) = $splitFecha[1] AND categoria = '$cambioEstr3'"; 
            }
        }else{
            if ($splitFecha[0] == "Todos") {
                $consPastel3 = "SELECT sum(nacionales) as nacionales, sum(extranjeros) as extranjeros from registros where  categoria = '$cambioEstr3' AND clasificacion = '$cambioClasifi'";
            }elseif ($splitFecha[1]== "Todos") {
                $consPastel3 = "SELECT sum(nacionales) as nacionales, sum(extranjeros) as extranjeros from registros where year(fecha) = $splitFecha[0] AND categoria = '$cambioEstr3' AND clasificacion = '$cambioClasifi'"; 
            }else{
               $consPastel3 = "SELECT sum(nacionales) as nacionales, sum(extranjeros) as extranjeros from registros where year(fecha) = $splitFecha[0] and month(fecha) = $splitFecha[1] AND categoria = '$cambioEstr3' AND clasificacion = '$cambioClasifi'"; 
            }
        }
        
            $resultPastel3 = mysqli_query($con,$consPastel3);
            $rowPastel3 = mysqli_fetch_array($resultPastel3);
            $pastel3Suma = $rowPastel3['nacionales'] + $rowPastel3['extranjeros'];
            $pastel3Nac = bcdiv(($rowPastel3['nacionales']/$pastel3Suma)*100, '1', 2);
            $pastel3Ext = bcdiv(($rowPastel3['extranjeros']/$pastel3Suma)*100, '1', 2); 
        echo "
        <script type='text/javascript'>
            Highcharts.chart('pastel3', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: '$cambioEstr3'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                        }
                    }
                },
                series: [{
                    name: 'Brands',
                    colorByPoint: true,
                    data: [{
                        name: 'Nacionales',
                        y: $pastel3Nac
                    }, {
                        name: 'Extranjeros',
                        y: $pastel3Ext
                    }]
                }],
            credits: {
                enabled: false
            }
            });
            </script>
            "
        ;?>

        <!-- grafico lineas ocupasion-->
        <?php
        $ocup5estr = "";
        $ocup4estr = "";
        $ocup3estr = "";
        $ocup2estr = "";
        $ocup1estr = "";
        if ($cambioClasifi == "Todos") {
            if ($splitFecha[0] == "Todos") {
                $sqlOcup5 = "SELECT (sum(habitaciones_ocupadas)/sum(habitaciones_disponibles))*100 AS ocupacion, day(fecha) FROM registros WHERE categoria = '5 Estrellas' GROUP by day(fecha) ORDER By 2";
            }elseif ($splitFecha[1]== "Todos") {
                $sqlOcup5 = "SELECT (sum(habitaciones_ocupadas)/sum(habitaciones_disponibles))*100 AS ocupacion, day(fecha) FROM registros WHERE categoria = '5 Estrellas' and year(fecha) = $splitFecha[0] GROUP by day(fecha) ORDER By 2";
            }else{
                $sqlOcup5 = "SELECT (sum(habitaciones_ocupadas)/sum(habitaciones_disponibles))*100 AS ocupacion, day(fecha) FROM registros WHERE categoria = '5 Estrellas' and year(fecha) = $splitFecha[0] and month(fecha) = $splitFecha[1] GROUP by day(fecha) ORDER By 2";
            }
        }else{
            if ($splitFecha[0] == "Todos") {
                $sqlOcup5 = "SELECT (sum(habitaciones_ocupadas)/sum(habitaciones_disponibles))*100 AS ocupacion, day(fecha) FROM registros WHERE categoria = '5 Estrellas' AND clasificacion = '$cambioClasifi' GROUP by day(fecha) ORDER By 2";
            }elseif ($splitFecha[1]== "Todos") {
                $sqlOcup5 = "SELECT (sum(habitaciones_ocupadas)/sum(habitaciones_disponibles))*100 AS ocupacion, day(fecha) FROM registros WHERE categoria = '5 Estrellas' and year(fecha) = $splitFecha[0]  AND clasificacion = '$cambioClasifi' GROUP by day(fecha) ORDER By 2";
            }else{
                $sqlOcup5 = "SELECT (sum(habitaciones_ocupadas)/sum(habitaciones_disponibles))*100 AS ocupacion, day(fecha) FROM registros WHERE categoria = '5 Estrellas' and year(fecha) = $splitFecha[0] and month(fecha) = $splitFecha[1]  AND clasificacion = '$cambioClasifi' GROUP by day(fecha) ORDER By 2";
            }
        }
        $resultOcup5 = mysqli_query($con,$sqlOcup5);
        $ocuTemp5 = mysqli_fetch_array($resultOcup5);
        $ocup5estr = sprintf("%s",$ocuTemp5[0]);
        while($rowOcup5 = mysqli_fetch_array($resultOcup5)) 
        {
            $ocup5estr= sprintf("%s, %s",$ocup5estr, $rowOcup5[0]);
        }
        if ($cambioClasifi == "Todos") {
            if ($splitFecha[0] == "Todos") {
                $sqlOcup4 = "SELECT (sum(habitaciones_ocupadas)/sum(habitaciones_disponibles))*100 AS ocupacion, day(fecha) FROM registros WHERE categoria = '4 Estrellas' GROUP by day(fecha) ORDER By 2";
            }elseif ($splitFecha[1]== "Todos") {
                $sqlOcup4 = "SELECT (sum(habitaciones_ocupadas)/sum(habitaciones_disponibles))*100 AS ocupacion, day(fecha) FROM registros WHERE categoria = '4 Estrellas' and year(fecha) = $splitFecha[0] GROUP by day(fecha) ORDER By 2";
            }else{
                $sqlOcup4 = "SELECT (sum(habitaciones_ocupadas)/sum(habitaciones_disponibles))*100 AS ocupacion, day(fecha) FROM registros WHERE categoria = '4 Estrellas' and year(fecha) = $splitFecha[0] and month(fecha) = $splitFecha[1] GROUP by day(fecha) ORDER By 2";
            }
        }else{
            if ($splitFecha[0] == "Todos") {
                $sqlOcup4 = "SELECT (sum(habitaciones_ocupadas)/sum(habitaciones_disponibles))*100 AS ocupacion, day(fecha) FROM registros WHERE categoria = '4 Estrellas'  AND clasificacion = '$cambioClasifi' GROUP by day(fecha) ORDER By 2";
            }elseif ($splitFecha[1]== "Todos") {
                $sqlOcup4 = "SELECT (sum(habitaciones_ocupadas)/sum(habitaciones_disponibles))*100 AS ocupacion, day(fecha) FROM registros WHERE categoria = '4 Estrellas' and year(fecha) = $splitFecha[0]  AND clasificacion = '$cambioClasifi'  GROUP by day(fecha) ORDER By 2";
            }else{
                $sqlOcup4 = "SELECT (sum(habitaciones_ocupadas)/sum(habitaciones_disponibles))*100 AS ocupacion, day(fecha) FROM registros WHERE categoria = '4 Estrellas' and year(fecha) = $splitFecha[0] and month(fecha) = $splitFecha[1]  AND clasificacion = '$cambioClasifi' GROUP by day(fecha) ORDER By 2";
            }
        }
        $resultOcup4 = mysqli_query($con,$sqlOcup4);
        $ocuTemp4 = mysqli_fetch_array($resultOcup4);
        $ocup4estr = sprintf("%s",$ocuTemp4[0]);
        while($rowOcup4 = mysqli_fetch_array($resultOcup4)) 
        {
            $ocup4estr= sprintf("%s, %s",$ocup4estr, $rowOcup4[0]);
        }

        if ($cambioClasifi == "Todos") {
            if ($splitFecha[0] == "Todos") {
                $sqlOcup3 = "SELECT (sum(habitaciones_ocupadas)/sum(habitaciones_disponibles))*100 AS ocupacion, day(fecha) FROM registros WHERE categoria = '3 Estrellas' GROUP by day(fecha) ORDER By 2";
            }elseif ($splitFecha[1]== "Todos") {
                $sqlOcup3 = "SELECT (sum(habitaciones_ocupadas)/sum(habitaciones_disponibles))*100 AS ocupacion, day(fecha) FROM registros WHERE categoria = '3 Estrellas' and year(fecha) = $splitFecha[0] GROUP by day(fecha) ORDER By 2";
            }else{
                $sqlOcup3 = "SELECT (sum(habitaciones_ocupadas)/sum(habitaciones_disponibles))*100 AS ocupacion, day(fecha) FROM registros WHERE categoria = '3 Estrellas' and year(fecha) = $splitFecha[0] and month(fecha) = $splitFecha[1] GROUP by day(fecha) ORDER By 2";
            }
        }else{
            if ($splitFecha[0] == "Todos") {
                $sqlOcup3 = "SELECT (sum(habitaciones_ocupadas)/sum(habitaciones_disponibles))*100 AS ocupacion, day(fecha) FROM registros WHERE categoria = '3 Estrellas'  AND clasificacion = '$cambioClasifi' GROUP by day(fecha) ORDER By 2";
            }elseif ($splitFecha[1]== "Todos") {
                $sqlOcup3 = "SELECT (sum(habitaciones_ocupadas)/sum(habitaciones_disponibles))*100 AS ocupacion, day(fecha) FROM registros WHERE categoria = '3 Estrellas' and year(fecha) = $splitFecha[0]  AND clasificacion = '$cambioClasifi' GROUP by day(fecha) ORDER By 2";
            }else{
                $sqlOcup3 = "SELECT (sum(habitaciones_ocupadas)/sum(habitaciones_disponibles))*100 AS ocupacion, day(fecha) FROM registros WHERE categoria = '3 Estrellas' and year(fecha) = $splitFecha[0] and month(fecha) = $splitFecha[1]  AND clasificacion = '$cambioClasifi' GROUP by day(fecha) ORDER By 2";
            }
        }
        $resultOcup3 = mysqli_query($con,$sqlOcup3);
        $ocuTemp3 = mysqli_fetch_array($resultOcup3);
        $ocup3estr = sprintf("%s",$ocuTemp3[0]);
        while($rowOcup3 = mysqli_fetch_array($resultOcup3)) 
        {
            $ocup3estr= sprintf("%s, %s",$ocup3estr, $rowOcup3[0]);
        }
        if ($cambioClasifi == "Todos") {
            if ($splitFecha[0] == "Todos") {
                $sqlOcup2 = "SELECT (sum(habitaciones_ocupadas)/sum(habitaciones_disponibles))*100 AS ocupacion, day(fecha) FROM registros WHERE categoria = '2 Estrellas' GROUP by day(fecha) ORDER By 2";
            }elseif ($splitFecha[1]== "Todos") {
                $sqlOcup2 = "SELECT (sum(habitaciones_ocupadas)/sum(habitaciones_disponibles))*100 AS ocupacion, day(fecha) FROM registros WHERE categoria = '2 Estrellas' and year(fecha) = $splitFecha[0] GROUP by day(fecha) ORDER By 2";
            }else{
                $sqlOcup2 = "SELECT (sum(habitaciones_ocupadas)/sum(habitaciones_disponibles))*100 AS ocupacion, day(fecha) FROM registros WHERE categoria = '2 Estrellas' and year(fecha) = $splitFecha[0] and month(fecha) = $splitFecha[1] GROUP by day(fecha) ORDER By 2";
            }
        }else{
            if ($splitFecha[0] == "Todos") {
                $sqlOcup2 = "SELECT (sum(habitaciones_ocupadas)/sum(habitaciones_disponibles))*100 AS ocupacion, day(fecha) FROM registros WHERE categoria = '2 Estrellas' AND clasificacion = '$cambioClasifi' GROUP by day(fecha) ORDER By 2";
            }elseif ($splitFecha[1]== "Todos") {
                $sqlOcup2 = "SELECT (sum(habitaciones_ocupadas)/sum(habitaciones_disponibles))*100 AS ocupacion, day(fecha) FROM registros WHERE categoria = '2 Estrellas' and year(fecha) = $splitFecha[0] AND clasificacion = '$cambioClasifi' GROUP by day(fecha) ORDER By 2";
            }else{
                $sqlOcup2 = "SELECT (sum(habitaciones_ocupadas)/sum(habitaciones_disponibles))*100 AS ocupacion, day(fecha) FROM registros WHERE categoria = '2 Estrellas' and year(fecha) = $splitFecha[0] and month(fecha) = $splitFecha[1] AND clasificacion = '$cambioClasifi' GROUP by day(fecha) ORDER By 2";
            }
        }
        $resultOcup2 = mysqli_query($con,$sqlOcup2);
        $ocuTemp2 = mysqli_fetch_array($resultOcup2);
        $ocup2estr = sprintf("%s",$ocuTemp2[0]);
        while($rowOcup2 = mysqli_fetch_array($resultOcup2)) 
        {
            $ocup2estr= sprintf("%s, %s",$ocup2estr, $rowOcup2[0]);
        }

        if ($cambioClasifi == "Todos") {
            if ($splitFecha[0] == "Todos") {
                $sqlOcup1 = "SELECT (sum(habitaciones_ocupadas)/sum(habitaciones_disponibles))*100 AS ocupacion, day(fecha) FROM registros WHERE categoria = '1 Estrella' GROUP by day(fecha) ORDER By 2";
            }elseif ($splitFecha[1]== "Todos") {
                $sqlOcup1 = "SELECT (sum(habitaciones_ocupadas)/sum(habitaciones_disponibles))*100 AS ocupacion, day(fecha) FROM registros WHERE categoria = '1 Estrella' and year(fecha) = $splitFecha[0] GROUP by day(fecha) ORDER By 2";
            }else{
                $sqlOcup1 = "SELECT (sum(habitaciones_ocupadas)/sum(habitaciones_disponibles))*100 AS ocupacion, day(fecha) FROM registros WHERE categoria = '1 Estrella' and year(fecha) = $splitFecha[0] and month(fecha) = $splitFecha[1] GROUP by day(fecha) ORDER By 2";
            }
        }else{
            if ($splitFecha[0] == "Todos") {
                $sqlOcup1 = "SELECT (sum(habitaciones_ocupadas)/sum(habitaciones_disponibles))*100 AS ocupacion, day(fecha) FROM registros WHERE categoria = '1 Estrella' AND clasificacion = '$cambioClasifi' GROUP by day(fecha) ORDER By 2";
            }elseif ($splitFecha[1]== "Todos") {
                $sqlOcup1 = "SELECT (sum(habitaciones_ocupadas)/sum(habitaciones_disponibles))*100 AS ocupacion, day(fecha) FROM registros WHERE categoria = '1 Estrella' and year(fecha) = $splitFecha[0] AND clasificacion = '$cambioClasifi' GROUP by day(fecha) ORDER By 2";
            }else{
                $sqlOcup1 = "SELECT (sum(habitaciones_ocupadas)/sum(habitaciones_disponibles))*100 AS ocupacion, day(fecha) FROM registros WHERE categoria = '1 Estrella' and year(fecha) = $splitFecha[0] and month(fecha) = $splitFecha[1] AND clasificacion = '$cambioClasifi' GROUP by day(fecha) ORDER By 2";
            }
        }
        $resultOcup1 = mysqli_query($con,$sqlOcup1);
        $ocuTemp1 = mysqli_fetch_array($resultOcup1);
        $ocup1estr = sprintf("%s",$ocuTemp1[0]);
        while($rowOcup1 = mysqli_fetch_array($resultOcup1)) 
        {
            $ocup1estr= sprintf("%s, %s",$ocup1estr, $rowOcup1[0]);
        }
        echo "
        <script type='text/javascript'>
                    Highcharts.chart('ocupacion', {

                        title: {
                            text: 'Todas las categorías'
                        },

                        subtitle: {
                            text: 'Año:$splitFecha[0] Mes: $splitFecha[1]'
                        },

                        yAxis: {
                            title: {
                                text: 'Ocupaciones'
                            }
                        },

                        xAxis: {
                            accessibility: {
                                rangeDescription: 'Dia'
                            }
                        },

                        legend: {
                            layout: 'vertical',
                            align: 'right',
                            verticalAlign: 'middle'
                        },

                        plotOptions: {
                            series: {
                                label: {
                                    connectorAllowed: false
                                },
                                pointStart: 1,
                            }
                        },

                        series: [{
                            name: '5 Estrellas',
                            data: [$ocup5estr]
                        }, {
                            name: '4 Estrellas',
                            data: [$ocup4estr]
                        }, {
                            name: '3 Estrellas',
                            data: [$ocup3estr]
                        }, {
                            name: '2 Estrellas',
                            data: [$ocup2estr]
                        }, {
                            name: '1 Estrella',
                            data: [$ocup1estr]
                        }],

                        responsive: {
                            rules: [{
                                condition: {
                                    maxWidth: 500
                                },
                                chartOptions: {
                                    legend: {
                                        layout: 'horizontal',
                                        align: 'center',
                                        verticalAlign: 'bottom'
                                    }
                                }
                            }]

                        },
                        credits: {
                            enabled: false
                        }

                    });
                    </script>";


        ?>

    <script type="text/javascript">
            Highcharts.chart('grafic3x', {
                chart: {
                    type: 'area'
                },
                accessibility: {
                    description: 'Image description: .'
                },
                title: {
                    text: 'NUMERO DE PLAZAS POR HOTELES'
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    allowDecimals: false,
                    labels: {
                        formatter: function () {
                            return this.value; // clean, unformatted number for year
                        }
                    },
                    accessibility: {
                        rangeDescription: 'Range: 1940 to 2017.'
                    }
                },
                yAxis: {
                    title: {
                        text: 'Nuclear weapon states'
                    },
                    labels: {
                        formatter: function () {
                            return this.value / 1000 + 'k';
                        }
                    }
                },
                tooltip: {
                    pointFormat: '{series.name} had stockpiled <b>{point.y:,.0f}</b><br/>warheads in {point.x}'
                },
                plotOptions: {
                    area: {
                        pointStart: 1,
                        marker: {
                            enabled: false,
                            symbol: 'circle',
                            radius: 2,
                            states: {
                                hover: {
                                    enabled: true
                                }
                            }
                        }
                    }
                },
                series: [{
                    name: 'SONESTA HOTEL LOJA',
                    data: [117, 111,3,4,5,6,7]
                }, {
                    name: 'GRAND VICTORIA BOUTIQUE',
                    data: [58, 155,114,512,123,521]
                }]
            });
        </script>
        
        <script type="text/javascript">
            Highcharts.chart('grafic3', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'NUMERO DE HABITACIONES POR HOTELES'
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    categories: ['HOTELES'],
                    title: {
                        text: null
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Habitaciones (Unidades)',
                        align: 'high'
                    },
                    labels: {
                        overflow: 'justify'
                    }
                },
                tooltip: {
                    valueSuffix: ' Habitaciones'
                },
                plotOptions: {
                    bar: {
                        dataLabels: {
                            enabled: true
                        }
                    }
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'top',
                    x: -40,
                    y: 80,
                    floating: true,
                    borderWidth: 1,
                    backgroundColor:
                        Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
                    shadow: true
                },
                credits: {
                    enabled: false
                },
                series: [{
                    name: 'SONESTA HOTEL LOJA',
                    data: [73]
                }, {
                    name: 'GRAND VICTORIA BOUTIQUE',
                    data: [38]
                }]
            });
                    </script>
                    
        <script type="text/javascript">
            Highcharts.chart('grafic4', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: '...'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                        }
                    }
                },
                series: [{
                    name: 'Brands',
                    colorByPoint: true,
                    data: [{
                        name: 'Chrome',
                        y: 61.41,
                        sliced: true,
                        selected: true
                    }, {
                        name: 'Internet Explorer',
                        y: 11.84
                    }, {
                        name: 'Firefox',
                        y: 10.85
                    }, {
                        name: 'Edge',
                        y: 4.67
                    }, {
                        name: 'Safari',
                        y: 4.18
                    }, {
                        name: 'Sogou Explorer',
                        y: 1.64
                    }, {
                        name: 'Opera',
                        y: 1.6
                    }, {
                        name: 'QQ',
                        y: 1.2
                    }, {
                        name: 'Other',
                        y: 2.61
                    }]
                }]
            });
        </script>
         
        
                    
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