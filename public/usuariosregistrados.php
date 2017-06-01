
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
						<td><h2>Email</h2></td>
						<td><h2>Última Conexión</h2></td>
						<td><h2>Editar/Borrar</h2></td>
					</tr>
					<?php
					$db = @mysqli_connect('localhost','root','','guaunder');
					if ($db) {
						$sql="SELECT * FROM usuario";
						$consulta = mysqli_query($db, $sql);
						while ($usuario=mysqli_fetch_assoc($consulta)) { ?>
							<tr>
								<td><?php echo $usuario['nick_us']; ?></td>
								<td><?php echo $usuario['email']; ?></td>
								<td><?php echo $usuario['ult_conexion']; ?></td>
								<td><?php echo '<a href="editarusuarios.php?nick='.$usuario['nick_us'].'&nombre='.$usuario['nombre_us'].'&email='$usuario['email'].'&fecha_nacimiento='.$usuario['fecha_nacimiento'].'&contrasenia='.$usuario['contrasenia'].'" role="button" class="btn btn-warning" title="Editar">';?>
								<span class="glyphicon glyphicon-pencil"></span></a>
								<a href="borrarusuario.php" role="button" class="btn btn-danger" title="Borrar">
								<span class="glyphicon glyphicon-remove"></span></a> </td>
							</tr>
						<?php	
						}

					}
					?>
					
				</table>
			</form>	

			</div>

			<div class="col-md-2 col-sm-2 col-xs-1 dropdown ">
					<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> Filtrar
				    <span class="caret"></span>
				  	</button>

					<ul class="dropdown-menu">
					<li><a href="filtrar.php">Conectados Hoy</a></li>
					</ul>
	
			</div>


		</div>

	</div>

	<script src="js/bootstrap.min.js"></script>
</body>

</html>