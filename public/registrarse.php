<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset = "utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Formulario Registro</title>
	<link rel="icon" href="img/icono.png">
	<link rel="stylesheet" type="text/css" href="css/cssPrincipal.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>
	<script src="js/jquery-3.2.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function(){
			$( "#header" ).load('noLoginHome.html');
		});
	</script>
</head>
<body>
	<div id="header"></div>

	<div class="container-fluid">
		<div class = "row">
			<div class="col-md-4 col-sm-3 col-xs-2"></div>
			<div class="col-md-4 col-sm-6 col-xs-8">
				<div class="panel panel-default">
					<div class="panel-heading">REGISTRATE</div>
					<div id="caja" class="panel-body">
						<div class="center-block">
							<form id="formulario" action="registro.php" class="form">
								<div class="form-group">
									<label for="Nombre"><!-- Nombre AA --></label><br>
									<div class="input-group">
										<div class="input-group-addon">
											<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
										</div>
										<input type="text" class="form-control" id="nick" placeholder="Pon tu nick" name="nick" value="" />
									</div>
								</div>
								<br>
								<div class="form-group">
									<label for="Mail"><!-- Mail AA --></label>
									<br>
									<div class="input-group">
										<div class="input-group-addon">
												<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
										</div>
										<input id ="mail" type="text" class="form-control" placeholder="Pon tu mail" name="mail" value="" />
									</div>
								</div>
								<br>
								<div class="form-group">
									<label for="Usuario"><!-- Usuario AA --></label>
									<br>
									<div class="input-group">
										<div class="input-group-addon">
											<span class="glyphicon glyphicon-fire" aria-hidden="true"></span>
									</div>
									<input type="text" class="form-control" id="usuario" placeholder="Pon tu nombre de usuario" name="usuario" value="" />
									</div>
								</div>
								<br>
								<div class="form-group">
									<label for="Contraseña"><!-- Contraseña AA --></label>
									<br>
									<div class="input-group">
										<div class="input-group-addon">
											<span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
									</div>
									<input type="password" class="form-control" id="clave" placeholder="Pon tu contraseña" name="clave" value="" />
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
									<input type="password" class="form-control" id="confirma" placeholder="Confirma contraseña" name="confirma" value="" />
									</div>
								</div>
								<br>
								<br>
								<input type="submit" class="btn btn-success" value="Acceder" id="registrarse" name="registrarse" value="Registrarse">
								<br>
								<!-- Linkear a inicio de sesión -->
								<!--<a  id = "link_inicio" href=""> Iniciar Sesión </a>-->
							</form>
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
	<script src="js/formulario_registro.js"></script>

</body>
</html>