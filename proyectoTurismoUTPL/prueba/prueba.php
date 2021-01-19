
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administración</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">
    <link  rel="stylesheet" href="css/app.css"/>
    <link  rel="stylesheet" href="css/estilos-admin.css"/>
    <script type="text/javascript" src="js/app.js"></script>
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js"  type="text/javascript"></script>
    
</head>


<body>
     <div class="col-md-3"></div><div class="col-md-6" style="margin-top:10px;">
        <center><h4 style="font-family: Poppins;  margin-bottom: 20px;">SUBIR ARCHIVOS</h4></center><br>
        <?php
        echo '
        <form class="form-horizontal title1" name="form" action="#"  method="POST" enctype="multipart/form-data">
            <input type="hidden" name="MAX_FILE_SIZE" value="512000" />
            <p> Enviar mi archivo: <input name="subir_archivo" type="file" /></p>
            <label>Descripcion de archivo</label>
            <input type="text" name="descripcion"><hr>
            <p> <input type="submit" value="Enviar Archivo" /></p>
            </form></div>';
            
            if(isset($_POST['submit'])){
                $descripcion1 = $_POST['descripcion'];
            echo $descripcion1;
            echo '<center><div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Error: </strong> ¡El correo no esta disponible!
                                  </div></center>';
            }
                            ?>
        </body>
</html>
