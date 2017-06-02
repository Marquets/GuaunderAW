<?php
	session_start();
	if (!isset($_SESSION['nick'])) {
		header("Location: index.html");
	}
?>
<!DOCTYPE html>
<html lang= "es">
<head>
	<meta charset="utf-8">
	<title>Perfil de usuario</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="img/icono.png">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/cssMarco.css"> -->
	<link rel="stylesheet" type="text/css" href="css/cssPrincipal.css">
	<script src="js/jquery-3.2.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src ="js/perfil.js"></script>
	<script>
		$(document).ready(function(){
			$( "#header" ).load('loginHome.html');
			$( "#footer" ).load('footer.html');
		});
	</script>


</head>
<body>

	<div id="header">
	</div>

	<!-- Contenido -->
	<div id = "contenido">
		<div class = "container">
			<div class = "row">
				<!-- Modal -->
				<div class="col-lg-12 col-sm-12 col-xs-12">
					<a href=  <?php echo "fotosyvideos.php?nick=" . $_GET["nick"]?> >
						<span title="Fotos y Videos" id="icon_multimedia" class="glyphicon glyphicon-film" aria-hidden="true"></span>
					</a>
					<div id ="hand" class="col-lg-12 col-sm-12 col-xs-12">
						<img  id ="foto_perfil" src= <?php
						$db = @mysqli_connect('localhost','root','root','guaunder');
						if ($db) {
								/*echo 'Conexión realizada correctamente.<br />';
								echo 'Información sobre el servidor: ',
								mysqli_get_host_info($db),'<br />';
								echo 'Versión del servidor: ',
								mysqli_get_server_info($db),'<br />';*/

								$usuario = $_GET['nick'];
								$sql="SELECT foto_perfil FROM usuario WHERE nick_us = '$usuario'";
								$consulta = mysqli_query($db, $sql);
								$cat = mysqli_fetch_assoc($consulta);

								echo  $cat['foto_perfil'];

							}
							else {
								printf(
									'Error %d: %s.<br />',
									mysqli_connect_errno(),mysqli_connect_error());
							}
							@mysqli_close($db);
							?> alt="Foto de perfil" data-toggle="modal" data-target="#myModal">
					</div>
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" aria-label="close" data-dismiss="modal" ><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Conóceme más</h4>
								</div>
								<div id ="desc" class="modal-body">
									<?php
										$db = @mysqli_connect('localhost','root','root','guaunder');
										if ($db) {
											/*echo 'Conexión realizada correctamente.<br />';
											echo 'Información sobre el servidor: ',
											mysqli_get_host_info($db),'<br />';
											echo 'Versión del servidor: ',
											mysqli_get_server_info($db),'<br />';*/
											$usuario = $_GET['nick'];
											$sql="SELECT descripcion FROM usuario WHERE nick_us = '$usuario'";
											$consulta = mysqli_query($db, $sql);
											$cat = mysqli_fetch_assoc($consulta);

											echo $cat['descripcion'];

										}
										else {
											printf(
												'Error %d: %s.<br />',
												mysqli_connect_errno(),mysqli_connect_error());
										}
										@mysqli_close($db);

										?>
							</div>
								<div class="modal-footer">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class = "row">
				<div class="col-lg-4 col-sm-4 col-xs-4"></div>
				<div class="col-lg-4 col-sm-4 col-xs-4" id="popover" rel="popover" data-placement="right" data-original-title="Conóceme más" data-content="Pincha en la imagen para conocerme más" data-trigger="hover">
					<h1 id="nombre_edad">

					<?php
						$db = @mysqli_connect('localhost','root','root','guaunder');
						if ($db) {

							$usuario = $_GET['nick'];
							$sql=" SELECT nombre_us, fecha_nacimiento FROM usuario WHERE nick_us = '$usuario'";
							$consulta = mysqli_query($db, $sql);
							$cat = mysqli_fetch_assoc($consulta);
							echo  $cat['nombre_us'] . ", ";
							$fecha = $cat['fecha_nacimiento'];
							$f1 = (int) substr( $fecha, 0, 4);
							$fecha_actual = getdate(date("U"));
							$f2 = (int) $fecha_actual['year'];
							$res = $f2 - $f1;
							echo $res . " años";



						}
						else {
							printf('Error %d: %s.<br />',mysqli_connect_errno(),mysqli_connect_error());
						}
						@mysqli_close($db);
					?>
					</h1>
				</div>
				<div class="col-lg-4 col-sm-4 col-xs-4"></div>
			</div>

			<div  id="etiquetas">
				<div class = "row">
					<p class = "titulo"> Intereses </p>
					<br>
					<br>
					<?php

						$db = @mysqli_connect('localhost','root','root','guaunder');
						if ($db) {

							$usuario = $_GET['nick'];
							$sql=" SELECT intereses_us FROM intereses NATURAL JOIN usuario  WHERE nick_us = '$usuario'";
							$consulta = mysqli_query($db, $sql);
							while ($cat = mysqli_fetch_assoc($consulta)) {
								echo '<span id="tags_intereses" class= "fade-in">' . $cat["intereses_us"] .'</span>';
							}


						}
						else {
							printf('Error %d: %s.<br />',mysqli_connect_errno(),mysqli_connect_error());
						}
						@mysqli_close($db);
					?>
				</div>
			</div>

			<div class = "row">
				<div class="col-lg-12 col-sm-12 col-xs-12">
					<p  id="ubicacion" class = "titulo">

					<?php
						$db = @mysqli_connect('localhost','root','root','guaunder');
						if ($db) {
							$usuario = $_GET['nick'];
							$sql=" SELECT ubicacion FROM usuario WHERE nick_us = '$usuario'";
							$consulta = mysqli_query($db, $sql);
							$cat = mysqli_fetch_assoc($consulta);
							echo $cat['ubicacion'];
						}
						else {
							printf('Error %d: %s.<br />',mysqli_connect_errno(),mysqli_connect_error());
						}
						@mysqli_close($db);
					?>
					</p>
				</div>
			</div>

			<div class = "row">
				<div class="col-lg-12 col-sm-12 col-xs-12">
					<input id="pac-input" class="controls" type="text" placeholder="Search Box">
					<div id="map">
					</div>
				</div>
			</div>

		</div>

		<div id ="footer">
		</div>

		<script  async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmOcKc6wTUdeM3H82I2QwljLDTPIL0hck&libraries=places&callback=initAutocomplete"></script>

	</div>

	<script src="js/guaunder.js"></script>

</body>
</html>
