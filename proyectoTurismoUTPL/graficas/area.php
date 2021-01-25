<?php
    include_once '../database.php';
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Highcharts Example</title>

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
        <link rel="stylesheet" href="../css/app.css">
        <script type="text/javascript" src="../js/app.js"></script>
	</head>
	<body>
        <script src="../highcharts/code/highcharts.js"></script>
        <script src="../highcharts/code/modules/exporting.js"></script>
        <script src="../highcharts/code/modules/export-data.js"></script>
        <script src="../highcharts/code/modules/accessibility.js"></script>

            <figure class="highcharts-figure">
                <div id="container"></div>
                <p class="highcharts-description">
                    Demonstrating a basic area chart, also known as a mountain chart.
                    Area charts are similar to line charts, but commonly used to visualize
                    volumes.
                </p>
            </figure>



                    <script type="text/javascript">
            Highcharts.chart('container', {
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
        <center><a href="../administrador.php?q=7" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Volver al Dashboard</a></center>
        
	</body>
</html>
