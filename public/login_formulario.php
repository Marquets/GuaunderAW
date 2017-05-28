<?php
	session_start();

	$no_encontrado=isset($_SESSION['no_encontrado'])? $_SESSION['no_encontrado']: false;
	$error_bd=isset($_SESSION['error_bd'])? $_SESSION['error_bd']: false;
	$incompletos=isset($_SESSION['incompletos'])? $_SESSION['incompletos']: false;
	$error_post=isset($_SESSION['error_post'])? $_SESSION['error_post']: false;
	if(isset($_SESSION['id']) and $_SESSION['estado'] == 'Autenticado'){
		header("Location: pagPrincipal.php");
	}
	elseif($no_encontrado==true){?>
		<script type="text/javascript">alert("Usuario y/o contraseña no encotrados")</script>

	<?php ;

		if(isset($_SESSION['numero_acessos'])){
			echo $_SESSION['numero_acessos'];
			$_SESSION['numero_acessos']++;
			if($_SESSION['numero_acessos']>2){
				/*echo "<script>";
				echo "document.getElementById('captcha').style.display = 'block'";
				echo "grecaptcha.reset();";
				echo "document.getElementById('logear').disabled=true;";
				echo "</script>";*/
			}
		}
		else{
			$_SESSION['numero_acessos']=0;
		}

		$_SESSION['no_encontrado']=false;
	}
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
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="img/icono.png">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="css/cssPrincipal.css">
	<script src="js/jquery-3.2.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
		$(function(){
			$( "#header" ).load('noLoginHome.html');
		});
	</script>
</head>
<body>
	<div id="header"></div>

	<form action="login.php" id="formulario_login" method="post">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4 col-sm-3 col-xs-1"></div>
				<div class="col-md-4 col-sm-6 col-xs-10">
					<div class= "panel panel-default">
						<div class="panel-heading"> INICIE SESION </div>
						<div class="panel-body">
							<div class="form-group">
								<input type="text" name ="nick" id="nick" placeholder="Nick" class="form-control">
								<span id="okIconEmail" class="glyphicon glyphicon-ok pull-right"></span>
								<span id="errorIconEmail" class="glyphicon glyphicon-remove pull-right"></span>
								<br>
							</div>
							<div class="form-group">
								<input type="password" name="contrasenia" id="contrasenia" placeholder="Contraseña" class="form-control">
								<span id="okIconPass" class="glyphicon glyphicon-ok pull-right"></span>
								<span id="errorIconPass" class="glyphicon glyphicon-remove pull-right"></span>
								<br>
							</div>
						 	<div class="checkbox">
							 	<label>
									<input type="checkbox" id="checkbox" value="contraseniaOlvidada">
									Olvidé mi contraseña
								</label><br>
							</div>
							<!--<div class="g-recaptcha" id="captcha" data-callback="noRobot" data-sitekey="6LcncB4UAAAAACgbQNpjy7Qr-UiXAVRufuLjWSbV"></div><br>-->
							<input type="submit" class="btn btn-success" value="Acceder" id="logear" name="logear">
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-3 col-xs-1"></div>
			</div>
		</div>
	</form>
	<div id="footer"></div>

	<script>
		$(function(){
			$( "#footer" ).load('footer.html');
		});
	</script>
	<script src="js/validar_login.js"></script>
	<!--<script src='https://www.google.com/recaptcha/api.js'></script>-->
</body>
</html>