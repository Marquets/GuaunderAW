<?php
	session_start();
	$error_bd=isset($_SESSION['error_bd'])? $_SESSION['error_bd']: false;

	if($error_bd){?>
		<script type="text/javascript">alert("Error al conectar base de datos")</script>
	<?php ;
		$_SESSION['error_bd']=false;
	}
	if (!isset($_SESSION['nick'])) {
		header("Location: index.html");
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Principal Guaunder</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="img/icono.png">
	<link rel="stylesheet" type="text/css" href="css/cssPrincipal.css"/>
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
	<script src="js/jquery-3.2.0.min.js"></script>
	<script>
		$(document).ready(function(){
			$( "#header" ).load('loginHome.html');
		});
	</script>
</head>
<body>

	<div id="header"></div>

	<div class="center-block" id="principalBlock">
	<span class="hidden" id="nickname"><?php echo $_SESSION['nick']; ?></span>

		<div class="usuario-vista">
			<div id="carousel-usuario" class="carousel slide" data-interval="false">
				<div class="carousel-inner" role="listbox">
					<?php
                		$db=@mysqli_connect('localhost', 'root', 'root', 'guaunder');
                		$sql="select * from usuario u where u.nick_us<>'".$_SESSION['nick']."' and u.nick_us<>'admin' and not exists (select * from matches_guau where u.nick_us=matches_guau.us_target and matches_guau.us_like='".$_SESSION['nick']."')";
                		$consulta=mysqli_query($db,$sql);
                		$numUsers = mysqli_num_rows($consulta);
                		$b=true;
                		$i=1;

                		while ($users_guaunder = mysqli_fetch_assoc($consulta)) {
                			$cumpleanos = explode("-", $users_guaunder['fecha_nacimiento']);
							$edad = (date("md", date("U", mktime(0, 0, 0, $cumpleanos[2], $cumpleanos[1], $cumpleanos[0]))) > date("md") ? ((date("Y") - $cumpleanos[0]) - 1) : (date("Y") - $cumpleanos[0]));

							if ($i==1 && $numUsers==1) { ?>
                			<div class="item ultimo active">
                			<?php
                			} elseif ($b) { ?>
                			<div class="item active">
                			<?php
                				$b = false;
                			} elseif ($i == $numUsers && $i!=1) { ?>
                			<div class="item ultimo">
                			<?php
                			} else { ?>
                			<div class="item">
                			<?php } ?>
								<div class="usuario-foto">
									<?php echo '<img src='.$users_guaunder['foto_perfil'].' class="img-responsive img-rounded centro" alt="'.$users_guaunder['nick_us'].'">'; ?>
								</div>
								<div class="carousel-caption">
									<?php echo '<a href="perfil.php?nick='.$users_guaunder['nick_us'].'"><span class="nombre-edad">'.$users_guaunder['nombre_us'].', '.$edad.' años</span></a>';?>
									<span class="localizacion">
										<i class="fa fa-map-marker">
										<?php echo $users_guaunder['ubicacion']; ?>
										</i>
									</span>
								</div>
							</div>
							<?php
							$i++;
                		}
                		if ($i == 1) {
                			echo '<span id="noUsers" class="ultimo active negrita">
                				Ya no hay más usuarios :( ...Eso significa que has dado like a TODOS jeje, ahora toca esperar!
							</span>';
                		}
                	?>
				</div>
			</div>
		</div>

		<div id="barra-boton-bottom">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<a title="No me gusta" class="btn btn-1" role="button" id="cross-btn">
					<span class="fa fa-remove"></span>
				</a>
				<a title="Me gusta" class="btn btn-1" role="button" id="heart-btn">
					<span class="fa fa-heart"></span>
				</a>
			</div>
		</div>
	</div>

	<div id="footer"></div>

	<script>
		$(document).ready(function(){
			$( "#footer" ).load('footer.html');
		});
	</script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/pagPrincipal.js"></script>
	<script src="js/guaunder.js"></script>

</body>
</html>