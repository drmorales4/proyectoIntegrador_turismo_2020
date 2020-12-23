<?php
/*

include("dll/config.php");
include("dll/class_mysqli_7.php");
$miconexion = new clase_mysqli7;
$miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);

echo $opcion;
$miconexion->consulta('select * from registros where archivo = "$opcion"');
$resultado = $miconexion->conectar_lista();
echo $resultado[0][0];
*/
extract($_POST);
#echo $opcion;
include("dll/config.php");
include("dll/class_mysqli_7.php");
$miconexion = new clase_mysqli7;
$miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
$miconexion->consulta("select distinct(hoja) from registros where archivo = '$opcion'");
$contarHoja = 0;
while($hojas=$miconexion->consulta_lista()){
    $listaHojas[$contarHoja] = $hojas[0];
    $contarHoja++;
}
$contarHoja--;

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php # echo $opcion?></title>
<style type="text/css">
*{ font-family:Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, sans-serif}
.main{ margin:auto; border:1px solid #D5D5D5; width:50%; text-align:left; padding:30px; background:##898989}
input[type=submit]{ background:#6ca16e; width:100%;
    padding:5px 15px; 
    background:#ccc; 
    cursor:pointer;
	font-size:12px;
   
}
table td{ padding:1px;}
.tabla{
    display: block;
    width: 100%;
    overflow-x: auto;
    text-align: left;
    max-width:20px; 
    max-height:20px;
    display: inline-block!important;
    flex-grow: 1;
    max-width: 100%;
    position: relative;
}
.botones{
    max-width:200px; 

}
</style>
</head>
<body bgcolor="#E1E1E1">
    <div>
    <?php
    for ($hojaActual=0; $hojaActual <= $contarHoja ; $hojaActual++) {
    ?>
        <table>
        <?php echo "<h3>Revision de la hoja: $listaHojas[$hojaActual]</h3>"?>
        <div class = "botones">
            <input type="submit" name="" value="Agregar a la Base de datos" id="boton1" onclick = "subir">
            <input type="submit" name="" value="Siguiente hoja" id="boton2" onclick = "">
        </div>
        
            <div class = "tabla">
                <thead>
                    <tr>
                        <th>establecimiento</th>
                        <th>clasificacion</th>
                        <th>categoria</th>
                        <th>habitaciones</th>
                        <th>plazas</th>
                        <th>fecha</th>
                        <th>checkins</th>
                        <th>checkouts</th>
                        <th>pernoctaciones</th>
                        <th>nacionales</th>
                        <th>extranjeros</th>
                        <th>habitaciones ocupadas</th>
                        <th>habitaciones disponibles</th>
                        <th>tipo tarifa</th>
                        <th>tarifa promedio</th>
                        <th>TAR PERSONA</th>
                        <th>ventas netas</th>
                        <th>porcentaje ocupacion %</th>
                        <th>revpar</th>
                        <th>empleados temporales</th>
                        <th>estado</th>
                        <th>opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $miconexion->consulta("select * from registros where archivo = '$opcion' and hoja = '$listaHojas[$hojaActual]'");
                    while($filas=$miconexion->consulta_lista()){
                    ?>
                    <tr>
                    <?php
                        for ($col=0; $col <= 21; $col++) { 
                        ?>                   
                        <td><?php echo $filas[$col]; ?></td>
                        <?php }?>
                    </tr>
                <?php } ?>
                </tbody>
            </div>
        </table>
        <?php
        }
        ?>
    </div>
	</body>
</hrml>