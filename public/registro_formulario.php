<?php
	//Iniciamos sesión
	session_start();

	//Comprobamos todas las variables de $_SESSION, si alguna no existe la ponemos a false
	$error_bd=isset($_SESSION['error_bd'])? $_SESSION['error_bd']: false;
	$incompletos=isset($_SESSION['incompletos'])? $_SESSION['incompletos']: false;
	$error_post=isset($_SESSION['error_post'])? $_SESSION['error_post']: false;

	//Comprobamos si el usuario ya ha iniciado sesión, si es asi le redirigimos a pagPrincipal.html
	if(isset($_SESSION['id']) and $_SESSION['estado'] == 'Autenticado'){
		if($_SESSION['nick']=='admin')
			header("Location: usuariosregistrados.php");
		else
			header("Location: pagPrincipal.php");
	}

	//Comprobamos que todas las variables de error estan a false. Si alguna esta a true imprimimos un mensaje de error, tras esto las ponemos a false para que no vuelvan a aparecer el error cada vez que cargemos las página
	elseif($error_bd==true){?>
		<script type="text/javascript">alert("Error al conectar base de datos")</script>
	<?php ;
		$_SESSION['error_bd']=false;
	}
	elseif($incompletos==true){?>
		<script type="text/javascript">alert("Hay campos incompletos")</script>
	<?php ;
		$_SESSION['incompletos']=false;
	}
	elseif($error_post==true){?>
		<script type="text/javascript">alert("Error, consulte con el administrador de la página")</script>
	<?php ;
		$_SESSION['error_post']=false;
	}
?>
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
							<form id="formulario" name="formulario" action="registro.php" class="form" method="post">
								<div class="form-group">
									<label for="nick">Nick</label>
									<div class="input-group">
										<div class="input-group-addon">
											<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
										</div>
										<input type="text" class="form-control" id="nick" placeholder="Pon tu nick" name="nick" value="" />
									</div>
								</div>
								<br>
								<div class="form-group">
									<label for="mail">Email</label>
									<div class="input-group">
										<div class="input-group-addon">
												<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
										</div>
										<input id ="mail" type="text" class="form-control" placeholder="Pon tu mail" name="mail" value="" />
									</div>
								</div>
								<br>
								<div class="form-group">
									<label for="usuario">Nombre de usuario</label>
									<div class="input-group">
										<div class="input-group-addon">
											<span class="glyphicon glyphicon-fire" aria-hidden="true"></span>
									</div>
									<input type="text" class="form-control" id="usuario" placeholder="Pon tu nombre de usuario" name="usuario" value="" />
									</div>
								</div>
								<br>
								<div class="form-group">
									<label for="clave">Contraseña</label>
									<div class="input-group">
										<div class="input-group-addon">
											<span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
									</div>
									<input type="password" class="form-control" id="clave" placeholder="Pon tu contraseña" name="clave" value="" />
									</div>
								</div>
								<br>
								<div class="form-group">
									<label for="clave_repetida">Confirme la contraseña</label>
									<div class="input-group">
										<div class="input-group-addon">
											<span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
									</div>
									<input type="password" class="form-control" id="clave_repetida" placeholder="Confirma contraseña" name="clave_repetida" value="" />
									</div>
								</div>
								<br>
								<div class="form-group">
									<label for="fecha">Fecha de nacimiento</label>
									<div class="input-group">
										<div class="input-group-addon">
											<span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
										</div>
										<input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo date("Y-m-d");?>"/>
									</div>
								</div>
								<br>
								<br>
								<input type="submit" class="btn btn-success" id="registrarse" name="registrarse" value="Registrarse">
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
	<script src="js/validar_registro.js"></script>

</body>
</html>