<?php
	//Iniciamos sesión
	session_start();

	//Comprobamos si el usuario ya ha iniciado sesión, si es asi le redirigimos a pagPrincipal.html
	if(isset($_SESSION['id']) and $_SESSION['estado'] == 'Autenticado'){
		if($_SESSION['nick']!='admin')
			header("Location: pagPrincipal.php");
		if(isset($_SESSION['error_borrar_usr']) && $_SESSION['error_borrar_usr']){
			alert("Error al borrar usuario");
			$_SESSION['error_borrar_usr']=false;
		}
	}
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



	<div class="container-fluid bloque-admin">
		<div class="row">
			<div class="col-md-2 col-sm-2 col-xs-1"></div>
			<div class="col-md-8 col-sm-8 col-xs-10 table-responsive" >
				<form action="usuariosregistrados.php" method="post">
				<table class="table table-bordered">
					<tr>
						<td><h2>Nick</h2></td>
						<td><h2>Email</h2></td>
						<td><h2>Última Conexión</h2></td>
						<td><h2>Editar/Borrar</h2></td>
						<td class="hidden"></td>
					</tr>
					<?php
					$db = @mysqli_connect('localhost','root','root','guaunder');
					if ($db) {
						if (!isset($_SESSION['sqlAdmin'])) {
							$_SESSION['sqlAdmin']="SELECT * FROM usuario";
						}
						$sql = $_SESSION['sqlAdmin'];
						$consulta = mysqli_query($db, $sql);
						while ($usuario=mysqli_fetch_assoc($consulta)) { ?>

							<tr>
								<td><?php echo $usuario['nick_us']; ?></td>
								<td><?php echo $usuario['email']; ?></td>
								<td><?php echo $usuario['ult_conexion']; ?></td>
								<td><?php $ref="editarusuarios.php?nick=".$usuario['nick_us']."&nombre=".$usuario['nombre_us']."&email=".$usuario['email']."&fecha_nacimiento=".$usuario['fecha_nacimiento'];
								 echo '<a href="'.$ref.'" role="button" class="btn btn-warning" title="Editar">';?>
								<span class="glyphicon glyphicon-pencil"></span></a>
								<?php
								$usr=$usuario['nick_us'];
								echo '<a role="button" class="btn btn-danger" title="Borrar" data-toggle="modal" data-target="#modalBorrar'.$usr.'">';?>
								<span class="glyphicon glyphicon-remove"></span></a> </td>
								<td class="hidden">
								<?php
								echo '<div class="modal fade" id="modalBorrar'.$usr.'" role="dialog">';?>
						    		<div class="modal-dialog">
						    			<div class="modal-content">
									        <div class="modal-header">
									          <button type="button" class="close" data-dismiss="modal">&times;</button>
									          <h4 class="modal-title">Borrar usuario</h4>
									        </div>
									        <div class="modal-body">
									          <p>¿Esta seguro de que desea borrar el usuario?</p>
									        </div>
									        <div class="modal-footer">
									        <?php
									    		echo '<a href="borrarUsuario.php?nick='.$usr.'" role="button" class="btn btn-default">Si</a>';?>
									        	<a role="button" class="btn btn-default" data-dismiss="modal">No</a>
									        </div>
								      </div>
						    		</div>
						    	</div>
						    	</td>
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
						<li><a href="nofiltrar.php">Todos</a></li>
					</ul>
			</div>


		</div>
		<div class="modal fade" id="modalBorrar" role="dialog">
    		<div class="modal-dialog">
    			<div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h4 class="modal-title">Borrar usuario</h4>
			        </div>
			        <div class="modal-body">
			          <p>¿Esta seguro de que desea borrar el usuario?</p>
			        </div>
			        <div class="modal-footer">
			        	<a href="borrarUsuario.php" role="button" class="btn btn-default">Si</a>
			        	<a role="button" class="btn btn-default" data-dismiss="modal">No</a>
			        </div>
		      </div>
    		</div>
    	</div>
	</div>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>