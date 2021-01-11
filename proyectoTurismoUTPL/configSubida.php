<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Procesando el archivo enviado</title>
<style type="text/css">
*{ font-family:Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, sans-serif}
.main{ margin:auto; border:1px solid #D5D5D5; width:50%; text-align:left; padding:30px; background:##898989}
input[type=submit]{ background:#6ca16e; width:100%;
    padding:5px 15px; 
    background:#ccc; 
    cursor:pointer;
	font-size:16px;
   
}
table td{ padding:5px;}
</style>
</head>

<body bgcolor="#E1E1E1">
<div class="main">
<h1>Subir archivo con PHP:</h1>

<?php
    require_once "exelLibreria/vendor/autoload.php";
    extract($_POST);
    include("dll/config.php");
    include("dll/class_mysqli_7.php");
    use PhpOffice\PhpSpreadsheet\IOFactory;
    $miconexion = new clase_mysqli7;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);

    $directorio = 'subida/';
    $subir_archivo = $directorio.basename($_FILES['subir_archivo']['name']);
    echo "<div>";
    if (move_uploaded_file($_FILES['subir_archivo']['tmp_name'], $subir_archivo)) {
        echo "El archivo es válido y se cargó correctamente.<br><br>";
        $nombre = $_FILES['subir_archivo']['name'];
        if ($nombre!=null || $descripcion!=null) {
         	$miconexion->consulta("insert into archivos values('','$nombre','$descripcion','subida/$nombre')");
            # Aqui agrega los datos a la tabla "registros" como tabla temporal para ser revisados y despues subir a "general"
            
            # Indicar que usaremos el IOFactory
            # Ruta de el archivo
            $documento = IOFactory::load("subida/$nombre");
            # Puede tener varias hoja, obtenemos el total de hojas
            $totalDeHojas = $documento->getSheetCount();
            # obtener nombres de hojas
            $hojaActualNombre = $documento->getSheetNames();
            for ($indiceHoja = 0; $indiceHoja < $totalDeHojas; $indiceHoja++) {
                $hojaActual = $documento->getSheet($indiceHoja);
                $numeroMayorDeFila = $hojaActual->getHighestRow(); // Numérico
                $letraMayorDeColumna = $hojaActual->getHighestColumn(); // Letra
                $numeroFila = 0;
                $totalDeFilas[$indiceHoja] = 0;
                for ($indiceFila = 1; $indiceFila <= $numeroMayorDeFila; $indiceFila++) {
                    if ($hojaActual->getCellByColumnAndRow(1, $indiceFila)->getValue() != "establecimiento" ) {
                        if ($hojaActual->getCellByColumnAndRow(1, $indiceFila)->getValue() == "TOTAL") {
                            break;
                        }

                        $in0 = (string) $hojaActual->getCellByColumnAndRow(1, $indiceFila)->getValue(); // establecimiento 
                        $in1 = (string) $hojaActual->getCellByColumnAndRow(2, $indiceFila)->getValue(); // clasificacion
                        $in2 = (string) $hojaActual->getCellByColumnAndRow(3, $indiceFila)->getValue(); // categoria
                        $in3 = (string) $hojaActual->getCellByColumnAndRow(4, $indiceFila)->getValue(); // habitaciones	
                        $in4 = (string) $hojaActual->getCellByColumnAndRow(5, $indiceFila)->getValue(); // plazas
                        $in5 = $hojaActual->getCellByColumnAndRow(6, $indiceFila)->getFormattedValue();
                        $in6 = (string) $hojaActual->getCellByColumnAndRow(7, $indiceFila)->getValue(); // checkins
                        $in7 = (string) $hojaActual->getCellByColumnAndRow(8, $indiceFila)->getValue(); // checkouts
                        $in8 = (string) $hojaActual->getCellByColumnAndRow(9, $indiceFila)->getValue(); // pernoctaciones
                        $in9 = (string) $hojaActual->getCellByColumnAndRow(10, $indiceFila)->getValue(); // nacionales
                        $in10 = (string) $hojaActual->getCellByColumnAndRow(11, $indiceFila)->getValue(); // extranjeros
                        $in11 = (string) $hojaActual->getCellByColumnAndRow(12, $indiceFila)->getValue(); // habitaciones ocupadas
                        $in12 = (string) $hojaActual->getCellByColumnAndRow(13, $indiceFila)->getValue(); // habitaciones disponibles
                        $in13 = (string) $hojaActual->getCellByColumnAndRow(14, $indiceFila)->getValue(); // tipo tarifa
                        $in14 = (string) bcdiv(floatval($hojaActual->getCellByColumnAndRow(15, $indiceFila)->getValue()), '1', 2); // tarifa promedio
                        // ventas netas
                        $in16 = (string) bcdiv((bcdiv($hojaActual->getCellByColumnAndRow(12, $indiceFila)->getValue(), '1', 2) * bcdiv(floatval($hojaActual->getCellByColumnAndRow(15, $indiceFila)->getValue()), '1', 2)), '1', 2);
                        // TAR PERSONA
                        if (($hojaActual->getCellByColumnAndRow(9, $indiceFila)->getValue()) == 0) {
                            $in15 = (string) bcdiv(0, '1', 2);
                        }else{
                            $in15 = bcdiv((($hojaActual->getCellByColumnAndRow(12, $indiceFila)->getValue() * floatval($hojaActual->getCellByColumnAndRow(15, $indiceFila)->getValue()))/$hojaActual->getCellByColumnAndRow(9, $indiceFila)->getValue()), '1', 2);
                        }
                        $in17 = (string) bcdiv((($hojaActual->getCellByColumnAndRow(12, $indiceFila)->getValue() / $hojaActual->getCellByColumnAndRow(13, $indiceFila)->getValue()) * 100), '1', 2); // porcentaje ocupacion %
                        $in18 = (string) bcdiv(floatval($hojaActual->getCellByColumnAndRow(19, $indiceFila)->getValue()), '1', 2); // revpar
                        $in19 = (string) $hojaActual->getCellByColumnAndRow(20, $indiceFila)->getValue(); // empleados temporales
                        $in20 = (string) $hojaActual->getCellByColumnAndRow(21, $indiceFila)->getValue(); // estado
                        $in21 = (string) $hojaActual->getCellByColumnAndRow(22, $indiceFila)->getValue(); // opciones
                        $in22 = $hojaActualNombre[$indiceHoja]; // nombre de hoja
                        $in23 = $nombre; // nombre de archivo
                        $miconexion->consulta ("insert into registros values('$in0','$in1','$in2',$in3,$in4,STR_TO_DATE('$in5', '%d/%m/%Y'),'$in6',$in7,$in8,$in9,$in10,$in11,$in12,'$in13',$in14,$in15,$in16,$in17,$in18,$in19,'$in20','$in21','$hojaActualNombre[$indiceHoja]','$nombre')"); 
                        $totalDeFilas[$indiceHoja]++;
                        $numeroFila++;
                    }
                }
                $totalDeFilas[$indiceHoja]--;
            }        
        }
    } else {
        echo "La subida ha fallado o no hay descripcion";
        }
    echo "</div>";
?>
<br>
<div style="border:1px solid #000000; text-transform:uppercase">  
<h3 align="center"><div align="center"><a href="subida.php">Volver </a></div></h3></div>

 
</div>
	</body>
</html>