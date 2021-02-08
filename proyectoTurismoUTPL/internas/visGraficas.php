<?php
function consulta_opction($con, $consultar, $orderby){
    $sql = "SELECT $consultar FROM registros $orderby";
    $result =  mysqli_query($con, $sql);
    $contar = 0;
    if($result){
        while ($row = mysqli_fetch_array($result)) {
            $retArray[$contar] = $row;
            $contar++;
        }
    }
    for ($i=0; $i < count($retArray) ; $i++) {
        echo "<option>".$retArray[$i][0]."</option>";
    }
}

function graficaLineas($con, $filtro, $sqlSel ,$temaGraf, $anio, $mes, $gropBy, $graficaPor){
    $sqlStr = "";
    $resultX = "";
    $nombreEst = "";

    
    if ($filtro == "1") {
        $sqlStr = "SELECT $sqlSel as fecha from registros $gropBy";
        $nombreEst = "Todos: $graficaPor";
    }
    if ($filtro == "2") {
        $sqlStr = "SELECT  $sqlSel as fecha from registros WHERE month(fecha) = $mes $gropBy";
        $nombreEst = "Todos: $graficaPor";
    }
    if ($filtro == "3") {
        $sqlStr = "SELECT  $sqlSel as fecha from registros WHERE year(fecha) = $anio $gropBy";
        $nombreEst = "Todos: $graficaPor";
    }
    if ($filtro =="4") {
        $sqlStr = "SELECT  $sqlSel as fecha from registros WHERE year(fecha) = $anio AND month(fecha) = $mes $gropBy";
        $nombreEst = "Todos: $graficaPor";
    }
    if ($filtro == "5") {
        $sqlStr = "SELECT  $sqlSel as fecha from registros WHERE $graficaPor = '$temaGraf' $gropBy";
        $nombreEst = "$temaGraf";
    }
    if ($filtro == "6") {
        $sqlStr = "SELECT  $sqlSel as fecha from registros WHERE $graficaPor = '$temaGraf' AND month(fecha) = $mes $gropBy";
        $nombreEst = "$temaGraf";
    }
    if ($filtro == "7") {
        $sqlStr = "SELECT  $sqlSel as fecha from registros WHERE $graficaPor = '$temaGraf' AND year(fecha) = $anio $gropBy";
        $nombreEst = "$temaGraf";
    }
    if ($filtro == "8") {
        $sqlStr = "SELECT  $sqlSel as fecha from registros WHERE $graficaPor = '$temaGraf' AND year(fecha) = $anio AND month(fecha) = $mes $gropBy";
        $nombreEst = "$temaGraf";
    }
    #$resultX = $sqlStr;
    $result = mysqli_query($con,$sqlStr);
    $i= 0;
    while($row = mysqli_fetch_array($result))
    {
        $diaOMes = "" ;
        if ($gropBy == "GROUP BY day(fecha) ORDER BY 2") {
            $diaOMes = obtenerDiaNum($row[1]);
        }else{
            $diaOMes = obtenerMesNum($row[1]);
        }
        #$resultX= sprintf("%s%s, %s\n",$resultX,$row[0], $diaOMes);
        $matriz[$i][0] = $row[0];
        $matriz[$i][1] = $diaOMes;
        $i++;
    }

    if ($anio == "") {
        $anio = "Todos";
    }
    if ($mes == "") {
        $mes = "Todos";
    }else{
        $mes = obtenerMesNum($mes);
    }

    $primerY = $matriz[0][0];
    $primerX = $matriz[0][1];
    
    $grafY = sprintf(" %.2f ", $primerY);
    $grafX = sprintf(" '', '%s' ", $primerX);
    for ($j=1; $j <= $i -1 ; $j++) { 
        $grafY = sprintf("%s, %.2f\n",$grafY,$matriz[$j][0]);
        $grafX = sprintf("%s, '%s'\n",$grafX,$matriz[$j][1]);
    }
    $resultX1 = $grafX;
    
    $resultX =  "
    <div>
        <figure class='highcharts-figure-big'>
            <div id='ocupacion'></div>
            <p class='highcharts-description'>
                
            </p>
        </figure>
    </div>

    <script type='text/javascript'>
        Highcharts.chart('ocupacion', {

            title: {
                text: 'Por $graficaPor'
            },

            subtitle: {
                text: 'Año: $anio Mes: $mes'
            },
            yAxis: {
                labels: {
                    format: '{value}%'
                },
                title: {
                    text: 'Porcentaje  %'
                }
            },

            xAxis: {
                categories: [$grafX],
                tickmarkPlacement: 'on',
                title: {
                    enabled: false
                }
            },

            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },
            tooltip: {
                pointFormat: '{series.name} tiene un <b>{point.y:,.1f}%'
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
                name: ' $temaGraf ',
                data: [$grafY]
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

        
return $resultX;
}
function graficaBarras($con, $filtro, $sqlSel ,$temaGraf, $anio, $mes, $gropBy, $graficaPor){
    $sqlStr = "";
    $resultX = "";
    $nombreEst = "";

    
    if ($filtro == "1") {
        $sqlStr = "SELECT $sqlSel as fecha from registros $gropBy";
        $nombreEst = "Todos: $graficaPor";
    }
    if ($filtro == "2") {
        $sqlStr = "SELECT  $sqlSel as fecha from registros WHERE month(fecha) = $mes $gropBy";
        $nombreEst = "Todos: $graficaPor";
    }
    if ($filtro == "3") {
        $sqlStr = "SELECT  $sqlSel as fecha from registros WHERE year(fecha) = $anio $gropBy";
        $nombreEst = "Todos: $graficaPor";
    }
    if ($filtro =="4") {
        $sqlStr = "SELECT  $sqlSel as fecha from registros WHERE year(fecha) = $anio AND month(fecha) = $mes $gropBy";
        $nombreEst = "Todos: $graficaPor";
    }
    if ($filtro == "5") {
        $sqlStr = "SELECT  $sqlSel as fecha from registros WHERE $graficaPor = '$temaGraf' $gropBy";
        $nombreEst = "$temaGraf";
    }
    if ($filtro == "6") {
        $sqlStr = "SELECT  $sqlSel as fecha from registros WHERE $graficaPor = '$temaGraf' AND month(fecha) = $mes $gropBy";
        $nombreEst = "$temaGraf";
    }
    if ($filtro == "7") {
        $sqlStr = "SELECT  $sqlSel as fecha from registros WHERE $graficaPor = '$temaGraf' AND year(fecha) = $anio $gropBy";
        $nombreEst = "$temaGraf";
    }
    if ($filtro == "8") {
        $sqlStr = "SELECT  $sqlSel as fecha from registros WHERE $graficaPor = '$temaGraf' AND year(fecha) = $anio AND month(fecha) = $mes $gropBy";
        $nombreEst = "$temaGraf";
    }
    #$resultX = $sqlStr;
    $result = mysqli_query($con,$sqlStr);
    $i= 0;
    while($row = mysqli_fetch_array($result))
    {
        $diaOMes = "" ;
        if ($gropBy == "GROUP BY day(fecha) ORDER BY 2") {
            $diaOMes = obtenerDiaNum($row[1]);
        }else{
            $diaOMes = obtenerMesNum($row[1]);
        }
        $resultX= sprintf("%s%s, %s\n",$resultX,$row[0], $diaOMes);
        $matriz[$i][0] = $row[0];
        $matriz[$i][1] = $diaOMes;
        $i++;
    }

    if ($anio == "") {
        $anio = "Todos";
    }
    if ($mes == "") {
        $mes = "Todos";
    }else{
        $mes = obtenerMesNum($mes);
    }

    $primerY = $matriz[0][0];
    $primerX = $matriz[0][1];
    
    $concatValues = sprintf("{ name: '%s', data: [%.2f] }", $primerX, $primerY);

    for ($j=1; $j <= $i -1 ; $j++) { 
        $concatValues = sprintf("%s, { name: '%s', data: [%.2f] }\n",$concatValues, $matriz[$j][1], $matriz[$j][0]);
    }
    #$resultX = $concatValues;
    $resultX = "
    <div>
        <figure class='highcharts-figure-big'>
            <div id='grafica'></div>
            <p class='highcharts-description'>
                
            </p>
        </figure>
    </div>
    <script type='text/javascript'>
            Highcharts.chart('grafica', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text: '$graficaPor: $temaGraf'
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    categories: ['$graficaPor'],
                    title: {
                        text: null
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: '',
                        align: 'high'
                    },
                    labels: {
                        overflow: 'justify'
                    }

                },
                tooltip: {
                    valueSuffix: ''
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
                series: [$concatValues]
            })</script>";

        
return $resultX;
}
function graficaPastel($con, $filtro, $sqlSel ,$temaGraf, $anio, $mes, $graficaPor){
    $sqlStr = "";
    $resultX = "";
    $nombreEst = "";

    
    if ($filtro == "1") {
        $sqlStr = "SELECT $sqlSel as fecha from registros";
        $nombreEst = "Todos: $graficaPor";
    }
    if ($filtro == "2") {
        $sqlStr = "SELECT  $sqlSel as fecha from registros WHERE month(fecha) = $mes";
        $nombreEst = "Todos: $graficaPor";
    }
    if ($filtro == "3") {
        $sqlStr = "SELECT  $sqlSel as fecha from registros WHERE year(fecha) = $anio";
        $nombreEst = "Todos: $graficaPor";
    }
    if ($filtro =="4") {
        $sqlStr = "SELECT  $sqlSel as fecha from registros WHERE year(fecha) = $anio AND month(fecha) = $mes";
        $nombreEst = "Todos: $graficaPor";
    }
    if ($filtro == "5") {
        $sqlStr = "SELECT  $sqlSel as fecha from registros WHERE $graficaPor = '$temaGraf'";
        $nombreEst = "$temaGraf";
    }
    if ($filtro == "6") {
        $sqlStr = "SELECT  $sqlSel as fecha from registros WHERE $graficaPor = '$temaGraf' AND month(fecha) = $mes";
        $nombreEst = "$temaGraf";
    }
    if ($filtro == "7") {
        $sqlStr = "SELECT  $sqlSel as fecha from registros WHERE $graficaPor = '$temaGraf' AND year(fecha) = $anio";
        $nombreEst = "$temaGraf";
    }
    if ($filtro == "8") {
        $sqlStr = "SELECT  $sqlSel as fecha from registros WHERE $graficaPor = '$temaGraf' AND year(fecha) = $anio AND month(fecha) = $mes";
        $nombreEst = "$temaGraf";
    }
    #$resultX = $sqlStr;
    $result = mysqli_query($con,$sqlStr);
    $row = mysqli_fetch_array($result);
    $res1 = sprintf("%.2f",$row[0]);
    $res2 = sprintf("%.2f",$row[1]);
    echo "
    <div>
        <figure class='highcharts-figure-big'>
            <div id='pastel'></div>
            <p class='highcharts-description'>
                
            </p>
        </figure>
    </div>
        <script type='text/javascript'>
            Highcharts.chart('pastel', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: '$temaGraf'
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
                        y: $res1
                    }, {
                        name: 'Extranjeros',
                        y: $res2
                    }]
                }],
            credits: {
                enabled: false
            }
            });
            </script>
            "
        ;
    /*
    $i= 0;
    while($row = mysqli_fetch_array($result))
    {
        $diaOMes = "" ;
        if ($gropBy == "GROUP BY day(fecha) ORDER BY 2") {
            $diaOMes = obtenerDiaNum($row[1]);
        }else{
            $diaOMes = obtenerMesNum($row[1]);
        }
        $resultX= sprintf("%s%s, %s\n",$resultX,$row[0], $diaOMes);
        $matriz[$i][0] = $row[0];
        $matriz[$i][1] = $diaOMes;
        $i++;
    }

    if ($anio == "") {
        $anio = "Todos";
    }
    if ($mes == "") {
        $mes = "Todos";
    }else{
        $mes = obtenerMesNum($mes);
    }

    $primerY = $matriz[0][0];
    $primerX = $matriz[0][1];
    
    $concatValues = sprintf("{ name: '%s', data: [%.2f] }", $primerX, $primerY);

    for ($j=1; $j <= $i -1 ; $j++) { 
        $concatValues = sprintf("%s, { name: '%s', data: [%.2f] }\n",$concatValues, $matriz[$j][1], $matriz[$j][0]);
    }
    #$resultX = $concatValues;
    */
