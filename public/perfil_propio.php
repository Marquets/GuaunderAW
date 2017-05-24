<!DOCTYPE html>
<html lang= "es">
<head>
	<meta charset="utf-8">
	<title>Perfil de usuario</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="img/icono.png">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/cssMarco.css">
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
							<h1 id="nombre"> Yorkshi </h1>
							<span id="rueda_nombre" class="glyphicon glyphicon-cog" aria-hidden="true"></span>
							<h1 id="edad"> 9 años </h1>
							<span id="rueda_edad" class="glyphicon glyphicon-cog" aria-hidden="true"></span>
						</div>

					</div>

					<div class="col-lg-4 col-sm-4 col-xs-4"></div>
				</div>

				<div class = "row">
					<div class="col-lg-12 col-sm-12 col-xs-12">
						<p title= "Añade tus intereses" intereses" class = "titulo"> Intereses<span id="rueda_intereses" class="glyphicon glyphicon-cog" aria-hidden="true" data-toggle="modal" data-target="#ModalSettings"></span>  </p>

							<div class="modal fade" id="ModalSettings" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" aria-label="close" data-dismiss="modal" ><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myModalLabel3">Cambiar intereses</h4>
										</div>
										<div class="modal-body">
											<button id="btn-erase" type="button" class="btn btn-primary btn-lg">
												Borrar intereses
											</button>
											<button id="btn-añadir" type="button" class="btn btn-primary btn-lg">
												Añadir interés
											</button>
										</div>
										<div id="modal-footer" class="modal-footer">
										</div>
									</div>
								</div>
							</div>
					</div>
				</div>

				<div  id="etiquetas">
					<div class ="row">
						<div class="col-lg-4 col-sm-4 col-xs-4">
							<span class= "fade-in"> Pasear </span>
						</div>
						<div class="col-lg-4 col-sm-4 col-xs-4">
							<span class= "fade-in"> Comer </span>
						</div>
						<div class="col-lg-4 col-sm-4 col-xs-4">
							<span class= "fade-in"> Jugar </span>
						</div>
					</div>
				</div>

				<div class = "row">
					<div class="col-lg-12 col-sm-12 col-xs-12">
						<p id="ubicacion" class = "titulo"> Cobeña, Madrid </p>
						<span id="rueda_ubi" class="glyphicon glyphicon-cog" aria-hidden="true"></span>

					</div>
				</div>

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
