<?php
    $conexion = mysqli_connect('localhost','root','','exam');
?>

<!DOCTYPE html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.1/css/all.css" integrity="sha384-xxzQGERXS00kBmZW/6qxqJPyxW3UR0BPsL4c8ILaIWXva5kFi7TxkIIaMiKtqV1Q" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="css/tarjetas-leccion.css">
</head>
<body>
<header>
    <?php
    if (@$_GET['q']==1 and @$_GET['idT'] and @$_GET['nr']){
        $idT = @$_GET['idT'];
        $nr = @$_GET['nr'];
        $t = @$_GET['t'];
        if($t==0){
            echo'<div class="container">
                    <center>
                        <h2>¡Aún no hay actividades asignadas!<h2>
                        <a href="welcome.php?q=1" class="x"><button type="button" class="btn btn-primary" >SALIR</button></a>       
                    </center>
                </div>';
                    
        }else{
        $qr1 = "SELECT * FROM lecciones WHERE idTema = '$idT'";
        $res = mysqli_query($conexion, $qr1);
        $t = mysqli_num_rows($res);

        $query2 = "SELECT idLeccion FROM lecciones WHERE idTema = '$idT'";
        $result2 = mysqli_query($conexion,$query2) or die(mysql_error());
        $extraido2 = mysqli_fetch_all($result2);

        $idL = $extraido2[$nr-1][0];

        $sql = "SELECT * FROM lecciones WHERE idLeccion = '$idL' and idTema = '$idT'";
        $result = mysqli_query($conexion, $sql);

        if($mostrar=mysqli_fetch_array($result)){
            echo   '<div class="wrap">
            <div class="cabezabar">
                        <a href="welcome.php?q=1" class="x"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"/>
                        <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"/>
                        </svg></a> 
                        <meter id="meter" value='.$nr.' max='.$t.'></meter>
                    </div>
                        <div class="tarjetas-wrap">
                        <div class="tarjeta">
                            <div class="front">
                                <img src="data:image/jpeg;base64,'.base64_encode( $mostrar['imagen'] ).'" >
                                <p>'.$mostrar['descripcion'].'</p>
                            </div>
                            <div class="back">
                                <p>'.$mostrar['definicion'].'</p>
                            </div>
                        </div>    
                    </div>';
        }
        
        if($nr==1){
            $nr2 = $nr + 1;
            $nr3 = $nr - 1;
            echo'<div class="controles">            
                <a class="atras"><svg width="3em" height="3em" viewBox="0 0 16 16" color="grey" class="bi bi-arrow-left-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path fill-rule="evenodd" d="M8.354 11.354a.5.5 0 0 0 0-.708L5.707 8l2.647-2.646a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708 0z"/>
                <path fill-rule="evenodd" d="M11.5 8a.5.5 0 0 0-.5-.5H6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5z"/>
              </svg></i></a>
                <a class="adelante" href="lecciones.php?q=1&idT='.$idT.'&nr='.$nr2.'&t='.$t.'"><svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-arrow-right-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-8.354 2.646a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L9.793 7.5H5a.5.5 0 0 0 0 1h4.793l-2.147 2.146z"/>
              </svg></a>
            </div>';
        }elseif($t==($nr)){
            $nr3 = $nr - 1;
            echo '<div class="controles">            
            <a class="atras"  href="lecciones.php?q=1&idT='.$idT.'&nr='.$nr3.'&t='.$t.'"><svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-arrow-left-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-7.646 2.646a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L6.207 7.5H11a.5.5 0 0 1 0 1H6.207l2.147 2.146z"/>
          </svg></a>
            <a class="adelante"><svg width="3em" height="3em" viewBox="0 0 16 16" color="grey" class="bi bi-arrow-right-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path fill-rule="evenodd" d="M7.646 11.354a.5.5 0 0 1 0-.708L10.293 8 7.646 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0z"/>
            <path fill-rule="evenodd" d="M4.5 8a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5z"/>
          </svg></a>
            </div>';  
        }else{
            $nr2 = $nr + 1;
            $nr3 = $nr - 1;
            echo '<div class="controles">            
            <a class="atras"  href="lecciones.php?q=1&idT='.$idT.'&nr='.$nr3.'&t='.$t.'"><svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-arrow-left-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-7.646 2.646a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L6.207 7.5H11a.5.5 0 0 1 0 1H6.207l2.147 2.146z"/>
          </svg></a>
            <a class="adelante" href="lecciones.php?q=1&idT='.$idT.'&nr='.$nr2.'&t='.$t.'"><svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-arrow-right-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-8.354 2.646a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L9.793 7.5H5a.5.5 0 0 0 0 1h4.793l-2.147 2.146z"/>
          </svg></i></a>
            </div>';  
        } 
    }             
    }
?>     
    </div>
</body>




</html>