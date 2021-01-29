<?php
    require_once "exelLibreria/vendor/autoload.php";
    extract($_POST);
    include("dll/config.php");
    include("dll/class_mysqli_7.php");
    use PhpOffice\PhpSpreadsheet\IOFactory;
    $miconexion = new clase_mysqli7;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $consultaConexion = new clase_mysqli7;
    $consultaConexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);

    $directorio = 'subida/';
    $fechaActual = date("YmdHi-");
    $nombre = $fechaActual.$_FILES['subir_archivo']['name'];
    $subir_archivo = $directorio.$nombre;
    if (move_uploaded_file($_FILES['subir_archivo']['tmp_name'], $subir_archivo)) {
        echo "El archivo es válido y se cargó correctamente.<br><br>";
        
        if ($nombre!=null || $descripcion!=null) {
            $datosDuplicados = 0;
            $datosNoDuplicados = 0;
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
                //ignorar si no tiene encabezado establecimiento
                $inicioIndiceFila = 1;
                // filtro de hojas
                $spl_hojaNombre = (explode(" ",$hojaActualNombre[$indiceHoja]));
                if ( $spl_hojaNombre[0] == "FERIADO" OR $spl_hojaNombre[0] == "GRAFICAS" OR $hojaActualNombre[$indiceHoja] == " GRAFICAS") {
                    echo "Se a filtrado la hoja $hojaActualNombre[$indiceHoja]<br>";
                }else{
                    for ($indiceFila = 1; $indiceFila <= $numeroMayorDeFila; $indiceFila++) {
                        if ($hojaActual->getCellByColumnAndRow(1, $indiceFila)->getValue() == "establecimiento") {
                            $inicioIndiceFila = $indiceFila;
                            break;
                        }else{
                            $inicioIndiceFila = $indiceFila + 1;
                        }
                    }
                    for ($indiceFila = $inicioIndiceFila; $indiceFila <= $numeroMayorDeFila; $indiceFila++) {
                        if ($hojaActual->getCellByColumnAndRow(1, $indiceFila)->getValue() != "establecimiento" ) {
                            if ($hojaActual->getCellByColumnAndRow(1, $indiceFila)->getValue() == "TOTAL") {
                                break;
                            }

                            $in0 = (string) $hojaActual->getCellByColumnAndRow(1, $indiceFila)->getValue(); // establecimiento 
                            $in1 = (string) $hojaActual->getCellByColumnAndRow(2, $indiceFila)->getValue(); // clasificacion
                            $in2 = (string) $hojaActual->getCellByColumnAndRow(3, $indiceFila)->getValue(); // categoria
                            $in3 = (string) $hojaActual->getCellByColumnAndRow(4, $indiceFila)->getValue(); // habitaciones 
                            $in4 = (string) $hojaActual->getCellByColumnAndRow(5, $indiceFila)->getValue(); // plazas
                            $in5 = (string) $hojaActual->getCellByColumnAndRow(6, $indiceFila)->getValue();
                            $splitin5 = substr( $in5, 2,1);
                            if ($splitin5 != "/") {
                                $in5 = (string) $hojaActual->getCellByColumnAndRow(6, $indiceFila)->getFormattedValue();
                                $datein5 = date_create("$in5");
                                $in5 = date_format($datein5,"d/m/Y");
                            }
                            $diaFecha =explode("/", $in5);
                            if ($diaFecha[0] != ($numeroFila + 1)) {
                                $in5 =sprintf('%02d/%s/%s', $numeroFila + 1, $diaFecha[1], $diaFecha[2]);
                            }
                            if ($indiceFila == 0 or $indiceFila == 1 or $indiceFila == 2 ) {
                                $indiceFilatemp = $indiceFila + 3;
                            }else{
                                $indiceFilatemp = 5;
                            }
                            $in5temp = (string) $hojaActual->getCellByColumnAndRow(6, $indiceFilatemp)->getValue();
                            $splitin5temp = substr( $in5temp, 2,1);
                            if ($splitin5temp != "/") {
                                $in5temp = (string) $hojaActual->getCellByColumnAndRow(6, $indiceFilatemp)->getFormattedValue();
                                $datein5temp = date_create("$in5");
                                $in5temp = date_format($datein5temp,"d/m/Y");
                            }
                            $diaFechatemp =explode("/", $in5temp);
                            if ($diaFecha[1] != $diaFechatemp[1]) {
                                $in5 = $diaFecha[0]."/".$diaFechatemp[1]."/".$diaFecha[2];
                            }
                             // fecha
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
                            $consultaConexion->consulta("select COUNT(FECHA) FROM registros WHERE establecimiento = '$in0' AND fecha = STR_TO_DATE('$in5', '%d/%m/%Y')");
                            $listaDupli=$consultaConexion->consulta_lista();
                            
                            //$listaDupli = 0;
                            //if ($listaDupli >= 1) {
                            if ($listaDupli[0] >= 1) {
                                echo "$in5 $indiceFila $hojaActualNombre[$indiceHoja] <br>";
                                $datosDuplicados ++;
                                // duplicado
                            }else{
                                $miconexion->consulta ("INSERT into registros values('$in0','$in1','$in2',$in3,$in4,STR_TO_DATE('$in5', '%d/%m/%Y'),'$in6',$in7,$in8,$in9,$in10,$in11,$in12,'$in13',$in14,$in15,$in16,$in17,$in18,$in19,'$in20','$in21','$hojaActualNombre[$indiceHoja]','$nombre','$idUser')");
                                $datosNoDuplicados ++;
                                //no duplicado
                            }
                            
                            $totalDeFilas[$indiceHoja]++;
                            $numeroFila++;
                        }
                    }
                    $totalDeFilas[$indiceHoja]--;
                }
                
                //fin if 
                
                
            }
            $miconexion->consulta("insert into archivos values('','$nombre','$descripcion','subida/$nombre','$idUser','$datosDuplicados','$datosNoDuplicados')");       
        }
    } else {
        echo "La subida ha fallado, Archivo sobrepasa el tamaño máximo ";
        }

    echo "<script>location.href='administrador.php?q=4'</script>";
?>

	</body>
</html>