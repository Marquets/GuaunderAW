<?php
	session_start();
	echo $_SESSION['nick'];
	if(isset($_SESSION['id']) and $_SESSION['estado'] == 'Autenticado'){
		if($_SESSION['nick']!='admin')
			header("Location: pagPrincipal.php");
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset = "utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Formulario Editar</title>
	<link rel="icon" href="img/icono.png">
	<link rel="stylesheet" type="text/css" href="css/cssPrincipal.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>
	<script src="js/jquery-3.2.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>


</head>
<body>

	<div class="container-fluid">
		<div class = "row">
			<div class="col-md-4 col-sm-3 col-xs-2"></div>
			<div class="col-md-4 col-sm-6 col-xs-8">
				<div class="panel panel-default">
					<div class="panel-heading">Editar</div>
					<div id="caja" class="panel-body">
						<div class="center-block">
							<form id="formulario" name="formulario" action="editarusuarios.php" class="form" method="post">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
										</div>
										<?php echo '<input type="text" class="form-control" id="nick" placeholder="Pon tu nuevo nick" name="nick" value="'.$_GET['nick'].'" />';
										?>
									</div>
								</div>
								<br>
								<div class="form-group">
									<br>
									<div class="input-group">
										<div class="input-group-addon">
												<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
										</div>
									<?php echo '<input id ="mail" type="text" class="form-control" placeholder="Pon tu nuevo mail" name="mail" value="'.$_GET['email'].'" />';
									?>
									</div>
								</div>
								<br>
								<div class="form-group">
									<br>
									<div class="input-group">
										<div class="input-group-addon">
											<span class="glyphicon glyphicon-fire" aria-hidden="true"></span>
										</div>
									<?php echo	'<input type="text" class="form-control" id="usuario" placeholder="Pon nuevo nombre de usuario" name="usuario" value="'.$_GET['nombre'].'" />';
									?>
									</div>
								</div>
								<br>
								<div class="form-group">
									<label>Fecha de nacimiento</label>
									<div class="input-group">
										<div class="input-group-addon">
											<span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
										</div>
									<?php echo	'<input type="date" class="form-control" id="fecha" name="fecha" value="'.$_GET['fecha_nacimiento'].'"/>';
									?>
									</div>
								</div>
								<br>
								<br>
								<input type="submit" class="btn btn-success" value="Confirmar" id="registrarse" name="registrarse" />
								<br>
								<!-- Linkear a inicio de sesión -->
								<!--<a  id = "link_inicio" href=""> Iniciar Sesión </a>-->
							</form>
							<?php
							$db = @mysqli_connect('localhost','root','root','guaunder');
							if ($db) {
								$nick = $_GET['nick'];
								if(isset($_POST["nick"])) {
									$sql=" UPDATE usuario SET nick_us = '$nick' WHERE nick_us = '$nick'";
									$consulta = mysqli_query($db, $sql);
								}
								if(isset($_POST["nick"])) {
									$email = $_POST["email"];
									$sql=" UPDATE usuario SET email = '$email' WHERE nick_us = '$nick'";
									$consulta = mysqli_query($db, $sql);
								}
								if(isset($_POST["nombre"])) {
									$nombre = $_POST["nombre"];
									$sql=" UPDATE usuario SET nombre_us = '$nombre' WHERE nick_us = '$nick'";
									$consulta = mysqli_query($db, $sql);
								}
								if(isset($_POST["fecha_nacimiento"])) {
									$fecha = $_POST["fecha_nacimiento"];
									$sql=" UPDATE usuario SET fecha_nacimiento = '$fecha' WHERE nick_us = '$nick'";
									$consulta = mysqli_query($db, $sql);
								}
								if (isset($_POST['nick'])) {
									header("Location: usuariosregistrados.php");
								}
							}
							?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 col-xs-2"></div>
		</div>
	</div>

	<div id="footer"></div>

	<script>
		$(function(){
			$( "#footer" ).load('footer.html');
		});
	</script>
	<script src="js/validar_registro.js"></script>

</body>
</html>