return $resultX;
}

function hacerVisEsta($con,$tipoGrafica,$anio,$mes,$temaGraf,$opcionGrafica,$graficaPor){
    $mesNum = obtenerNumMes($mes);
    $xDiaMes = "day(fecha)";

    if ($tipoGrafica == "Lineas") {
        if ($temaGraf == "Todos") {
            if ($anio == "Todos") {
                if ($mes == "Todos") {
                    #graficaLineas("conexion, "filtro", "tipoGrafic", "estableci", "anio", "mes", "groupby mes y order by 2")
                    $xDiaMes = "month(fecha)";
                    $resultado = graficaLineas($con, "1", "$opcionGrafica, $xDiaMes", "", "", "", "GROUP BY $xDiaMes ORDER BY 2",$graficaPor);
                }else{
                    #$mes
                    $xDiaMes = "day(fecha)";
                    $resultado = graficaLineas($con, "2", "$opcionGrafica, $xDiaMes", "", "", $mesNum, "GROUP BY $xDiaMes ORDER BY 2",$graficaPor);
                }
            }else{
                if ($mes == "Todos") {
                    #$anio
                    $xDiaMes = "month(fecha)";
                    $resultado = graficaLineas($con, "3", "$opcionGrafica, $xDiaMes", "", $anio, "", "GROUP BY $xDiaMes ORDER BY 2",$graficaPor);
                }else{
                    #$anio
                    #$mes
                    $xDiaMes = "day(fecha)";
                    $resultado = graficaLineas($con, "4", "$opcionGrafica, $xDiaMes", "", $anio, $mesNum, "GROUP BY $xDiaMes ORDER BY 2",$graficaPor);
                }
            }
        }
        else{
            if ($anio == "Todos") {
                if ($mes == "Todos") {
                    #$temaGraf
                    $xDiaMes = "month(fecha)";
                    $resultado = graficaLineas($con, "5", "$opcionGrafica, $xDiaMes", $temaGraf, "", "", "GROUP BY $xDiaMes ORDER BY 2",$graficaPor);
                }else{
                    #$mes
                    #$temaGraf
                    $xDiaMes = "day(fecha)";
                    $resultado = graficaLineas($con, "6", "$opcionGrafica, $xDiaMes", $temaGraf, "", $mesNum, "GROUP BY $xDiaMes ORDER BY 2",$graficaPor);
                }
            }else{
                if ($mes == "Todos") {
                    #$anio
                    #$temaGraf
                    $xDiaMes = "month(fecha)";
                    $resultado = graficaLineas($con, "7", "$opcionGrafica, $xDiaMes", $temaGraf, $anio, "", "GROUP BY $xDiaMes ORDER BY 2",$graficaPor);
                }else{
                    #$temaGraf
                    #$anio
                    #$mes
                    $xDiaMes = "day(fecha)";
                    $resultado = graficaLineas($con, "8", "$opcionGrafica, $xDiaMes", $temaGraf, $anio, $mesNum, "GROUP BY $xDiaMes ORDER BY 2",$graficaPor);
                }


            }
        }
    }
    if ($tipoGrafica == "Barras") {
        if ($temaGraf == "Todos") {
            if ($anio == "Todos") {
                if ($mes == "Todos") {
                    #graficaLineas("conexion, "filtro", "tipoGrafic", "estableci", "anio", "mes", "groupby mes y order by 2")
                    $xDiaMes = "month(fecha)";
                    $resultado = graficaBarras($con, "1", "$opcionGrafica, $xDiaMes", "", "", "", "GROUP BY $xDiaMes ORDER BY 2",$graficaPor);
                }else{
                    #$mes
                    $xDiaMes = "day(fecha)";
                    $resultado = graficaBarras($con, "2", "$opcionGrafica, $xDiaMes", "", "", $mesNum, "GROUP BY $xDiaMes ORDER BY 2",$graficaPor);
                }
            }else{
                if ($mes == "Todos") {
                    #$anio
                    $xDiaMes = "month(fecha)";
                    $resultado = graficaBarras($con, "3", "$opcionGrafica, $xDiaMes", "", $anio, "", "GROUP BY $xDiaMes ORDER BY 2",$graficaPor);
                }else{
                    #$anio
                    #$mes
                    $xDiaMes = "day(fecha)";
                    $resultado = graficaBarras($con, "4", "$opcionGrafica, $xDiaMes", "", $anio, $mesNum, "GROUP BY $xDiaMes ORDER BY 2",$graficaPor);
                }
            }
        }
        else{
            if ($anio == "Todos") {
                if ($mes == "Todos") {
                    #$temaGraf
                    $xDiaMes = "month(fecha)";
                    $resultado = graficaBarras($con, "5", "$opcionGrafica, $xDiaMes", $temaGraf, "", "", "GROUP BY $xDiaMes ORDER BY 2",$graficaPor);
                }else{
                    #$mes
                    #$temaGraf
                    $xDiaMes = "day(fecha)";
                    $resultado = graficaBarras($con, "6", "$opcionGrafica, $xDiaMes", $temaGraf, "", $mesNum, "GROUP BY $xDiaMes ORDER BY 2",$graficaPor);
                }
            }else{
                if ($mes == "Todos") {
                    #$anio
                    #$temaGraf
                    $xDiaMes = "month(fecha)";
                    $resultado = graficaBarras($con, "7", "$opcionGrafica, $xDiaMes", $temaGraf, $anio, "", "GROUP BY $xDiaMes ORDER BY 2",$graficaPor);
                }else{
                    #$temaGraf
                    #$anio
                    #$mes
                    $xDiaMes = "day(fecha)";
                    $resultado = graficaBarras($con, "8", "$opcionGrafica, $xDiaMes", $temaGraf, $anio, $mesNum, "GROUP BY $xDiaMes ORDER BY 2",$graficaPor);
                }


            }
        }
    }
    if ($tipoGrafica == "Pastel") {
        if ($temaGraf == "Todos") {
            if ($anio == "Todos") {
                if ($mes == "Todos") {
                    #graficaLineas("conexion, "filtro", "tipoGrafic", "estableci", "anio", "mes", "groupby mes y order by 2")
                    $xDiaMes = "month(fecha)";
                    $resultado = graficaPastel($con, "1", "$opcionGrafica, $xDiaMes", "", "", "",$graficaPor);
                }else{
                    #$mes
                    $xDiaMes = "day(fecha)";
                    $resultado = graficaPastel($con, "2", "$opcionGrafica, $xDiaMes", "", "", $mesNum,$graficaPor);
                }
            }else{
                if ($mes == "Todos") {
                    #$anio
                    $xDiaMes = "month(fecha)";
                    $resultado = graficaPastel($con, "3", "$opcionGrafica, $xDiaMes", "", $anio, "",$graficaPor);
                }else{
                    #$anio
                    #$mes
                    $xDiaMes = "day(fecha)";
                    $resultado = graficaPastel($con, "4", "$opcionGrafica, $xDiaMes", "", $anio, $mesNum,$graficaPor);
                }
            }
        }
        else{
            if ($anio == "Todos") {
                if ($mes == "Todos") {
                    #$temaGraf
                    $xDiaMes = "month(fecha)";
                    $resultado = graficaPastel($con, "5", "$opcionGrafica, $xDiaMes", $temaGraf, "", "",$graficaPor);
                }else{
                    #$mes
                    #$temaGraf
                    $xDiaMes = "day(fecha)";
                    $resultado = graficaPastel($con, "6", "$opcionGrafica, $xDiaMes", $temaGraf, "", $mesNum,$graficaPor);
                }
            }else{
                if ($mes == "Todos") {
                    #$anio
                    #$temaGraf
                    $xDiaMes = "month(fecha)";
                    $resultado = graficaPastel($con, "7", "$opcionGrafica, $xDiaMes", $temaGraf, $anio,$graficaPor);
                }else{
                    #$temaGraf
                    #$anio
                    #$mes
                    $xDiaMes = "day(fecha)";
                    $resultado = graficaPastel($con, "8", "$opcionGrafica, $xDiaMes", $temaGraf, $anio, $mesNum,$graficaPor);
                }
            }
        }
    }
    return $resultado;
}



