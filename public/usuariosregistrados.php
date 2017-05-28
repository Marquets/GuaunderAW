<?php

$db = @mysqli_connect('localhost','root','','guaunder');

if ($_POST[Editar]) {
	
mysql_query("UPDATE usuarios SET email='$email' WHERE id_usuario='$id'");
mysql_query("UPDATE usuarios SET nick_us='$nick_us' WHERE id_usuario='$id'");
mysql_query("UPDATE usuarios SET nombre_us='$nombre_us' WHERE id_usuario='$id'");
mysql_query("UPDATE usuarios SET fecha_creacion='$fecha_creacion' WHERE id_usuario='$id'");
mysql_query("UPDATE usuarios SET ubicacion='$ubicacion' WHERE id_usuario='$id'");
mysql_query("UPDATE usuarios SET clave_us='$clave_us' WHERE id_usuario='$id'");
mysql_query("UPDATE usuarios SET foto_perfil='$foto_perfil' WHERE id_usuario='$id'");
mysql_query("UPDATE usuarios SET descrpcion='$descrpcion' WHERE id_usuario='$id'");

}

if ($_POST[Borrar]){
	
mysql_query("DELETE FROM usuario WHERE id_usuario='$id'");

}
@mysqli_close($db);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Guaunder</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="img/icono.png">
	<link rel="stylesheet" href="css/cssPrincipal.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery-3.2.0.min.js"></script>
	<script>
		$(document).ready(function(){
			$( "#header" ).load('adminHome.html');
		});
	</script>
</head>
<body>

	<div id="header"></div>
	<form action="usuariosregistrados.php" method="post">


	<div class="container-fluid bloque-admin">
		<div class="row">
			<div class="col-md-2 col-sm-2 col-xs-1"></div>
			<div class="col-md-8 col-sm-8 col-xs-10 table-responsive" >
				<table class="table table-bordered">
					<tr>
						<td><h2>Nick</h2></td>
						<td><h2>Género</h2></td>
						<td><h2>Estado</h2></td>
						<td><h2>Editar/Borrar</h2></td>
					</tr>
					<tr>
						<td>Sabueso2</td>
						<td>M</td>
						<td>Desconectado</td>
						<td> <button type="submit" class="btn btn-warning" value="Editar">
						<span class="glyphicon glyphicon-pencil"></span></button>
						<button type="submit" class="btn btn-danger" value="Borrar">
						<span class="glyphicon glyphicon-remove"></span></button> </td>
					</tr>
					<tr>
						<td>Lucky</td>
						<td>F</td>
						<td>Conectado</td>
						<td> <button type="submit" class="btn btn-warning" value="Editar">
						<span class="glyphicon glyphicon-pencil"></span></button>
						<button type="submit" class="btn btn-danger" value="Borrar">
						<span class="glyphicon glyphicon-remove"></span></button> </td>
					</tr>
					<tr>
						<td>Gordi</td>
						<td>F</td>
						<td>Desconectado</td>
						<td> <button type="submit" class="btn btn-warning" value="Editar">
						<span class="glyphicon glyphicon-pencil"></span></button>
						<button type="submit" class="btn btn-danger" value="Borrar">
						<span class="glyphicon glyphicon-remove"></span></button> </td>
					</tr>
					<tr>
						<td>Rodolfo</td>
						<td>M</td>
						<td>Conectado</td>
						<td> <button type="submit" class="btn btn-warning" value="Editar">
						<span class="glyphicon glyphicon-pencil"></span></button>
						<button type="submit" class="btn btn-danger" value="Borrar">
						<span class="glyphicon glyphicon-remove"></span></button> </td>
					</tr>
					<tr>
						<td>Wolfi</td>
						<td>F</td>
						<td>Desconectado</td>
						<td> <button type="submit" class="btn btn-warning" value="Editar">
						<span class="glyphicon glyphicon-pencil"></span></button>
						<button type="submit" class="btn btn-danger" value="Borrar">
						<span class="glyphicon glyphicon-remove"></span></button> </td>
					</tr>
				</table>

			</div>

			<div class="col-md-2 col-sm-2 col-xs-1 dropdown ">
			<form id="form1" action="consulto.php" method="post">
					<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> Filtrar
				    <span class="caret"></span>
				  	</button>

					<ul class="dropdown-menu">
					<li><a href="">Género</a></li>
					<li><a href="">Estado</a></li>
					</ul>
				<?php

					$db = @mysqli_connect('localhost','root','','guaunder');
					mysql_select_db("ult_conexion",$ult_conexion); 
					mysql_query("SELECT ult_conexion FROM usuario WHERE nick_us='$nick_us'");
					print''.$nick_us['usuario'].''

				?>	
			</div>


		</div>
		<div class="row">
			<div class="col-md-2 col-sm-2 col-xs-1"></div>
				<div class="col-md-8 col-sm-8 col-xs-10">
				<ul class="pager">
					  <li class="previous"><a href="#">&larr; Anterior</a></li>
					  <li><a href="#">1</a></li>
					  <li><a href="#">Pagina X de N</a></li>
					  <li><a href="#">N</a></li>
					  <li class="next"><a href="#">Siguiente &rarr;</a></li>
					</ul>
				</div>
			<div class="col-md-2 col-sm-2 col-xs-1"></div>
		</div>
	</div>

	<script src="js/bootstrap.min.js"></script>
</body>

</html>