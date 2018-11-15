<!DOCTYPE html>
<html>
<head>
	<title>Memeflix</title>
</head>
<body background="fondo5.jpg">
	<a href="Login.php">cerrar sesion</a>
	<center>

		<form action="#" method="POST">
			<input type="type" name="nombrePeli" id="nombrePeli" placeholder="Calificar Pelicula ">
			<input type="type" name="calificacion" id="calificacion" placeholder="Votar 1-5 ">
			<input type="submit" name="calificar" id="calificar">

		</form>
		<table border="2" width="550px" bordercolor="#E55334" cellspacing="10" cellpadding="10">
			<thead>
				<tr>
					<th>Nombre</th>
					
					<th>Caratula</th>
				</tr>	

			</thead>
			<tbody>
				<?php
					$sql = "";
					include("Config.php");
					$idxu = $_GET['correo'];
					$sql = "select * from peliculas pel, calificaciones cal where cal.calificacion is null
					and pel.id = cal.id_pelicula;";
					/*$sql = "SELECT * FROM peliculas as pl WHERE pl.id NOT IN (SELECT p.id
					FROM calificaciones as c,
	 				usuarios as u,
	 				peliculas as p 
    				WHERE c.id_usuario = u.id 
    				and c.id_pelicula = p.id
    				and u.id = '$idxu')
					LIMIT 15;";*/

					$res = mysqli_query($conexion, $sql);


					while($row = $res->fetch_assoc()){
				?>

					<tr>
						<td bgcolor="#3F71B0" align="center"><?php echo $row['nombre'] ?></td>
						
						<td bgcolor="#F66A6A">< <img height="75px" src="data:image/jpg;base64, <?php  echo base64_encode($row['foto']);?>"/></td>
					</tr>

				<?php

					}
				?>
			</tbody>

		</table>

	</center>
</body>
</html>

<?php
	if(isset($_POST['calificar'])){
		include("Config.php");
		$iddd = $_GET['correo'];
		$peli = $_POST['nombrePeli'];
		$voto = $_POST['calificacion'];
		$idPe = 0;

		if(is_numeric($voto)){

		$idu = "SELECT pel.id FROM peliculas pel, calificaciones cal
		where cal.id_usuario = '$iddd' and pel.nombre = '$peli';";

		$result = mysqli_query($conexion, $idu);
      	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      	$active = $row['active'];
      
      	$count = mysqli_num_rows($result);
      
      	$peliId = $row['id'];

		
		$sqlupdate = "update calificaciones set calificacion= '$voto' where id_pelicula= '$peliId'; ";
		echo $sqlupdate;

		if(mysqli_query($conexion, $sqlupdate)){
			echo "Calificacion correcta";
		} else {
			echo "error";
		}
	} else {
		echo '<script>alert("Ingrese valor correcto 1-5 su valor fue #")</script>';
	}
	}
?>