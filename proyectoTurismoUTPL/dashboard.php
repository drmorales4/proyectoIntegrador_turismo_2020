<?php
    include_once 'database.php';
    session_start();
    if(!(isset($_SESSION['email'])))
    {

        header("location:login.php");
    }
    else
    {
        $name = $_SESSION['nombres'];
        $apellidos = $_SESSION['apellidos'];
        $email = $_SESSION['email'];
        $idclase = $_SESSION['idclase'];        
        include_once 'database.php';
    }
    if($_SESSION["rol"] == "Estudiante"){
        session_destroy();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administración</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link  rel="stylesheet" href="css/estilos-admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js"  type="text/javascript"></script>

</head>

<body>
    <nav class="navbar navbar-dark sticky-top flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href=""><h3>Administración Docente</h3></a>
    <ul class="navbar-nav px-3">
            <div class="nav-item text-nowrap">
                <a class="nav-link" href="logout1.php?q=dashboard.php"><h5>Cerrar Sesión</h5></a>
            </div>

        </ul> 
    </nav>
    
    <div class="container-fluid">
        <div class="row"> 
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="sidebar-sticky pt-3">
                    <ul class="nav flex-column">
                    
                    <li <?php if(@$_GET['q']==0) echo'class="nav-link"'; ?>><a href="dashboard.php?q=0" style="font-family: 'Roboto', sans-serif; font-size: 20px;"><svg width="1.4em" height="1.4em" viewBox="0 0 16 16" class="bi bi-house" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                        </svg> Inició</a>    
                    </li>
                    <li <?php if(@$_GET['q']==1) echo'class="nav-link"'; ?>><a href="dashboard.php?q=1" style="font-family: 'Roboto', sans-serif; font-size: 20px;"><svg width="1.4em" height="1.4em" viewBox="0 0 16 16" class="bi bi-people" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.995-.944v-.002.002zM7.022 13h7.956a.274.274 0 0 0 .014-.002l.008-.002c-.002-.264-.167-1.03-.76-1.72C13.688 10.629 12.718 10 11 10c-1.717 0-2.687.63-3.24 1.276-.593.69-.759 1.457-.76 1.72a1.05 1.05 0 0 0 .022.004zm7.973.056v-.002.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10c-1.668.02-2.615.64-3.16 1.276C1.163 11.97 1 12.739 1 13h3c0-1.045.323-2.086.92-3zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                        </svg> Estudiantes</a>
                    </li>
                    <li <?php if(@$_GET['q']==2) echo'class="nav-link"'; ?>><a href="dashboard.php?q=2" style="font-family: 'Roboto', sans-serif; font-size: 20px;"> <svg width="1.4em" height="1.4em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"/>
                        <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z"/>
                        </svg> Administrar Unidades</a>
                    </li>
                    <li <?php if(@$_GET['q']==7) echo'class="nav-link"'; ?>><a href="dashboard.php?q=7" style="font-family: 'Roboto', sans-serif; font-size: 20px;"><svg width="1.4em" height="1.4em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"/>
                        <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z"/>
                        </svg> Administrar Lecciones</a>
                    </li>
                    <li <?php if(@$_GET['q']==6) echo'class="nav-link"'; ?>><a href="dashboard.php?q=6" style="font-family: 'Roboto', sans-serif; font-size: 20px;"><svg width="1.4em" height="1.4em" viewBox="0 0 16 16" class="bi bi-plus-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                        <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        </svg> Crear Lecciones</a>
                    </li>
                    
                    <li <?php if(@$_GET['q']==4) echo'class="nav-link"'; ?>><a href="dashboard.php?q=4" style="font-family: 'Roboto', sans-serif; font-size: 20px;"><svg width="1.4em" height="1.4em" viewBox="0 0 16 16" class="bi bi-plus-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                        <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        </svg> Agregar actividad</a>
                    </li>
                    <li <?php if(@$_GET['q']==5) echo'class="nav-link"'; ?>><a href="dashboard.php?q=5" style="font-family: 'Roboto', sans-serif; font-size: 20px;"><svg width="1.4em" height="1.4em" viewBox="0 0 16 16" class="bi bi-dash-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path fill-rule="evenodd" d="M3.5 8a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.5-.5z"/>
                        </svg> Eliminar actividad</a>
                    </li>
                    
                    <li class="dropdown <?php if(@$_GET['q']==4 || @$_GET['q']==5) echo'active"'; ?>">
                    </ul>
                </div>
            </nav>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">        
                <div class="col-md-12">
                <?php if(@$_GET['q']==0){
                    echo '<h1 style="color: #FD7E14;">Bienvenido '.$name.' '.$apellidos.'</h1';
                }
                ?>
                <?php 
                    if(@$_GET['q']==1 and !@$_GET['user'] and !@$_GET['act']){
                        $result = mysqli_query($con,"SELECT * FROM user WHERE idclase='$email'") or die('Error');
                        echo  ' <center><h4 style=" color: #FD7E14; font-size: 35px; margin-bottom: 20px;">Lista de Estudiantes</h4></center>
                        <div class="panel">
                                    <div class="table-responsive" style="font-size: 19px;">
                                        <table class="table table-striped title1">
                                            <tr style="background: #F5C6CB"><td><b>N</b></td>
                                                <td><b>Nombre</b></td>
                                                <td><b>Apellido</b></td>
                                                <td><b>Correo</b></td>
                                                <td><b>Visualizar</b></td>
                                            </tr>';
                        $c=1;
                        while($row = mysqli_fetch_array($result)) 
                        {
                            $iduser = $row['idUser'];
                            $name = $row['nombres'];
                            $apellido = $row['apellidos'];
                            $email = $row['email'];
                            echo '  <tr style="background: #FFEEBA">
                                        <td>'.$c++.'</td>
                                        <td>'.$name.'</td>
                                        <td>'.$apellido.'</td>
                                        <td>'.$email.'</td>
                                        <td><a title="Delete User" href="dashboard.php?q=1&user='.$iduser.'"><svg width="1em" height="1em" color="#000" viewBox="0 0 16 16" class="bi bi-eye" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z"/>
                                        <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                      </svg></a></td>
                                    </tr>';
                        }
                        $c=0;
                        echo '</table></div></div>';
                    }
                ?>
                <?php 
                    if(@$_GET['q']==1 and @$_GET['user'] and !@$_GET['act']){
                        $iduser = @$_GET['user']; 
                        //VOCABULARY
                        $qry = mysqli_query($con,"SELECT * FROM unidades WHERE idclase='$email'") or die('Error');
                        echo  '<center><h4 style="  margin-bottom: 20px;">VOCABULARY</h4></center><br> 
                                    <div class="panel">
                                        <div class="table-responsive style="font-size: 19px;">
                                            <table class="table table-striped title1">
                                                <tr style="background: #F5C6CB">
                                                    <td><b>N</b></td>
                                                    <td><b>Unidad</b></td>
                                                    <td><b>Número de preguntas</b></td>
                                                    <td><b>Visualizar</b>
                                                </tr>';
                        $c=1;
                        while($row1 = mysqli_fetch_array($qry)){
                            $idunidad = $row1['idunidades'];
                            $nombreU = $row1['nombre'];
                            $qry2 = mysqli_query($con,"SELECT * FROM vocabulario WHERE idunidades='$idunidad'") or die('Error');
                            $row2 = mysqli_num_rows($qry2);
                            if($row2>0){
                                echo '  <tr style="background: #FFEEBA">
                                            <td>'.$c++.'</td>
                                            <td>'.$nombreU.'</td>
                                            <td>'.$row2.'</td>
                                            <td><a title="Delete User" href="dashboard.php?q=1&act=voc&idU='.$idunidad.'&user='.$iduser.'"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z"/>
                                            <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                            </svg></a></td>
                                        </tr>';
                            }                            
                        }
                        $c=0;
                        echo '</table></div></div>';
                        //LISTENING
                        $qry = mysqli_query($con,"SELECT * FROM unidades WHERE idclase='$email'") or die('Error');
                        echo  '<center><h4 style=" margin-bottom: 20px;">LISTENING</h4></center><br> 
                                <div class="panel">
                                    <div class="table-responsive style="font-size: 19px;">
                                        <table class="table table-striped title1">
                                            <tr style="background: #F5C6CB">
                                                <td><b>N</b></td>
                                                <td><b>Unidad</b></td>
                                                <td><b>Número de preguntas</b></td>
                                                <td><b>Visualizar</b></td>
                                            </tr>';
                        $c=1;
                        while($row1 = mysqli_fetch_array($qry)){
                            $idunidad = $row1['idunidades'];
                            $nombreU = $row1['nombre'];
                            $qry2 = mysqli_query($con,"SELECT * FROM listening WHERE idunidades='$idunidad'") or die('Error');
                            $row2 = mysqli_num_rows($qry2);
                            if($row2>0){
                                echo '<tr style="background: #FFEEBA">
                                        <td>'.$c++.'</td>
                                        <td>'.$nombreU.'</td>
                                        <td>'.$row2.'</td>
                                        <td><a title="Delete User" href="dashboard.php?q=1&act=lis&idU='.$idunidad.'&user='.$iduser.'"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z"/>
                                        <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                        </svg></a></td>
                                    </tr>';
                            }                            
                        }
                        $c=0;
                        echo '</table></div></div>';
                    }
                ?>
                <?php 
                    if(@$_GET['q']==1 and @$_GET['user'] and @$_GET['act']=='voc' and @$_GET['idU']){
                        $iduser = @$_GET['user']; 
                        $idunidad = @$_GET['idU'];

                        $qry = "SELECT * FROM resvocabulary WHERE idunidad = '$idunidad' and iduser = '$iduser'";
                        $res = mysqli_query($con,$qry) or die('Error');
                        $rows2 = mysqli_num_rows($res);
                        if($rows2>0){
                            $query = "SELECT * FROM unidades WHERE idunidades = '$idunidad' and idclase = '$email'";
                            $result = mysqli_query($con,$query) or die(mysql_error());
                            $extraido = mysqli_fetch_array($result);
                            $nombreunidad = $extraido['nombre'];
                            $nombreunidad = mb_strtoupper($nombreunidad);

                            $query2 = "SELECT * FROM user WHERE idUser = '$iduser' and idclase = '$email'";
                            $result2 = mysqli_query($con,$query2) or die(mysql_error());
                            $extraido2 = mysqli_fetch_array($result2);
                            $nombreestudiante = $extraido2['nombres'];
                            $nombreestudiante = mb_strtoupper($nombreestudiante);
                            $apellidoestudiante = $extraido2['apellidos'];
                            $apellidoestudiante = mb_strtoupper($apellidoestudiante);

                            echo  '<center><h4 style=" margin-bottom: 20px;">VOCABULARY - '.$nombreunidad.' - '.$nombreestudiante.' '.$apellidoestudiante.'</h4></center>
                                <div class="panel">
                                    <div class="table-responsive style="font-size: 19px;">
                                        <table class="table table-striped title1">
                                            <tr style="background: #F5C6CB">
                                                <td><b>N</b></td>
                                                <td><b>Imagen</b></td>
                                                <td><b>Respuesta</b></td>
                                                <td><b>Respuesta Estudiante</b></td>
                                                <td><b>Valor</b></td>
                                                <td><b>Fecha</b></td>
                                            </tr>';
                            $c2 = 1;
                            while($data = mysqli_fetch_array($res)){ 
                                $iduni = $data['idunidad'];
                                $idvoc = $data['idvocabulario'];
                                $consulta = "SELECT * FROM vocabulario WHERE idvocabulario='$idvoc'";
                                $resultado = mysqli_query($con,$consulta) or die(mysql_error());
                                $vocabulario = mysqli_fetch_array($resultado);
                                $valor='undefinided';
                                if($data['valor'] == 1){
                                    $valor = 'correcto';
                                }elseif ($data['valor']==2) {
                                    $valor = 'incorrecto';
                                }                               
                                echo '<tr style="background: #FFEEBA">
                                        <td>'.$c2++.'</td>
                                        <td><img src="data:image/jpeg;base64,'.base64_encode($vocabulario['imagen'] ).'" height="100px" ></b></td>
                                        <td>'.$vocabulario['respuesta'].' </td>
                                        <td>'.$data['respuesta'].'</td>
                                        <td>'.$valor.'</td>
                                        <td>'.$data['fecha'].'</td>
                                    </tr>';
                            }
                            $c2=0; 
                        }                                               
                    }
                ?>
                <?php 
                    if(@$_GET['q']==1 and @$_GET['user'] and @$_GET['act']=='lis' and @$_GET['idU']){
                        $iduser = @$_GET['user']; 
                        $idunidad = @$_GET['idU'];

                        $qry = "SELECT * FROM reslistening WHERE idunidad = '$idunidad' and iduser = '$iduser'";
                        $res = mysqli_query($con,$qry) or die('Error');
                        $rows2 = mysqli_num_rows($res);
                        if($rows2>0){
                            $query = "SELECT * FROM unidades WHERE idunidades = '$idunidad' and idclase = '$email'";
                            $result = mysqli_query($con,$query) or die(mysql_error());
                            $extraido = mysqli_fetch_array($result);
                            $nombreunidad = $extraido['nombre'];
                            $nombreunidad = mb_strtoupper($nombreunidad);

                            $query2 = "SELECT * FROM user WHERE idUser = '$iduser' and idclase = '$email'";
                            $result2 = mysqli_query($con,$query2) or die(mysql_error());
                            $extraido2 = mysqli_fetch_array($result2);
                            $nombreestudiante = $extraido2['nombres'];
                            $nombreestudiante = mb_strtoupper($nombreestudiante);
                            $apellidoestudiante = $extraido2['apellidos'];
                            $apellidoestudiante = mb_strtoupper($apellidoestudiante);

                            echo  '<center><h4 style=   "font-family: Poppins;  margin-bottom: 20px;">LISTENING - '.$nombreunidad.' - '.$nombreestudiante.' '.$apellidoestudiante.'</h4></center>
                                <div class="panel">
                                    <div class="table-responsive style="font-size: 19px;">
                                        <table class="table table-striped title1">
                                            <tr style="background: #F5C6CB">
                                                <td><b>N</b></td>
                                                <td><b>Imagen</b></td>
                                                <td><b>Respuesta</b></td>
                                                <td><b>Respuesta Estudiante</b></td>
                                                <td><b>Valor</b></td>
                                                <td><b>Fecha</b></td>
                                            </tr>';
                            $c2 = 1;
                            while($data = mysqli_fetch_array($res)){ 
                                $iduni = $data['idunidad'];
                                $idlis = $data['idlistening'];
                                $consulta = "SELECT * FROM listening WHERE idlistening='$idlis'";
                                $resultado = mysqli_query($con,$consulta) or die(mysql_error());
                                $vocabulario = mysqli_fetch_array($resultado);
                                $valor='undefinided';
                                if($data['valor'] == 1){
                                    $valor = 'correcto';
                                }elseif ($data['valor']==2) {
                                    $valor = 'incorrecto';
                                }                               
                                echo '<tr style="background: #FFEEBA">
                                        <td>'.$c2++.'</td>
                                        <td><img src="data:image/jpeg;base64,'.base64_encode($vocabulario['imagen'] ).'" height="100px" ></b></td>
                                        <td>'.$vocabulario['respuesta'].'</td>
                                        <td>'.$data['respuesta'].'</td>
                                        <td>'.$valor.'</td>
                                        <td>'.$data['fecha'].'</td>
                                    </tr>';
                            }
                            $c2=0; 
                        }                                               
                    }
                ?>
                <?php
                    if(@$_GET['q']==2 && !(@$_GET['step'])){
                        
                        //INTERFAZ  CREAR UNIDADES
                        echo '<center>
                        <div class="col-md-6">
                            
                                <h4 style="color: #FD7E14; font-size: 35px;">Nueva Unidad</h4>
                                <form class="form-horizontal title1" name="form" action="#"  method="POST" enctype="multipart/form-data">
                                    <fieldset>
                                        <div class="form-group">
                                                    <input autocomplete="off" type="text" name="nombre" placeholder="Ingrese el nombre de la unidad.." class="form-control" required />
                                                </div>
                                                
                                        
                                                <input  type="submit" name="submit" style="margin-left:0%; font-family:Poppins; width:150px;" class="btn btn-primary" value="CREAR" class="btn btn-primary"/>
                                            
                                        </div>
                                    </fieldset>
                                </form>
                            
                        </div>  
                        </center>                   
                        ';

                    // eliminar unidades
                   
                    echo '<div class="col-md-12" style="margin-top:50px; height:100px;"><div class="eliminar-unidad" ">
                        <center><h4 style="color: #FD7E14; font-size: 35px;  margin-bottom: 20px;margin-top: 20px;">Eliminar Unidades</h4></center>';

                    $result = mysqli_query($con,"SELECT * FROM unidades WHERE idclase='$email'") or die('Error');
                        echo  '<div class="panel" style="margin-top:20px;">
                        <div class="table-responsive style="font-size: 19px;">
                        <table class="table table-striped title1">
                        <tr style="background: #F5C6CB">
                            <td><b>Nombre</b></td>
                            <td><b>Eliminar</b></td>
                            <td><b>Temas</b></td>
                        </tr>';
                        
                        while($row = mysqli_fetch_array($result)) 
                        {
                            $nombre = $row['nombre'];
                            echo '<tr style="background: #FFEEBA">
                            <td>'.$nombre.'</td>
                                <td><a title="Delete User" href="funciones.php?action=deleteunidad&nombre='.$nombre.'"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg></a></td>
                                <td><a title="Delete User" href="funciones.php?action=redirect&nombre='.$nombre.'"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                              </svg></a></td>
                            </tr>';
                        }
                        echo '</table></div></div>';

                        //insertar unidad
                    
                        if(isset($_POST['submit'])){
                            $nombre = $_POST['nombre'];
                            $nombre = stripslashes($nombre);
                            $nombre = addslashes($nombre);

                            $str="SELECT nombre from unidades WHERE idclase='$email' and nombre='$nombre'";
                            $result=mysqli_query($con,$str);
                            if((mysqli_num_rows($result))>0){
                                echo '<center><div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Error: </strong> ¡La unidad ingresada ya existe!
                              </div></center>';
                            }
                            else{
                                $str="insert into unidades set nombre='$nombre',idclase='$email'";
                                if((mysqli_query($con,$str))){
                                    echo '<center><div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong> ¡Unidad ingresada correctamente!</strong>
                                  </div></center>';
                                    echo "<meta http-equiv='refresh' content='0'>";
                                }   
                            }
                        }       
                            
                        
                    }
                ?>

                <?php
                    if(@$_GET['q']==2 && (@$_GET['step'])== 1){
                        $idU = @$_GET['idU'];
                        //INTERFAZ  CREAR TEMAS
                        echo '
                        <center>
                        <div class="col-md-6">
                            
                                <h4>Crear Tema</h4>
                                <form class="form-horizontal title1" name="form" action="#"  method="POST" enctype="multipart/form-data">
                                    <fieldset>
                                        <div class="form-group">
                                                    <input autocomplete="off" type="text" name="nombre" placeholder="Ingrese el tema.." class="form-control" required />
                                                </div>
                                                <input  type="submit" name="submit" style="margin-left:0%; font-family:Poppins; width:150px;" class="btn btn-primary" value="CREAR" class="btn btn-primary"/>
                                            
                                        </div>
                                    </fieldset>
                                </form>
                            
                        </div>  
                        </center> 
                                             
                        ';
                    // eliminar temas
                   
                    echo '<div class="col-md-12" style="margin-top:50px; height:100px;"><div class="eliminar-unidad" ">
                    <center><h4 style="font-family: Poppins;  margin-bottom: 20px;margin-top: 20px;">ELIMINAR TEMA</h4></center>';

                    $result = mysqli_query($con,"SELECT * FROM temas WHERE idunidad='$idU'") or die('Error');
                        echo  '<div class="panel" style="margin-top:20px;">
                        <div class="table-responsive style="font-size: 19px;" >
                        <table class="table table-striped title1">
                        <tr style="background: #F5C6CB">
                            <td><b>N</b></td>
                            <td><b>Nombre</b></td>
                            <td><b>Eliminar</b></td>
                        </tr>';
                        $c=1;
                        while($row = mysqli_fetch_array($result)) 
                        {
                            $nombre = $row['nombre'];
                            echo '<tr style="background: #FFEEBA">
                                <td>'.$c++.'</td>
                                <td>'.$nombre.'</td>
                                <td><a title="Delete User" href="funciones.php?action=deletetema&nombre='.$nombre.'"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg></a></td>
                            </tr>';
                        }
                        $c=0;
                        echo '</table></div></div>';

                        //insertar unidad
                    
                        if(isset($_POST['submit'])){
                            $nombre = $_POST['nombre'];
                            $nombre = stripslashes($nombre);
                            $nombre = addslashes($nombre);

                            $str="SELECT nombre from temas WHERE idunidad='$idU' and nombre='$nombre'";
                            $result=mysqli_query($con,$str);
                            if((mysqli_num_rows($result))>0){
                                echo '<center><div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Error: </strong> ¡El nombre del tema ya esta registrado!
                              </div></center>';
                            }
                            else{
                                $str="insert into temas set nombre='$nombre',idunidad='$idU'";
                                if((mysqli_query($con,$str))){
                                    echo '<center><div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong> ¡Tema ingresado correctamente!</strong>
                                  </div></center>';
                                    echo "<meta http-equiv='refresh' content='0'>";
                                }   
                            }
                        }       
                            
                        
                    }
                ?>


                <?php
                    if(@$_GET['q']==4 && !(@$_GET['step']) ) 
                    {
                        echo '<center><h4 style=" color: #FD7E14; font-size: 35px; margin-bottom: 20px;margin-top: 20px;">Seleccione una actividad </h4>

                                    <div class="col-md-6" >
                                        <a href="dashboard.php?q=4&step=1&a=v" style="text-decoration:none;">
                                            <div class="vocabulary" style="background: white; color: #FF5252; font-size: 20px; font-family:Poppins; text-align:center;">
                                                <img src="https://cdn3.iconfinder.com/data/icons/education-180/64/x-23-512.png" height="90px";>
                                                VOCABULARY
                                            </div>
                                        </a>
                                    </div>
                                

                                
                                    <div class="col-md-6">
                                        <a href="dashboard.php?q=4&step=1&a=l" style="text-decoration:none;">
                                            <div class="vocabulary" style="background: white; color: #FF5252; margin-top: 30px; font-size: 20px; font-family:Poppins; text-align:center;">
                                                <img src="https://cdn3.iconfinder.com/data/icons/thin-school-learning/24/thin-1355_hearing_ear_listening_audio-512.png" height="90px";>
                                                LISTENING
                                            </div>
                                        </a>
                                    </div>
                                

                                
                                    <div class="col-md-6">
                                        <a href="href="dashboard.php?q=4&step=1&a=d" style="text-decoration:none;">
                                            <div class="vocabulary" style="background: white; color: #FF5252; margin-top: 25px; font-size: 20px; font-family:Poppins; text-align:center;">
                                                <img src="https://cdn2.iconfinder.com/data/icons/the-joy-of-light-pi-maths-game/100/Maths-2-33-512.png" height="90px";>
                                                FLASHCARDS
                                            </div>
                                        </a>
                                    </div>                            
                            </center>';
                    }
                ?>
                <?php

                // Unidad a seleccionar para crear actividad
                if(@$_GET['q']==4 && (@$_GET['step'])== 1 ){
                    $a = $_GET['a'];
                    $sql = "SELECT *  FROM unidades WHERE idClase='$email'";
                    //$result = mysqli_query($con,$sql);
                   
                    echo '<center><h4 style=" color: #FD7E14;  font-size: 35px; margin-bottom: 20px;margin-top: 20px;"> Crear Actividad </h4>';

                    if($result = mysqli_query($con,$sql)){
                        while($mostrar=mysqli_fetch_array($result)){
                        $unidad = $mostrar['nombre'];
                        $id = $mostrar['idunidades'];
                        echo '  <div class="col-md-6">
                                    <a href="dashboard.php?q=4&step=3&a='.$a.'&idU='.$id.'" style="text-decoration:none;">
                                        <div class="vocabulary" style="background: white; color: #24B2F6; font-size: 20px;  text-align:center; text-transform: uppercase;"><h4>'.$unidad.'</h4></div>
                                    </a>
                                </div>';                
                        }                        
                        }else{
                        echo '<div class="form-group">
                                    <label class="col-md-12 control-label" for="name"></label>  
                                    <div class="col-md-12">
                                        <div class="vocabulary" style="background: white; font-size: 20px; text-align:center; text-transform: uppercase;">                               
                                            NO EXISTEN UNIDADES CREADAS
                                        </div></a>
                                    </div>
                                </div>
                                </center>
                        ';
                        }
                    }        
                    
                ?>
                

                <?php
                // Formulario vocabulary
                    if(@$_GET['q']==4 && (@$_GET['step'])== 3 && (@$_GET['a'])=='v'){ 
                        $idU=@$_GET['idU'];                                  
                        echo '<center><h4 style="color: #0069D9;  margin-bottom: 20px;margin-top: 20px;">Crear Pregunta Vocabulary</h4>
                        <div class="col-md-3"></div><div class="col-md-6" style="margin-top:50px;">   
                        <form class="form-horizontal title1" autocomplete="off" name="form" action="#"  method="POST" enctype="multipart/form-data">
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-12 control-label" for="name"></label>  
                                    <div class="col-md-12">
                                        <laber class="file">
                                        <input type="file" name="image" id="file aria-label="File browser example">
                                        <span class="file-custom"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 control-label" for="name"></label>  
                                    <div class="col-md-12" style="margin-top:10px;">
                                        <input id="answer" name="answer" placeholder="Ingrese la Respuesta" class="form-control input-md" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 control-label" for=""></label>
                                    <div class="col-md-12" style="margin-top:10px;"> 
                                        <input  type="submit" name="submit" style=" font-family:Poppins; width:150px;" class="btn btn-primary" value="Crear" class="btn btn-primary"/>
                                    </div>
                                </div>

                            </fieldset>
                        </form></div></center>';
                    
                    
                        if(isset($_POST['submit'])){
                            if(getimagesize($_FILES['image']['tmp_name'])==FALSE && _POST['answer']==""){
                                echo " error ";
                            }else{
                                $image = $_FILES['image']['tmp_name'];
                                $image = addslashes(file_get_contents($image));
                                $answer = $_POST['answer'];
                                $qry="insert into vocabulario (imagen,respuesta,idunidades) values ('$image','$answer','$idU')";
                                $result=mysqli_query($con,$qry);
                                if($result){
                                    echo '<center><div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong> ¡Pregunta creada correctamente!</strong>
                                  </div></center>';
                                }else{
                                    echo " error ";
                                }
                            }
                        }
                    }
                ?>
                
                <?php
                // Formulario listening
                    if(@$_GET['q']==4 && (@$_GET['step'])== 3 && (@$_GET['a'])=='l'){ 
                        $idU=@$_GET['idU'];                                  
                        echo '<center><h4 style="color: #0069D9;  margin-bottom: 20px;margin-top: 20px;">Crear Pregunta Listening</h4>
                        <div class="col-md-3"></div><div class="col-md-6" style="margin-top:50px;">   
                        <form class="form-horizontal title1" autocomplete="off" name="form" action="#"  method="POST" enctype="multipart/form-data">
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-12 control-label" for="name"></label>  
                                    <div class="col-md-12">
                                        <laber class="file">
                                        <input type="file" name="image" id="file aria-label="File browser example">
                                        <span class="file-custom"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 control-label" for="name"></label>  
                                    <div class="col-md-12" style="margin-top:10px;">
                                        <input id="answer" name="answer" placeholder="Ingrese la Respuesta" class="form-control input-md" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 control-label" for=""></label>
                                    <div class="col-md-12" style="margin-top:10px;"> 
                                        <input  type="submit" name="submit" style=" font-family:Poppins; width:150px;" class="btn btn-primary" value="Crear" class="btn btn-primary"/>
                                    </div>
                                </div>

                            </fieldset>
                        </form></div></center>';
                    
                    
                        if(isset($_POST['submit'])){
                            if(getimagesize($_FILES['image']['tmp_name'])==FALSE && _POST['answer']==""){
                                echo " error ";
                            }else{
                                $image = $_FILES['image']['tmp_name'];
                                $image = addslashes(file_get_contents($image));
                                $answer = $_POST['answer'];
                                $qry="insert into listening (imagen,respuesta,idunidades) values ('$image','$answer','$idU')";
                                $result=mysqli_query($con,$qry);
                                if($result){
                                    echo '<center><div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong> ¡Pregunta creada correctamente!</strong>
                                  </div></center>';
                                }else{
                                    echo " error ";
                                }
                            }
                        }
                    }
                ?>

                <?php
                    if(@$_GET['q']==4 && (@$_GET['step'])==2 ) 
                    {
                        echo ' 
                        <div class="row">
                        <span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Question Details</b></span><br /><br />
                        <div class="col-md-3"></div><div class="col-md-6"><form class="form-horizontal title1" name="form" action="update.php?q=addqns&n='.@$_GET['n'].'&eid='.@$_GET['eid'].'&ch=4 "  method="POST">
                        <fieldset>
                        ';
                
                        for($i=1;$i<=@$_GET['n'];$i++)
                        {
                            echo '<b>Question number&nbsp;'.$i.'&nbsp;:</><br /><!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" for="qns'.$i.' "></label>  
                                        <div class="col-md-12">
                                            <textarea rows="3" cols="5" name="qns'.$i.'" class="form-control" placeholder="Write question number '.$i.' here..."></textarea>  
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" for="'.$i.'1"></label>  
                                        <div class="col-md-12">
                                            <input id="'.$i.'1" name="'.$i.'1" placeholder="Enter option a" class="form-control input-md" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" for="'.$i.'2"></label>  
                                        <div class="col-md-12">
                                            <input id="'.$i.'2" name="'.$i.'2" placeholder="Enter option b" class="form-control input-md" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" for="'.$i.'3"></label>  
                                        <div class="col-md-12">
                                            <input id="'.$i.'3" name="'.$i.'3" placeholder="Enter option c" class="form-control input-md" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" for="'.$i.'4"></label>  
                                        <div class="col-md-12">
                                            <input id="'.$i.'4" name="'.$i.'4" placeholder="Enter option d" class="form-control input-md" type="text">
                                        </div>
                                    </div>
                                    <br />
                                    <b>Correct answer</b>:<br />
                                    <select id="ans'.$i.'" name="ans'.$i.'" placeholder="Choose correct answer " class="form-control input-md" >
                                    <option value="a">Select answer for question '.$i.'</option>
                                    <option value="a"> option a</option>
                                    <option value="b"> option b</option>
                                    <option value="c"> option c</option>
                                    <option value="d"> option d</option> </select><br /><br />'; 
                        }
                        echo '<div class="form-group">
                                <label class="col-md-12 control-label" for=""></label>
                                <div class="col-md-12"> 
                                    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
                                </div>
                              </div>

                        </fieldset>
                        </form></div>';
                    }
                ?>

                <?php 
                    if(@$_GET['q']==5 and !(@$_GET['act'])){
                        //VOCABULARY TABLA ELIMINAR-EDITAR
                        $qry = mysqli_query($con,"SELECT * FROM unidades WHERE idclase='$email'") or die('Error');
                        echo  '<center><h4 style="color: #FD7E14; font-size: 35px;  margin-top: 15px;">Vocabulary</h4></center><br> 
                        <div class="panel">
                            <div class="table-responsive style="font-size: 19px;">
                                <table class="table table-striped title1">
                                    <tr style="background: #F5C6CB">
                                        <td><b>N</b></td>
                                        <td><b>Unidad</b></td>
                                        <td><b>Número de preguntas</b></td>
                                        <td><b>Eliminar</b></td>
                                        <td><b>Editar</b></td>
                                    </tr>';
                        $c=1;
                        while($row1 = mysqli_fetch_array($qry)){
                            $idunidad = $row1['idunidades'];
                            $nombreU = $row1['nombre'];
                            $qry2 = mysqli_query($con,"SELECT * FROM vocabulario WHERE idunidades='$idunidad'") or die('Error');
                            $row2 = mysqli_num_rows($qry2);
                            if($row2>0){
                                echo '<tr style="background: #FFEEBA">
                                        <td>'.$c++.'</td>
                                        <td>'.$nombreU.'</td>
                                        <td>'.$row2.'</td>
                                        <td><a title="Delete User" href="funciones.php?action=delete&demail='.$email.'"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg></a></td>
                                        <td><a title="Delete User" href="dashboard.php?q=5&act=voc&idU='.$idunidad.'"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                      </svg></a></td>
                                    </tr>';
                            }                            
                        }
                        $c=0;
                        echo '</table></div></div>';
                        //LISTENING TABLA ELIMINAR-EDITAR
                        $qry = mysqli_query($con,"SELECT * FROM unidades WHERE idclase='$email'") or die('Error');
                        echo  '<center><h4 style="color: #FD7E14; font-size: 35px;  margin-top: 10px;">Listening</h4></center><br> 
                        <div class="panel">
                            <div class="table-responsive style="font-size: 19px;">
                                <table class="table table-striped title1">
                                    <tr style="background: #F5C6CB">
                                        <td><b>N</b></td>
                                        <td><b>Unidad</b></td>
                                        <td><b>Número de preguntas</b></td>
                                        <td><b>Eliminar</b></td>
                                        <td><b>Editar</b></td>
                                    </tr>';
                        $c2=1;
                        while($row1 = mysqli_fetch_array($qry)){
                            $idunidad = $row1['idunidades'];
                            $nombreU = $row1['nombre'];
                            $qry2 = mysqli_query($con,"SELECT * FROM listening WHERE idunidades='$idunidad'") or die('Error');
                            $row2 = mysqli_num_rows($qry2);
                            if($row2>0){
                                echo '<tr style="background: #FFEEBA">
                                        <td>'.$c2++.'</td>
                                        <td>'.$nombreU.'</td>
                                        <td>'.$row2.'</td>
                                        <td><a title="Delete User" href="funciones.php?action=delete&demail='.$email.'"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg></td>
                                        <td><a title="Delete User" href="funciones.php?action=delete&demail='.$email.'"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                  </svg></a></td>
                                    </tr>';
                            }                            
                        }
                        $c2=0;
                        echo '</table></div></div>';
                    }
                ?>

                <?php 
                    if(@$_GET['q']==5 && @$_GET['act'] == 'voc'){
                        $idunidad = @$_GET['idU'];
                        $query = "SELECT * FROM unidades WHERE idunidades = '$idunidad' and idclase = '$email'";
                        $result = mysqli_query($con,$query) or die(mysql_error());
                        $extraido = mysqli_fetch_array($result);
                        $rows = mysqli_num_rows($result);    
                        //VOCABULARY
                        if($rows == 1){
                            $nombreunidad = $extraido['nombre'];
                            $nombreunidad = mb_strtoupper($nombreunidad);
                            echo  '<center>
                                <h4 style="font-family: Poppins;  margin-bottom: 20px;">VOCABULARY - '.$nombreunidad.'</h4>
                            </center>
                            <div class="panel">
                                <div class="table-responsive style="font-size: 19px;">
                                    <table class="table table-striped title1">
                                        <tr style="background: #F5C6CB"><td><b>N</b></td>
                                        <td><b>Imagen</b></td>
                                        <td><b>Respuesta</b></td>
                                        <td><b>Eliminar</b></td>
                                        </tr>';
                            $qry2 = mysqli_query($con,"SELECT * FROM vocabulario WHERE idunidades='$idunidad'") or die('Error');
                            $c = 1;
                            while($row1 = mysqli_fetch_array($qry2)){
                                $answer = $row1['respuesta'];
                                $idvoc = $row1['idvocabulario'];
                                echo '<tr style="background: #FFEEBA">
                                        <td>'.$c++.'</td>
                                        <td><img src="data:image/jpeg;base64,'.base64_encode($row1['imagen'] ).'" height="100px" >&nbsp&nbsp&nbsp&nbsp<a title="Delete User" href="dashboard.php?q=5&act=editimage&idU='.$idunidad.'&idV='.$idvoc.'"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg></a></td>
                                        <td>'.$answer.'&nbsp&nbsp <a title="Delete User" href="dashboard.php?q=5&act=editanswer&idU='.$idunidad.'&idV='.$idvoc.'"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg></a></td>
                                        <td><a title="Delete question" href="funciones.php?action=deletevoc&demail='.$email.'"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg></a></td>
                                    </tr>'; 
                                
                            }
                            $c = 0;
                            echo '</table></div></div>';
                        }                        
                    }
                ?>
                <?php 
                    if(@$_GET['q']==5 && @$_GET['act'] == 'editanswer'){
                        $idunidad = @$_GET['idU'];
                        $idvoc = @$_GET['idV'];
                        echo '<div class="row">
                        <div class="col-md-3"></div><div class="col-md-6" style="margin-top:50px;">
                        <center><h4 style="color: #0069D9;  margin-bottom: 20px;">Editar Vocabulary</h4></center><br>    
                        <form class="form-horizontal title1" autocomplete="off" name="form" action=""  method="POST" enctype="multipart/form-data">
                            <fieldset>
                                
                                <div class="form-group">
                                    <label class="col-md-12 control-label" for="name"></label>  
                                    <div class="col-md-12" style="margin-top:10px;">
                                        <input id="answer" name="answer" placeholder="Ingrese la Respuesta.." class="form-control input-md" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 control-label" for=""></label>
                                    <div class="col-md-12" style="margin-top:10px;"> 
                                        <input  type="submit" name="submit" style="margin-left:37%; font-family:Poppins; width:150px;" class="btn btn-primary" value="Aceptar" class="btn btn-primary"/>
                                    </div>
                                </div>

                            </fieldset>
                        </form></div>';

                        if(isset($_POST['submit'])){
                            if($_POST['answer']==""){
                                echo "<center><h3><script>alert('Por favor llene el campo');</script></h3></center>";
                            }else{
                                $answer = $_POST['answer'];
                                $qry="UPDATE vocabulario SET respuesta='$answer' WHERE (idvocabulario = '$idvoc')";
                                $result=mysqli_query($con,$qry);
                                if($result){
                                    echo '<center><div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong> ¡Pregunta editada correctamente!</strong>
                                  </div></center>';
                                    echo '<script type="text/javascript">
                                        window.location = "dashboard.php?q=5&act=voc&idU='.$idunidad.'";
                                        </script>';                                
                                }else{
                                    echo " error ";
                                }
                            }
                        }                                               
                    }
                ?>

                <?php 
                    if(@$_GET['q']==5 && @$_GET['act'] == 'editimage'){
                        $idunidad = @$_GET['idU'];
                        $idvoc = @$_GET['idV'];
                        echo '<div class="row">
                        <div class="col-md-3"></div><div class="col-md-6" style="margin-top:50px;">
                        <center><h4 style="  color: #0069D9; margin-bottom: 20px;">Editar Vocabulary</h4></center><br>    
                        <form class="form-horizontal title1" autocomplete="off" name="form" action=""  method="POST" enctype="multipart/form-data">
                            <fieldset>
                                
                                <div class="form-group">
                                    <label class="col-md-12 control-label" for="name"></label>  
                                    <div class="col-md-12">
                                        <laber class="file">
                                        <input type="file" name="image" id="file aria-label="File browser example">
                                        <span class="file-custom"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 control-label" for=""></label>
                                    <div class="col-md-12" style="margin-top:10px;"> 
                                        <input  type="submit" name="submit" style="margin-left:37%; font-family:Poppins; width:150px;" class="btn btn-primary" value="Aceptar" class="btn btn-primary"/>
                                    </div>
                                </div>

                            </fieldset>
                        </form></div>';

                        if(isset($_POST['submit'])){
                            if(getimagesize($_FILES['image']['tmp_name'])==FALSE){
                                echo '<center><div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Error: </strong> ¡Falta llenar el campo!
                              </div></center>';
                            }else{
                                $image = $_FILES['image']['tmp_name'];
                                $image = addslashes(file_get_contents($image));
                                $qry="UPDATE vocabulario SET imagen='$image' WHERE (idvocabulario = '$idvoc')";
                                $result=mysqli_query($con,$qry);
                                if($result){
                                    echo '<center><div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong> ¡Pregunta editada correctamente!</strong>
                                  </div></center>'
;
                                    //header("refresh:0;url=dashboard.php?q=5&act=voc&idU='$idunidad'");
                                    //echo("<script>location.href=dashboard.php?q=5&act=voc&idU='$idunidad'");
                                    echo '<script type="text/javascript">
                                        window.location = "dashboard.php?q=5&act=voc&idU='.$idunidad.'";
                                        </script>';                                
                                }else{
                                    echo " error ";
                                }
                            }
                        }                                               
                    }
                ?>
                <?php
                    if(@$_GET['q'] == 6 and !@$_GET['step']){
                        $sql = "SELECT *  FROM unidades WHERE idClase='$email'";
                    //$result = mysqli_query($con,$sql);
                   
                    echo '<center><h4 style=" color: #FD7E14; font-size: 35px; margin-bottom: 20px;margin-top: 20px;"> Seleccione una Unidad </h4>';
                    if($result = mysqli_query($con,$sql)){
                        while($mostrar=mysqli_fetch_array($result)){
                        $unidad = $mostrar['nombre'];
                        $id = $mostrar['idunidades'];
                        echo '<div class="col-md-6">
                                        <a href="dashboard.php?q=6&step=1&idU='.$id.'" style="text-decoration:none;">
                                            <div class="vocabulary" style="background: white; font-size: 20px; color: #24B2F6; text-align:center; text-transform: uppercase;"><h4>'.$unidad.'</h4></div>  
                                        </a>
                                    
                                </div>';                
                        }
                                               
                        }else{
                        echo '<div class="col-md-6">
                                        <div class="vocabulary" style="background: white; font-size: 20px; font-family:Poppins; text-align:center; text-transform: uppercase;">                               
                                            NO EXISTEN UNIDADES CREADAS
                                        </div></a>
                                    
                                </div>
                        ';
                        }
                    }
                ?>
                <?php
                    if(@$_GET['q'] == 6 and @$_GET['step']==1){
                        $idU = @$_GET['idU'];
                        $sql = "SELECT *  FROM temas WHERE idunidad='$idU'";
                    //$result = mysqli_query($con,$sql);
                   
                    echo '<center><h4 style=" color: #FD7E14; font-size: 35px; margin-bottom: 20px;margin-top: 20px;"> Seleccione un Tema </h4>';
                    if($result = mysqli_query($con,$sql)){
                        while($mostrar=mysqli_fetch_array($result)){
                        $tema = $mostrar['nombre'];
                        $id = $mostrar['idtemas'];
                        echo '<div class="col-md-6">
                                        <a href="dashboard.php?q=6&step=2&idT='.$id.'" style="text-decoration:none;"><div class="vocabulary" style="background: white; color: #24B2F6; font-size: 20px; text-align:center; text-transform: uppercase;">                               
                                            <h4>'.$tema.'</h4>
                                        </div></a>
                                </div>';                
                        }                    
                        }else{
                        echo '<div class="col-md-6">
                                        <div class="vocabulary" style="background: white; font-size: 20px; font-family:Poppins; text-align:center; text-transform: uppercase;">                               
                                            NO EXISTEN UNIDADES CREADAS
                                        </div></a>
                                    </div>
                                </div>
                        ';
                        }
                    }
                ?>
                <?php
                    if(@$_GET['q'] == 6 and @$_GET['step']==2){ 
                        $idT=@$_GET['idT'];                                 
                        echo '<center><h4 style=" color: #0069D9; margin-bottom: 20px;margin-top: 20px;"> Crear Lección </h4>
                        <div class="col-md-3"></div><div class="col-md-6" style="margin-top:50px;">   
                        <form class="form-horizontal title1" name="form" action="#"  method="POST" enctype="multipart/form-data">
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-12 control-label" for="name"></label>  
                                    <div class="col-md-12">
                                        <laber class="file">
                                        <input type="file" name="image" id="file aria-label="File browser example" required>
                                        <span class="file-custom"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 control-label" for="name"></label>  
                                    <div class="col-md-12" style="margin-top:10px;">
                                        <input id="answer" autocomplete="off" name="descripcion" placeholder="Ingrese la Descripción.." class="form-control input-md" type="text" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 control-label" for="name"></label>  
                                    <div class="col-md-12" style="margin-top:10px;">
                                        <input id="answer" autocomplete="off" name="definicion" placeholder="Ingrese la Definición.." class="form-control input-md" type="text" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 control-label" for=""></label>
                                    <div class="col-md-12" style="margin-top:10px;"> 
                                        <input  type="submit" name="submit" style=" font-family:Poppins; width:150px;" class="btn btn-primary" value="Crear" class="btn btn-primary"/>
                                    </div>
                                </div>

                            </fieldset>
                        </form></div>';
                    
                    
                        if(isset($_POST['submit'])){                            
                            if(getimagesize($_FILES['image']['tmp_name'])){
                                $image = $_FILES['image']['tmp_name'];
                                $image = addslashes(file_get_contents($image));
                                $descripcion = $_POST['descripcion'];
                                $definicion = $_POST['definicion'];
                                $qry="insert into lecciones (imagen,descripcion,definicion,idTema) values ('$image','$descripcion','$definicion','$idT')";
                                $result=mysqli_query($con,$qry);
                                if($result){
                                    echo '<center><div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong> ¡Lección creada correctamente!</strong>
                                  </div></center>'
;
                                }else{
                                    echo " error ";
                                }
                            }                           
                            
                        }
                    }
                ?>
                <?php
                    if(@$_GET['q'] == 7 and !@$_GET['step'] and !@$_GET['act']){
                        $sql = "SELECT *  FROM unidades WHERE idClase='$email'";
                        //$result = mysqli_query($con,$sql);
                   
                    echo '<center><h4 style=" color: #FD7E14; font-size: 35px; margin-bottom: 20px;margin-top: 20px;"> Seleccione una Unidad </h4>';
                    if($result = mysqli_query($con,$sql)){
                        while($mostrar=mysqli_fetch_array($result)){
                        $unidad = $mostrar['nombre'];
                        $id = $mostrar['idunidades'];
                        echo ' <div class="col-md-6">
                                        <a href="dashboard.php?q=7&step=1&idU='.$id.'" style="text-decoration:none;">
                                            <div class="vocabulary" style="background: white; font-size: 20px; color: #24B2F6; text-align:center; text-transform: uppercase;"><h4>'.$unidad.'</h4></div>
                                        </a>
                                </div>    ';                
                        }
                                              
                        }else{
                        echo '<div class="col-md-6">
                                        <div class="vocabulary" style="background: white; font-size: 20px; font-family:Poppins; text-align:center; text-transform: uppercase;">                               
                                            NO EXISTEN UNIDADES CREADAS
                                        </div></a>
                                </div>';
                        }
                    }
                ?>

                <?php
                    if(@$_GET['q'] == 7 and @$_GET['step']==1){
                        //Lecciones 
                        $idU = @$_GET['idU'];
                        $qry = mysqli_query($con,"SELECT * FROM temas WHERE idunidad='$idU'") or die('Error');
                        echo  '<center><h4 style=" color: #24B2F6; font-size: 35px; margin-bottom: 20px;margin-top: 20px;"> Lecciones </h4><br> 
                                <div class="panel">
                                    <div class="table-responsive">
                                        <table class="table table-striped title1">
                                            <tr style="background: #F5C6CB">
                                                <td><b>N</b></td>
                                                <td><b>Temas</b></td>
                                                <td><b>Número de enunciados</b></td>
                                                <td><b>Eliminar</b></td>
                                                <td><b>Editar</b></td>
                                            </tr>';
                        $c=1;
                        while($row1 = mysqli_fetch_array($qry)){
                            $idtema = $row1['idtemas'];
                            $nombreT = $row1['nombre'];
                            $qry2 = mysqli_query($con,"SELECT * FROM lecciones WHERE idtema='$idtema'") or die('Error');
                            $row2 = mysqli_num_rows($qry2);
                            if($row2>0){
                                echo '<tr style="background: #FFEEBA">
                                        <td>'.$c++.'</td>
                                        <td>'.$nombreT.'</td>
                                        <td>'.$row2.'</td>
                                        <td><a title="Delete Vocabulary" href="funciones.php?action=delete&demail='.$email.'"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg></a></td>
                                        <td><a title="Edit Vocabulary" href="dashboard.php?q=7&act=lec&idT='.$idtema.'"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg></a></td>
                                    </tr>';
                            }                            
                        }
                        $c=0;
                        echo '</table></div></div>';
                    }
                ?>


                <?php 
                    if(@$_GET['q']==7 && @$_GET['act'] == 'lec'){                        
                        $idtema = @$_GET['idT'];
                        $query = "SELECT * FROM temas WHERE idtemas = '$idtema' ";
                        $result = mysqli_query($con,$query) or die(mysql_error());
                        $extraido = mysqli_fetch_array($result);
                        $rows = mysqli_num_rows($result);    
                        //VOCABULARY
                        if($rows == 1){
                            $nombretema = $extraido['nombre'];
                            $nombretema = mb_strtoupper($nombretema);
                            echo  '<center><h4 style=" color: #0069D9; margin-bottom: 20px;">LECCIÓNES - '.$nombretema.'</h4></center>
                                        <div class="panel">
                                            <div class="table-responsive">
                                                <table class="table table-striped title1">
                                                    <tr style="background: #F5C6CB">
                                                        <td><b>N</b></td>
                                                        <td><b>Imagen</b></td>
                                                        <td><b>Descripción</b></td>
                                                        <td><b>definicion</b></td>
                                                        <td><b>Eliminar</b></td>
                                                    </tr>';
                            $qry2 = mysqli_query($con,"SELECT * FROM lecciones WHERE idTema='$idtema'") or die('Error');
                            $c = 1;
                            while($row1 = mysqli_fetch_array($qry2)){
                                $descripcion = $row1['descripcion'];
                                $definicion = $row1['definicion'];
                                $idLeccion = $row1['idLeccion'];
                                echo '<tr style="background: #FFEEBA">
                                        <td>'.$c++.'</td>
                                        <td><img src="data:image/jpeg;base64,'.base64_encode($row1['imagen'] ).'" height="100px" >&nbsp&nbsp&nbsp&nbsp<a title="Delete User" href="dashboard.php?q=7&aa=lec&act=editimage&idL='.$idLeccion.'&idT='.$idtema.'"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg></td>
                                        <td>'.$descripcion.'&nbsp&nbsp<a title="Delete User" href="dashboard.php?q=7&aa=lec&act=editdesc&idL='.$idLeccion.'&idT='.$idtema.'"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg> </td>
                                        <td>'.$definicion.'&nbsp&nbsp<a title="Delete User" href="dashboard.php?q=7&aa=lec&act=editdefi&idL='.$idLeccion.'&idT='.$idtema.'"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg> </td>
                                        <td><a title="Delete question" href="funciones.php?action=deletevoc&demail='.$email.'"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg></a></td>
                                    </tr>';
                                }
                            $c = 0;
                            echo '</table></div></div>';
                        }                        
                    }
                ?>
                <?php 
                    if(@$_GET['q']==7 && @$_GET['act'] == 'editdesc' and @$_GET['aa'] == 'lec'){                        
                        $idleccion = @$_GET['idL'];
                        $idtema = @$_GET['idT'];
                        echo '<div class="row">
                        <div class="col-md-3"></div><div class="col-md-6" style="margin-top:50px;">
                        <center><h4 style="font-family: Poppins;  margin-bottom: 20px;">EDITAR LECCIÓN</h4></center><br>    
                        <form class="form-horizontal title1" name="form" action=""  method="POST" enctype="multipart/form-data">
                            <fieldset>
                                
                                <div class="form-group">
                                    <label class="col-md-12 control-label" for="name"></label>  
                                    <div class="col-md-12" style="margin-top:10px;">
                                        <input id="answer" name="answer" placeholder="Ingrese la Respuesta" class="form-control input-md" type="text" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 control-label" for=""></label>
                                    <div class="col-md-12" style="margin-top:10px;"> 
                                        <input  type="submit" name="submit" style="margin-left:37%; font-family:Poppins; width:150px;" class="btn btn-primary" value="Editar" class="btn btn-primary"/>
                                    </div>
                                </div>

                            </fieldset>
                        </form></div>';

                        if(isset($_POST['submit'])){
                            if($_POST['answer']==""){
                                echo '<center><div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Error: </strong> ¡Falta llenar el campo!
                              </div></center>';
                            }else{
                                $answer = $_POST['answer'];
                                $qry="UPDATE lecciones SET descripcion='$answer' WHERE (idLeccion = '$idleccion')";
                                $result=mysqli_query($con,$qry);
                                if($result){
                                    echo '<center><div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong> ¡Pregunta editada correctamente!</strong>
                                  </div></center>';
                                    echo '<script type="text/javascript">
                                        window.location = "dashboard.php?q=7&act=lec&idT='.$idtema.'";
                                        </script>';                                
                                }else{
                                    echo " error ";
                                }
                            }
                        }
                        
                                                                        
                    }
                ?>

                <?php 
                    if(@$_GET['q']==7 && @$_GET['act'] == 'editdefi' and @$_GET['aa'] == 'lec'){                        
                        $idleccion = @$_GET['idL'];
                        $idtema = @$_GET['idT'];
                        echo '<div class="row">
                        <div class="col-md-3"></div><div class="col-md-6" style="margin-top:50px;">
                        <center><h4 style="font-family: Poppins;  margin-bottom: 20px;">EDITAR LECCIÓN</h4></center><br>    
                        <form class="form-horizontal title1" name="form" action=""  method="POST" enctype="multipart/form-data">
                            <fieldset>
                                
                                <div class="form-group">
                                    <label class="col-md-12 control-label" for="name"></label>  
                                    <div class="col-md-12" style="margin-top:10px;">
                                        <input id="answer" name="answer" placeholder="Ingrese la Respuesta" class="form-control input-md" type="text" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 control-label" for=""></label>
                                    <div class="col-md-12" style="margin-top:10px;"> 
                                        <input  type="submit" name="submit" style="margin-left:37%; font-family:Poppins; width:150px;" class="btn btn-primary" value="Editar" class="btn btn-primary"/>
                                    </div>
                                </div>

                            </fieldset>
                        </form></div>';

                        if(isset($_POST['submit'])){
                            if($_POST['answer']==""){
                                echo '<center><div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Error: </strong> ¡Falta de llenar el campo!
                              </div></center>';
                            }else{
                                $answer = $_POST['answer'];
                                $qry="UPDATE lecciones SET definicion='$answer' WHERE (idLeccion = '$idleccion')";
                                $result=mysqli_query($con,$qry);
                                if($result){
                                    echo '<center><div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong> ¡Pregunta editada correctamente!</strong>
                                  </div></center>'
;
                                    echo '<script type="text/javascript">
                                        window.location = "dashboard.php?q=7&act=lec&idT='.$idtema.'";
                                        </script>';                                
                                }else{
                                    echo " error ";
                                }
                            }
                        }
                        
                                                                        
                    }
                ?>

                <?php 
                    if(@$_GET['q']==7 && @$_GET['act'] == 'editimage' and @$_GET['aa'] == 'lec'){                       
                        $idleccion = @$_GET['idL'];
                        $idtema = @$_GET['idT'];
                        echo '<div class="row">
                        <div class="col-md-3"></div><div class="col-md-6" style="margin-top:50px;">
                        <center><h4 style="font-family: Poppins;  margin-bottom: 20px;">EDITAR LECCION</h4></center><br>    
                        <form class="form-horizontal title1" name="form" action=""  method="POST" enctype="multipart/form-data">
                            <fieldset>
                                
                                <div class="form-group">
                                    <label class="col-md-12 control-label" for="name"></label>  
                                    <div class="col-md-12">
                                        <laber class="file">
                                        <input type="file" name="image" id="file aria-label="File browser example" required>
                                        <span class="file-custom"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 control-label" for=""></label>
                                    <div class="col-md-12" style="margin-top:10px;"> 
                                        <input  type="submit" name="submit" style="margin-left:37%; font-family:Poppins; width:150px;" class="btn btn-primary" value="Editar" class="btn btn-primary"/>
                                    </div>
                                </div>

                            </fieldset>
                        </form></div>';

                        if(isset($_POST['submit'])){
                            if(getimagesize($_FILES['image']['tmp_name'])==FALSE){
                                echo '<center><div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Error: </strong> ¡Falta de llenar el campo!
                              </div></center>';
                            }else{
                                $image = $_FILES['image']['tmp_name'];
                                $image = addslashes(file_get_contents($image));
                                $qry="UPDATE lecciones SET imagen='$image' WHERE (idLeccion = '$idleccion')";
                                $result=mysqli_query($con,$qry);
                                if($result){
                                    echo '<center><div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong> Pregunta editada correctamente!</strong>
                                  </div></center>';
                                    //header("refresh:0;url=dashboard.php?q=5&act=voc&idU='$idunidad'");
                                    //echo("<script>location.href=dashboard.php?q=5&act=voc&idU='$idunidad'");
                                    echo '<script type="text/javascript">
                                        window.location = "dashboard.php?q=7&act=lec&idT='.$idtema.'";
                                        </script>';                                
                                }else{
                                    echo " error ";
                                }
                            }
                        }
                                                                       
                    }
                ?>

                </div>
            </main>
        </div>
    </div>
</body>
</html>
