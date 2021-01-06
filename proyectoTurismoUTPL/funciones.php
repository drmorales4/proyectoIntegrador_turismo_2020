<?php
  include_once 'database.php';
  session_start();
  $email=$_SESSION['email'];
  $rol=$_SESSION['rol'];

  
    if((@$_GET['demail']) && ($rol == 'Admin') && ($_GET['action'] == 'delete')){
      $demail=@$_GET['demail'];
      //$r1 = mysqli_query($con,"DELETE FROM rank WHERE email='$demail' ") or die('Error');
      //$r2 = mysqli_query($con,"DELETE FROM history WHERE email='$demail' ") or die('Error');
      $result = mysqli_query($con,"DELETE FROM user WHERE email='$demail' ") or die('Error');
      header("location:administrador.php?q=1");
    }
    if((@$_GET['demail']) && ($rol == 'Admin') && ($_GET['action'] == 'changerol')){
      $demail=@$_GET['demail'];
      $newrol=@$_GET['newrol'];
      //$r1 = mysqli_query($con,"DELETE FROM rank WHERE email='$demail' ") or die('Error');
      //$r2 = mysqli_query($con,"DELETE FROM history WHERE email='$demail' ") or die('Error');
      $result = mysqli_query($con,"UPDATE user SET rol='$newrol' WHERE email='$demail' ") or die('Error');
      header("location:administrador.php?q=1");
    }
    if((@$_GET['nombre']) && ($rol == 'Docente') && ($_GET['action'] == 'deleteunidad')){
      $nombre=@$_GET['nombre'];
      //$r1 = mysqli_query($con,"DELETE FROM rank WHERE email='$demail' ") or die('Error');
      //$r2 = mysqli_query($con,"DELETE FROM history WHERE email='$demail' ") or die('Error');
      $result = mysqli_query($con,"DELETE FROM unidades WHERE nombre='$nombre' and idclase='$email' ") or die('Error');
      header("location:dashboard.php?q=2");
    }    
    if((@$_GET['nombre']) && ($rol == 'Docente') && ($_GET['action'] == 'redirect')){
      $nombre=@$_GET['nombre'];
      //$r1 = mysqli_query($con,"DELETE FROM rank WHERE email='$demail' ") or die('Error');
      //$r2 = mysqli_query($con,"DELETE FROM history WHERE email='$demail' ") or die('Error');
      $result = mysqli_query($con,"SELECT idunidades FROM unidades WHERE nombre='$nombre' and idclase='$email' ") or die('Error en la consulta');
      $data = mysqli_fetch_all($result);
      $idU = $data[0][0];
      header("location:dashboard.php?q=2&step=1&idU=".$idU."");
    }
    if((@$_GET['nombre']) && ($rol == 'Docente') && ($_GET['action'] == 'deletevoc')){
      $nombre=@$_GET['nombre'];
      //$r1 = mysqli_query($con,"DELETE FROM rank WHERE email='$demail' ") or die('Error');
      //$r2 = mysqli_query($con,"DELETE FROM history WHERE email='$demail' ") or die('Error');
      $result = mysqli_query($con,"DELETE FROM unidades WHERE nombre='$nombre' and idclase='$email' ") or die('Error');
      header("location:dashboard.php?q=2");
    }    

?>



