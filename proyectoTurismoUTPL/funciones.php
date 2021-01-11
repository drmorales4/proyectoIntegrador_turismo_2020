<?php
  include_once 'database.php';
  session_start();
  $email=$_SESSION['email'];
  $rol=$_SESSION['rol'];

  
    if((@$_GET['demail']) && ($rol == 'Admin') && ($_GET['action'] == 'delete')){
      $demail=@$_GET['demail'];
      $result = mysqli_query($con,"DELETE FROM user WHERE email='$demail' ") or die('Error');
      header("location:administrador.php?q=1");
    }
    if((@$_GET['demail']) && ($rol == 'Admin') && ($_GET['action'] == 'changerol')){
      $demail=@$_GET['demail'];
      $newrol=@$_GET['newrol'];
      $result = mysqli_query($con,"UPDATE user SET rol='$newrol' WHERE email='$demail' ") or die('Error');
      header("location:administrador.php?q=1");
    }

    if((@$_GET['archivo']) && ($rol == 'Admin') && ($_GET['action'] == 'deletearchivo')){
      $archivo=@$_GET['archivo'];
      $result = mysqli_query($con,"DELETE FROM archivos WHERE nombre='$archivo'") or die('Error');
      header("location:administrador.php?q=4");
    }

    if((@$_GET['nombre']) && ($rol == 'Usuario') && ($_GET['action'] == 'deletearchivo')){
      $archivo=@$_GET['archivo'];
      $result = mysqli_query($con,"DELETE FROM archivos WHERE nombre='$archivo'") or die('Error');
      $result = mysqli_query($con,"DELETE FROM registros WHERE archivo='$archivo'") or die('Error');
      header("location:administrador.php?q=4");
    }

?>



