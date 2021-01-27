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
    <!-- Hichcharts css -->
    <style type="text/css">
            .highcharts-figure, .highcharts-data-table table {
                min-width: 320px; 
                max-width: 800px;
                margin: 1em auto;
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
        $cambioFecha = "Todos";
        $cambioEstr1 = "5 Estrellas";
        $cambioEstr2 = "4 Estrellas";
        $cambioEstr3 = "3 Estrellas";
        $splitFecha = "";
        
        //echo $cambioFecha;
        ?>
        <form action="#"  method="POST" enctype="multipart/form-data">
            <div>Seleccione año y mes
            <select name="anio-mes">
                <option>Todos</option>
                <?php
                while($row = mysqli_fetch_array($result)) 
                {
                    $rows[] = $row;
                    echo "<option>$row[0]-$row[1]</option>";
                }
                
                ?>
            </select>
            </div>
            <div>
                Seleccione las estrellas
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
            $cambioFecha = $_POST['anio-mes'];
            $cambioEstr1 = $_POST['estrella1'];
            $cambioEstr2 = $_POST['estrella2'];
            $cambioEstr3 = $_POST['estrella3'];
            obtenerDatos($cambioFecha);
        }

        function obtenerDatos($elemento){
            global $splitFecha;
            $splitFecha = explode("-",$elemento);
        }

        ?>
    </center>

    <script src="../highcharts/code/highcharts.js"></script>
    <script src="../highcharts/code/modules/exporting.js"></script>
    <script src="../highcharts/code/modules/export-data.js"></script>
    <script src="../highcharts/code/modules/accessibility.js"></script>

    <section class="graficasHome">
        <h2>HUÉSPEDES</h2>
        <div class="porHabitacion">
            <div>
                <figure class="highcharts-figure">
                    <div id="pastel1"></div>
                    <p class="highcharts-description">
                        <?php echo $cambioEstr1; ?>
                    </p>
                </figure>
                    <figure class="highcharts-figure">
                    <div id="pastel2"></div>
                    <p class="highcharts-description">
                        <?php echo $cambioEstr2; ?>
                    </p>
                </figure>
                    <figure class="highcharts-figure">
                    <div id="pastel3"></div>
                    <p class="highcharts-description">
                        <?php echo $cambioEstr3; ?>
                    </p>
                </figure>
            </div>
        </div>
    </section>

    <section class="graficasHome">
        <h2>TARIFA PROMEDIO</h2>
        <div class="porHabitacion">
            <h3>Por Habitación</h3>
            <div>
                <figure class="highcharts-figure">
                    <div id="5"></div>
                    <p class="highcharts-description">
                       <?php echo $cambioEstr1; ?>
                    </p>
                </figure>
                    <figure class="highcharts-figure">
                    <div id="4"></div>
                    <p class="highcharts-description">
                        <?php echo $cambioEstr2; ?>
                    </p>
                </figure>
                    <figure class="highcharts-figure">
                    <div id="3"></div>
                    <p class="highcharts-description">
                        <?php echo $cambioEstr3; ?>
                    </p>
                </figure>
            </div>
        </div>
        <div class="porPersona">
            <h3>Por Persona</h3>
            <div>
                <figure class="highcharts-figure">
                    <div id="5"></div>
                    <p class="highcharts-description">
                        <?php echo $cambioEstr1; ?>
                    </p>
                </figure>
                    <figure class="highcharts-figure">
                    <div id="4"></div>
                    <p class="highcharts-description">
                        <?php echo $cambioEstr2; ?>
                    </p>
                </figure>
                    <figure class="highcharts-figure">
                    <div id="3"></div>
                    <p class="highcharts-description">
                        <?php echo $cambioEstr3; ?>
                    </p>
                </figure>
            </div>
        </div>
    </section>

    <section class="graficasHome2">
        <h2>OCUPACIÓN</h2>
        <div>
            <figure class="highcharts-figure">
                <div id="5"></div>
                <p class="highcharts-description">
                    <?php echo $cambioEstr1; ?>
                </p>
            </figure>
                <figure class="highcharts-figure">
                <div id="4"></div>
                <p class="highcharts-description">
                    <?php echo $cambioEstr2; ?>
                </p>
            </figure>
                <figure class="highcharts-figure">
                <div id="3"></div>
                <p class="highcharts-description">
                    <?php echo $cambioEstr3; ?>
                </p>
            </figure>
        </div>
        <div>
            <figure class="highcharts-figure">
                <div id="ocupacion"></div>
                <p class="highcharts-description">
                    <?php echo "$cambioEstr1, $cambioEstr2 y $cambioEstr3"; ?> 
                </p>
            </figure>
        </div>
    </section>

    <section class="graficasHome2">
        <h2>REVPAR</h2>
        <div>
            <figure class="highcharts-figure">
                <div id="pastel1"></div>
                <p class="highcharts-description">
                    <?php echo $cambioEstr1; ?>
                </p>
            </figure>
                <figure class="highcharts-figure">
                <div id="pastel2"></div>
                <p class="highcharts-description">
                    <?php echo $cambioEstr2; ?>
                </p>
            </figure>
                <figure class="highcharts-figure">
                <div id="pastel3"></div>
                <p class="highcharts-description">
                    <?php echo $cambioEstr3; ?>
                </p>
            </figure>
        </div>
    </section>
    <section class="graficasHome2">
        <h2>ESTADÍA PROMEDIO</h2>
        <div>
            <figure class="highcharts-figure">
                <div id="pastel1"></div>
                <p class="highcharts-description">
                    <?php echo $cambioEstr1; ?>
                </p>
            </figure>
                <figure class="highcharts-figure">
                <div id="pastel2"></div>
                <p class="highcharts-description">
                    <?php echo $cambioEstr2; ?>
                </p>
            </figure>
                <figure class="highcharts-figure">
                <div id="pastel3"></div>
                <p class="highcharts-description">
                    <?php echo $cambioEstr3; ?>
                </p>
            </figure>
        </div>
    </section>
    <!-- Graficos-->
        <?php
        if ($cambioFecha == "Todos") {
            $consPastel1 = "SELECT sum(nacionales) as nacionales, sum(extranjeros) as extranjeros from registros where  categoria = '$cambioEstr1'";
        }else{
           $consPastel1 = "SELECT sum(nacionales) as nacionales, sum(extranjeros) as extranjeros from registros where year(fecha) = $splitFecha[0] and month(fecha) = $splitFecha[1] AND categoria = '$cambioEstr1'"; 
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
                }]
            });
            </script>
            ";?>
        <?php
        if ($cambioFecha == "Todos") {
            $consPastel2 = "SELECT sum(nacionales) as nacionales, sum(extranjeros) as extranjeros from registros where  categoria = '$cambioEstr2'";
        }else{
           $consPastel2 = "SELECT sum(nacionales) as nacionales, sum(extranjeros) as extranjeros from registros where year(fecha) = $splitFecha[0] and month(fecha) = $splitFecha[1] AND categoria = '$cambioEstr2'"; 
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
                }]
            });
            </script>
            "
            ;?>
            <?php
        if ($cambioFecha == "Todos") {
            $consPastel3 = "SELECT sum(nacionales) as nacionales, sum(extranjeros) as extranjeros from registros where  categoria = '$cambioEstr1'";
        }else{
           $consPastel3 = "SELECT sum(nacionales) as nacionales, sum(extranjeros) as extranjeros from registros where year(fecha) = $splitFecha[0] and month(fecha) = $splitFecha[1] AND categoria = '$cambioEstr1'"; 
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
                }]
            });
            </script>
            "
        ;?>

    <script type="text/javascript">
            Highcharts.chart('grafic2', {
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
                        pointStart: 1940,
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
                    data: [117]
                }, {
                    name: 'GRAND VICTORIA BOUTIQUE',
                    data: [58]
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
         
        <script type="text/javascript">
                    Highcharts.chart('grafic5', {

                        title: {
                            text: '...'
                        },

                        subtitle: {
                            text: ''
                        },

                        yAxis: {
                            title: {
                                text: 'Number of Employees'
                            }
                        },

                        xAxis: {
                            accessibility: {
                                rangeDescription: 'Range: 2010 to 2017'
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
                                pointStart: 2010
                            }
                        },

                        series: [{
                            name: 'Installation',
                            data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
                        }, {
                            name: 'Manufacturing',
                            data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
                        }, {
                            name: 'Sales & Distribution',
                            data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
                        }, {
                            name: 'Project Development',
                            data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
                        }, {
                            name: 'Other',
                            data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
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
                        }

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