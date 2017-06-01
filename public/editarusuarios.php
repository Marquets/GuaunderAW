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
										<input type="text" class="form-control" id="nick" placeholder="Pon tu nuevo nick" name="nick" value="" />
									</div>
								</div>
								<br>
								<div class="form-group">
									<br>
									<div class="input-group">
										<div class="input-group-addon">
												<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
										</div>
										<input id ="mail" type="text" class="form-control" placeholder="Pon tu nuevo mail" name="mail" value="" />
									</div>
								</div>
								<br>
								<div class="form-group">
									<br>
									<div class="input-group">
										<div class="input-group-addon">
											<span class="glyphicon glyphicon-fire" aria-hidden="true"></span>
										</div>
										<input type="text" class="form-control" id="usuario" placeholder="Pon nuevo nombre de usuario" name="usuario" value="" />
									</div>
								</div>
								<br>
								<div class="form-group">
									<br>
									<div class="input-group">
										<div class="input-group-addon">
											<span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
										</div>
										<input type="password" class="form-control" id="clave" placeholder="Pon tu nueva contraseña" name="clave" value="" />
									</div>
								</div>
								<br>
								<div class="form-group">
									<label for="Confirma"><!-- Confirma tu contraseña AA --></label>
									<br>
									<div class="input-group">
										<div class="input-group-addon">
											<span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
										</div>
										<input type="password" class="form-control" id="clave_repetida" placeholder="Confirma nueva contraseña" name="clave_repetida" value="" />
									</div>
								</div>
								<br>
								<div class="form-group">
									<label>Fecha de nacimiento</label>
									<div class="input-group">
										<div class="input-group-addon">
											<span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
										</div>
										<input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo date("Y-m-d");?>"/>
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
							$db = @mysqli_connect('localhost','root','','guaunder');
							if ($db) {
								if(isset($_POST["nick"])) {
										$nick = $_POST["nick"];
										$sql=" UPDATE usuario SET nick = '$nick_us' WHERE nick_us = '$usuario'";
										$consulta = mysqli_query($db, $sql);
								if(isset($_POST["nick"])) {
										$email = $_POST["email"];
										$sql=" UPDATE usuario SET email = '$email' WHERE email = '$usuario'";
										$consulta = mysqli_query($db, $sql);
								if(isset($_POST["nombre"])) {
										$nick = $_POST["nombre"];
										$sql=" UPDATE usuario SET nombre = '$nombre_us' WHERE nombre_us = '$usuario'";
										$consulta = mysqli_query($db, $sql);
								if(isset($_POST["contrasenia"])) {
										$nick = $_POST["contrasenia"];
										$sql=" UPDATE usuario SET contrasenia = '$contrasenia' WHERE contrasenia = '$usuario'";
										$consulta = mysqli_query($db, $sql);
								if(isset($_POST["fecha_nacimiento"])) {
										$nick = $_POST["fecha_nacimiento"];
										$sql=" UPDATE usuario SET fecha_nacimiento = '$fecha_nacimiento' WHERE fecha_nacimiento = '$usuario'";
										$consulta = mysqli_query($db, $sql);

													
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