function obtenerNumMes($mes){
    $result = 0;
    if ($mes == 'Enero') {
        $result = 1;
    }
    if ($mes == 'Febrero'){
        $result = 2;
    }
    if ($mes == 'Marzo'){
        $result = 3;
    }
    if ($mes == 'Abril'){
        $result = 4;
    }
    if ($mes == 'Mayo'){
        $result = 5;
    }
    if ($mes == 'Junio'){
        $result = 6;
    }
    if ($mes == 'Julio'){
        $result = 7;
    }
    if ($mes == 'Agosto'){
        $result = 8;
    }
    if ($mes == 'Septiembre'){
        $result = 9;
    }
    if ($mes == 'Octubre'){
        $result = 10;
    }
    if ($mes == 'Noviembre'){
        $result = 11;
    }
    if ($mes == 'Diciembre'){
        $result = 12;
    }
    return $result;
}
function obtenerMesNum($mes){
    $result = "Enero";
    if ($mes == '1') {
        $result = "Enero";
    }
    if ($mes == '2'){
        $result = "Febrero";
    }
    if ($mes == '3'){
        $result = "Marzo";
    }
    if ($mes == '4'){
        $result = "Abril";
    }
    if ($mes == '5'){
        $result = "Mayo";
    }
    if ($mes == '6'){
        $result = "Junio";
    }
    if ($mes == '7'){
        $result = "Julio";
    }
    if ($mes == '8'){
        $result = "Agosto";
    }
    if ($mes == '9'){
        $result = "Septiembre";
    }
    if ($mes == '10'){
        $result = "Octubre";
    }
    if ($mes == '11'){
        $result = "Noviembre";
    }
    if ($mes == '12'){
        $result = "Diciembre";
    }
    return $result;
}
function obtenerDiaNum($mes){
    $result = "Día x";
    if ($mes == '1') {
        $result = "Día 1";
    }
    if ($mes == '2'){
        $result = "Día 2";
    }
    if ($mes == '3'){
        $result = "Día 3";
    }
    if ($mes == '4'){
        $result = "Día 4";
    }
    if ($mes == '5'){
        $result = "Día 5";
    }
    if ($mes == '6'){
        $result = "Día 6";
    }
    if ($mes == '7'){
        $result = "Día 7";
    }
    if ($mes == '8'){
        $result = "Día 8";
    }
    if ($mes == '9'){
        $result = "Día 9";
    }
    if ($mes == '10'){
        $result = "Día 10";
    }
    if ($mes == '11'){
        $result = "Día 11";
    }
    if ($mes == '12'){
        $result = "Día 12";
    }
    if ($mes == '13'){
        $result = "Día 13";
    }
    if ($mes == '14'){
        $result = "Día 14";
    }
    if ($mes == '15'){
        $result = "Día 15";
    }
    if ($mes == '16'){
        $result = "Día 16";
    }
    if ($mes == '17'){
        $result = "Día 17";
    }
    if ($mes == '18'){
        $result = "Día 18";
    }
    if ($mes == '19'){
        $result = "Día 19";
    }
    if ($mes == '20'){
        $result = "Día 20";
    }
    if ($mes == '21'){
        $result = "Día 21";
    }
    if ($mes == '22'){
        $result = "Día 22";
    }
    if ($mes == '23'){
        $result = "Día 23";
    }
    if ($mes == '24'){
        $result = "Día 24";
    }
    if ($mes == '25'){
        $result = "Día 25";
    }
    if ($mes == '26'){
        $result = "Día 26";
    }
    if ($mes == '27'){
        $result = "Día 27";
    }
    if ($mes == '28'){
        $result = "Día 28";
    }
    if ($mes == '29'){
        $result = "Día 29";
    }
    if ($mes == '30'){
        $result = "Día 30";
    }
    if ($mes == '31'){
        $result = "Día 31";
    }

    return $result;
}
function verificarDatosEst($con, $valorGraficaPor, $anio, $mesStr, $graficaPor){
    $mes = obtenerNumMes($mesStr);
    if ($valorGraficaPor == "Todos") {
        if ($anio == "Todos") {
            if ($mes == 0) {
                $sqlVer = "SELECT count(fecha) FROM `registros`";
            }else{
                $sqlVer = "SELECT count(fecha) FROM `registros` WHERE MONTH(fecha) = $mes";
            }
        }else{
            if ($mes == 0) {
                $sqlVer = "SELECT count(fecha) FROM `registros` WHERE  YEAR(fecha) = $anio";
            }else{
                $sqlVer = "SELECT count(fecha) FROM `registros` WHERE YEAR(fecha) = $anio AND MONTH(fecha) = $mes";
            }
        }
    }else{
        if ($anio == "Todos") {
            if ($mes == 0) {
                $sqlVer = "SELECT count(fecha) FROM `registros` WHERE $graficaPor = '$valorGraficaPor'";
            }else{
                $sqlVer = "SELECT count(fecha) FROM `registros` WHERE $graficaPor = '$valorGraficaPor' AND MONTH(fecha) = $mes";
            }
        }else{
            if ($mes == 0) {
                $sqlVer = "SELECT count(fecha) FROM `registros` WHERE $graficaPor = '$valorGraficaPor' AND YEAR(fecha) = $anio";
            }else{
                $sqlVer = "SELECT count(fecha) FROM `registros` WHERE $graficaPor = '$valorGraficaPor' AND YEAR(fecha) = $anio AND MONTH(fecha) = $mes";
            }
        }

    }
    $consult = mysqli_query($con, $sqlVer);
    $row = mysqli_fetch_array($consult);
    $result = $row[0];
    if ($result == 1 or $result == 2 ) {
        $result = 0;
    }
    return $result;
}

?>