<?php
	include("database.php");
	
	
	if(isset($_POST['submit']))
	{	
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

		$str="SELECT email from user WHERE email='$email'";
		$result=mysqli_query($con,$str);
		
		if((mysqli_num_rows($result))>0)	
		{
            echo '<center><div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>Error: </strong> ¡El correo no esta disponible!
		  </div></center>';
        }
		else
		{
            $str="insert into user set nombres='$nombres',apellidos='$apellidos',email='$email',password='$password',rol='Estudiante'";
			if((mysqli_query($con,$str))){
				echo '<center><div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong> ¡Usuario registrado correctamente!</strong>
			  </div></center>';
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
		<title>Register</title>
		<link rel="stylesheet" href="css/form.css">
		<link rel="stylesheet" href="scripts/bootstrap/bootstrap.min.css">
		<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
		<link  rel="stylesheet" href="css/estilos-registro.css"/>
	</head>

	<body>
		<section class="login first grey" style="padding-top: 50px;">
			<div class="container">
				<div class="box-wrapper">				
					<div class="box">
						<div class="box-body">
							<center> <h4 style="font-family: Poppins; margin-bottom: 10px;">Registro </h4></center><br>
							<form method="post" action="register.php" enctype="multipart/form-data">
                                <div class="form-group">
									<labe style="font-family: Poppins;">Nombres:</label>
									<input type="text" autocomplete="off" name="nombres" class="form-control" required />
								</div>
								<div class="form-group">
									<labe style="font-family: Poppins;">Apellidos:</label>
									<input type="text" autocomplete="off" name="apellidos" class="form-control" required />
								</div>
								<div class="form-group">
									<label style="font-family: Poppins;">Correo:</label>
									<input type="email" autocomplete="off" name="email" class="form-control" required />
								</div>
								<div class="form-group">
									<label style="font-family: Poppins;">Contraseña:</label>
									<input type="password" autocomplete="off" name="password" class="form-control" required />
                                </div>
                                <div class="form-group">
									<label style="font-family: Poppins;">Correo del docente asignado:</label>
									<input type="email" autocomplete="off" name="idclase" class="form-control" required />
								</div>                                
								<div class="form-group text-right">
									<button class="btn btn-primary btn-block" name="submit" style="font-family: Poppins;">Registrar</button>
								</div>
								<div class="form-group text-center">
									<span class="text-muted" style="font-family: Poppins;">¡Ya tengo una cuenta! </span> <a href="login.php" style="font-family: Poppins;">Iniciar sesión</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>

		<script src="js/jquery.js"></script>
	</body>
</html>