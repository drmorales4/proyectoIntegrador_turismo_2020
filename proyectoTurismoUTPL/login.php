<?php
	require('database.php');
	session_start();
	if(isset($_SESSION["email"]))
	{
		session_destroy();
	}
	
	$ref=@$_GET['q'];		
	if(isset($_POST['submit']))
	{	
		$email = $_POST['email'];
		$pass = $_POST['password'];
		$email = stripslashes($email);
		$email = addslashes($email);
		$pass = stripslashes($pass); 
		$pass = addslashes($pass);
		$email = mysqli_real_escape_string($con,$email);
		$pass = mysqli_real_escape_string($con,$pass);					
		$str = "SELECT * FROM user WHERE email='$email' and password='$pass'";
		$result = mysqli_query($con,$str);
		$rows = mysqli_num_rows($result);
		$extraido = mysqli_fetch_array($result);
		if($rows!=1) 
		{
			echo '<center><div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>Error: </strong> ¡Correo o Contraseña incorrectos!
		  </div></center>';
		}
		else{		
			if($extraido['rol']=='Estudiante'){
				$_SESSION['logged']=$email;
				$_SESSION['id']=$extraido[0];
				$_SESSION['nombres']=$extraido[1];
				$_SESSION['apellidos']=$extraido[2];
				$_SESSION['email']=$extraido[3];
				$_SESSION['password']=$extraido[4];
				$_SESSION['rol']=$extraido[5];
				$_SESSION['idclase']=$extraido[6];
				header('location: welcome.php?q=1');
			}elseif($extraido['rol']=='Docente'){
				$_SESSION['logged']=$email;
				$_SESSION['id']=$extraido[0];
				$_SESSION['nombres']=$extraido[1];
				$_SESSION['apellidos']=$extraido[2];
				$_SESSION['email']=$extraido[3];
				$_SESSION['password']=$extraido[4];
				$_SESSION['rol']=$extraido[5];
				$_SESSION['idclase']=$extraido[6];
				header('location: dashboard.php?q=0');
			}elseif($extraido['rol']=='Admin'){
				$_SESSION['logged']=$email;
				$_SESSION['id']=$extraido[0];
				$_SESSION['nombres']=$extraido[1];
				$_SESSION['apellidos']=$extraido[2];
				$_SESSION['email']=$extraido[3];
				$_SESSION['password']=$extraido[4];
				$_SESSION['rol']=$extraido[5];
				header('location: administrador.php?q=1');
			}
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Login</title>
		<link rel="stylesheet" href="css/form.css">
		<link rel="stylesheet" href="scripts/bootstrap/bootstrap.min.css">
		<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="css/styles.css">
		<link  rel="stylesheet" href="css/login-estilos.css"/>
		<link rel="stylesheet" href="css/app.css">
        
	</head>

	<body>
	<header>
        <nav id="nav" class="nav1">
            <div class="contenedor-nav">
                <div class="logo">
                    <img src="images/logo.png">
                </div>
                <div class="enlaces" id="enlaces">
                    <a href="index.html" id="enlace-inicio" class="btn-header">Inicio</a>
                    <a href="internas/hoteles.html" id="enlace-hoteles" class="btn-header">Hoteles</a>
                    <a href="internas/visualizaciones.html" id="enlace-visualizaciones" class="btn-header">Visualizaciones</a>
                    <a href="internas/lugaresTuristicos.html" id="enlace-lugaresTuristicos" class="btn-header">Lugares Turisticos</a>
                    <div class="dropdown">
                        <button class="dropbtn">Sesión
                          <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content">
                          <a href="login.php" id="enlace-inicio-sesion" class="btn-header">Ingresar</a>
                          <a href="register.php" id="enlace-inicio-sesion" class="btn-header">Registarse</a>
                        </div>
                    </div>
                </div>
                <div class="icono" id="open">
                    <span>&#9776;</span>
                </div>
            </div>
        </nav>

    </header>
		<section class="login first grey">
			<div class="container">
				<div class="box-wrapper">				
					<div class="box">
						<div class="box-body">
						<center> <h4 style="font-family: Poppins;">Iniciar Sesión</h4></center><br>
							<form method="post" action="login.php" enctype="multipart/form-data">
								<div class="form-group">
									<label style="font-family: Poppins;">Correo electrónico:</label>
									<input type="email"  name="email" class="form-control">
								</div>
								<div class="form-group">
									<label class="fw" style="font-family: Poppins;">Contraseña:
										<a href="javascript:void(0)" class="pull-right">¿La olvidaste?</a>
									</label>
									<input type="password" autocomplete="off" name="password" class="form-control">
								</div> 
								<div class="form-group text-right">
									<button class="btn btn-primary btn-block" name="submit" style="font-family: Poppins;">Iniciar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>

		<footer class="piePagina">
			<div class="copyright">
				<h4>@Copyright 2020. Universidad Técnica Particular de Loja</h4>
			</div>
			<div class="redesSociales">
				<a href="">
					<img src="images/facebook.svg">
				</a>
				<a href="">
					<img src="images/instagram.svg">
				</a>
				<a href="">
					<img src="images/twitter.svg">
				</a>
				<a href="">
					<img src="images/youtube.svg">
				</a>
			</div>
   		</footer>
		<script src="js/jquery.js"></script>
	</body>

</html>