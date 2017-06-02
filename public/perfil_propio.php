<?php session_start(); ?>
<!DOCTYPE html>
<html lang= "es">
<head>
	<meta charset="utf-8">
	<title>Perfil de usuario</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="img/icono.png">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/cssPrincipal.css">
	<script src="js/jquery-3.2.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src ="js/perfil_propio.js"></script>

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
				<div class="modal fade" id="modal-foto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" aria-label="close" data-dismiss="modal" ><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel1">Subir Foto de perfil</h4>
							</div>
							<div class="modal-body">
								<form action="perfil_propio.php" method="post" enctype="multipart/form-data">
									<input type="file" name="fileToUpload">
									<input type="submit" value="Upload Image" name="submit">
								</form>
								<?php
								$db = @mysqli_connect('localhost','root','root','guaunder');
								if ($db) {


									if(isset($_FILES["fileToUpload"]["name"])) {
										$uploadOk = 1;
										$target_dir = "img/";
										$target_file = $target_dir . $_FILES["fileToUpload"]["name"];
										$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
										if ($_FILES["fileToUpload"]["size"] > 500000) {
											echo "Sorry, your file is too large.";
											$uploadOk = 0;
										}

										if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
											echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
											$uploadOk = 0;
										}

										if($uploadOk == 1){
											move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
											$ruta = '"'. $target_file . '"';
											$usuario = $_SESSION['nick'];
											$sql=" UPDATE usuario SET foto_perfil = '$ruta' WHERE nick_us = '$usuario'";
											$consulta = mysqli_query($db, $sql);
											header("Location:perfil_propio.php");
										}

									}

								}
								else {
									printf(
										'Error %d: %s.<br />',
										mysqli_connect_errno(),mysqli_connect_error());
								}
								@mysqli_close($db);

								?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-12 col-sm-12 col-xs-12">
					<a href=  <?php echo "fotosyvideos.php?nick=" . $_SESSION["nick"]?> >
					<span title="Fotos y Videos" id="icon_multimedia" class="glyphicon glyphicon-film" aria-hidden="true"></span>
					</a>
					<div id ="hand" class="col-lg-12 col-sm-12 col-xs-12">
						<img  id ="foto_perfil" src=
						<?php
						$db = @mysqli_connect('localhost','root','root','guaunder');
						if ($db) {
								/*echo 'Conexión realizada correctamente.<br />';
								echo 'Información sobre el servidor: ',
								mysqli_get_host_info($db),'<br />';
								echo 'Versión del servidor: ',
								mysqli_get_server_info($db),'<br />';*/


								$usuario = $_SESSION['nick'];
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
							?>  alt="Foto de perfil" data-toggle="modal" data-target="#myModal">
							<span id="rueda_foto" class="glyphicon glyphicon-cog" aria-hidden="true" data-toggle="modal" data-target="#modal-foto"></span>
							
							<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" aria-label="close" data-dismiss="modal" ><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myModalLabel2">Conóceme más</h4>

										</div>
										<div id="desc" class="modal-body">
											<?php
											$db = @mysqli_connect('localhost','root','root','guaunder');
											if ($db) {
												/*echo 'Conexión realizada correctamente.<br />';
												echo 'Información sobre el servidor: ',
												mysqli_get_host_info($db),'<br />';
												echo 'Versión del servidor: ',
												mysqli_get_server_info($db),'<br />';*/

												$usuario = $_SESSION['nick'];
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
											<form action="perfil_propio.php" method="post" enctype="multipart/form-data">
												<input type="text" name="descripcion" class="form-control" placeholder="Descripción" aria-describedby="sizing-addon1">
												<br>
												<input type="submit" value="Cambiar" name="submit">
											</form>
											<?php
											$db = @mysqli_connect('localhost','root','root','guaunder');
											if ($db) {

												if(isset($_POST["descripcion"])) {
													$descripcion = $_POST["descripcion"];
													$usuario = $_SESSION['nick'];
													$sql=" UPDATE usuario SET descripcion = '$descripcion' WHERE nick_us = '$usuario'";
													$consulta = mysqli_query($db, $sql);
													header('Location:perfil_propio.php');

												}

											}
											else {
												printf(
													'Error %d: %s.<br />',
													mysqli_connect_errno(),mysqli_connect_error());
											}
											@mysqli_close($db);

											?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class = "row">
						<div class="modal fade" id="modal-nombre" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" aria-label="close" data-dismiss="modal" ><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="myModalLabel1">Cambiar nombre</h4>
									</div>
									<div class="modal-body">
										<form id="form_name" action="perfil_propio.php" method="post" enctype="multipart/form-data">
											<input id="input_name" type="text" name="nombre" class="form-control" placeholder="Usuario" aria-describedby="sizing-addon1">
											<br>
											<input type="submit" value="Cambiar" name="submit">
										</form>
										<?php
										$db = @mysqli_connect('localhost','root','root','guaunder');
										if ($db) {


											if(isset($_POST["nombre"])) {
												$nombre = $_POST["nombre"];
												$usuario = $_SESSION['nick'];
												$sql=" UPDATE usuario SET nombre_us = '$nombre' WHERE nick_us = '$usuario'";
												$consulta = mysqli_query($db, $sql);
												header("Location:perfil_propio.php");
											}

										}
										else {
											printf(
												'Error %d: %s.<br />',
												mysqli_connect_errno(),mysqli_connect_error());
										}
										@mysqli_close($db);

										?>
									</div>
								</div>
							</div>
						</div>
						<div class="modal fade" id="ModalEdad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" aria-label="close" data-dismiss="modal" ><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="myModalLabel3">Cambia tu fecha de nacimiento</h4>
									</div>
									<div class="modal-body">
										<form action="perfil_propio.php" method="post" enctype="multipart/form-data">
											<input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo date("Y-m-d");?>"/>
											<br>
											<input type="submit" value="Cambiar" name="submit">
										</form>
										<?php
										$db = @mysqli_connect('localhost','root','root','guaunder');
										if ($db) {

											if (isset($_POST["fecha"])) {
												$fecha = $_POST["fecha"];
												$usuario = $_SESSION['nick'];
												$sql=" UPDATE usuario SET fecha_nacimiento = '$fecha' WHERE nick_us = '$usuario' ";
												$consulta = mysqli_query($db, $sql);
												header("Location:perfil_propio.php");

											}

										}
										else {
											printf(
												'Error %d: %s.<br />',
												mysqli_connect_errno(),mysqli_connect_error());
										}
										@mysqli_close($db);

										?>
									</div>
									<div id="modal-footer" class="modal-footer">
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-sm-4 col-xs-4"></div>
						<div class="col-lg-4 col-sm-4 col-xs-4">
							<div id="data_name_age">
								<h1 id="nombre"><?php
									$db = @mysqli_connect('localhost','root','root','guaunder');
									if ($db) {

										$usuario = $_SESSION['nick'];
										$sql=" SELECT nombre_us FROM usuario WHERE nick_us = '$usuario'";
										$consulta = mysqli_query($db, $sql);
										$cat = mysqli_fetch_assoc($consulta);
										echo  $cat['nombre_us'];


									}
									else {
										printf('Error %d: %s.<br />',mysqli_connect_errno(),mysqli_connect_error());
									}
									@mysqli_close($db);
									?></h1>
									<span id="rueda_nombre" class="glyphicon glyphicon-cog" aria-hidden="true" data-toggle="modal" data-target="#modal-nombre"></span>
									
									<h1 id="edad">
										<?php
										$db = @mysqli_connect('localhost','root','root','guaunder');
										if ($db) {

											$usuario = $_SESSION['nick'];
											$sql=" SELECT fecha_nacimiento FROM usuario WHERE nick_us = '$usuario'";
											$consulta = mysqli_query($db, $sql);
											$cat = mysqli_fetch_assoc($consulta);
											$fecha = $cat['fecha_nacimiento'];
											$cumpleanos = explode("-", $fecha);
											$edad = (date("md", date("U", mktime(0, 0, 0, $cumpleanos[2], $cumpleanos[1], $cumpleanos[0]))) > date("md") ? ((date("Y") - $cumpleanos[0]) - 1) : (date("Y") - $cumpleanos[0]));

											echo $edad . " años";

										}
										else {
											printf('Error %d: %s.<br />',mysqli_connect_errno(),mysqli_connect_error());
										}
										@mysqli_close($db);
										?>

									</h1>
									<span id="rueda_edad" class="glyphicon glyphicon-cog" aria-hidden="true"  data-toggle="modal" data-target="#ModalEdad"> </span>

								</div>
							</div>

						</div>

						<div class="col-lg-4 col-sm-4 col-xs-4"></div>
					</div>

					<br>
					<br>

					<div class = "row">
						<div class="col-lg-12 col-sm-12 col-xs-12">
							<p title= "Añade tus intereses" intereses" class = "titulo"> Intereses </p>
							<span id="rueda_intereses" class="glyphicon glyphicon-cog" aria-hidden="true" data-toggle="modal" data-target="#ModalSettings"></span>

							<div class="modal fade" id="ModalSettings" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" aria-label="close" data-dismiss="modal" ><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myModalLabel3">Cambiar intereses</h4>
										</div>
										<div class="modal-body">
											<form action="perfil_propio.php" method="post" enctype="multipart/form-data">
												<input type="text" name="intereses" class="form-control" placeholder="Intereses" aria-describedby="sizing-addon1">
												<br>
												<input type="submit" value="Cambiar" name="submit">
												<button name="delete"> Borrar intereses </button>
											</form>
											<?php
											$db = @mysqli_connect('localhost','root','root','guaunder');
											if ($db) {
												$usuario = $_SESSION['nick'];

												if (isset($_POST["intereses"])) {
													$intereses = $_POST["intereses"];

													$sql=" SELECT ID from usuario WHERE nick_us = '$usuario'";
													$consulta = mysqli_query($db, $sql);
													$cat = mysqli_fetch_assoc($consulta);
													$id = $cat['ID'];
													$sql=" INSERT INTO intereses (ID, intereses_us) VALUES ('$id', '$intereses')";
													$consulta = mysqli_query($db, $sql);

												}

												if (isset($_POST["delete"])) {
													$sql=" SELECT ID from usuario WHERE nick_us = '$usuario'";
													$consulta = mysqli_query($db, $sql);
													$cat = mysqli_fetch_assoc($consulta);
													$id = $cat['ID'];
													$sql=" DELETE FROM intereses WHERE ID = '$id' ;";
													$consulta = mysqli_query($db, $sql);

												}

											}
											else {
												printf(
													'Error %d: %s.<br />',
													mysqli_connect_errno(),mysqli_connect_error());
											}
											@mysqli_close($db);

											?>
										</div>
										<div id="modal-footer" class="modal-footer">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<br>
					<br>

					<div  id="etiquetas">
						<div class ="row">
							<?php

							$db = @mysqli_connect('localhost','root','root','guaunder');
							if ($db) {
								$usuario = $_SESSION['nick'];
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
						<div class="modal fade" id="modal-ubi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" aria-label="close" data-dismiss="modal" ><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="myModalLabel1">Cambiar ubicación</h4>
									</div>
									<div class="modal-body">
										<form action="perfil_propio.php" method="post" enctype="multipart/form-data">
											<input type="text" name="ubi" class="form-control" placeholder="Ubicación" aria-describedby="sizing-addon1">
											<br>
											<input type="submit" value="Cambiar" name="submit">
										</form>
										<?php
										$db = @mysqli_connect('localhost','root','root','guaunder');
										if ($db) {

											if(isset($_POST["ubi"])) {
												$usuario = $_SESSION['nick'];
												$ubi = $_POST["ubi"];
												$sql=" UPDATE usuario SET ubicacion = '$ubi' WHERE nick_us = '$usuario'";
												$consulta = mysqli_query($db, $sql);
												header("Location:perfil_propio.php");

											}

										}
										else {
											printf(
												'Error %d: %s.<br />',
												mysqli_connect_errno(),mysqli_connect_error());
										}
										@mysqli_close($db);
										?>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-12 col-sm-12 col-xs-12">
							<p id="ubicacion" class = "titulo">
								<?php
								$db = @mysqli_connect('localhost','root','root','guaunder');
								if ($db) {
									$usuario = $_SESSION['nick'];
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
							<span id="rueda_ubi" class="glyphicon glyphicon-cog" aria-hidden="true" data-toggle="modal" data-target="#modal-ubi"></span>
							
						</div>
					</div>

					<br>
					<div class = "row">
						<div class="col-lg-12 col-sm-12 col-xs-12">
							<input id="pac-input" class="controls" type="text" placeholder="Search Box">
							<div id="map"> </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div id="footer">
	</div>

	<script  async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmOcKc6wTUdeM3H82I2QwljLDTPIL0hck&libraries=places&callback=initAutocomplete"></script>



</body>
</html>
