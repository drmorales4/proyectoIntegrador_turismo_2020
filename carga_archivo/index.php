<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Procesando el archivo enviado</title>
<style type="text/css">
*{ font-family:Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, sans-serif}
.main{ margin:auto; border:1px solid #D5D5D5; width:50%; text-align:left; padding:30px; background:##898989}
input[type=submit]{ background:#6ca16e; width:100%;
    padding:5px 15px; 
    background:#ccc; 
    cursor:pointer;
	font-size:16px;
   
}
table td{ padding:5px;}
</style>
</head>
<body bgcolor="#E1E1E1">
	<a href="subida.php">ir a subir archivo </a>
		<?php
			include("dll/config.php");
			include("dll/class_mysqli_7.php");
			$miconexion = new clase_mysqli7;
			$miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
			$miconexion->consulta("select * from archivos");
		?>
		<div>
			<table>
				<thead>
					<tr>
						<th>ID</th>
						<th>NOMBRE DE ARCHIVO</th>
						<th>DESCRIPCION O MOTIVO</th>
						<th>ACCIONES</th>
					</tr>
				</thead>
				<tbody>
					<?php while($filas=$miconexion->consulta_lista()){

					?>
					<tr>
						<td><?php echo $filas[0] ?></td>
						<td><?php echo $filas[1] ?></td>
						<td><?php echo $filas[2] ?></td>
						<td><form method="post" action="verExel.php">
							<input type="radio" name="opcion" value="1">Descargar
							<input type="radio" name="opcion" value="2">Eliminar
							<input type="radio" name="opcion" value="<?= $filas[1] ?>" >Revisar y cargar a BD el archivo
							<button type="submit" class="btnGuardar">Hacer</button>
							</form>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</body>
</hrml>


