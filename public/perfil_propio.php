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
				<div class="col-lg-12 col-sm-12 col-xs-12">
					<div id ="hand" class="col-lg-12 col-sm-12 col-xs-12">
						<img  id ="foto_perfil" src=
						<?php
						$db = @mysqli_connect('localhost','root','','guaunder');
						if ($db) {
								/*echo 'Conexión realizada correctamente.<br />';
								echo 'Información sobre el servidor: ',
								mysqli_get_host_info($db),'<br />';
								echo 'Versión del servidor: ',
								mysqli_get_server_info($db),'<br />';*/

								$sql="SELECT foto_perfil FROM usuario";
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
											$db = @mysqli_connect('localhost','root','','guaunder');
											if ($db) {
												

												if(isset($_FILES["fileToUpload"]["name"])) {
													$target_dir = "img/";
													$target_file = utf8_decode($target_dir . $_FILES["fileToUpload"]["name"]);
													move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
													$ruta = '"'. $target_file . '"';
													$sql=" UPDATE usuario SET foto_perfil = '$ruta' WHERE nick_us = 'Yorkshi1'";
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
									</div>
								</div>
							</div>
							<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" aria-label="close" data-dismiss="modal" ><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myModalLabel2">Conóceme más</h4>
											<span id="rueda_modal" class="glyphicon glyphicon-cog" aria-hidden="true"></span>
										</div>
										<div id="desc" class="modal-body">
											<?php
											$db = @mysqli_connect('localhost','root','','guaunder');
											if ($db) {
												/*echo 'Conexión realizada correctamente.<br />';
												echo 'Información sobre el servidor: ',
												mysqli_get_host_info($db),'<br />';
												echo 'Versión del servidor: ',
												mysqli_get_server_info($db),'<br />';*/

												$sql="SELECT descripcion FROM usuario";
												$consulta = mysqli_query($db, $sql);
												$cat = mysqli_fetch_assoc($consulta);

												echo  $cat['descripcion'];

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
											$db = @mysqli_connect('localhost','root','','guaunder');
											if ($db) {
												
												if(isset($_POST["descripcion"])) {
													$descripcion = $_POST["descripcion"];
													$sql=" UPDATE usuario SET descripcion = '$descripcion' WHERE nick_us = 'Yorkshi1'";
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
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class = "row">
						<div class="col-lg-4 col-sm-4 col-xs-4"></div>
						<div class="col-lg-4 col-sm-4 col-xs-4">
							<div id="data_name_age">
								<h1 id="nombre"><?php 
									$db = @mysqli_connect('localhost','root','','guaunder');
									if ($db) {

										$sql=" SELECT nombre_us FROM usuario WHERE nick_us = 'Yorkshi1'";
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
									<div class="modal fade" id="modal-nombre" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" aria-label="close" data-dismiss="modal" ><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title" id="myModalLabel1">Cambiar nombre</h4>
												</div>
												<div class="modal-body">
													<form action="perfil_propio.php" method="post" enctype="multipart/form-data">
														<input type="text" name="nombre" class="form-control" placeholder="Usuario" aria-describedby="sizing-addon1">
														<br>
														<input type="submit" value="Cambiar" name="submit">
													</form>
													<?php
													$db = @mysqli_connect('localhost','root','','guaunder');
													if ($db) {


														if(isset($_POST["nombre"])) {
															$nombre = $_POST["nombre"];
															$sql=" UPDATE usuario SET nombre_us = '$nombre' WHERE nick_us = 'Yorkshi1'";
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
											</div>
										</div>
									</div>
									<h1 id="edad"> 
									<?php 
									$db = @mysqli_connect('localhost','root','','guaunder');
									if ($db) {

										$sql=" SELECT fecha_nacimiento FROM usuario WHERE nick_us = 'Yorkshi1'";
										$consulta = mysqli_query($db, $sql);
										$cat = mysqli_fetch_assoc($consulta);
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
									<span id="rueda_edad" class="glyphicon glyphicon-cog" aria-hidden="true"></span>
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
												$db = @mysqli_connect('localhost','root','','guaunder');
												if ($db) {


													if (isset($_POST["intereses"])) {
														$intereses = $_POST["intereses"];
														$sql=" SELECT ID from usuario WHERE nick_us = 'Yorkshi1'";
														$consulta = mysqli_query($db, $sql);
														$cat = mysqli_fetch_assoc($consulta);
														$id = $cat['ID'];
														$sql=" INSERT INTO intereses (ID, intereses_us) VALUES ('$id', '$intereses')";
														$consulta = mysqli_query($db, $sql);
														
													}

													if (isset($_POST["delete"])) {
														$sql=" SELECT ID from usuario WHERE nick_us = 'Yorkshi1'";
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

								$db = @mysqli_connect('localhost','root','','guaunder');
								if ($db) {

									$sql=" SELECT intereses_us FROM intereses NATURAL JOIN usuario  WHERE nick_us = 'Yorkshi1'";
									$consulta = mysqli_query($db, $sql);
									while ($cat = mysqli_fetch_assoc($consulta)) {
										//echo '<div class="col-lg-4 col-sm-4 col-xs-4">';
										echo '<span id="tags_intereses" class= "fade-in">' . $cat["intereses_us"] .'</span>';

									 	//echo '</div>';

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
								<p id="ubicacion" class = "titulo">
									<?php
									$db = @mysqli_connect('localhost','root','','guaunder');
									if ($db) {
										$sql=" SELECT ubicacion FROM usuario WHERE nick_us = 'Yorkshi1'";
										$consulta = mysqli_query($db, $sql);
										$cat = mysqli_fetch_assoc($consulta);
										echo  $cat['ubicacion'];
									}
									else {
										printf('Error %d: %s.<br />',mysqli_connect_errno(),mysqli_connect_error());
									}
									@mysqli_close($db);
									?>
								</p>
								<span id="rueda_ubi" class="glyphicon glyphicon-cog" aria-hidden="true" data-toggle="modal" data-target="#modal-ubi"></span>
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
												$db = @mysqli_connect('localhost','root','','guaunder');
												if ($db) {

													if(isset($_POST["ubi"])) {
														$ubi = $_POST["ubi"];
														$sql=" UPDATE usuario SET ubicacion = '$ubi' WHERE nick_us = 'Yorkshi1'";
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
										</div>
									</div>
								</div>

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


			<div id="footer">
			</div>

			<script  async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmOcKc6wTUdeM3H82I2QwljLDTPIL0hck&libraries=places&callback=initAutocomplete"></script>



		</body>
		</html>
