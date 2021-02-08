<?php
include("visGraficas.php");
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
    
    <!-- Hichcharts css -->
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
                    <a href="hoteles.php" id="enlace-hoteles" class="btn-header">Hoteles</a>
                    <a href="visualizaciones.php" id="enlace-visualizaciones" class="btn-header">Visualizaciones</a>
                    <a href="lugaresTuristicos.php" id="enlace-lugaresTuristicos" class="btn-header">Lugares
                        Turisticos</a>
                    <a href="../login.php" id="enlace-login" class="btn-header">Ingresar</a>
                </div>
                <div class="icono" id="open">
                    <span>&#9776;</span>
                </div>
            </div>
        </nav>

    </header>
    <section class="graficasHome">
        <h2>GRÁFICAS ESTADÍSTICAS</h2>
        <?php
        $tipoGrafica = "Lineas";
        $visualizacion = "";
        $graficarPor = "Establecimientos";
        $establecimiento = "Todos";
        $categoria = "Todos";
        $opcionGrafica = "(sum(habitaciones_ocupadas)/sum(habitaciones_disponibles))*100 AS ocupacion";
        $anio = "Todos";
        $mes = "Todos";
        $visualizacion = hacerVisEsta($con ,$tipoGrafica, $anio, $mes, $establecimiento, $opcionGrafica,"establecimiento");
        ?>
        <form action="#"  method="POST" enctype="multipart/form-data">
            <div>
                <label>Graficar por: </label>

                <select name="graficaPor" id="selectBoxGraficaPor" onchange="changeGraficaPor();">
                    <option >Establecimientos</option>
                    <option >Categoria</option>
                </select>
                <label>Tipo de grafica: </label>
                <select name="tipoGrafica" id="selectBoxTipoGrafica" onchange="changeTipoGrafica();">
                    <option>Lineas</option>
                    <option>Barras</option>
                    <option>Pastel</option>
                </select>
            </div>
            <div class="form-group" id="graficaLineas" style="display:block;">
                <label>Tema: </label>
                <select name="lineasOpcion">
                    <option value="(sum(habitaciones_ocupadas)/sum(habitaciones_disponibles))*100 AS ocupacion">Ocupación por día/mes</option>
                    <option value="sum(nacionales)">Tarifa por persona por día</option>
                    <option value="3">Tarifa por habitación por día</option>
                    <option value="4">Porcentaje Revpar por día</option>
                    <option value="5">Porcentaje Huesped Estranjero y Nacional</option>
                </select>
            </div>
            <div class="form-group" id="graficaBarras" style="display:none;">
                <label>Tema: </label>
                <select name="barrasOpcion">
                    <option value="(sum(habitaciones_ocupadas)/sum(habitaciones_disponibles))*100 AS ocupacion">Ocupación por día/mes</option>
                    <option value="2">Tarifa por persona por día</option>
                    <option value="3">Tarifa por habitación por día</option>
                    <option value="4">Porcentaje Revpar por día</option>
                    <option value="5">Porcentaje Huesped Estranjero y Nacional</option>
                </select>
            </div>
            
            <div class="form-group" id="graficaPastel" style="display:none;">
                <label>Tema: </label>
                <select name="pastelOpcion">
                    <option value="sum(nacionales) as nacionales, sum(extranjeros) as extranjeros">Porcentaje Huesped Estranjero y Nacional</option>
                </select>
            </div>
            <div class="form-group" id="insertEstablecimietos" style="display:block;">
                <label>Establecimiento: </label>
                <select name="establecimiento">
                    <option>Todos</option>
                    <?php
                    consulta_opction($con, "DISTINCT(establecimiento)", "Order by 1");
                    ?>
                </select>
                <label>Año: </label>
                <select name="anio">
                    <option>Todos</option>
                    <?php 
                    consulta_opction($con, "DISTINCT(YEAR(fecha))", "Order by 1");
                    ?>
                </select>
                <label>Mes: </label>
                <select name="mes">
                    <option>Todos</option>
                    <option>Enero</option>
                    <option>Febrero</option>
                    <option>Marzo</option>
                    <option>Abril</option>
                    <option>Mayo</option>
                    <option>Junio</option>
                    <option>Julio</option>
                    <option>Agosto</option>
                    <option>Septiembre</option>
                    <option>Octubre</option>
                    <option>Noviembre</option>
                    <option>Diciembre</option>
                </select>
            </div>


            <div class="form-group" id="insertCategoria" style="display:none;">
                <label>Categorias: </label>
                <select name="categoria">
                    <option>Todos</option>
                    <?php
                    consulta_opction($con, "DISTINCT(categoria)", "Order by 1");
                    ?>
                </select>
                <label>Año: </label>
                <select name="anio">
                    <option>Todos</option>
                    <?php 
                    consulta_opction($con, "DISTINCT(YEAR(fecha))", "Order by 1");
                    ?>
                </select>
                <label>Mes: </label>
                <select name="mes">
                    <option>Todos</option>
                    <option>Enero</option>
                    <option>Febrero</option>
                    <option>Marzo</option>
                    <option>Abril</option>
                    <option>Mayo</option>
                    <option>Junio</option>
                    <option>Julio</option>
                    <option>Agosto</option>
                    <option>Septiembre</option>
                    <option>Octubre</option>
                    <option>Noviembre</option>
                    <option>Diciembre</option>
                </select>
            </div>


            <input  type="submit" name="submit"  value="Cambiar"/>
        </form>
        <script>

            function changeGraficaPor() {
                var selectBox = document.getElementById("selectBoxGraficaPor");
                var selectedValue = selectBox.options[selectBox.selectedIndex].value;
                if(selectedValue == "Establecimientos"){
                    document.getElementById("insertEstablecimietos").style.display = "block";
                    document.getElementById("insertCategoria").style.display = "none";
                }
                if(selectedValue == "Categoria"){
                    document.getElementById("insertEstablecimietos").style.display = "none";
                    document.getElementById("insertCategoria").style.display = "block";
                }
            }
            function changeTipoGrafica() {
                var selectBox = document.getElementById("selectBoxTipoGrafica");
                var selectedValue = selectBox.options[selectBox.selectedIndex].value;
                if(selectedValue == "Lineas"){
                    document.getElementById("graficaBarras").style.display = "none";
                    document.getElementById("graficaLineas").style.display = "block";
                    document.getElementById("graficaPastel").style.display = "none";
                }
                if(selectedValue == "Barras"){
                    document.getElementById("graficaBarras").style.display = "block";
                    document.getElementById("graficaLineas").style.display = "none";
                    document.getElementById("graficaPastel").style.display = "none";
                }
                
                if(selectedValue == "Pastel"){
                    document.getElementById("graficaBarras").style.display = "none";
                    document.getElementById("graficaLineas").style.display = "none";
                    document.getElementById("graficaPastel").style.display = "block";
                }
            }

            </script>
        <?php
        if(isset($_POST['submit'])){
            $graficarPor = $_POST['graficaPor'];
            $tipoGrafica = $_POST['tipoGrafica'];
            $anio = $_POST['anio'];
            $mes = $_POST['mes'];

            if ($graficarPor == "Establecimientos") {
                $establecimiento = $_POST['establecimiento'];
                if (verificarDatosEst($con, $establecimiento, $anio, $mes,"establecimiento") == 0) {
                    $visualizacion = "<div><h3>¡Atención! !No hay datos de establecimiento '$establecimiento', año '$anio', mes '$mes'</h3>
                    </div>";
                }
                else{

                    if ($tipoGrafica == "Lineas") {
                        $opcionGrafica = $_POST['lineasOpcion'];
                    }
                    elseif ($tipoGrafica == "Barras") {
                        $opcionGrafica = $_POST['barrasOpcion'];
                    }
                    elseif ($tipoGrafica == "Pastel") {
                        $opcionGrafica = $_POST['pastelOpcion'];
                    }
                    $visualizacion = hacerVisEsta($con ,$tipoGrafica, $anio, $mes, $establecimiento, $opcionGrafica,"establecimiento");
                }
            }

            if ($graficarPor == "Categoria") {
                $categoria = $_POST['categoria'];
                if (verificarDatosEst($con, $categoria, $anio, $mes,"categoria") == 0) {
                    $visualizacion = "<div><h3>¡Atención! !No hay datos de la categoria '$categoria', año '$anio', mes '$mes'</h3></div>";
                }
                else{
                    if ($tipoGrafica == "Lineas") {
                        $opcionGrafica = $_POST['lineasOpcion'];
                    }
                    if ($tipoGrafica == "Barras") {
                        $opcionGrafica = $_POST['barrasOpcion'];
                    }
                    if ($tipoGrafica == "Pastel") {
                        $opcionGrafica = $_POST['pastelOpcion'];
                    }
                    $visualizacion = hacerVisEsta($con ,$tipoGrafica, $anio, $mes, $categoria, $opcionGrafica,"categoria");
                }
            }
        }
        ?>
        </div>
    </section>
    <center>
    <?php
    echo $visualizacion;
    ?>
    </center>
                    
                  
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