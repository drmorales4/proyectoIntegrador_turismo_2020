<?php
    include_once 'database.php';
    require_once "exelLibreria/vendor/autoload.php";
    include("dll/config.php");
    include("dll/class_mysqli_7.php");
    use PhpOffice\PhpSpreadsheet\IOFactory;
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
        $idUser = $_SESSION['id'];    
        include_once 'database.php';
    }
    if(($_SESSION["rol"] == "Usuario")){
        session_destroy();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link  rel="stylesheet" href="css/estilos-admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js"  type="text/javascript"></script>
    
</head>

<body>
    <nav class="navbar navbar-dark sticky-top flex-md-nowrap p-0">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href=""><h3>Bienvenido a la Administración</h3></a>
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
                    
                    <li <?php if(@$_GET['q']==0) echo'class="nav-link"'; ?>><a href="administrador.php?q=0" style="font-family: 'Roboto', sans-serif; font-size: 20px;"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                        </svg> Home Administrador</a>
                    </li>
                    <li <?php if(@$_GET['q']==1) echo'class="nav-link"'; ?>><a href="administrador.php?q=1" style="font-family: 'Roboto', sans-serif; font-size: 20px;"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-dash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M11 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM1.022 13h9.956a.274.274 0 0 0 .014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 0 0 .022.004zm9.974.056v-.002.002zM6 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm2 2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
                        </svg> Gestionar Usuarios</a>
                    </li>
                    <li <?php if(@$_GET['q']==3) echo'class="nav-link"'; ?>><a href="administrador.php?q=3" style="font-family: 'Roboto', sans-serif; font-size: 20px;"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M11 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM1.022 13h9.956a.274.274 0 0 0 .014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 0 0 .022.004zm9.974.056v-.002.002zM6 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm4.5 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                        <path fill-rule="evenodd" d="M13 7.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0v-2z"/>
                        </svg>  Crear Usuario</a>
                    </li>
                   <li <?php if(@$_GET['q']==4) echo'class="nav-link"'; ?>><a href="administrador.php?q=4" style="font-family: 'Roboto', sans-serif; font-size: 20px;"><svg width="1.4em" height="1.4em" viewBox="0 0 16 16" class="bi bi-plus-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                        <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        </svg> Subir Archivo</a>
                    </li>

                    <li <?php if(@$_GET['q']==5) echo'class="nav-link"'; ?>><a href="administrador.php?q=5" style="font-family: 'Roboto', sans-serif; font-size: 20px;"><svg width="1.4em" height="1.4em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"/>
                        <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z"/>
                        </svg> Revisión Archivos</a>
                    </li>

                    <li <?php if(@$_GET['q']==6) echo'class="nav-link"'; ?>><a href="administrador.php?q=6" style="font-family: 'Roboto', sans-serif; font-size: 20px;"><svg width="1.4em" height="1.4em" viewBox="0 0 16 16" class="bi bi-plus-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                        <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        </svg> Añadir hotel</a>
                    </li>

                    <li <?php if(@$_GET['q']==7) echo'class="nav-link"'; ?>><a href="administrador.php?q=7" style="font-family: 'Roboto', sans-serif; font-size: 20px;"><svg width="1.4em" height="1.4em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"/>
                        <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z"/>
                        </svg> Revisión Hotel</a>
                    </li>
                    <li <?php if(@$_GET['q']==8) echo'class="nav-link"'; ?>><a href="administrador.php?q=8" style="font-family: 'Roboto', sans-serif; font-size: 20px;"><svg width="1.4em" height="1.4em" viewBox="0 0 16 16" class="bi bi-plus-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                        <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        </svg> Añadir Lugar</a>
                    </li>

                    <li <?php if(@$_GET['q']==9) echo'class="nav-link"'; ?>><a href="administrador.php?q=9" style="font-family: 'Roboto', sans-serif; font-size: 20px;"><svg width="1.4em" height="1.4em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"/>
                        <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z"/>
                        </svg> Revisión Lugar</a>
                    </li>
                    
                    </ul>
                </div>
            </nav>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                
                <div class="col-md-12">
                    
                    <?php if(@$_GET['q']==0){
                        echo '<h1 style="color: #FD7E14;">Bienvenido '.$name.' '.$apellidos.'</h1>
                    <h2>Este es el panel de control, en el lado izquierdo tienes algunas opciones.</h2>';
                    }                
                    ?>

                    <?php 
                        if(@$_GET['q']==1){ 

                    $result = mysqli_query($con,"SELECT * FROM user") or die('Error');
                        echo '<center><h3 style="color: #FD7E14; font-size: 35px;">Lista de Usuarios</h3>
                        <nav class="navbar navbar-light bg-light">
                            
                        </nav>
                                </center>

                        <div class="panel">
                                <table class="table">
                                <thead class="thead">
                                <tr style="background: #FFFFFF">
                                    <th><b>Nombre</b></th>
                                    <th><b>Apellido</b></th>
                                    <th><b>Correo</b></th>
                                    <th><b>Rol</b></th><th>
                                    <b>Eliminar</b></th>
                                </tr>
                                </thead>
                                <tbody>';
                        
                        while($row = mysqli_fetch_array($result))  
                        {
                            $name = $row['nombres'];
                            $apellido = $row['apellidos'];
                            $email = $row['email'];
                            $rol = $row['rol'];
                            
                            echo '
                                <tr style="background: #FFFFFF">
                                    <th>'.$name.'</th>
                                    <th>'.$apellido.'</th>
                                    <th>'.$email.'</th>
                                    <th>'.$rol.'</th>
                                    <th><a title="Delete User" href="funciones.php?action=delete&demail='.$email.'"><b><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg>Eliminar</b></a></th>
                                </tr>';
                        }
                        
                        echo '</tbody>
                        </table>
                        </div>
                        </div>';
                   
                }
                    ?>

                    <?php
                        if(@$_GET['q']==3){
                            echo '

                            <div class="row">
                            <div class="col-md-3"></div><div class="col-md-6" style="margin-top:10px;">
                            <center><h4 style="font-family: Poppins;  margin-bottom: 20px;">CREAR USUARIOS Y ADMINISTRADORES</h4></center><br>   
                            <form class="form-horizontal title1" name="form" action="#"  method="POST" enctype="multipart/form-data">
                                <fieldset>
                                    <div class="form-group">
                                                <labe style="font-family: Poppins;">Nombres:</label>
                                                <input type="text" name="nombres" class="form-control" required />
                                            </div>
                                            <div class="form-group">
                                                <labe style="font-family: Poppins;">Apellidos:</label>
                                                <input type="text" name="apellidos" class="form-control" required />
                                            </div>
                                            <div class="form-group">
                                                <label style="font-family: Poppins;">Correo:</label>
                                                <input type="email" name="email" class="form-control" required />
                                            </div>
                                            <div class="form-group">
                                                <label style="font-family: Poppins;">Contraseña:</label>
                                                <input type="password" name="password" class="form-control" required />
                                            </div>   
                                            <div class="form-group">
                                                <label style="font-family: Poppins;">Seleccione el tipo de usuario:</label>
                                                <input type="radio" onclick="RadioCheck(true)" name="rol" class="" id="Usuario" value ="Usuario" required />
                                                <label style="font-family: Poppins;">Usuario/Invitado</label>
                                                <input type="radio" onclick="RadioCheck(false)" name="rol" class="" id="Admin" value ="Admin" required />
                                                <label style="font-family: Poppins;">Administrador</label>
                                            </div>
                                            
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" for=""></label>
                                        <div class="col-md-12" style="margin-top:10px;"> 
                                            <input  type="submit" name="submit" style="margin-left:37%; font-family:Poppins; width:150px;" class="btn btn-primary" value="Crear" class="btn btn-primary"/>
                                        </div>
                                    </div>

                                </fieldset>
                            </form></div>
                            <script>
                                function RadioCheck(isYes){
                                    document.getElementById("insertclase")
                                    if(isYes){
                                        document.getElementById("insertclase").style.display = "block";
                                    }else{
                                        document.getElementById("insertclase").style.display = "none";
                                    }
                                }
                            </script>
                            ';                    
                        
                            if(isset($_POST['submit'])){
                                $nombres = $_POST['nombres'];
                                $nombres = stripslashes($nombres);
                                $nombres = addslashes($nombres);

                                $apellidos = $_POST['apellidos'];
                                $apellidos = stripslashes($apellidos);
                                $apellidos = addslashes($apellidos);

                                $email = $_POST['email'];
                                $email = stripslashes($email);
                                $email = addslashes($email);

                                $password = $_POST['password'];
                                $password = stripslashes($password);
                                $password = addslashes($password);

                                $rol = stripslashes($_REQUEST['rol']);
                                $rol = mysqli_real_escape_string($con,$rol);

                                $str="SELECT email from user WHERE email='$email'";
                                $result=mysqli_query($con,$str);
            
                                if((mysqli_num_rows($result))>0){
                                    echo '<center><div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Error: </strong> ¡El correo no esta disponible!
                                  </div></center>';
                                }
                                else{
                                    $str="insert into user set nombres='$nombres',apellidos='$apellidos',email='$email',password='$password',rol='$rol'";
                                    if($rol=="Usuario" or $rol=="Admin"){
                                        if((mysqli_query($con,$str))){   
                                        echo '<center><div class="alert alert-success alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong> ¡Usuario registrado correctamente!</strong>
                                      </div></center>';
                                        }
                                    }
                                    
                                }
                            }
                        }
                    ?>
                    <?php
                        if(@$_GET['q']==4){

                        echo 
                        '
                            <div class="row">
                                <div class="col-md-3"></div><div class="col-md-6" style="margin-top:10px;">
                                <center><h4 style="font-family: Poppins;  margin-bottom: 20px;">SUBIR ARCHIVOS</h4></center><br> 
                                <form enctype="multipart/form-data" action="configSubida.php" method="POST">
                                    <input type="hidden" name="idUser" value= "'.$idUser.'" />
                                    <input type="hidden" name="MAX_FILE_SIZE" value="480800" />
                                    <p> Escoja un archivo (tamaño maximo:450kb) 
                                    <input name="subir_archivo" type="file" accept=".xlsx, .csv, .xls" required/></p>
                                    <label>Descripcion de archivo</label>
                                    <input type="text" name="descripcion" required><hr>
                                    <p> <input type="submit" value="Enviar Archivo" /></p>
                                </form></div>

                            ';
                            /*
                            if(isset($_POST["submit"])){
                            }
                            */
                        }
                    ?>
                    <?php 
                        if(@$_GET['q']==5){
                            $miconexion2 = new clase_mysqli7;
                            $miconexion2->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
                            $miconexion2->consulta("select * from archivos");
                            $consultaUser = new clase_mysqli7;
                            $consultaUser->conectar(DBHOST, DBUSER, DBPASS, DBNAME);

                            echo '<center><h3 style="color: #FD7E14; font-size: 35px;">Lista de archivos</h3>
                            <nav class="navbar navbar-light bg-light">
                                
                            </nav>
                                    </center>

                            <div class="panel">
                                    <table class="table">
                                    <thead class="thead">
                                    <tr style="background: #FFFFFF">
                                        <th><b>NOMBRE DE ARCHIVO</b></th>
                                        <th><b>DESCRIPCION O MOTIVO</b></th>
                                        <th><b>SUBIDO POR</b></th>
                                        <th><b>Duplicados</b></th>
                                        <th><b>Correctos</b></th>
                                        <th><b>ELIMINAR</b></th>
                                    </tr>
                                    </thead>
                                    <tbody>';
                            
                            while($row = $miconexion2->consulta_lista())  
                            {
                                $name = $row[1];
                                $descripcion = $row[2];
                                $consultaUser->consulta("select concat(nombres, ' ',apellidos) from user where idUser =$row[4]");
                                $usernames = $consultaUser->consulta_lista();
                                $datosDuplicados = $row[5];
                                $datosNoDuplicados = $row[6];
                                echo '
                                    <tr style="background: #FFFFFF">
                                        <th>'.$name.'</th>
                                        <th>'.$descripcion.'</th>
                                        <th> '.$usernames[0].' </th>
                                        <th> '.$datosDuplicados.' </th>
                                        <th> '.$datosNoDuplicados.' </th>
                                        <th><a title="Delete Archivo" href="funciones.php?action=deletearchivo&archivo='.$name.'"><b><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                            </svg>Eliminar</b></a>
                                        </th>
                                    </tr>';
                            }
                            
                            echo '</tbody>
                            </table>
                            </div>
                            </div>';
                   
                            
                        }
                    ?>
                    <?php
                        if(@$_GET['q']==6){
                            echo '

                            <div class="row">
                            <div class="col-md-3"></div><div class="col-md-6" style="margin-top:10px;">
                            <center><h4 style="font-family: Poppins;  margin-bottom: 20px;">CREAR HOTEL</h4></center><br>   
                            <form class="form-horizontal title1" name="form" action="#"  method="POST" enctype="multipart/form-data">
                                <fieldset>
                                    <div class="form-group">
                                        <labe style="font-family: Poppins;">Nombre de establecimiento:</label>
                                        <input type="text" name="nombre" class="form-control" required />
                                    </div>
                                    <div class="form-group">
                                        <labe style="font-family: Poppins;">Descripción:</label>
                                        <input type="text" name="descripcion" class="form-control" required />
                                    </div>
                                    <div class="form-group">
                                        <labe style="font-family: Poppins;">Seleccione una imagen:</label>
                                            <input type="hidden" name="idUser" value= "'.$idUser.'" />
                                            <input type="hidden" name="MAX_FILE_SIZE" value="5480800" />
                                            <input name="subir_archivo" type="file" accept=".png, .jpg, .jpen" required/></p>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" for=""></label>
                                        <div class="col-md-12" style="margin-top:10px;"> 
                                            <input  type="submit" name="submit" style="margin-left:37%; font-family:Poppins; width:150px;" class="btn btn-primary" value="Crear" class="btn btn-primary"/>
                                        </div>
                                    </div>
                                    
                                </fieldset>
                            </form></div>
                            <script>
                                function RadioCheck(isYes){
                                    document.getElementById("insertclase")
                                    if(isYes){
                                        document.getElementById("insertclase").style.display = "block";
                                    }else{
                                        document.getElementById("insertclase").style.display = "none";
                                    }
                                }
                            </script>
                            ';                    
                        
                            if(isset($_POST['submit'])){
                                $nombreEst = $_POST['nombre'];
                                $nombreEst = stripslashes($nombreEst);
                                $nombreEst = addslashes($nombreEst);

                                $descripcionEst = $_POST['descripcion'];
                                $descripcionEst = stripslashes($descripcionEst);
                                $descripcionEst = addslashes($descripcionEst);

                                $idUserEst = $_POST['idUser'];
                                $idUserEst = stripslashes($idUserEst);
                                $idUserEst = addslashes($idUserEst);

                                $directorio = 'internas/hotelImages/';
                                $nombreFileEst = $_FILES['subir_archivo']['name'];
                                $subir_archivo = $directorio.$nombreFileEst;
                                if (move_uploaded_file($_FILES['subir_archivo']['tmp_name'], $subir_archivo)) {
                                    echo "El archivo es válido y se cargó correctamente.<br><br>";
                                    $strEst="insert into hoteles set id='',nombre='$nombreEst',descripcion='$descripcionEst',idUser='$idUser',archivo='$nombreFileEst'";
                                    if((mysqli_query($con,$strEst))){   
                                    echo '<center><div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong> ¡Hotel registrado correctamente!</strong>
                                      </div></center>';
                                        }
                                }else {
                                    echo "La subida ha fallado, Archivo sobrepasa el tamaño máximo ";
                                }
                            }
                        }
                    ?>
                    <?php
                        if(@$_GET['q']==7){
                            $miconexionEst = new clase_mysqli7;
                            $miconexionEst->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
                            $miconexionEst->consulta("select * from hoteles");
                            $consultaUserEst = new clase_mysqli7;
                            $consultaUserEst->conectar(DBHOST, DBUSER, DBPASS, DBNAME);

                            echo '<center><h3 style="color: #FD7E14; font-size: 35px;">Lista de hoteles</h3>
                            <nav class="navbar navbar-light bg-light">
                                
                            </nav>
                                    </center>

                            <div class="panel">
                                    <table class="table">
                                    <thead class="thead">
                                    <tr style="background: #FFFFFF">
                                        <th><b>NOMBRE DE HOTEL</b></th>
                                        <th><b>DESCRIPCION</b></th>
                                        <th><b>SUBIDO POR</b></th>
                                        <th><b>ELIMINAR</b></th>
                                    </tr>
                                    </thead>
                                    <tbody>';
                            
                            while($row = $miconexionEst->consulta_lista())  
                            {
                                $nameEst = $row[1];
                                $descripcionEst = $row[2];
                                $archivoEst = $row[4];
                                $consultaUserEst->consulta("select concat(nombres, ' ',apellidos) from user where idUser =$row[3]");
                                $usernamesEst = $consultaUserEst->consulta_lista();
                                echo '
                                    <tr style="background: #FFFFFF">
                                        <th>'.$nameEst.'</th>
                                        <th>'.$descripcionEst.'</th>
                                        <th> '.$usernamesEst[0].' </th>
                                        <th><a title="Delete Archivo" href="funciones.php?action=deletearchivoEst&archivo='.$archivoEst.'"><b><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                            </svg>Eliminar</b></a>
                                        </th>
                                    </tr>';
                            }
                            
                            echo '</tbody>
                            </table>
                            </div>
                            </div>';
                        }
                    ?>
                    <?php
                        if(@$_GET['q']==8){
                            echo '

                            <div class="row">
                            <div class="col-md-3"></div><div class="col-md-6" style="margin-top:10px;">
                            <center><h4 style="font-family: Poppins;  margin-bottom: 20px;">CREAR LUGAR TURÍSTICO</h4></center><br>   
                            <form class="form-horizontal title1" name="form" action="#"  method="POST" enctype="multipart/form-data">
                                <fieldset>
                                    <div class="form-group">
                                        <labe style="font-family: Poppins;">Nombre de establecimiento:</label>
                                        <input type="text" name="nombre" class="form-control" required />
                                    </div>
                                    <div class="form-group">
                                        <labe style="font-family: Poppins;">Descripción:</label>
                                        <input type="text" name="descripcion" class="form-control" required />
                                    </div>
                                    <div class="form-group">
                                        <labe style="font-family: Poppins;">Seleccione una imagen:</label>
                                            <input type="hidden" name="idUser" value= "'.$idUser.'" />
                                            <input type="hidden" name="MAX_FILE_SIZE" value="5480800" />
                                            <input name="subir_archivo" type="file" accept=".png, .jpg, .jpen" required/></p>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" for=""></label>
                                        <div class="col-md-12" style="margin-top:10px;"> 
                                            <input  type="submit" name="submit" style="margin-left:37%; font-family:Poppins; width:150px;" class="btn btn-primary" value="Crear" class="btn btn-primary"/>
                                        </div>
                                    </div>
                                    
                                </fieldset>
                            </form></div>
                            <script>
                                function RadioCheck(isYes){
                                    document.getElementById("insertclase")
                                    if(isYes){
                                        document.getElementById("insertclase").style.display = "block";
                                    }else{
                                        document.getElementById("insertclase").style.display = "none";
                                    }
                                }
                            </script>
                            ';                    
                        
                            if(isset($_POST['submit'])){
                                $nombreLug = $_POST['nombre'];
                                $nombreLug = stripslashes($nombreLug);
                                $nombreLug = addslashes($nombreLug);

                                $descripcionLug = $_POST['descripcion'];
                                $descripcionLug = stripslashes($descripcionLug);
                                $descripcionLug = addslashes($descripcionLug);

                                $idUserLug = $_POST['idUser'];
                                $idUserLug = stripslashes($idUserLug);
                                $idUserLug = addslashes($idUserLug);

                                $directorioLug = 'internas/lugaresImages/';
                                $nombreFileLug = $_FILES['subir_archivo']['name'];
                                $subir_archivo = $directorioLug.$nombreFileLug;
                                if (move_uploaded_file($_FILES['subir_archivo']['tmp_name'], $subir_archivo)) {
                                    echo "El archivo es válido y se cargó correctamente.<br><br>";
                                    $strLug="insert into lugares set id='',nombre='$nombreLug',descripcion='$descripcionLug',idUser='$idUserLug',archivo='$nombreFileLug'";
                                    if((mysqli_query($con,$strLug))){   
                                    echo '<center><div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong> ¡Hotel registrado correctamente!</strong>
                                      </div></center>';
                                        }
                                }else {
                                    echo "La subida ha fallado, Archivo sobrepasa el tamaño máximo ";
                                }
                            }
                        }
                    ?>
                    <?php
                        if(@$_GET['q']==9){
                            $miconexionLug = new clase_mysqli7;
                            $miconexionLug->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
                            $miconexionLug->consulta("select * from lugares");
                            $consultaUserLug = new clase_mysqli7;
                            $consultaUserLug->conectar(DBHOST, DBUSER, DBPASS, DBNAME);

                            echo '<center><h3 style="color: #FD7E14; font-size: 35px;">Lista de lugares turísticos</h3>
                                    <nav class="navbar navbar-light bg-light">
                                    </nav>
                                    </center>

                                    <div class="panel">
                                            <table class="table">
                                            <thead class="thead">
                                            <tr style="background: #FFFFFF">
                                                <th><b>NOMBRE DE LUGAR</b></th>
                                                <th><b>DESCRIPCION</b></th>
                                                <th><b>SUBIDO POR</b></th>
                                                <th><b>ELIMINAR</b></th>
                                            </tr>
                                            </thead>
                                            <tbody>';
                            
                            while($row = $miconexionLug->consulta_lista())  
                            {
                                $nameLug = $row[1];
                                $descripcionLug = $row[2];
                                $archivoLug = $row[4];
                                $consultaUserLug->consulta("select concat(nombres, ' ',apellidos) from user where idUser =$row[3]");
                                $usernamesLug = $consultaUserLug->consulta_lista();
                                echo '
                                    <tr style="background: #FFFFFF">
                                        <th>'.$nameLug.'</th>
                                        <th>'.$descripcionLug.'</th>
                                        <th> '.$usernamesLug[0].' </th>
                                        <th><a title="Delete Archivo" href="funciones.php?action=deletearchivoLug&archivo='.$archivoLug.'"><b><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                            </svg>Eliminar</b></a>
                                        </th>
                                    </tr>';
                            }
                            
                            echo '</tbody>
                            </table>
                            </div>
                            </div>';
                        }
                    ?>
                </div>
            </main>
        </div>
    </div>
    
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
