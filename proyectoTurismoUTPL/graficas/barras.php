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
                min-width: 310px; 
                max-width: 800px;
                margin: 1em auto;
            }

            #container {
                height: 400px;
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
        Bar chart 
    </p>
</figure>



		<script type="text/javascript">
Highcharts.chart('container', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'OCUPACION'
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
	</body>
</html>
