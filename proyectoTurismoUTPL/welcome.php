<?php
    include_once 'database.php';
    session_start();
    if(!(isset($_SESSION['email'])) )
    {
        header("location:login.php");
    }
    else
    {
        $name = $_SESSION['nombres'];
        $email = $_SESSION['email'];
        $idclase = $_SESSION['idclase'];
        include_once 'database.php';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenido</title>    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <link  rel="stylesheet" href="css/estilos-welcome.css">
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js"  type="text/javascript"></script>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Learn English</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li <?php if(@$_GET['q']==1) echo'class="nav-item active"'; ?>>
                    <a class="nav-link" href="welcome.php?q=1">Inicio</a>
                </li>
                <li <?php if(@$_GET['q']==4) echo'class="nav-item active"'; ?>> 
                    <a class="nav-link" href="welcome.php?q=4">Actividades</a>
                </li>
               <!-- <li <?php //if(@$_GET['q']==2) echo'class="nav-item active"'; ?>> 
                    <a class="nav-link" href="welcome.php?q=2">Historial</a>
                </li> -->
                
                
            </ul>
            <span class="navbar-text">
                <a class="nav-link" href="logout.php?q=welcome.php">Cerrar Sesión</a>
            </span>
        </div>        
    </nav>
    
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="sidebar-sticky pt-3">
                    <ul class="nav flex-column">
                    <h4>Weekly Recourse</h4>
                    <center>
                        <li class="nav-link"><iframe width="260" height="195" src="https://www.youtube.com/embed/QeVaK8lDzkQ" ></iframe></li>
                    </center>
                    <!--<h4>Tasks</h4>
                    <center>
                        <li <?php if(@$_GET['q']==3) echo'class="nav-link"'; ?>><a href="administrador.php?q=3" style="font-family: Poppins;">Crear Usuarios</a></li>
                    </center>-->
                    
                                                      
                    
                    
                    </ul>
                </div>
            </nav>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                <div class="col-md-12">
                    <?php if(@$_GET['q']==1){
                        $sql = ("SELECT * FROM unidades WHERE unidades.idclase = '$idclase' ");
                        $result = mysqli_query($con,$sql);
                        
                        while($row = mysqli_fetch_array($result)) {
                            $unidad = $row['nombre'];
                            $id = $row['idunidades'];

                            echo '<div class="list-group">
                                <a href="" class="list-group-item list-group-item-action active"> '.$unidad.' </a>
                                </div>';
                            
                            
                            $sql2 = ("SELECT * FROM temas WHERE temas.idunidad = '$id'"); 
                            $result2 = mysqli_query($con,$sql2);

                            while($mostrar2 = mysqli_fetch_array($result2)){
                                $tema = $mostrar2['nombre'];
                                $idu = $mostrar2['idtemas'];

                                $sql3 = ("SELECT idLeccion FROM lecciones WHERE idTema = '$idu'");
                                $result3 = mysqli_query($con,$sql3);
                                $rows = mysqli_num_rows($result3);

                                echo '<a href="lecciones.php?q=1&idT='.$idu.'&nr=1&t='.$rows.'" class="list-group-item list-group-item-action"> '.$tema.' 
                                         
                                      </a>
                                    ';
                            }
                        }
                    }?>

                    <?php
                        if(@$_GET['q']== 'quiz' && @$_GET['step']== 2) 
                        {
                            $eid=@$_GET['eid'];
                            $sn=@$_GET['n'];
                            $total=@$_GET['t'];
                            $q=mysqli_query($con,"SELECT * FROM questions WHERE eid='$eid' AND sn='$sn' " );
                            echo '<div class="panel" style="margin:5%">';
                            while($row=mysqli_fetch_array($q) )
                            {
                                $qns=$row['qns'];
                                $qid=$row['qid'];
                                echo '<b>Pregunta &nbsp;'.$sn.'&nbsp;::<br /><br />'.$qns.'</b><br /><br />';
                            }
                            $q=mysqli_query($con,"SELECT * FROM options WHERE qid='$qid' " );
                            echo '<form action="update.php?q=quiz&step=2&eid='.$eid.'&n='.$sn.'&t='.$total.'&qid='.$qid.'" method="POST"  class="form-horizontal">
                            <br />';

                            while($row=mysqli_fetch_array($q) )
                            {
                                $option=$row['option'];
                                $optionid=$row['optionid'];
                                echo'<input type="radio" name="ans" value="'.$optionid.'">&nbsp;'.$option.'<br /><br />';
                            }
                            echo'<br /><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp;Enviar</button></form></div>';
                        }

                        if(@$_GET['q']== 'result' && @$_GET['eid']) 
                        {
                            $eid=@$_GET['eid'];
                            $q=mysqli_query($con,"SELECT * FROM history WHERE eid='$eid' AND email='$email' " )or die('Error157');
                            echo  '<div class="panel">
                            <center><h1 class="title" style="color:#660033">Result</h1><center><br /><table class="table table-striped title1" style="font-size:20px;font-weight:1000;">';

                            while($row=mysqli_fetch_array($q) )
                            {
                                $s=$row['score'];
                                $w=$row['wrong'];
                                $r=$row['sahi'];
                                $qa=$row['level'];
                                echo '<tr style="color:#66CCFF"><td>Total Questions</td><td>'.$qa.'</td></tr>
                                    <tr style="color:#99cc32"><td>right Answer&nbsp;<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></td><td>'.$r.'</td></tr> 
                                    <tr style="color:red"><td>Wrong Answer&nbsp;<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></td><td>'.$w.'</td></tr>
                                    <tr style="color:#66CCFF"><td>Score&nbsp;<span class="glyphicon glyphicon-star" aria-hidden="true"></span></td><td>'.$s.'</td></tr>';
                            }
                            $q=mysqli_query($con,"SELECT * FROM rank WHERE  email='$email' " )or die('Error157');
                            while($row=mysqli_fetch_array($q) )
                            {
                                $s=$row['score'];
                                echo '<tr style="color:#990000"><td>Overall Score&nbsp;<span class="glyphicon glyphicon-stats" aria-hidden="true"></span></td><td>'.$s.'</td></tr>';
                            }
                            echo '</table></div>';
                        }
                    ?>

                    <?php
                        if(@$_GET['q']== 2) 
                        {
                            $q=mysqli_query($con,"SELECT * FROM history WHERE email='$email' ORDER BY date DESC " )or die('Error197');
                            echo  '<div class="panel title">
                            <table class="table table-striped title1" >
                            <tr style="color:black;"><td><center><b>S.N.</b></center></td><td><center><b>Tema</b></center></td><td><center><b>Preguntas resueltas</b></center></td><td><center><b>Aciertos</b></center></td><td><center><b>Fallos<b></center></td><td><center><b>Score</b></center></td>';
                            $c=0;
                            while($row=mysqli_fetch_array($q) )
                            {
                            $eid=$row['eid'];
                            $s=$row['score'];
                            $w=$row['wrong'];
                            $r=$row['sahi'];
                            $qa=$row['level'];
                            $q23=mysqli_query($con,"SELECT title FROM quiz WHERE  eid='$eid' " )or die('Error208');

                            while($row=mysqli_fetch_array($q23) )
                            {  $title=$row['title'];  }
                            $c++;
                            echo '<tr><td><center>'.$c.'</center></td><td><center>'.$title.'</center></td><td><center>'.$qa.'</center></td><td><center>'.$r.'</center></td><td><center>'.$w.'</center></td><td><center>'.$s.'</center></td></tr>';
                            }
                            echo'</table></div>';
                        }

                        if(@$_GET['q']== 3) 
                        {
                            $q=mysqli_query($con,"SELECT * FROM rank ORDER BY score DESC " )or die('Error223');
                            echo  '<div class="panel title"><div class="table-responsive">
                            <table class="table table-striped title1" >
                            <tr style="color:#176287"><td><center><b>Rank</b></center></td><td><center><b>Nombre</b></center></td><td><center><b>Correo</b></center></td><td><center><b>Score</b></center></td></tr>';
                            $c=0;

                            while($row=mysqli_fetch_array($q) )
                            {
                                $e=$row['email'];
                                $s=$row['score'];
                                $q12=mysqli_query($con,"SELECT * FROM user WHERE email='$e' " )or die('Error231');
                                while($row=mysqli_fetch_array($q12) )
                                {
                                    $name=$row['name'];
                                }
                                $c++;
                                echo '<tr><td style="color:black"><center><b>'.$c.'</b></center></td><td><center>'.$name.'</center></td><td><center>'.$e.'</center></td><td><center>'.$s.'</center></td></tr>';
                            }
                            echo '</table></div></div>';
                        }
                    ?>
                    <?php
                    if(@$_GET['q']==4 && !(@$_GET['step'])){
                        //$idclase = $_SESSION['idclase'];
                        
                        $sql = "SELECT * FROM unidades WHERE idclase='$idclase'";
                        $result = mysqli_query($con,$sql);

                        

                        while($mostrar=mysqli_fetch_array($result)){
                            $unidad = $mostrar['nombre'];
                            $id = $mostrar['idunidades'];
                            
                            echo '
                            
                            <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action active">'.$unidad.'</a>
                            <a href="#" class="list-group-item list-group-item-action" style=" font-size: 20px;">Flash Card</a>                        
                            <a href="Vocabulary.php?q=1&idU='.$id.'" class="list-group-item list-group-item-action"style=" font-size: 20px;">Vocabulary</a>
                            <a href="Listening.php?q=1&idU='.$id.'" class="list-group-item list-group-item-action"style=" font-size: 20px;">Listening</a>
                            
                            
                            ';         
                        }                      
                    }
                    ?>
                    <?php
                        if(@$_GET['q']==4 && (@$_GET['step'])== 2) 
                        {
                            $idU=@$_GET['idU'];
                            echo '<div class="row"><span class="title1" style="margin-left:40%;font-size:30px;color:black;"><b>ACTIVIDADES</b></span><br /><br />
                            <div class="col-md-3"></div><div class="col-md-6">   
                            
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" for="name"></label>  
                                        <div class="col-md-12">
                                            <a href="Vocabulary.php?q=1&idU='.$idU.'" style="text-decoration:none;"><div class="vocabulary" style="background: white; font-size: 20px; font-family:Poppins; text-align:center;">
                                                <img src="https://cdn3.iconfinder.com/data/icons/education-180/64/x-23-512.png" height="100px";>
                                                VOCABULARY
                                            </div></a>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12 control-label" for="total"></label>  
                                        <div class="col-md-12">
                                            <a href="Listening.php?q=1&idU='.$idU.'" style="text-decoration:none;"><div class="vocabulary" style="background: white; font-size: 20px; font-family:Poppins; text-align:center;">
                                                <img src="https://cdn3.iconfinder.com/data/icons/thin-school-learning/24/thin-1355_hearing_ear_listening_audio-512.png" height="100px";>
                                                LISTENING
                                            </div></a>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12 control-label" for="right"></label>  
                                        <div class="col-md-12">
                                            <a href="#" style="text-decoration:none;"><div class="vocabulary" style="background: white; font-size: 20px; font-family:Poppins; text-align:center;">
                                                <img src="https://cdn2.iconfinder.com/data/icons/the-joy-of-light-pi-maths-game/100/Maths-2-33-512.png" height="100px";>
                                                FLASHCARDS
                                            </div></a>
                                        </div>
                                    </div>                                
                                </fieldset>
                            </div>';
                        }
                   ?>
         </main>        
</body>
</html>