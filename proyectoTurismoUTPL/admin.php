<?php
    include_once 'database.php';
    session_start();
    if(isset($_SESSION["email"]))
	{
		session_destroy();
    }
    
    $ref=@$_GET['q'];
    if(isset($_POST['submit']))
	{	
        $email = $_POST['email'];
        $password = $_POST['password'];

        $email = stripslashes($email);
        $email = addslashes($email);
        $password = stripslashes($password); 
        $password = addslashes($password);

        $email = mysqli_real_escape_string($con,$email);
        $password = mysqli_real_escape_string($con,$password);
        
        $result = mysqli_query($con,"SELECT email FROM admin WHERE email = '$email' and password = '$password'") or die('Error');
        $count=mysqli_num_rows($result);
        if($count==1)
        {
            session_start();
            if(isset($_SESSION['email']))
            {
                session_unset();
            }
            $_SESSION["name"] = 'Admin';
            $_SESSION["key"] ='admin';
            $_SESSION["email"] = $email;
            header("location:dashboard.php?q=0");
        }
        else
        {
            echo "<center><h3><script>alert('Usuario o contraseña incorrecto');</script></h3></center>";
            header("refresh:0;url=admin.php");
        }
    }
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Admin Login</title>
        <link rel="stylesheet" href="css/form.css">
		<link rel="stylesheet" href="scripts/bootstrap/bootstrap.min.css">
		<link rel="stylesheet" href="scripts/ionicons/css/ionicons.min.css">
        <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
        <style type="text/css">
            body{
                background: linear-gradient(to bottom,
                rgba(114, 182, 216, .5),
                rgba(47, 48, 58, .3));
                background-attachment: fixed;
                background-position: center;
                background-size: cover;
                }
          </style>
	</head>

	<body>
		<section class="login first grey">
			<div class="container">
				<div class="box-wrapper">				
					<div class="box box-border">
						<div class="box-body">
						<center> <h5 style="font-family: Poppins;">Inicio Sesión </h5><h4 style="font-family: Poppins;">ADMINISTRADOR</h4></center><br>
							<form method="post" action="admin.php" enctype="multipart/form-data">
								<div class="form-group">
									<label style="font-family: Poppins;">Correo electrónico:</label>
									<input type="email" name="email" class="form-control">
								</div>
								<div class="form-group">
									<label class="fw" style="font-family: Poppins;">Contraseña:
										<a href="javascript:void(0)" class="pull-right" style="font-family: Poppins;">¿La olvidaste?</a>
									</label>
									<input type="password" name="password" class="form-control">
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

		<script src="js/jquery.js"></script>
		<script src="scripts/bootstrap/bootstrap.min.js"></script>
	</body>
</html>